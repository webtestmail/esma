<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Plan;
use App\Models\Feature;
use App\Models\FeaturePlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Razorpay\Api\Api;

class PlansController extends Controller
{
 

    public function addFeaturePlan(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'feature_name'=>'required|string',
            ]);
            
            // dd($request->all());

            $plan_order = Feature::max('position_order');
            $position_order = ($plan_order !== null) ? $plan_order + 1 : 1;
            

            $feature = [
                'name'=> $request->feature_name,
                'slug'=> Str::slug($request->feature_name),
                'position_order' => $position_order,
            ];

            if (Feature::create($feature)) {
                $request->session()->flash('success', 'Plan is inserted Successfully!');
                return redirect()->route('admin.feature_plans');
            } else {
                $request->session()->flash('error', 'Insertion Error!');
                return redirect()->route('admin.add.featurePlan');
            }
        } else {
            $currentPage = "manageFeaturePlan";
            return view('admin.featurePlan-ops', ['currentPage' => $currentPage]);
        }
    }
    

    public function editFeaturePlan(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'feature_name' => 'required|string',
            ]);

            $id = Crypt::decrypt($request->plan);
            $plan = Feature::findOrFail($id);

            $plan->name = $request->feature_name;
            $plan->slug = Str::slug($plan->name);

            if ($plan->save()) {
                $request->session()->flash('success', 'Plan is updated Successfully!');
                return redirect()->route('admin.feature_plans');
            } else {
                $request->session()->flash('error', 'Updation Error!');
                return redirect()->route('admin.edit.featurePlan', $request->plan);
            }
        } else {
            $id = Crypt::decrypt($request->plan);
            $plan = Feature::where('id', $id)->firstOrFail();
            $plan->encrypted_id = $request->plan;
            $currentPage = "feature_plans";
            return view('admin.featurePlan-ops', ["plan" => $plan, 'currentPage' => $currentPage]);
        }
    }   
    public function featurePlans(){
        $features = Feature::select('id','name')->get();
        foreach($features as $feature){
            $feature->encrypted_id = Crypt::encrypt($feature->id);
        }
        $currenctPage = "manageFeaturePlan";
        $model = Crypt::encrypt('Feature');
        return view('admin.'.$currenctPage,['featurePlan'=>$features,'model'=>$currenctPage,'currentPage'=>$currenctPage]);
    }
    
    public function editConnectPlan(Request $request)
    {
       if ($request->isMethod('post')) {
            $request->validate([
                'features' => 'required|array',
                'features.*' => 'exists:features,id', // Assuming your features table is 'features'
                'feature_values' => 'nullable|array'
            ]);
        
            try {
                // 2. Decrypt the ID
                $id = Crypt::decrypt($request->plan);
                $plan = Plan::findOrFail($id); // Use your main Plan model
        
                // 3. Prepare the data for the pivot table
                $syncData = [];
                foreach ($request->features as $featureId) {
                    // Match the feature ID with its corresponding text input value
                    $value = $request->feature_values[$featureId] ?? null;
                    
                    $syncData[$featureId] = [
                        'value' => $value
                    ];
                }
        
                // 4. Use sync to update the many-to-many relationship
                // This updates the 'feature_plan' table automatically
                $plan->features()->sync($syncData);
        
                session()->flash('success', 'Features and Plan updated successfully!');
                return redirect()->route('admin.connect_plans');
        
            } catch (\Exception $e) {
                session()->flash('error', 'Update Error: ' . $e->getMessage());
                return redirect()->back();
            }
        } else {
                    $id = Crypt::decrypt($request->plan);
                    $plan = Plan::with('features')->findOrFail($id);
                    $features = Feature::all();
                    $plan->encrypted_id = $request->plan;
                    $currentPage = "manageConnectPlan-ops";
                    return view('admin.manageConnectPlan-ops', ["plan" => $plan, 'currentPage' => $currentPage,'features'=>$features]);
                }
    }       
    public function addConnectPlan(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'plan_type'=>'required|string',
                'plan_category' => 'required|string',
                'plan_price' => 'required',
                'plan_price_base' => 'required',
                'currency'=> 'required',
                'button_name'=> 'required|string',
            ]);
            
            // dd($request->all());

            $plan_order = Plan::max('position_order');
            $position_order = ($plan_order !== null) ? $plan_order + 1 : 1;
            
           $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
           $razorpayPlan = $api->plan->create([
                'period' => $request->plan_price_base,
                'interval' => 1,
                'item' => [
                    'name' => $request->plan_category,
                    'amount' => $request->plan_price * 100, 
                    'currency' => $request->currency,
                ],
            ]);

            $plan = [
                'position_order' => $position_order,
                'user_category' => $request->plan_type,
                'razorpay_plan_id'=> $razorpayPlan->id,
                'name' => $request->plan_category,
                'price' => $request->plan_price,
                'currency'=>$request->currency,
                'plan_price_base' => $request->plan_price_base,
                'button_name' => $request->button_name,
            ];

            if (Plan::create($plan)) {
                $request->session()->flash('success', 'Plan is inserted Successfully!');
                return redirect()->route('admin.manage_plans');
            } else {
                $request->session()->flash('error', 'Insertion Error!');
                return redirect()->route('admin.add.plan');
            }
        } else {
            $currentPage = "manageConnectPlan";
            return view('admin.manageConnectPlan-ops', ['currentPage' => $currentPage]);
        }
    }
    public function manageConnectPlan() {
    // 1. Fetch plans with their related features from the pivot table
    $plans = Plan::with('features')->get();

    // 2. Encrypt IDs for secure frontend actions (Edit/Delete)
    foreach($plans as $plan) {
        $plan->encrypted_id = Crypt::encrypt($plan->id);
    }

    $currentPage = "manageConnectPlan";
    
    // 3. Encrypt the Model name if you are using a generic Delete/Update route
    $encryptedModel = Crypt::encrypt('Plan'); // Or 'FeaturePlan' depending on your logic

    return view('admin.' . $currentPage, [
        'ConnectPlan' => $plans, 
        'model'       => $encryptedModel, 
        'currentPage' => $currentPage
    ]);
}

    public function managePlans()
    {
        $plans = Plan::select('id', 'position_order', 'name','user_category','razorpay_plan_id','price', 'status')->get();
        foreach ($plans as $plan) {
            $plan->encrypted_id = Crypt::encrypt($plan->id);
        }
        $currentPage = "manage_plans";
        $model = Crypt::encrypt('Plan');
        return view('admin.manage_plans', ['plansData' => $plans, 'model' => $model, 'currentPage' => $currentPage]);
    }

    public function addPlan(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'plan_type'=>'required|string',
                'plan_category' => 'required|string',
                'plan_price' => 'required',
                'plan_price_base' => 'required',
                'currency'=> 'required',
                'button_name'=> 'required|string',
            ]);
            
            // dd($request->all());

            $plan_order = Plan::max('position_order');
            $position_order = ($plan_order !== null) ? $plan_order + 1 : 1;
            
           $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
           $razorpayPlan = $api->plan->create([
                'period' => $request->plan_price_base,
                'interval' => 1,
                'item' => [
                    'name' => $request->plan_category,
                    'amount' => $request->plan_price * 100, 
                    'currency' => $request->currency,
                ],
            ]);

            $plan = [
                'position_order' => $position_order,
                'user_category' => $request->plan_type,
                'razorpay_plan_id'=> $razorpayPlan->id,
                'name' => $request->plan_category,
                'price' => $request->plan_price,
                'currency'=>$request->currency,
                'plan_price_base' => $request->plan_price_base,
                'button_name' => $request->button_name,
            ];

            if (Plan::create($plan)) {
                $request->session()->flash('success', 'Plan is inserted Successfully!');
                return redirect()->route('admin.manage_plans');
            } else {
                $request->session()->flash('error', 'Insertion Error!');
                return redirect()->route('admin.add.plan');
            }
        } else {
            $currentPage = "manage_plans";
            return view('admin.plan-ops', ['currentPage' => $currentPage]);
        }
    }
