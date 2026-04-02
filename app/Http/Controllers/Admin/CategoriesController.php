<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blogs;
use App\Models\Admin\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CategoriesController extends Controller
{
    function checkCategoryLink($category_url, $encrypted_id = "")
    {
        $category_url = str_replace(['/', ' '], '-', $category_url);
        $category_url = preg_replace('/[^a-z0-9-]+/', '-', $category_url);
        $category_url = trim($category_url, '-');
        $category_url = preg_replace('/-+/', '-', $category_url);
        $original_link = $category_url;

        $id = (isset($encrypted_id) && !empty($encrypted_id)) ? Crypt::decrypt($encrypted_id) : 0;
        $suffix = 1;
        do {
            $count = $id != 0 ? Categories::where('category_url', $category_url)->where('id', '!=', $id)->count() : Categories::where('category_url', $category_url)->count();

            if ($count > 0) {
                $category_url = $original_link . '-' . $suffix;
                $suffix++;
            } else {
                break;
            }
        } while (true);

        return $category_url;
    }

    function manageCategories(Request $request)
    {
        $categories = Categories::select('id', 'reference_type', 'position_order', 'category_headline', 'category_url', 'status')->where('reference_type', $request->type)->orderBy('position_order')->get();
        foreach ($categories as $category) {
            $category->encrypted_id = Crypt::encrypt($category->id);
        }
        $main_page = 'blogs_management';
        $currentPage = "blog_categories";
        $model = Crypt::encrypt('Categories');
        return view('admin.manage_categories', ['categoriesData' => $categories, "type" => $request->type, 'model' => $model, 'main_page' => $main_page, 'currentPage' => $currentPage]);
    }

    function addCategory(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'category_headline' => 'required|string',
                'category_url' => 'required|string',
            ], [
                'reference_type.required' => 'Please provide reference for the Category.',
                'category_headline.required' => 'Please provide a headline for the Category.',
                'category_headline.string' => 'Category headline must be a string.',
                'category_url.required' => 'Please provide URL for the Category.',
                'category_url.string' => 'URL must be a string.',
            ]);

            $order = Categories::max('position_order');
            $position_order = ($order !== null) ? $order + 1 : 1;

            if (!empty($request->category_url)) {
                $link = strtolower($request->category_url);
            } else {
                $link = strtolower($request->category_headline);
            }
            $category_url = $this->checkCategoryLink($link);

            $category = [
                'reference_type' => $request->type,
                'position_order' => $position_order,
                'category_headline' => $request->category_headline,
                'category_url' => $category_url,
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => htmlspecialchars($request->meta_description, ENT_QUOTES)
            ];

            if (Categories::create($category)) {
                $request->session()->flash('success', 'Blog Category is inserted Successfully!');
                return redirect()->route('manage_categories', $request->type);
            } else {
                $request->session()->flash('error', 'Insertion Error!');
                return redirect()->route('add.category', $request->type);
            }
        } else {
            $main_page = 'blogs_management';
            $currentPage = "blog_categories";
            return view('admin.category-ops', ["type" => $request->type, 'main_page' => $main_page, 'currentPage' => $currentPage]);
        }
    }

    function editCategory(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'category_headline' => 'required|string',
                'category_url' => 'required|string',
            ], [
                'reference_type.required' => 'Please provide reference for the Category.',
                'category_headline.required' => 'Please provide a headline for the Category.',
                'category_headline.string' => 'Category headline must be a string.',
                'category_url.required' => 'Please provide URL for the Category.',
                'category_url.string' => 'URL must be a string.',
            ]);

            if (!empty($request->category_url)) {
                $link = strtolower($request->category_url);
            } else {
                $link = strtolower($request->category_headline);
            }
            $category_url = $this->checkCategoryLink($link, $request->category);

            $id = Crypt::decrypt($request->category);
            $category = Categories::findOrFail($id);
            $category->reference_type = $request->type;
            $category->category_headline = $request->category_headline;
            $category->category_url = $category_url;
            $category->meta_title = $request->meta_title;
            $category->meta_keyword = $request->meta_keyword;
            $category->meta_description = htmlspecialchars($request->meta_description, ENT_QUOTES);

            if ($category->save()) {
                $request->session()->flash('success', 'Blog Category is updated Successfully!');
                return redirect()->route('manage_categories', $request->type);
            } else {
                $request->session()->flash('error', 'Updation Error!');
                return redirect()->route('edit.category', ["category" => $request->category, "type" => $request->type]);
            }
        } else {
            $id = Crypt::decrypt($request->category);
            $category = Categories::where('id', $id)->firstOrFail();
            $category->encrypted_id = $request->category;

            $main_page = 'blogs_management';
            $currentPage = "blog_categories";
            return view('admin.category-ops', ["type" => $request->type, "category" => $category, 'main_page' => $main_page, 'currentPage' => $currentPage]);
        }
    }

    function getAllCategoriesAndCount($type)
    {
        $all_categories = Categories::select('id', 'category_headline', 'category_url')->where(['reference_type' => $type, "status" => 'active'])->orderBy('position_order')->get();
        foreach ($all_categories as $category) {
            $category->blog_count = Blogs::where('category_id', $category->id)->count();
        }

        return $all_categories;
    }

    // function uploadBlogImages(Request $request) {
    //     if(session()->has('user')) {
    //         $locations = [];

    //         if ($request->hasFile('file')) {
    //             print_r($request->file('file'));
    //             foreach ($request->file('file') as $file) {
    //                 $path = $file->store('admin-assets/images/blog-textareas/', 'public');
    //                 $locations[] = Storage::url($path);
    //             }

    //             return response()->json(['locations' => $locations]);
    //         }

    //         return response()->json(['error' => 'No files uploaded'], 400);
    //     }
    //     else {
    //         return redirect()->route('login');
    //     }
    // }


    // function editBlogContent(Request $request) {
    //     if(session()->has('user')) {
    //         if($request->isMethod('post')) {
    //             $request->validate([
    //                 'content_headline' => 'required|string',
    //             ], [
    //                 'content_headline.required' => 'Please provide a headline for the blog content.',
    //                 'content_headline.string' => 'Blog-Content headline must be a string.',
    //             ]);

    //             $id = 1;
    //             $blog_content = BlogContent::findOrFail($id);
    //             // $blog_content->position_order = $request->position_order;
    //             $blog_content->content_headline = $request->content_headline;
    //             $blog_content->description = htmlspecialchars($request->description, ENT_QUOTES);

    //             if(!empty($request->file('content_image'))) {
    //                 if(!empty($blog_content->content_image)) {
    //                     Storage::disk('public')->delete($blog_content->content_image);
    //                 }
    //                 $path = $request->file('content_image')->store('admin-assets/images/blogs/', 'public');
    //                 $blog_content->content_image = $path;
    //             }

    //             if($blog_content->save()) {
    //                 $request->session()->flash('success', 'Blog-Content is updated Successfully!');
    //                 return redirect()->route('edit.blog.content');
    //             }
    //             else {
    //                 $request->session()->flash('error', 'Updation Error!');
    //                 return redirect()->route('edit.blog.content');
    //             }
    //         }
    //         else {
    //             $id = 1;
    //             $blog_content = BlogContent::findOrFail($id);

    //             $main_page = 'blogs_management';
    //             $currentPage = "blog_content";
    //             return view('admin.blog_content-ops', ["blog_content" => $blog_content, 'main_page' => $main_page, 'currentPage' => $currentPage]);
    //         }
    //     }
    //     else {
    //         return redirect()->route('login');
    //     }
    // }
}
