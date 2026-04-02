<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;

class MessageController extends Controller
{
    public function get_messages(){
        $id = Auth::id();
        
        $message = Message::where('sender_id',$id)->orwhere('receiver_id',$id)->get();
        return response()->json([
            'data'=>[
                'success'=>true,
                'data'=>$message
                ],
            
            ],200);
    }
}
