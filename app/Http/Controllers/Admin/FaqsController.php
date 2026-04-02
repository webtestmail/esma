<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Faqs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class FaqsController extends Controller
{
    function manageFaqs(Request $request)
    {
        $faqs = Faqs::select('id', 'position_order', 'faq_type', 'question', 'status')->orderBy('position_order')->get();
        foreach ($faqs as $faq) {
            $faq->encrypted_id = Crypt::encrypt($faq->id);
        }
        $model = Crypt::encrypt('Faqs');
        $currentPage = "manage_faqs";
        return view('admin.manage_faqs', ['faqsData' => $faqs, 'model' => $model, 'currentPage' => $currentPage]);
    }

    function addFaq(Request $request)
    {
        if ($request->isMethod('post')) {
            $requiredArr = [
                'faq_type' => 'required|string',
                'question' => 'required|string',
                'answer' => 'required|string',
            ];
            $msgsArr = [
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
                'faq_type' => $request->faq_type,
                'question' => $request->question,
                'answer' => htmlspecialchars($request->answer, ENT_QUOTES),
            ];

            if (Faqs::create($faq)) {
                session()->flash('success', 'FAQ is inserted Successfully!');
                return redirect()->route('admin.manage_faqs');
            } else {
                session()->flash('error', 'Insertion Error!');
                return redirect()->route('admin.add.faq');
            }
        } else {
            $currentPage = "manage_faqs";
            return view('admin.faq-ops', ["currentPage" => $currentPage]);
        }
    }

    function editFaq(Request $request)
    {
        if ($request->isMethod('post')) {
            $requiredArr = [
                'faq_type' => 'required|string',
                'question' => 'required|string',
                'answer' => 'required|string',
            ];
            $msgsArr = [
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
            $faq->faq_type = $request->faq_type;
            $faq->question = $request->question;
            $faq->answer = htmlspecialchars($request->answer, ENT_QUOTES);

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

            $currentPage = "manage_faqs";
            return view('admin.faq-ops', ["faq" => $faq, "currentPage" => $currentPage]);
        }
    }

    function getAllFaqs($page = '')
    {
        if (!empty($page)) {
            return Faqs::where(['faq_type' => $page, 'status' => 'active'])->orderBy('position_order')->get();
        }
        return Faqs::where('status', 'active')->orderBy('position_order')->get();
    }
}
