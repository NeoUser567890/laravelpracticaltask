<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserCrudController;
use App\Http\Controllers\AdminCrudController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* User Routes */
Route::group(['prefix' => 'user'], function()  
{  
   Route::get('/register',function()  
   {  
       return view('user.reg');
   });  
   Route::get('/login',function()  
   {  
       return view('user.login');
   });  
//    Route::get('/dash',function()  
//    {  
//        return view('user.dash');
//    }); 
   Route::get('/dash',function(){
      return view('user.dash');
   })->middleware('userCheck');
   
});  
Route::post('loginuser',[UserAuthController::class,'userlogin'])->name('doUserLog');
Route::get('logoutuser',[UserAuthController::class,'userlogout'])->name('doUserLogout');

/* Admin Routes */
Route::group(['prefix' => 'admin'], function()  
{  
   Route::get('/register',function()  
   {  
       return view('admin.reg');
   });  
   Route::get('/login',function()  
   {  
       return view('admin.login');
   });  

//    Route::get('/dash',function()  
//    {  
//        return view('admin.dash');
//    }); 
   Route::get('/dash',function(){
    return view('admin.dash');
   })->middleware('adminCheck');
});  
Route::post('loginadmin',[AdminAuthController::class,'adminlogin'])->name('doAdminLog');
Route::get('logoutadmin',[AdminAuthController::class,'adminlogout'])->name('doAdminLogout');
/* Resource Routes For Crud Operations */
Route::resource('userCrud',UserCrudController::class);
Route::resource('adminCrud',AdminCrudController::class);