<?php

namespace App\Http\Controllers;

use App\Models\Admin\Blogs;
use App\Models\Admin\BlogSections;
use App\Models\Admin\Company;
use App\Models\Admin\Pages;
use App\Models\Admin\Plan;
use App\Models\Admin\Services;
use App\Models\Admin\ServiceSections;
use Illuminate\Http\Request;
use App\Models\UserProfile;
use App\Models\User;

class PagesController extends Controller
{
    private function header()
    {
        $company = Company::find(1);
    
        $pages = Pages::select('header_footer_name', 'client_page_urls')
            ->whereIn('visibility', ['both', 'header'])
            ->where('status', 'active')
            ->get();
    
        $services = Services::select('service_name', 'service_url')
            ->whereIn('visibility', ['both', 'header'])
            ->where('status', 'active')
            ->get();
    
        return [
            'company' => $company,
            'pages' => $pages,
            'services' => $services
        ];
    }

    private function footer()
    {
        $company = Company::find(1);
    
        $pages = Pages::select('header_footer_name', 'client_page_urls')
            ->whereIn('visibility', ['both', 'footer'])
            ->where('status', 'active')
            ->get();
    
        $services = Services::select('service_name', 'service_url')
            ->whereIn('visibility', ['both', 'footer'])
            ->where('status', 'active')
            ->get();
    
        return [
            'company' => $company,
            'pages' => $pages,
            'services' => $services
        ];
    }

    public function index()
    {
        $page = Pages::where(["id" => 1, "status" => 'active'])->first();

        $data['meta_title'] = $page->meta_title;
        $data['meta_keyword'] = $page->meta_keyword;
        $data['meta_description'] = $page->meta_description;
        $headerData = $this->header();
        $footerData = $this->footer();
        return response()->view('welcome', compact('page', 'data', 'headerData', 'footerData'), 200);
    }

    public function about_view()
    {
        $page = Pages::where(["id" => 6, "status" => 'active'])->first();
        if ($page) {
            $page_name = 'about';

            $data['meta_title'] = $page->meta_title;
            $data['meta_keyword'] = $page->meta_keyword;
            $data['meta_description'] = $page->meta_description;
            $data['breadcrumb_headline'] = $page->breadcrumb_headline;
            $data['breadcrumb_image'] = $page->page_image;
            $data['breadcrumb_description'] = $page->breadcrumb_description;
            $headerData = $this->header();
            $footerData = $this->footer();
            return response()->view('about', compact('page', 'page_name', 'data', 'headerData', 'footerData'), 200);
        } else {
            return redirect()->route('page.not.found');
        }
    }

    public function blogs_view(Request $request)
    {
        $page = Pages::where(["id" => 2, "status" => 'active'])->first();
        if ($page) {
            $page_name = 'blogs';
            $perPage = $request->get('per_page', 6);
            $data['blogs'] = Blogs::where('status', 'active')->orderByDesc('id')->paginate($perPage)->withQueryString();

            $data['meta_title'] = $page->meta_title;
            $data['meta_keyword'] = $page->meta_keyword;
            $data['meta_description'] = $page->meta_description;
            $data['breadcrumb_headline'] = $page->breadcrumb_headline;
            $data['breadcrumb_image'] = $page->page_image;
            $data['breadcrumb_description'] = $page->breadcrumb_description;
            $headerData = $this->header();
            $footerData = $this->footer();
            return response()->view('blogs', compact('page', 'page_name', 'data', 'headerData', 'footerData'), 200);
        } else {
            return redirect()->route('page.not.found');
        }
    }

    public function single_blog_view(Request $request)
    {
        $blog = Blogs::where(["blog_url" => $request->blog_url, 'status' => 'active'])->first();
        if ($blog) {
            $page_name = 'single-blog';
            $blog->blog_sections = BlogSections::where("blog_id", $blog->id)->orderBy('id')->get();
            $blog->related_blogs = Blogs::select('id', 'blog_headline', 'blog_url', 'short_description', 'blog_image')->where('id', '!=', $blog->id)->where('status', 'active')->orderByDesc('id')->get();

            $data['previous_blog'] = Blogs::where('id', '<', $blog->id)->orderBy('id', 'desc')->first();
            $data['next_blog'] = Blogs::where('id', '>', $blog->id)->orderBy('id', 'asc')->first();

            $data['meta_title'] = $blog->meta_title;
            $data['meta_keyword'] = $blog->meta_keyword;
            $data['meta_description'] = $blog->meta_description;
            $data['breadcrumb_headline'] = $blog->blog_headline;
            $data['breadcrumb_image'] = $blog->breadcrumb_image;
            $data['breadcrumb_description'] = $blog->short_description;
            $headerData = $this->header();
            $footerData = $this->footer();
            return response()->view('blog-details', compact('page_name', 'blog', 'data', 'headerData', 'footerData'), 200);
        } else {
            return redirect()->route('page.not.found');
        }
    }

    public function contact_view()
    {
        $page = Pages::where(["id" => 7, "status" => 'active'])->first();
        if ($page) {
            $page_name = 'contact';
            $data['company'] = Company::where('id', 1)->first();

            $data['meta_title'] = $page->meta_title;
            $data['meta_keyword'] = $page->meta_keyword;
            $data['meta_description'] = $page->meta_description;
            $data['breadcrumb_headline'] = $page->breadcrumb_headline;
            $data['breadcrumb_image'] = $page->page_image;
            $data['breadcrumb_description'] = $page->breadcrumb_description;
            $headerData = $this->header();
            $footerData = $this->footer();
            return response()->view('contact', compact('page', 'page_name', 'data', 'headerData', 'footerData'), 200);
        } else {
            return redirect()->route('page.not.found');
        }
    }

