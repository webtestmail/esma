<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function message_box_view(){
        
        return view('user-dashboard.influencer.message-box');
    }
}
