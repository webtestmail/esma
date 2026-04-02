<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campagin;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;

class CampaignController extends Controller
{
    public function campaigns_edit (){
        
    }
    public function manageCampaigns(){
        
        $campaigns = Campagin::get();
        foreach ($campaigns as $campaign) {
            $campaign->encrypted_id = Crypt::encrypt($campaign->id);
        }

        $model = Crypt::encrypt('Campagin');
        $currentPage = "manage_campagins";
        
        return view('admin.manage_campaigns', ['campaigns' => $campaign, 'model' => $model, "currentPage" => $currentPage]);
    
    }
    
        public function campaigns_data(){
                $campagin = Campagin::query();
                return DataTables::of($campagin)
            ->addIndexColumn()
            ->addColumn('title', function($campagin){
                return $campagin->title;
            })
           
            ->addColumn('is_active', function($campagin){
                return $campagin->is_active == true ? 'Active' : 'In active';
            })
                       
            ->addColumn('campaign_image', function($campaign) {
            // Check if the file exists
            if ($campaign->campaign_image) {
                $url = asset('storage/'.$campaign->campaign_image);
                return '<img src="' . $url . '" border="0" width="50" class="img-rounded" align="center" />';
            }
            else{
            $url = asset("backend/assets/images/picture.png");
                return '<img src="' . $url . '" border="0" width="50" class="img-rounded" align="center" />';
            }
            
            
            // Return a placeholder if no image exists
            return '<img src="' . asset('images/no-image.png') . '" border="0" width="50" class="img-rounded" />';
            })
            ->addColumn('user_id',function($campagin){
                return $campagin->user->username ?? $campagin->user->first.' '.$campagin->last;
            })

            ->addColumn('action', function ($campagin) {
                return '<div class="dropdown">
                            <a href="javascript:void(0);" class="avatar-text avatar-md ms-auto" data-bs-toggle="dropdown">
                                <i class="feather-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="' . route('admin.campaign.edit', encrypt($campagin->id)) . '" class="dropdown-item">Modify</a>
                                <button class="dropdown-item delete" data-id="' . $campagin->id . '">Delete User</button>
                            </div>
                        </div>';
            })
            ->editColumn('created_at', function ($campagin) {
                return $campagin->created_at->format('d M, Y');
            })
            ->rawColumns(['action','title','is_active','campaign_image','user_id'])
            ->make(true);
    }
    
   
}