public function editPlan(Request $request)
{
    if ($request->isMethod('post')) {
        $request->validate([
            'plan_type'       => 'required|string',
            'plan_category'   => 'required|string',
            'plan_price'      => 'required|numeric',
            'plan_price_base' => 'required',
            'currency'        => 'required',
            'button_name'     => 'required|string',
        ]);

        $id = Crypt::decrypt($request->plan);
        $plan = Plan::findOrFail($id);
        
        

        // --- Razorpay Integration Logic ---
        // Check if critical billing info has changed. If so, create a new Razorpay Plan.
        if (
            $plan->price != $request->plan_price || 
            $plan->plan_price_base != $request->plan_price_base || 
            $plan->currency != $request->currency
        ) {
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            
             Log::info("Plan create :".$request->all());

            try {
                $razorpayPlan = $api->plan->create([
                    'period'   => $request->plan_price_base, // daily, weekly, monthly, yearly
                    'interval' => 1,
                    'item'     => [
                        'name'     => $request->plan_category,
                        'amount'   => $request->plan_price * 100, // convert to paise
                        'currency' => $request->currency,
                    ],
                ]);
                
                 Log::info("Plan create :".$razorpayPlan);
                $plan->razorpay_plan_id = $razorpayPlan->id;
            } catch (\Exception $e) {
                $error = $request->session()->flash('error', 'Razorpay Plan Creation Failed: ' . $e->getMessage());
                Log::info("Error :".$error);
                return redirect()->back();
            }
        }

        // --- Local Database Updates ---
        $plan->name = $request->plan_category;
        $plan->user_category = $request->plan_type;
        $plan->price = $request->plan_price;
        $plan->plan_price_base = $request->plan_price_base;
        $plan->currency = $request->currency;
        $plan->button_name = $request->button_name;

        if ($plan->save()) {
            $request->session()->flash('success', 'Plan updated locally and on Razorpay!');
            return redirect()->route('admin.manage_plans');
        } else {
            $request->session()->flash('error', 'Update Error!');
            return redirect()->route('admin.edit.plan', $request->plan);
        }

    } else {
        $id = Crypt::decrypt($request->plan);
        $plan = Plan::where('id', $id)->firstOrFail();
        $plan->encrypted_id = $request->plan;
        $currentPage = "manage_plans";
        return view('admin.plan-ops', ["plan" => $plan, 'currentPage' => $currentPage]);
    }
}
    // public function editPlan(Request $request)
    // {
    //     if ($request->isMethod('post')) {
    //         $request->validate([
    //             'plan_type'=>'required|string',
    //             'plan_category' => 'required|string',
    //             'plan_price' => 'required',
    //             'plan_price_base' => 'required',
    //             'currency'=> 'required',
    //             'button_name'=> 'required|string',
    //         ]);
            
    //         $id = Crypt::decrypt($request->plan);
    //         $plan = Plan::findOrFail($id);
    //         $plan->name = $request->plan_category;
    //         $plan->user_category = $request->plan_type;
    //         $plan->price = $request->plan_price;
    //         $plan->plan_price_base = $request->plan_price_base;
    //         $plan->currency = $request->currency;
    //         $plan->button_name = $request->button_name;

    //         if ($plan->save()) {
    //             $request->session()->flash('success', 'Plan is updated Successfully!');
    //             return redirect()->route('admin.manage_plans');
    //         } else {
    //             $request->session()->flash('error', 'Updation Error!');
    //             return redirect()->route('admin.edit.plan', $request->plan);
    //         }
    //     } else {
    //         $id = Crypt::decrypt($request->plan);
    //         $plan = Plan::where('id', $id)->firstOrFail();
    //         $plan->encrypted_id = $request->plan;
    //         $currentPage = "manage_plans";
    //         return view('admin.plan-ops', ["plan" => $plan, 'currentPage' => $currentPage]);
    //     }
    // }
}