        // public function pricing_view()
        // {
        //     $page = Pages::where(["id" => 5, "status" => 'active'])->first();
        //     if ($page) {
        //         $page_name = 'pricing';
        //         $data['plans'] = Plan::with('features')->where('status', 'active')->where('user_category','influencer')->orderBy('id')->get();

        //         $data['meta_title'] = $page->meta_title;
        //         $data['meta_keyword'] = $page->meta_keyword;
        //         $data['meta_description'] = $page->meta_description;
        //         $data['breadcrumb_headline'] = $page->breadcrumb_headline;
        //         $data['breadcrumb_image'] = $page->page_image;
        //         $data['breadcrumb_description'] = $page->breadcrumb_description;
        //         $headerData = $this->header();
        //         $footerData = $this->footer();
        //         return response()->view('price', compact('page', 'page_name', 'data', 'headerData', 'footerData'), 200);
        //     } else {
        //         return redirect()->route('page.not.found');
        //     }
        // }

    public function services_view()
    {
        $page = Pages::where(["id" => 3, "status" => 'active'])->first();
        if ($page) {
            $page_name = 'services';
            $data['services'] = Services::where('status', 'active')->orderByDesc('id')->get();

            $data['meta_title'] = $page->meta_title;
            $data['meta_keyword'] = $page->meta_keyword;
            $data['meta_description'] = $page->meta_description;
            $data['breadcrumb_headline'] = $page->breadcrumb_headline;
            $data['breadcrumb_image'] = $page->page_image;
            $data['breadcrumb_description'] = $page->breadcrumb_description;
            $headerData = $this->header();
            $footerData = $this->footer();
            return response()->view('services', compact('page', 'page_name', 'data', 'headerData', 'footerData'), 200);
        } else {
            return redirect()->route('page.not.found');
        }
    }
    
    public function term_and_condition_page_view(){
        $headerData = $this->header();
        $footerData = $this->footer();
        return view('term', compact('headerData', 'footerData'));
    }
    public function privacy_policy_page_view(){
        $headerData = $this->header();
        $footerData = $this->footer();
        return view('policy', compact('headerData', 'footerData'));
    }
    public function single_service_view(Request $request)
    {
        $service = Services::where(["service_url" => $request->service_url, 'status' => 'active'])->first();
        if ($service) {
            $page_name = 'single-service';
            $service->service_sections = ServiceSections::where("service_id", $service->id)->orderBy('id')->get();

            $data['meta_title'] = $service->meta_title;
            $data['meta_keyword'] = $service->meta_keyword;
            $data['meta_description'] = $service->meta_description;
            $data['breadcrumb_headline'] = $service->breadcrumb_headline;
            $data['breadcrumb_image'] = $service->breadcrumb_image;
            $data['breadcrumb_description'] = $service->breadcrumb_description;
            $headerData = $this->header();
            $footerData = $this->footer();
            return response()->view('service-details', compact('page_name', 'service', 'data', 'headerData', 'footerData'), 200);
        } else {
            return redirect()->route('page.not.found');
        }
    }

    public function page_not_found_view()
    {
        $page_name = 'page-not-found';
        return "404 page";
        // return response()->view('page-not-found', compact('page_name'), 404);
    }
    public function member_directory_view()
    {
        $page = Pages::where(["id" => 8, "status" => 'active'])->first();
        if ($page) {
            $page_name = 'member-directory';

            $data['meta_title'] = $page->meta_title;
            $data['meta_keyword'] = $page->meta_keyword;
            $data['meta_description'] = $page->meta_description;
            $data['breadcrumb_headline'] = $page->breadcrumb_headline;
            $data['breadcrumb_image'] = $page->page_image;
            $data['breadcrumb_description'] = $page->breadcrumb_description;
            $headerData = $this->header();
            $footerData = $this->footer();

            $member_categories = \App\Models\MemberCategory::active()->orderBy('id')->get();
            $trade_sectors = \App\Models\TradeSector::active()->orderBy('id')->get();
            $product_categories = \App\Models\ProductCategory::active()->orderBy('id')->get();
            $countries = \App\Models\Country::active()->orderBy('id')->get();
            $brands = \App\Models\Brand::active()->orderBy('id')->get();
            return response()->view('members-directory', compact('page', 'page_name', 'data', 'headerData', 'footerData', 'member_categories', 'trade_sectors', 'product_categories', 'countries', 'brands'), 200);
        } else {
            return redirect()->route('page.not.found');
        }
    }   
    public function view_profile($slug){
        $userProfile = UserProfile::where('slug', $slug)->first();
        $user = User::where('id', $userProfile->user_id)->first();
        if($userProfile){
            $employeeCount = $userProfile->number_of_employees ?? 0;
            $tradeSectorCount = $user->tradeSectors()->count() ?? 0;
            $productCategoryCount = $user->productCategories()->count() ?? 0;
            $brandCount = $user->brands()->count() ?? 0;
            $page_name = 'view-profile';
            $headerData = $this->header();
            $footerData = $this->footer();
            return response()->view('member-profile', compact('page_name', 'userProfile', 'user','headerData', 'footerData','employeeCount', 'tradeSectorCount', 'productCategoryCount', 'brandCount'), 200);
        } else {
            return redirect()->route('page.not.found');
        }
    }
}
