<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TeamController extends Controller
{
    public function manageTeam()
    {
        $team = Team::select('id', 'position_order', 'employee_name', 'employee_designation', 'employee_image', 'status')->get();
        foreach ($team as $emp) {
            $emp->encrypted_id = Crypt::encrypt($emp->id);
        }
        $model = Crypt::encrypt('Team');
        $currentPage = "manage_team";
        return view('admin.manage_team', ['teamData' => $team, 'model' => $model, "currentPage" => $currentPage]);
    }

    public function addMember(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'emp_name' => 'required|string'
            ]);

            $emp_order = Team::max('position_order');
            $position_order = ($emp_order !== null) ? $emp_order + 1 : 1;

            $member = [
                'position_order' => $position_order,
                'employee_name' => $request->emp_name,
                'employee_designation' => $request->emp_designation,
                'instagram_count' => $request->instagram_count,
                'youtube_count' => $request->youtube_count,
                'tiktok_count' => $request->tiktok_count,
            ];

            if (!empty($request->file('emp_image'))) {
                $path = 'images/members/';
                $filePath = $this->storeImage($request->file('emp_image'), $path);
                $member['employee_image'] = $filePath;
            }

            if (Team::create($member)) {
                $request->session()->flash('success', 'Team-Member is added Successfully!');
                return redirect()->route('admin.manage_team');
            } else {
                $request->session()->flash('error', 'Insertion Error!');
                return redirect()->route('admin.add.member');
            }
        } else {
            $currentPage = "manage_team";
            return view('admin.team-ops', ["currentPage" => $currentPage]);
        }
    }

    public function editMember(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'emp_name' => 'required|string'
            ]);

            $id = Crypt::decrypt($request->member);
            $member = Team::findOrFail($id);
            $member->employee_name = $request->emp_name;
            $member->employee_designation = $request->emp_designation;
            $member->instagram_count = $request->instagram_count;
            $member->youtube_count = $request->youtube_count;
            $member->tiktok_count = $request->tiktok_count;

            if (!empty($request->file('emp_image'))) {
                $path = 'images/members/';
                $filePath = $this->storeImage($request->file("emp_image"), $path, $member->employee_image);
                $member->employee_image = $filePath;
            }

            if ($member->save()) {
                $request->session()->flash('success', 'Team-Member is updated Successfully!');
                return redirect()->route('admin.manage_team');
            } else {
                $request->session()->flash('error', 'Updation Error!');
                return redirect()->route('admin.edit.member', $request->member);
            }
        } else {
            $id = Crypt::decrypt($request->member);
            $member = Team::where('id', $id)->firstOrFail();
            $member->encrypted_id = $request->member;
            $currentPage = "manage_team";
            return view('admin.team-ops', ["member" => $member, "currentPage" => $currentPage]);
        }
    }

    public function getTeam()
    {
        return Team::where('status', 'active')->get();
    }
}
