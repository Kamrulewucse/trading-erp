<?php

namespace App\Http\Controllers;

use App\Models\CompanyBranch;
use Illuminate\Http\Request;

class CompanyBranchController extends Controller
{
    public function index() {
        $companyBranches = CompanyBranch::all();

        return view('administrator.company_branch.all', compact('companyBranches'));
    }

    public function add() {
        return view('administrator.company_branch.add');
    }

    public function addPost(Request $request) {

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'status' => 'required'
        ]);

        $company_branch = new CompanyBranch();
        $company_branch->name = $request->name;
        $company_branch->address = $request->address;
        $company_branch->status = $request->status;
        $company_branch->save();

        return redirect()->route('company-branch')->with('message', 'Company Branch added successfully.');
    }

    public function edit(CompanyBranch $companyBranch) {
        return view('administrator.company_branch.edit', compact('companyBranch'));
    }

    public function editPost(CompanyBranch $company_branch, Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required'
        ]);

        $company_branch->name = $request->name;
        $company_branch->status = $request->status;
        $company_branch->save();

        return redirect()->route('company-branch')->with('message', 'Company Branch edited successfully.');
    }
}
