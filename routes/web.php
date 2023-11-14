<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\CompanyBranchController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\BankAccountController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
// Dashboard
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');


    // User Management
    Route::get('user', [UserController::class,'index'])->name('user.all');
    Route::get('user/add', [UserController::class,'add'])->name('user.add');
    Route::post('user/add', [UserController::class,'addPost']);
    Route::get('user/edit/{user}', [UserController::class,'edit'])->name('user.edit');
    Route::post('user/edit/{user}', [UserController::class,'editPost']);
    Route::get('user-activity', [UserController::class,'userActivity'])->name('user.activity');

    // Warehouse
    Route::get('warehouse', [WarehouseController::class,'index'])->name('warehouse');
    Route::get('warehouse/add', [WarehouseController::class,'add'])->name('warehouse.add');
    Route::post('warehouse/add', [WarehouseController::class,'addPost']);
    Route::get('warehouse/edit/{warehouse}', [WarehouseController::class,'edit'])->name('warehouse.edit');
    Route::post('warehouse/edit/{warehouse}', [WarehouseController::class,'editPost']);

    // Unit
    Route::get('unit', [UnitController::class,'index'])->name('unit');
    Route::get('unit/add', [UnitController::class,'add'])->name('unit.add');
    Route::post('unit/add', [UnitController::class,'addPost']);
    Route::get('unit/edit/{unit}', [UnitController::class,'edit'])->name('unit.edit');
    Route::post('unit/edit/{unit}', [UnitController::class,'editPost']);

    // Company Branch
    Route::get('company-branch', [CompanyBranchController::class,'index'])->name('company-branch');
    Route::get('company-branch/add', [CompanyBranchController::class,'add'])->name('company-branch.add');
    Route::post('company-branch/add', [CompanyBranchController::class,'addPost']);
    Route::get('company-branch/edit/{company_branch}', [CompanyBranchController::class,'edit'])->name('company-branch.edit');
    Route::post('company-branch/edit/{company_branch}', [CompanyBranchController::class,'editPost']);

    // Bank
    Route::get('bank', [BankController::class,'index'])->name('bank');
    Route::get('bank/add', [BankController::class,'add'])->name('bank.add');
    Route::post('bank/add', [BankController::class,'addPost']);
    Route::get('bank/edit/{bank}', [BankController::class,'edit'])->name('bank.edit');
    Route::post('bank/edit/{bank}', [BankController::class,'editPost']);

    // Bank Branch
    Route::get('bank-branch', [BranchController::class,'index'])->name('branch');
    Route::get('bank-branch/add', [BranchController::class,'add'])->name('branch.add');
    Route::post('bank-branch/add', [BranchController::class,'addPost']);
    Route::get('bank-branch/edit/{branch}', [BranchController::class,'edit'])->name('branch.edit');
    Route::post('bank-branch/edit/{branch}', [BranchController::class,'editPost']);

    // Bank Account
    Route::get('bank-account', [BankAccountController::class,'index'])->name('bank_account');
    Route::get('bank-account/add', [BankAccountController::class,'add'])->name('bank_account.add');
    Route::post('bank-account/add', [BankAccountController::class,'addPost']);
    Route::get('bank-account/edit/{account}', [BankAccountController::class,'edit'])->name('bank_account.edit');
    Route::post('bank-account/edit/{account}', [BankAccountController::class,'editPost']);
    Route::get('bank-account/get-branches', [BankAccountController::class,'getBranches'])->name('bank_account.get_branch');


});



require __DIR__.'/auth.php';
