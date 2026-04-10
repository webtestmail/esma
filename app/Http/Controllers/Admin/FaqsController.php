<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Faqs;
use App\Models\Admin\FaqCategory;   
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;

class FaqsController extends Controller
{
    function manageFaqs(Request $request)
    {
    $faqs = Faqs::select('id', 'position_order', 'faq_type', 'question', 'status','category_id')->with('category')->orderBy('position_order')->get();
        foreach ($faqs as $faq) {
            $faq->encrypted_id = Crypt::encrypt($faq->id);
        }
        $model = Crypt::encrypt('Faqs');

        // dd($faqs);
        $currentPage = "manage_faqs";
        return view('admin.manage_faq', ['faqsData' => $faqs, 'model' => $model, 'currentPage' => $currentPage]);
    }


    public function faqs_data() {

          $faqs = Faqs::query();

                return DataTables::of($faqs)
            ->addIndexColumn()
            ->addColumn('question', function($faqs){
                return $faqs->question;
            })
            ->addColumn('category_name', function($faqs){
                return $faqs->category ? $faqs->category->name : 'No Category'; 
            })
            ->addColumn('is_active', function($faqs){
                return $faqs->status == 'active' ? 'Active' : 'In active';
            })
            ->addColumn('action', function ($faqs) {
                $encryptedId = Crypt::encrypt($faqs->id);
                $model = Crypt::encrypt('Faqs');
                return '<div class="dropdown">
                            <a href="javascript:void(0);" class="avatar-text avatar-md ms-auto" data-bs-toggle="dropdown">
                                <i class="feather-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="' . route('admin.edit.faq', encrypt($faqs->id)) . '" class="dropdown-item">Modify</a>
                                     <button class="dropdown-item delete"
                                    onclick="delete_item(\'' . $model . '\', \'' . $encryptedId . '\');"
                                    data-id="' . $faqs->id . '">
                                Delete FAQs
                            </button>
                            </div>
                        </div>';
            })
            // ->rawColumns(['action','question','is_active','category_name'])
            ->make(true);
    }

    function addFaq(Request $request)
    {
        
        if ($request->isMethod('post')) {
                // dd($request->all());
            $requiredArr = [
                'category_id' => 'required',
                'faq_type' => 'required|string',
                'question' => 'required|string',
                'answer' => 'required|string',
            ];
            $msgsArr = [
                'category_id.required' => 'Please select any category',
                'faq_type.required' => 'The FAQ Type is required.',
                'faq_type.string' => 'The FAQ Type must be a string.',
                'question.required' => 'The question is required.',
                'question.string' => 'The question must be a string.',
                'answer.required' => 'The answer is required.',
                'answer.string' => 'The answer must be a string.',
            ];
            $request->validate($requiredArr, $msgsArr);

            $order = Faqs::max('position_order');
            $position_order = ($order !== null) ? $order + 1 : 1;

            $faq = [
                'position_order' => $position_order,
                'category_id' => $request->category_id,
                'faq_type' => $request->faq_type,
                'question' => $request->question,
                'answer' => htmlspecialchars($request->answer, ENT_QUOTES),
                'status' => $request->status,
            ];

            if (Faqs::create($faq)) {
                session()->flash('success', 'FAQ is inserted Successfully!');
                return redirect()->route('admin.manage_faqs');
            } else {
                session()->flash('error', 'Insertion Error!');
                return redirect()->route('admin.add.faq');
            }
        } else {
            $category = FaqCategory::where('status', 'active')->get();
            $currentPage = "manage_faqs";
            return view('admin.faq-ops', ["currentPage" => $currentPage, "category" => $category]);
        }
    }

    function editFaq(Request $request)
    {
        if ($request->isMethod('post')) {
            // dd($request->all());
            $requiredArr = [
                'category_id' => 'required',
                'faq_type' => 'required|string',
                'question' => 'required|string',
                'answer' => 'required|string',
            ];
            $msgsArr = [
                'category_id' => 'Please Select Any Category',
                'faq_type.required' => 'The FAQ Type is required.',
                'faq_type.string' => 'The FAQ Type must be a string.',
                'question.required' => 'The question is required.',
                'question.string' => 'The question must be a string.',
                'answer.required' => 'The answer is required.',
                'answer.string' => 'The answer must be a string.',
            ];
            $request->validate($requiredArr, $msgsArr);

            $id = Crypt::decrypt($request->faq);
            $faq = Faqs::findOrFail($id);
            $faq->category_id = $request->category_id;
            $faq->faq_type = $request->faq_type;
            $faq->question = $request->question;
            $faq->position_order = $request->position_order;
            $faq->answer = htmlspecialchars($request->answer, ENT_QUOTES);
            $faq->status = $request->status;

            if ($faq->save()) {
                session()->flash('success', 'FAQ is updated Successfully!');
                return redirect()->route('admin.manage_faqs');
            } else {
                session()->flash('error', 'Updation Error!');
                return redirect()->route('admin.edit.faq', $request->faq);
            }
        } else {
            $id = Crypt::decrypt($request->faq);
            $faq = Faqs::where('id', $id)->firstOrFail();
            $faq->encrypted_id = $request->faq;
            $category = FaqCategory::where('status', 'active')->get();

            $currentPage = "manage_faqs";
            return view('admin.faq-ops', ["faq" => $faq, "currentPage" => $currentPage, 'category' => $category]);
        }
    }

