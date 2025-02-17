<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserAuthController extends Controller
{
    //
    public function __construct(){

        //$this->middleware('auth');
    }
    public function userlogin(Request $request)
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
                return redirect('/user/dash')->with('success','Login Success');
             }
             else{
                //dd('no');
                return redirect('/user/login')->with('error','Login Failed');
             }                
        }
    }
    public function userlogout(){
        Auth::logout();
        return redirect('/user/login')->with('success','Logout Success');
    }


}
