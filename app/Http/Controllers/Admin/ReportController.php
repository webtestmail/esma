<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Report;
use App\Models\Admin\ReportCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;

class ReportController extends Controller
{
       function managereports()
        {
            $reports = Report::select('id', 'name','status')->orderBy('id')->get();
            foreach ($reports as $val) {
                $val->encrypted_id = Crypt::encrypt($val->id);
            }
            $currentPage = "manage_reports";
            $model = Crypt::encrypt('News');
            return view('admin.manage_reports', ['reports' => $reports, 'model' => $model, 'currentPage' => $currentPage]);
        }




   public function reports_data() {
    $reports = Report::select('id', 'name', 'file', 'status')->orderBy('id')->get();

    return DataTables::of($reports)
        ->addIndexColumn()
        ->addColumn('name', function($report){  // Single item, not collection
            if ($report->file) {
                $fileUrl = asset($report->file);  // Fixed: add storage/
                return '<a href="' . $fileUrl . '" target="_blank" class="btn-link">' 
                       . htmlspecialchars($report->name) . ' <i class="fas fa-download"></i></a>';
            }
            return htmlspecialchars($report->name);
        })
        ->addColumn('is_active', function($report){  // Fixed: $reports → $report
            return $report->status == 'active' ? 'Active' : 'Inactive';  // Fixed typo
        })
        ->addColumn('action', function ($report) {  // Fixed: $reports → $report
            $encryptedId = Crypt::encrypt($report->id);
            $model = Crypt::encrypt('Report');
            return '<div class="dropdown">
                        <a href="javascript:void(0);" class="avatar-text avatar-md ms-auto" data-bs-toggle="dropdown">
                            <i class="feather-more-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="' . route('admin.edit.report', $encryptedId) . '" class="dropdown-item">Modify</a>
                            <button class="dropdown-item delete"
                                    onclick="delete_item(\'' . $model . '\', \'' . $encryptedId . '\');"
                                    data-id="' . $report->id . '">
                                Delete
                            </button>
                        </div>
                    </div>';
        })
        ->rawColumns(['name', 'is_active', 'action'])  // Added missing columns
        ->make(true);
}



      function addreport(Request $request)
    {

      if ($request->isMethod('post')) {
    $requiredArr = [
        'name' => 'required',
        'file' => 'required|file|mimes:pdf,doc,docx|max:5120', // 5MB max
    ];
    
    $msgsArr = [
        'name.required' => 'The Name is required',
        'file.required' => 'The File is required',
        'file.mimes' => 'File must be PDF, DOC, or DOCX',
        'file.max' => 'File size must not exceed 5MB',
    ];
    
    $request->validate($requiredArr, $msgsArr);

      $category_ids = $request->category_ids
                    ? implode(',', $request->category_ids)
                    : null;

    $reports = [
        'name' => $request->name,
        'slug' => $request->slug,
        'header_footer_name' => $request->header_footer_name,
        'breadcrumb_description' => $request->breadcrumb_description,
        'description' => $request->description,
        'category_ids' => $category_ids,
        'tags' => $request->tags,
        'published_by' => $request->published_by,
        'status' => $request->status ?? 'active', // Default status
    ];

    // Handle file upload (rename your storeImage method if needed)
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $path = 'images/report/'; 
            $filePath = $this->storeFile($request->file('file'), $path);
            $reports['file'] = $filePath; 
        }


         $breadcrumb_image = null;
                if (!empty($request->file('breadcrumb_image'))) {
                    $path = 'images/report/';
                    $filePath = $this->storeImage($request->file("breadcrumb_image"), $path);
                    $news['breadcrumb_image'] = $filePath;
                }

        $reportsData = Report::create($reports);

            if ($reportsData) {
                session()->flash('success', 'Report is inserted Successfully!');
                return redirect()->route('admin.managereports');
            } else {
                session()->flash('error', 'Insertion Error!');
                return redirect()->route('admin.add.report');
            }
        } else {

            $currentPage = "manage_reports";
            return view('admin.reports-ops', ["currentPage" => $currentPage]);
        }
    }



      function editreport(Request $request, $id)
    {
        if ($request->isMethod('post')) {
          
          $ids = Crypt::decrypt($id);
            $report = Report::findOrFail($ids);
        // dd($request->all());
           $requiredArr = [
        'name' => 'required',
         'slug' => 'required|unique:reports,slug,' . $report->id,
         'description' => 'required',
         'header_footer_name' => 'required'
            ];
            
            $msgsArr = [
                'name.required' => 'The Name is required',
            ];
            $request->validate($requiredArr, $msgsArr);

          

        
        $report->category_ids = $request->category_ids
        ? implode(',', $request->category_ids)
        : null;
        $report->name = $request->name;
        $report->slug = $request->slug;
        $report->header_footer_name = $request->header_footer_name;
        $report->breadcrumb_description = $request->breadcrumb_description;
        $report->tags = $request->tags;
        $report->published_by = $request->published_by;
        $report->description = $request->description;
        $report->file_name = $request->file_name;
        $report->status = $request->status;

        
        if ($request->hasFile('file')) {
            $path = 'images/report/'; 
            $report->file = $this->storeFile($request->file('file'), $path);
        }

         if ($request->hasFile('breadcrumb_image')) {
            $path = 'images/report/';
            $report->breadcrumb_image = $this->storeImage($request->file('breadcrumb_image'), $path);
        }

        // ✅ SAVE
        if ($report->save()) {

            session()->flash('success', 'Report updated successfully!');
            return redirect()->route('admin.managereports');
        } else {
            session()->flash('error', 'Updation Error!');
            return redirect()->route('admin.edit.report', $id);
        }

        } else {
            $ids = Crypt::decrypt($id);
            $report = Report::where('id', $ids)->firstOrFail();
            $report->encrypted_id = $id;
            $categories = ReportCategory::where('status', 'active')->get();
            $currentPage = "manage_reports";
            return view('admin.reports-ops', ["currentPage" => $currentPage, "report" => $report, "categories" => $categories]);
        }
    }


   private function storeFile($file, $path)
{
    $fileName = time() . '_' . $file->getClientOriginalName();
    
    // Full public path: public/images/report/
    $fullPublicPath = public_path($path);
    
    // Create directory if doesn't exist
    if (!file_exists($fullPublicPath)) {
        mkdir($fullPublicPath, 0755, true);
    }
    
    // Move file directly to public folder
    $file->move($fullPublicPath, $fileName);
    
    // Return relative path for DB
    return $path . $fileName;  // "images/report/123456_file.pdf"
}
}

