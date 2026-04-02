<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campagin;

class InfluencerController extends Controller
{
    public function find_campagins(){
        
        $campagins = Campagin::where('status','active')->latest()->get();
        return view('user-dashboard.influencer.influencer-campaigns',['campagins'=>$campagins]);
    }
    public function influencer_campaign_detail($slug){
        $id = decrypt($slug);
        $campagin = Campagin::find($id);
        
        if ($campagin->campagin_budget <= 0) {
            return redirect()->back()->with('error', 'This campaign has expired.');
        }
        
        $campagin->increment('views');
        //if want to active pay per click
        // $costPerView = 0.50; 
        
        // $campaign->decrement('campagin_budget', $costPerView);
        
        return view('user-dashboard.influencer.influencer-campaign-detail',compact('campagin'));
    }
}

