<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\NewsCategory;
use App\Models\Admin\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;

class NewsController extends Controller
{



       function managenews()
        {
            $news = News::select('id', 'name','status')->orderBy('position_order')->get();
            foreach ($news as $val) {
                $val->encrypted_id = Crypt::encrypt($val->id);
            }
            $currentPage = "manage_news";
            $model = Crypt::encrypt('News');
            return view('admin.manage_news', ['news' => $news, 'model' => $model, 'currentPage' => $currentPage]);
        }



        
      public function news_data() {

          $news = News::select('id', 'name', 'status')->orderBy('position_order')->get();

                return DataTables::of($news)
            ->addIndexColumn()
            ->addColumn('name', function($news){
                return strip_tags($news->name);
            })
            ->addColumn('is_active', function($news){
                return $news->status == 'active' ? 'Active' : 'In active';
            })
            ->addColumn('action', function ($news) {
                $encryptedId = Crypt::encrypt($news->id);
                $model = Crypt::encrypt('News');
                return '<div class="dropdown">
                            <a href="javascript:void(0);" class="avatar-text avatar-md ms-auto" data-bs-toggle="dropdown">
                                <i class="feather-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="' . route('admin.edit.news', encrypt($news->id)) . '" class="dropdown-item">Modify</a>
                                     <button class="dropdown-item delete"
                                    onclick="delete_item(\'' . $model . '\', \'' . $encryptedId . '\');"
                                    data-id="' . $news->id . '">
                                Delete 
                            </button>
                            </div>
                        </div>';
            })
            // ->rawColumns(['action','question','is_active','category_name'])
            ->make(true);
    }


          function addnews(Request $request)
    {
        
        if ($request->isMethod('post')) {
                // dd($request->all()); 
            $requiredArr = [
                'name' => 'required',
                'slug' => 'required|unique:news,slug',
            ];
            $msgsArr = [
                'name.required' => 'The Name is required',
                'slug.required' => 'The Slug is required.',
                'slug.unique' => 'This slug already exists.',
            ];
            $request->validate($requiredArr, $msgsArr);

            $order = News::max('position_order');
            $position_order = ($order !== null) ? $order + 1 : 1;

              $category_ids = $request->category_ids 
                    ? implode(',', $request->category_ids) 
                    : null;


              $news = [
            'position_order' => $position_order,
            'category_ids' => $category_ids,
            'name' => $request->name,
            'slug' => $request->slug,
            'header_footer_name' => $request->header_footer_name,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'status' => $request->status,
            'video' => $request->video,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'full_description' => $request->full_description,
            'website_url' => $request->website_url,
            'website_name' => $request->website_name,
            'post_meta' => $request->post_meta,
            'tags' => $request->tags,
            'published_by' => $request->published_by,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'breadcrumb_description' => $request->breadcrumb_description,
        ];

              if (!empty($request->file('banner'))) {
                    $path = 'images/news/banner/';
                    $filePath = $this->storeImage($request->file("banner"), $path);
                    $news['banner'] = $filePath;
                }

                $image = null;
                if (!empty($request->file('image'))) {
                    $path = 'images/news/';
                    $filePath = $this->storeImage($request->file("image"), $path);
                    $news['image'] = $filePath;
                }

                $image1 = null;
                 if (!empty($request->file('image1'))) {
                    $path = 'images/news/';
                    $filePath = $this->storeImage($request->file("image1"), $path);
                    $news['image1'] = $filePath;
                }

                $breadcrumb_image = null;
                if (!empty($request->file('breadcrumb_image'))) {
                    $path = 'images/news/';
                    $filePath = $this->storeImage($request->file("breadcrumb_image"), $path);
                    $news['breadcrumb_image'] = $filePath;
                }

                $image_paths = [];
                if ($request->hasFile('more_images')) {
                    $path = 'images/news/images/';
                    foreach ($request->file('more_images') as $file) {
                        $filePath = $this->storeImage($file, $path);
                        $image_paths[] = $filePath;
                    }
                    $news['more_images'] = json_encode($image_paths);
                }


              
        

            if (News::create($news)) {
                session()->flash('success', 'News is inserted Successfully!');
                return redirect()->route('admin.managenews');
            } else {
                session()->flash('error', 'Insertion Error!');
                return redirect()->route('admin.add.news');
            }
        } else {

        $categories = NewsCategory::where('status', 'active')->get();
            $currentPage = "manage_news";
            return view('admin.news-ops', ["currentPage" => $currentPage, "categories" => $categories]);
        }
    }