    function getAllFaqs($page = '')
    {
        if (!empty($page)) {
            return Faqs::where(['faq_type' => $page, 'status' => 'active'])->orderBy('position_order')->get();
        }
        return Faqs::where('status', 'active')->orderBy('position_order')->get();
    }


        function manageFaqCategory()
    {
        $category = FaqCategory::select('id', 'position_order', 'name','status')->orderBy('position_order')->get();
        foreach ($category as $cat) {
            $cat->encrypted_id = Crypt::encrypt($cat->id);
        }
        $currentPage = "manage_faq_category";
        $model = Crypt::encrypt('FaqCategory');
        return view('admin.manage_faq_category', ['categoryData' => $category, 'model' => $model, 'currentPage' => $currentPage]);
    }



     public function faq_category_data() {
          $category = FaqCategory::query();
        

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
                    $model = Crypt::encrypt('FaqCategory');
                return '<div class="dropdown">
                            <a href="javascript:void(0);" class="avatar-text avatar-md ms-auto" data-bs-toggle="dropdown">
                                <i class="feather-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="' . route('admin.edit.faqcategory', encrypt($category->id)) . '" class="dropdown-item">Modify</a>
                               <button class="dropdown-item delete"
                                    onclick="delete_item(\'' . $model . '\', \'' . $encryptedId . '\');"
                                    data-id="' . $category->id . '">
                                Delete FAQs
                            </button>
                            </div>
                        </div>';
            })
            // ->rawColumns(['action','question','is_active','category_name'])
            ->make(true);
    }


     function addFaqcategory(Request $request)
    {
        // dd($request->all());
        if ($request->isMethod('post')) {
            $requiredArr = [
                'name' => 'required|string',
            ];
            $msgsArr = [
                'name.required' => 'The Category Name is required.',
            ];
            $request->validate($requiredArr, $msgsArr);

            $order = FaqCategory::max('position_order');
            $position_order = ($order !== null) ? $order + 1 : 1;

            $category = [
                'position_order' => $position_order,
                'name' => $request->name,
                'status' => $request->status,
            ];

            if (FaqCategory::create($category)) {
                session()->flash('success', 'FAQ Category is inserted Successfully!');
                return redirect()->route('admin.manage_faqcategory');
            } else {
                session()->flash('error', 'Insertion Error!');
                return redirect()->route('admin.add.faqcategory');
            }
        } else {
            
            $currentPage = "manage_faq_category";
            return view('admin.faq_category_ops', ["currentPage" => $currentPage]);
        }
    }


       function editFaqcategory(Request $request, $id)
    {
        if ($request->isMethod('post')) {

        // dd($request->all());
            $requiredArr = [
                'name' => 'required|string',
            ];
            $msgsArr = [
                'name.required' => 'The Category Name is required.',
            ];
            $request->validate($requiredArr, $msgsArr);

            $ids = Crypt::decrypt($id);
            $faq = FaqCategory::findOrFail($ids);
            $faq->name = $request->name;
            $faq->position_order = $request->position_order;
            $faq->status = $request->status;
            if ($faq->save()) {
                session()->flash('success', 'FAQ Category is updated Successfully!');
                return redirect()->route('admin.manage_faqcategory');
            } else {
                session()->flash('error', 'Updation Error!');
                return redirect()->route('admin.edit.faqcategory', $ids);
            }
        } else {
            $ids = Crypt::decrypt($id);
            $category = FaqCategory::where('id', $ids)->firstOrFail();
            $category->encrypted_id = $id;

            $currentPage = "manage_faq_category";
            return view('admin.faq_category_ops', ["category" => $category, "currentPage" => $currentPage]);
        }
    }
}
