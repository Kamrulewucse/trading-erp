<?php

namespace App\Http\Controllers;

use App\Models\CompanyBranch;
use App\Models\Employee;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::orderBy('name')->get();

        return view('user_management.all', compact('users'));
    }

    public function add() {
        $companyBranches = CompanyBranch::all();
        return view('user_management.add',compact('companyBranches'));
    }
    public function userActivity(){
        $users = AcitivityLog::all();
        return view('user_management.activity', compact('users'));
    }

    public function addPost(Request $request) {


        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->company_branch_id = $request->company_branch_id;
        $user->save();

//        $user->syncPermissions($request->permission);

        return redirect()->route('user.all')->with('message', 'User add successfully.');
    }

    public function edit(User $user) {
        $companyBranches = CompanyBranch::where('status',1)->get();
        return view('user_management.edit', compact('user','companyBranches'));
    }

    public function editPost(User $user, Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:8|confirmed'
        ]);

        $user->role = $request->role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->company_branch_id = $user->company_branch_id == 0 ? 0 : $request->company_branch_id;


        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();
        // Update Employee
        $employee = Employee::where('user_id', $user->id)->first();
        if ($employee) {
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->company_branch_id = $request->company_branch_id;
            $employee->save();
        }

//        $user->syncPermissions($request->permission);


        return redirect()->route('user.all')->with('message', 'User edit successfully.');
    }
}
