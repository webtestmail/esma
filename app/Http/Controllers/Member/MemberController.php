<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApplicationController;
use App\Models\ProductCategory;
use App\Models\TradeSector;
use App\Models\Temperature;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProfile;
use App\Models\Document;
use App\Models\Admin\DocumentCategory;

class MemberController extends Controller
{
    public function edit_profile(){
        $user = auth()->user();
        $product_categories = ProductCategory::active()->get();
        $trade_sectors = TradeSector::active()->get();
        $temperatures = Temperature::active()->get();
        $brands = Brand::active()->get();
        $controller = new ApplicationController();
        $userCompany = $controller->getCompanyByUserId($user->id);
      
        return view('user-dashboard.edit-profile', compact('user', 'userCompany', 'product_categories', 'trade_sectors', 'temperatures', 'brands') );
    }
    public function events(){
        $user = auth()->user();
        return view('user-dashboard.events', compact('user'));
    }
    public function library(){
        $user = auth()->user();
        $documents = Document::active()->get();
        $documentCategories = DocumentCategory::has('documents')->get();
        return view('user-dashboard.library', compact('user', 'documents', 'documentCategories'));
    }

    public function help_center(){
        $user = auth()->user();
        $faqs = \App\Models\Admin\Faqs::active()->get();
        $faqsCategory = \App\Models\Admin\FaqCategory::has('faqs')->get();
        return view('user-dashboard.help-center', compact('user', 'faqs', 'faqsCategory'));
    }
}
