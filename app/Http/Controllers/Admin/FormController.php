<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscribers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FormController extends Controller
{
     public function manage_subscriber() {
         $form = Subscribers::select('id', 'email')->orderBy('id')->get();
        foreach ($form as $val) {
            $val->encrypted_id = Crypt::encrypt($val->id);
        }
        $currentPage = "manage_subscriber";
        $model = Crypt::encrypt('Subscribers');
        return view('admin.manage_subscribers', ['formData' => $form, 'model' => $model, 'currentPage' => $currentPage]);
    }

           public function newsletter_data() {

          $news = Subscribers::select('id', 'email')->orderBy('id')->get();

                return DataTables::of($news)
            ->addIndexColumn()
            ->addColumn('email', function($news){
                return $news->email;
            })
            // ->rawColumns(['action','question','is_active','category_name'])
            ->make(true);
    }
     
}
