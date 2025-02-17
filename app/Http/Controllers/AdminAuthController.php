<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminAuthController extends Controller
{
    //
    //
    public function __construct(){

        //$this->middleware('auth');
    }
    public function adminlogin(Request $request)
    {
        //dd('1');
        $data=$request->except('_token');
        $validated=$request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if($validated){
            $email=$data['email'];
            $password=$data['password'];
            //$password=Hash::make($data['password']);

             if(Auth::attempt(['email'=>$email,'password'=>$password]))
             {
                //dd('yes');
                //dd(Auth::user()->role);
                return redirect('/admin/dash')->with('success','Login Success');
             }
             else{
                //dd('no');
                return redirect('/admin/login')->with('error','Login Failed');
             }                
        }
    }
    public function adminlogout(){
        Auth::logout();
        return redirect('/admin/login')->with('success','Logout Success');
    }
}
