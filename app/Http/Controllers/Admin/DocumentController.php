<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
Use App\Models\Admin\DocumentCategory;
use App\Models\Document;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function document_delete(Request $request){
        $decrpt = decrypt($request->id);
        $document = Document::findOrFail($decrpt);
        if($document->file_path && \Storage::disk('public')->exists($document->file_path)) {
            \Storage::disk('public')->delete($document->file_path);
        }
        if($document->delete()){
            return response()->json(['success' => true, 'message' => 'Document deleted successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to delete document. Please try again.']);
        }
    }
    public function document_edit(Request $request, $id){
        $decrpt = decrypt($id);
        $document = Document::findOrFail($decrpt);
        if($request->isMethod('post')){
            $request->validate([
                'title'         => 'required|string|max:255',
                'category_id'   => 'required|exists:document_categories,id',
                'document_year' => 'required|digits:4|integer|min:1900|max:'.(date('Y') + 1),
                'document_file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:10240', // 10MB limit
            ]);

            if ($request->hasFile('document_file')) {
                if($document->file_path && \Storage::disk('public')->exists($document->file_path)) {
                    \Storage::disk('public')->delete($document->file_path);
                }
                $file = $request->file('document_file');
                $fileSize = $file->getSize();
                $extension = $file->getClientOriginalExtension();
                $fileName = $request->document_year . '-' . Str::slug($request->title) . '-' . time() . '.' . $extension;
                
                $path = $file->storeAs('documents', $fileName, 'public');
                // Delete old file if exists
                if ($document->file_path && \Storage::disk('public')->exists($document->file_path)) {
                    \Storage::disk('public')->delete($document->file_path);
                }
                $document->file_path = $path;
                $document->file_size = $fileSize;
                $document->file_type = $extension;
            }

            $document->title          = $request->title;
            $document->slug           = Str::slug($request->title) . '-' . time();
            $document->category_id    = $request->category_id;
            $document->document_year  = $request->document_year;
            // $document->user_id        = ''; // Associate with uploader
            $document->description     = $request->description;
            $document->is_public      = $request->has('is_public') ? true : false;

            if ($document->save()) {
                session()->flash('success', 'Document updated successfully!');
                return redirect()->route('admin.manage_documents');
            } else {
                session()->flash('error', 'Failed to update document. Please try again.');
                return redirect()->back();
            }
        }
        else{
        $document->encrypted_id = encrypt($document->id);
        $editData = 'admin.document.edit';
        $currentPageName = "Edit Document";
        $allData = 'admin.manage_documents';
        $categories = DocumentCategory::where('is_active', 1)->get();
        return view('admin.document-ops', ['operation' => 'Edit', 'editData' => $editData,'currentPageName' => $currentPageName, 'allData' => $allData, 'document' => $document, 'categories' => $categories]);
        }
        
    }
        public function addDocument(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'title'         => 'required|string|max:255',
                'category_id'   => 'required|exists:document_categories,id',
                'document_year' => 'required|digits:4|integer|min:1900|max:'.(date('Y') + 1),
                'document_file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:10240', // 10MB limit
            ]);

            if ($request->hasFile('document_file')) {
            $file = $request->file('document_file');
            
            $extension = $file->getClientOriginalExtension();
            $fileSize = $file->getSize();
            $fileName = $request->document_year . '-' . Str::slug($request->title) . '-' . time() . '.' . $extension;
            
            $path = $file->storeAs('documents', $fileName, 'public');

                $document = new Document();
                $document->title          = $request->title;
                $document->slug           = Str::slug($request->title) . '-' . time();
                $document->category_id    = $request->category_id;
                $document->document_year  = $request->document_year;
                // $document->user_id        = ''; // Associate with uploader
                $document->file_path      = $path;
                $document->description    = $request->description;
                $document->file_type      = $extension;
                $document->file_size      = $fileSize;
                $document->is_public      = $request->has('is_public') ? true : false;
                $document->save();
            if ($document->save()) {
                session()->flash('success', 'Document added successfully!');
                return redirect()->route('admin.manage_documents');
            } else {
                session()->flash('error', 'Failed to add document. Please try again.');
                return redirect()->back();
            }
          }
        }
        else{
            $addNewData = 'admin.add.document';
            $currentPageName = "Add Document";
            $allData = 'admin.manage_documents';
            $categories = DocumentCategory::where('is_active', 1)->get();
            return view('admin.document-ops', ['operation' => 'Add', 'addNewData' => $addNewData,'currentPageName' => $currentPageName, 'allData' => $allData, 'categories' => $categories]);
        }
    }
     public function document_data(Request $request)
    {
        $documentCategories = Document::query();

        return DataTables::of($documentCategories)
        ->addIndexColumn()
        ->addColumn('status', function($row){
            $status = $row->is_public == 1 ? 'Public' : 'Private';
            return $status;
        })
        ->addColumn('action', function($row){
            $editUrl = route('admin.document.edit', encrypt($row->id));
            $deleteUrl = route('admin.document.delete', encrypt($row->id));
            return '<div class="dropdown">
                            <a href="javascript:void(0);" class="avatar-text avatar-md ms-auto" data-bs-toggle="dropdown">
                                <i class="feather-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="' . $editUrl . '" class="dropdown-item">Modify</a>
                                <button class="dropdown-item delete" data-id="' . encrypt($row->id) . '">Delete Document</button>
                            </div>';
        })
        ->rawColumns(['status', 'action'])
        ->make(true);
    }
        public function manageDocument(Request $request)
    {
        $currentPage = "admin.manage_documents";
        $currentPageName = "Documents";
        $addNewData = 'admin.add.document';
        $currentPageData = 'documents';
        $deleteUrl = 'admin.document.delete';
        return view('admin.manage_documents_and_liberary', ['currentPage' => $currentPage, 'currentPageName' => $currentPageName, 'addNewData' => $addNewData,'currentPageData' => $currentPageData, 'deleteUrl' => $deleteUrl]);
    }
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
                            <a href="javascript:void(0);" class="avatar-text avatar-md ms-auto" data-bs-toggle="dropdown">
                                <i class="feather-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="' . route('admin.document.edit', ['id' => $row->id]) . '" class="dropdown-item">Modify</a>
                                <button class="dropdown-item delete" data-id="' . $row->id . '">Delete Document</button>
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