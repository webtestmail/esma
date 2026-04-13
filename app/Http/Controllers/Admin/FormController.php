<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscribers;
use App\Models\Contact;
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

      public function manage_contact_form() {
         $form = Contact::select('id', 'name', 'email')->orderBy('id')->get();
        foreach ($form as $val) {
            $val->encrypted_id = Crypt::encrypt($val->id);
        }
        $currentPage = "manage_contact_form";
        $model = Crypt::encrypt('Contact');
        return view('admin.manage_contact_form', ['formData' => $form, 'model' => $model, 'currentPage' => $currentPage]);
    }
     

      public function contactform_data() {

          $contact = Contact::select('id', 'name', 'email')->orderBy('id')->get();

                return DataTables::of($contact)
            ->addIndexColumn()
            ->addColumn('name', function($contact){
                return $contact->name;
            })
            ->addColumn('email', function($contact){
                return $contact->email;
            })
            ->addColumn('action', function ($contact) {
                $encryptedId = Crypt::encrypt($contact->id);
                $model = Crypt::encrypt('Contact');
                return '<div class="dropdown">
                            <a href="javascript:void(0);" class="avatar-text avatar-md ms-auto" data-bs-toggle="dropdown">
                                <i class="feather-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="' . route('admin.contactform_detail', $encryptedId) . '" class="dropdown-item">View</a>
                                    
                            </div>
                        </div>';
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        public function contactform_detail($id) {

        $decryptId = Crypt::decrypt($id);
                $contact = Contact::select('id', 'name', 'email', 'subject', 'message')->where('id', $decryptId)->first();
             return view('admin.contact_form_detail', ['contact' => $contact]);
        }
}
