<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\QuickModules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class QuickModulesController extends Controller
{
    function manageQuickModules(Request $request)
    {
        $quick_modules = QuickModules::select('id', 'position_order', 'roles', 'headline', 'image', 'status')->orderBy('position_order')->get();
        Log::info('Quick modules fetched', [
            'count' => $quick_modules->count()
        ]);
        foreach ($quick_modules as $quick_module) {
            $quick_module->encrypted_id = Crypt::encrypt($quick_module->id);
        }

        $model = Crypt::encrypt('QuickModules');
        $currentPage = "manage_quick_modules";
        return view('admin.manage_quick_modules', ['quickModulesData' => $quick_modules, 'model' => $model, "currentPage" => $currentPage]);
    }

    function addQuickModule(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'quick_module_headline' => 'required',
                'roles' => 'required|array',
                'quick_module_image' => 'image|mimes:jpeg,png,jpg,gif,webp,svg,bmp,tiff,jfif|max:5120',
            ], [
                'quick_module_headline.required' => 'Please upload a quick module headline.',
                'roles.required' => 'Please select a dashboard role.',
                'roles.array' => 'Dashboard role shouuld be an array.',
                'quick_module_image.required' => 'Please upload a quick module image.',
                'quick_module_image.image' => 'The quick module must be a valid image file.',
                'quick_module_image.mimes' => 'Allowed quick module image formats: jpeg, png, jpg, gif, webp, svg, bmp, tiff.',
                'quick_module_image.max' => 'The quick module image size should not exceed 5MB.',
            ]);

            $order = QuickModules::max('position_order');
            $position_order = ($order !== null) ? $order + 1 : 1;

            $quick_module = [
                'position_order' => $position_order,
                'roles' => $request->roles,
                'headline' => $request->quick_module_headline,
                'description' => htmlspecialchars($request->description, ENT_QUOTES),
                'button_name' => $request->button_name,
                'button_link' => $request->button_link,
            ];

            $path = 'images/dashboard_quick_modules/';
            $filePath = $this->storeImage($request->file('quick_module_image'), $path);
            $quick_module['image'] = $filePath;

            $quick_module_created = QuickModules::create($quick_module);
            if ($quick_module_created) {
                // if ($request->hasFile('quick_module_icons')) {
                //     $path = 'images/dashboard_quick_modules/';
                //     foreach ($request->file('quick_module_icons') as $icon) {
                //         $fileName = time() . '_' . uniqid() . '.' . $icon->getClientOriginalExtension();
                //         $filePath = $path . $fileName;
                //         $icon->move(public_path($path), $fileName);

                //         $quick_module_created->icons()->create([
                //             'reference_type' => 'quick_module',
                //             'file_type'      => 'quick_module_icon',
                //             'file_name'      => $fileName,
                //             'file_path'      => $filePath,
                //             'status'         => 'active'
                //         ]);
                //     }
                // }
                session()->flash('success', 'Quick Module is inserted Successfully!');
                return redirect()->route('admin.quick_modules');
            } else {
                session()->flash('error', 'Insertion Error!');
                return redirect()->route('admin.add.quick_module');
            }
        } else {
            $currentPage = "manage_quick_modules";
            return view('admin.quick-module-ops', ["currentPage" => $currentPage]);
        }
    }

    function editQuickModule(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'roles' => 'required|array',
                'quick_module_headline' => 'required',
                'quick_module_image' => 'image|mimes:jpeg,png,jpg,gif,webp,svg,bmp,tiff,jfif|max:5120',
            ], [
                'quick_module_headline.required' => 'Please upload a quick module headline.',
                'roles.required' => 'Please select a dashboard role.',
                'roles.array' => 'Dashboard role shouuld be an array.',
                'quick_module_image.required' => 'Please upload a quick module image.',
                'quick_module_image.image' => 'The quick module must be a valid image file.',
                'quick_module_image.mimes' => 'Allowed quick module image formats: jpeg, png, jpg, gif, webp, svg, bmp, tiff.',
                'quick_module_image.max' => 'The quick module image size should not exceed 5MB.',
            ]);

            $id = Crypt::decrypt($request->quick_module);
            $quick_module = QuickModules::findOrFail($id);
            $quick_module->roles = $request->roles;
            $quick_module->headline = $request->quick_module_headline;
            $quick_module->description = htmlspecialchars($request->description, ENT_QUOTES);
            $quick_module->button_name = $request->button_name;
            $quick_module->button_link = $request->button_link;

            if (!empty($request->file('quick_module_image'))) {
                $path = 'images/dashboard_quick_modules/';
                $filePath = $this->storeImage($request->file("quick_module_image"), $path, $quick_module->image);
                $quick_module->image = $filePath;
            }

            if ($quick_module->save()) {
                // if ($request->hasFile('quick_module_icons')) {
                //     // $existingIcons = Images::where(["reference_id" => $id, "reference_type" => 'quick_module', "file_type" => 'quick_module_icon'])->get();
                //     // foreach ($existingIcons as $existingIcon) {
                //     //     $existingIconPath = public_path($existingIcon->file_path);
                //     //     if (file_exists($existingIconPath)) {
                //     //         unlink($existingIconPath);
                //     //     }
                //     //     $existingIcon->delete();
                //     // }
                //     foreach ($quick_module->icons as $icon) {
                //         $iconFilePath = public_path($icon->file_path);
                //         if (file_exists($iconFilePath)) unlink($iconFilePath);
                //         $icon->delete();
                //     }

                //     $path = 'images/dashboard_quick_modules/';
                //     foreach ($request->file('quick_module_icons') as $icon) {
                //         $fileName = time() . '_' . uniqid() . '.' . $icon->getClientOriginalExtension();
                //         $filePath = $path . $fileName;
                //         $icon->move(public_path($path), $fileName);

                //         $quick_module->icons()->create([
                //             'reference_type' => 'quick_module',
                //             'file_type'      => 'quick_module_icon',
                //             'file_name'      => $fileName,
                //             'file_path'      => $filePath,
                //             'status'         => 'active'
                //         ]);
                //     }
                // }
                session()->flash('success', 'Quick Module is updated Successfully!');
                return redirect()->route('admin.quick_modules');
            } else {
                session()->flash('error', 'Updation Error!');
                return redirect()->route('admin.edit.quick_module', ['quick_module' => $request->quick_module]);
            }
        } else {
            $id = Crypt::decrypt($request->quick_module);
            $quick_module = QuickModules::findOrFail($id);
            $quick_module->encrypted_id = $request->quick_module;

            $currentPage = "manage_quick_modules";
            return view('admin.quick-module-ops', ["quick_module" => $quick_module, "currentPage" => $currentPage]);
        }
    }

    function getAllQuickModules($role)
    {
        $quick_modules = QuickModules::where(['status' => 'active'])->whereJsonContains('roles', $role)->orderBy('position_order')->get();
        // foreach ($banners as $banner) {
        //     $banner->icons = Images::where('reference_id', $banner->id)->get();
        // }

        return $quick_modules;
    }
}
