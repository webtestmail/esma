<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application; 
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMember;
use App\Mail\ApplicationRejected;

class ApplicationController extends Controller
{
    public function manageApplications()
    {
        return view('admin.manage_applications');
    }

    public function application_data(Request $request)
    {
        // Logic to fetch and return application data for DataTables
        $applications = Application::all(); // Replace with actual model and data fetching logic
        return datatables()->of($applications)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="'.route('admin.application.edit', encrypt($row->id)).'" class="edit btn btn-primary btn-sm">Edit</a>';
                return $btn;
            })
            ->addColumn('status', function($row){
                if($row->status == 'approved'){
                  $status = 'Approved';
                }
                elseif($row->status == 'rejected') {
                  $status = 'Rejected';
                }
                else {
                  $status = 'Pending';
                }
                return $status;
            })
            ->make(true);
        return response()->json($applications);
    }

   public function application_edit(Request $request, $id)
{
    $application = Application::findOrFail(decrypt($id));

    

    if ($request->isMethod('post')) {
        $request->validate([
            'status' => 'required|in:approved,rejected,pending',
        ]);
    

        $newStatus = $request->input('status');

        if ($newStatus == 'approved') {
            // Check if user already exists to prevent duplicates
            if (User::where('email', $application->email)->exists()) {
                session()->flash('error', 'A user with this email already exists. Please resolve this before approving the application.');
                return back();
            }

            // 1. Generate Password
            $tempPassword = Str::random(12);

            // 2. Create User
            $user = User::create([
                'name'         => $application->contact_name,
                'phone'        => $application->phone,
                'email'        => $application->email,
                'password'     => Hash::make($tempPassword),
                'company_name' => $application->company_name,
                'is_active'    => 1,
                'role'         => 'member',
            ]);

            // 3. Update Application with link to User
            $application->update([
                'status'      => 'approved',
                'user_id'     => $user->id,
                'approved_at' => now()
            ]);

            // 4. Send Email
            try {
                Mail::to($application->email)->send(new WelcomeMember($user, $tempPassword));
            } catch (\Exception $e) {
                // If email fails, we should still return success but maybe log the error
                \Log::error("Email failed for application {$application->id}: " . $e->getMessage());
            }

            return redirect()->route('admin.manage_applications')->with('success', 'Application approved and user created!');
        }

        if ($newStatus == 'rejected') {
            Mail::to($application->email)->send(new ApplicationRejected($application));
        }

      
        $application->update(['status' => $newStatus]);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Status updated to ' . $newStatus]);
        }

        return redirect()->route('admin.manage_applications')->with('success', 'Status updated.');
    }

    $application->encrypted_id = $id;
    return view('admin.application-ops', compact('application'));
} 
}
