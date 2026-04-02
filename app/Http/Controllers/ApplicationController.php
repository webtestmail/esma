<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\ActivityLog;
use App\Models\Campagin;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;

class ApplicationController extends Controller
{
    public function getCompanyByUserId($userId)
    {
        $application = Application::where('user_id', $userId)->first();
        return $application ? $application : null;
    }
}
