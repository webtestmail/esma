<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscribers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

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
     
}
