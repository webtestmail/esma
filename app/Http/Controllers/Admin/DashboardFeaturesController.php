<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\DashboardFeatures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DashboardFeaturesController extends Controller
{
    function manageFeatures(Request $request)
    {
        $role = $request->role;
        $features = DashboardFeatures::select('id', 'position_order', 'feature_headline', 'i_tag', 'status')->where('role', $role)->orderBy('position_order')->get();
        foreach ($features as $feature) {
            $feature->encrypted_id = Crypt::encrypt($feature->id);
        }

        $model = Crypt::encrypt('DashboardFeatures');
        $currentPage = "manage_dashboard_features";
        return view('admin.manage_dashboard_features', ['role' => $role, 'featuresData' => $features, 'model' => $model, "currentPage" => $currentPage]);
    }

    function addFeature(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'feature_headline' => 'required',
            ], [
                'feature_headline.required' => 'Please upload a feature headline.',
            ]);

            $order = DashboardFeatures::max('position_order');
            $position_order = ($order !== null) ? $order + 1 : 1;

            $feature = [
                'position_order' => $position_order,
                'role' => $request->role,
                'i_tag' => $request->i_tag,
                'feature_headline' => $request->feature_headline,
                'description' => htmlspecialchars($request->description, ENT_QUOTES),
            ];

            // $path = 'images/dashboard_features/';
            // $filePath = $this->storeImage($request->file('feature_image'), $path);
            // $banner['feature_image'] = $filePath;

            $feature_created = DashboardFeatures::create($feature);
            if ($feature_created) {
                // if ($request->hasFile('banner_icons')) {
                //     $path = 'images/dashboard_features/';
                //     foreach ($request->file('banner_icons') as $icon) {
                //         $fileName = time() . '_' . uniqid() . '.' . $icon->getClientOriginalExtension();
                //         $filePath = $path . $fileName;
                //         $icon->move(public_path($path), $fileName);

                //         $feature_created->icons()->create([
                //             'reference_type' => 'banner',
                //             'file_type'      => 'banner_icon',
                //             'file_name'      => $fileName,
                //             'file_path'      => $filePath,
                //             'status'         => 'active'
                //         ]);
                //     }
                // }
                session()->flash('success', 'Dashboard Feature is inserted Successfully!');
                return redirect()->route('admin.features', $request->role);
            } else {
                session()->flash('error', 'Insertion Error!');
                return redirect()->route('admin.add.feature', $request->role);
            }
        } else {
            $currentPage = "manage_dashboard_features";
            return view('admin.dashboard-feature-ops', ['role' => $request->role, "currentPage" => $currentPage]);
        }
    }

    function editFeature(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'feature_headline' => 'required',
            ], [
                'feature_headline.required' => 'Please upload a feature headline.',
            ]);

            $id = Crypt::decrypt($request->feature);
            $feature = DashboardFeatures::findOrFail($id);
            $feature->i_tag = $request->i_tag;
            $feature->feature_headline = $request->feature_headline;
            $feature->description = htmlspecialchars($request->description, ENT_QUOTES);

            // if (!empty($request->file('feature_image'))) {
            //     $path = 'images/dashboard_features/';
            //     $filePath = $this->storeImage($request->file("feature_image"), $path, $feature->feature_image);
            //     $feature->feature_image = $filePath;
            // }

            if ($feature->save()) {
                // if ($request->hasFile('feature_icons')) {
                //     // $existingIcons = Images::where(["reference_id" => $id, "reference_type" => 'feature', "file_type" => 'feature_icon'])->get();
                //     // foreach ($existingIcons as $existingIcon) {
                //     //     $existingIconPath = public_path($existingIcon->file_path);
                //     //     if (file_exists($existingIconPath)) {
                //     //         unlink($existingIconPath);
                //     //     }
                //     //     $existingIcon->delete();
                //     // }
                //     foreach ($feature->icons as $icon) {
                //         $iconFilePath = public_path($icon->file_path);
                //         if (file_exists($iconFilePath)) unlink($iconFilePath);
                //         $icon->delete();
                //     }

                //     $path = 'images/dashboard_features/';
                //     foreach ($request->file('feature_icons') as $icon) {
                //         $fileName = time() . '_' . uniqid() . '.' . $icon->getClientOriginalExtension();
                //         $filePath = $path . $fileName;
                //         $icon->move(public_path($path), $fileName);

                //         $feature->icons()->create([
                //             'reference_type' => 'feature',
                //             'file_type'      => 'feature_icon',
                //             'file_name'      => $fileName,
                //             'file_path'      => $filePath,
                //             'status'         => 'active'
                //         ]);
                //     }
                // }
                session()->flash('success', 'Dashboard Feature is updated Successfully!');
                return redirect()->route('admin.features', $request->role);
            } else {
                session()->flash('error', 'Updation Error!');
                return redirect()->route('admin.edit.feature', ['role' => $request->role, 'feature' => $request->feature]);
            }
        } else {
            $id = Crypt::decrypt($request->feature);
            $feature = DashboardFeatures::findOrFail($id);
            $feature->encrypted_id = $request->feature;

            $currentPage = "manage_dashboard_features";
            return view('admin.dashboard-feature-ops', ['role' => $request->role, "feature" => $feature, "currentPage" => $currentPage]);
        }
    }

    public function getAllFeatures($role)
    {
        $features = DashboardFeatures::where(['role' => $role, 'status' => 'active'])->orderBy('position_order')->get();
        // foreach ($banners as $banner) {
        //     $banner->icons = Images::where('reference_id', $banner->id)->get();
        // }

        return $features;
    }
}
