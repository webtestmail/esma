<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
Use App\Models\Admin\DocumentCategory;
use Yajra\DataTables\Facades\DataTables;

class DocumentController extends Controller
{
    public function manageDocumentCategories(Request $request)
    {
        $currentPage = "admin.manage_document_categories";
        $currentPageName = "Document Categories";
        $addNewData = 'admin.add.document_category';
        $currentPageData = 'documents-categories';
        $deleteUrl = 'admin.document_category.delete';
        return view('admin.manage_documents', ['currentPage' => $currentPage, 'currentPageName' => $currentPageName, 'addNewData' => $addNewData,'currentPageData' => $currentPageData, 'deleteUrl' => $deleteUrl]);
    }
    public function document_category_data(Request $request)
    {
        $documentCategories = \App\Models\Admin\DocumentCategory::query();

        return DataTables::of($documentCategories)
        ->addIndexColumn()
        ->addColumn('status', function($row){
            $status = $row->is_active == 1 ? 'Active' : 'Inactive';
            return $status;
        })
        ->addColumn('action', function($row){
            $editUrl = route('admin.document_category.edit', ['id' => $row->id]);
            $deleteUrl = route('admin.document_category.delete', ['id' => $row->id]);
            return '<div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="actionMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action
                </button>
                <div class="dropdown-menu" aria-labelledby="actionMenuButton">
                    <a class="dropdown-item" href="{{ $editUrl }}">Edit</a>

                        <button type="submit" class="dropdown-item">Delete</button>
                    
                </div>';
        })
        ->rawColumns(['status', 'action'])
        ->make(true);
    }
    public function addDocumentCategory(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|string|max:255',
            ], [
                'name.required' => 'The category name is required.',
                'name.string' => 'The category name must be a string.',
                'name.max' => 'The category name may not be greater than 255 characters.',
            ]);

            $category = new \App\Models\Admin\DocumentCategory();
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->is_active = 1; // Default status as active

            if ($category->save()) {
                session()->flash('success', 'Document category added successfully!');
                return redirect()->route('admin.manage_document_categories');
            } else {
                session()->flash('error', 'Failed to add document category. Please try again.');
                return redirect()->back();
            }
        }
        else{
            $addNewData = 'admin.add.document_category';
            $currentPageName = "Add Document Category";
            $allData = 'admin.manage_document_categories';
            return view('admin.document_category-ops', ['operation' => 'Add', 'addNewData' => $addNewData,'currentPageName' => $currentPageName, 'allData' => $allData]);
        }
    }
}
