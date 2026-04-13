<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UserProfile;
use App\Models\User;
use Livewire\WithPagination;
use App\Models\Country;
use App\Models\MemberCategory;
use App\Models\TradeSector;
use App\Models\ProductCategory;
use App\Models\Brand;

class MemberDirectory extends Component
{
    use WithPagination;

    public $search = '';
    public $categories = [];
    public $selectedCategories = [];
    public $selectedProducts = [];
    public $selectedCountries = [];
    public $selectedTradeSectors = [];
    public $brandSearch = '';

    protected $paginationTheme = 'bootstrap';

    public function updating()
    {
        $this->resetPage();
    }
   public function render()
{
    $query = User::query();

    $query->whereHas('userprofile', function($q) {
        // 1. Always filter by active status
        $q->where('is_active', 1);
        if (!empty($this->selectedCategories)) {
            $q->whereIn('company_type', $this->selectedCategories);
        }
        if(!empty($this->search)) {
            $q->where(function($subQ) {
                $subQ->where('company_name', 'like', '%' . $this->search . '%')
                     ->orWhere('slogan', 'like', '%' . $this->search . '%');
            });
        }
    });

        if(!empty($this->selectedProducts)) {
            $query->whereHas('productCategories', function($tradeQ) {
                $tradeQ->whereIn('product_category_id', $this->selectedProducts);
            });
        }
        if(!empty($this->selectedCountries)){
            $query->whereHas('companycontacts', function($countryQ) {
                $countryQ->whereIn('country', $this->selectedCountries);
            });
        }
        if(!empty($this->selectedTradeSectors)){
           $query->whereHas('tradeSectors', function($sectorQ) {
                $sectorQ->whereIn('trade_sector_id', $this->selectedTradeSectors);
            });
        }
        if(!empty($this->brandSearch)){
            $query->whereHas('brands', function($brandQ) {
                $brandQ->where('name', 'like', '%' . $this->brandSearch . '%');
            });
        }


    $members = UserProfile::whereHas('user', function($q) use ($query) {
        $q->whereIn('id', $query->pluck('id'));
    })->paginate(10);

    return view('livewire.member-directory', [
        'members' => $members,
        'memberCategories' => MemberCategory::active()->orderBy('id')->get(),
        'trade_sectors' => TradeSector::active()->orderBy('id')->get(),
        'product_categories' => ProductCategory::active()->orderBy('id')->get(),
        'countries' => Country::active()->orderBy('id')->get(),
        'brands' => Brand::active()->orderBy('id')->get(),
        // Note: You probably don't need 'user_profiles' here if you're iterating over $members
    ]);
}
}