      function editnews(Request $request, $id)
    {
        if ($request->isMethod('post')) {
             $ids = Crypt::decrypt($id);
            $news = News::findOrFail($ids);
        // dd($request->all());
            $requiredArr = [
                'name' => 'required|string',
                'slug' => 'required|unique:news,slug,' . $news->id,
            ];
            $msgsArr = [
                'name.required' => 'The Category Name is required.',
                'slug.required' => 'The Slug is required',
                'slug.unique' => 'The Slug already exist'
            ];
            $request->validate($requiredArr, $msgsArr);

       
                    if ($request->hasFile('banner')) {
            $path = 'images/news/banner/';
            $news->banner = $this->storeImage($request->file('banner'), $path);
        }

        if ($request->hasFile('image')) {
            $path = 'images/news/';
            $news->image = $this->storeImage($request->file('image'), $path);
        }

        if ($request->hasFile('image1')) {
            $path = 'images/news/';
            $news->image1 = $this->storeImage($request->file('image1'), $path);
        }

        if ($request->hasFile('breadcrumb_image')) {
            $path = 'images/news/';
            $news->breadcrumb_image = $this->storeImage($request->file('breadcrumb_image'), $path);
        }

        // ✅ MULTIPLE IMAGES
        if ($request->hasFile('more_images')) {
            $image_paths = [];
            $path = 'images/news/images/';

            foreach ($request->file('more_images') as $file) {
                $filePath = $this->storeImage($file, $path);
                $image_paths[] = $filePath;
            }

            $news->more_images = json_encode($image_paths);
        }

        // ✅ CATEGORY IDS FIX
        $news->category_ids = $request->category_ids 
            ? implode(',', $request->category_ids) 
            : null;

        // ✅ OTHER FIELDS
        $news->name = $request->name;
        $news->slug = $request->slug;
        $news->position_order = $request->position_order;
        $news->header_footer_name = $request->header_footer_name;
        $news->title = $request->title;
        $news->subtitle = $request->subtitle;
        $news->status = $request->status;
        $news->video = $request->video;
        $news->short_description = $request->short_description;
        $news->description = $request->description;
        $news->full_description = $request->full_description;
        $news->website_url = $request->website_url;
        $news->website_name = $request->website_name;
        $news->post_meta = $request->post_meta;
        $news->tags = $request->tags;
        $news->published_by = $request->published_by;
        $news->meta_title = $request->meta_title;
        $news->meta_keyword = $request->meta_keyword;
        $news->meta_description = $request->meta_description;
        $news->breadcrumb_description = $request->breadcrumb_description;

        // ✅ SAVE
        if ($news->save()) {
            session()->flash('success', 'News updated successfully!');
            return redirect()->route('admin.managenews');
        } else {
            session()->flash('error', 'Updation Error!');
            return redirect()->route('admin.edit.news', $id);
        }

        } else {
            $ids = Crypt::decrypt($id);
            $news = News::where('id', $ids)->firstOrFail();
            $news->encrypted_id = $id;
            $categories = NewsCategory::where('status', 'active')->get();
            $currentPage = "manage_faq_category";
            return view('admin.news-ops', ["categories" => $categories, "currentPage" => $currentPage, "news" => $news]);
        }
    }


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



      public function news_category_data() {

          $category = NewsCategory::query();

                return DataTables::of($category)
            ->addIndexColumn()
            ->addColumn('name', function($category){
                return $category->name;
            })
            ->addColumn('is_active', function($category){
                return $category->status == 'active' ? 'Active' : 'In active';
            })
            ->addColumn('action', function ($category) {
                $encryptedId = Crypt::encrypt($category->id);
                $model = Crypt::encrypt('NewsCategory');
                return '<div class="dropdown">
                            <a href="javascript:void(0);" class="avatar-text avatar-md ms-auto" data-bs-toggle="dropdown">
                                <i class="feather-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="' . route('admin.edit.newscategory', encrypt($category->id)) . '" class="dropdown-item">Modify</a>
                                     <button class="dropdown-item delete"
                                    onclick="delete_item(\'' . $model . '\', \'' . $encryptedId . '\');"
                                    data-id="' . $category->id . '">
                                Delete category
                            </button>
                            </div>
                        </div>';
            })
            // ->rawColumns(['action','question','is_active','category_name'])
            ->make(true);
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
                'status' => $request->status,
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
            $category->status = $request->status;
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
