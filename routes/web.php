<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\StreetController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\AllotmentController;
use App\Http\Controllers\InstallmentplanController;
use App\Http\Controllers\AccountgrandparentController;
use App\Http\Controllers\AccountparentController;
use App\Http\Controllers\AccountController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('posts', PostController::class);
    Route::resource('department', DepartmentController::class);
    Route::resource('designation', DesignationController::class);
    Route::resource('member', MemberController::class);
    Route::resource('country', CountryController::class);
    Route::resource('city', CityController::class);
    Route::resource('project', ProjectController::class);
    Route::resource('sector', SectorController::class);
    Route::resource('street', StreetController::class);
    Route::resource('size', SizeController::class);
    Route::resource('plan', InstallmentplanController::class);
    Route::resource('accountgrandparent', AccountgrandparentController::class);
    Route::resource('accountparent', AccountparentController::class);
    Route::resource('account', AccountController::class);

    //Units
    Route::resource('unit', UnitController::class);
    Route::get('getSector',[UnitController::class, 'getSector'])->name('getSector');
    Route::get('getStreet',[UnitController::class, 'getStreet'])->name('getStreet');
    Route::get('getUnits',[UnitController::class, 'getUnits'])->name('getUnits');
    Route::get('getUnit',[UnitController::class, 'getUnit'])->name('getUnit');
    Route::get('getMsno',[UnitController::class, 'getMsno'])->name('getMsno');
    Route::get('getUnitprice',[UnitController::class, 'getUnitprice'])->name('getUnitprice');
    Route::get('getMembercnic',[UnitController::class, 'getMembercnic'])->name('getMembercnic');
    Route::get('getPlan',[UnitController::class, 'getPlan'])->name('getPlan');
    Route::get('unit/destroy/{id}',[UnitController::class, 'destroy'])->name('destroy');

    //Allotments
    Route::resource('allotment', AllotmentController::class);
    Route::get('getAllotments',[AllotmentController::class, 'getAllotments'])->name('getAllotments');
    Route::get('allotment/destroy/{id}',[AllotmentController::class, 'destroy'])->name('destroy');
});
