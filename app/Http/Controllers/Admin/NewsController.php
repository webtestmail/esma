<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class NewsController extends Controller
{
      function managenewsCategory()
    {
        $category = NewsCategory::select('id', 'name','status')->orderBy('position_order')->get();
        foreach ($category as $cat) {
            $cat->encrypted_id = Crypt::encrypt($cat->id);
        }
        $currentPage = "manage_newscategory";
        $model = Crypt::encrypt('NewsCategory');
        return view('admin.manage_news_category', ['category' => $category, 'model' => $model, 'currentPage' => $currentPage]);
    }


       function addnewsCategory(Request $request)
    {
        
        if ($request->isMethod('post')) {
                // dd($request->all()); 
            $requiredArr = [
                'name' => 'required',
                'slug' => 'required|unique:news_category,slug',
            ];
            $msgsArr = [
                'name.required' => 'The Category Name is required',
                'slug.required' => 'The Slug is required.',
                'slug.unique' => 'This slug already exists.',
            ];
            $request->validate($requiredArr, $msgsArr);

            $order = NewsCategory::max('position_order');
            $position_order = ($order !== null) ? $order + 1 : 1;

            $category = [
                'position_order' => $position_order,
                'name' => $request->name,
                'slug' => $request->slug,
            ];

            if (NewsCategory::create($category)) {
                session()->flash('success', 'News Category is inserted Successfully!');
                return redirect()->route('admin.managenewsCategory');
            } else {
                session()->flash('error', 'Insertion Error!');
                return redirect()->route('admin.add.newsCategory');
            }
        } else {
            $currentPage = "manage_news_category";
            return view('admin.newscategory-ops', ["currentPage" => $currentPage]);
        }
    }


    function editnewscategory(Request $request, $id)
    {
        if ($request->isMethod('post')) {
             $ids = Crypt::decrypt($id);
            $category = NewsCategory::findOrFail($ids);
        // dd($request->all());
            $requiredArr = [
                'name' => 'required|string',
                'slug' => 'required|unique:news_category,slug,' . $category->id,
            ];
            $msgsArr = [
                'name.required' => 'The Category Name is required.',
                'slug.required' => 'The Slug is required',
                'slug.unique' => 'The Slug already exist'
            ];
            $request->validate($requiredArr, $msgsArr);

       
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->position_order = $request->position_order;

            if ($category->save()) {
                session()->flash('success', 'News Category is updated Successfully!');
                return redirect()->route('admin.managenewsCategory');
            } else {
                session()->flash('error', 'Updation Error!');
                return redirect()->route('admin.edit.newscategory', $ids);
            }
        } else {
            $ids = Crypt::decrypt($id);
            $category = NewsCategory::where('id', $ids)->firstOrFail();
            $category->encrypted_id = $id;

            $currentPage = "manage_faq_category";
            return view('admin.newscategory-ops', ["category" => $category, "currentPage" => $currentPage]);
        }
    }
}
