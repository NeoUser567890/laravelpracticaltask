<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\DB;

class UserCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd('3');
        $validated=$request->validate([
            'firstName'=>'required |string',
            'lastName'=>'required |string',
            'email'=>'required | email',
            'password' =>'required | min:6',
        ]);
        if($validated){
           // dd('Yes');
           $data=$request->except('_token','iAgree');
           $data['password']=Hash::make($data['password']);
           $role=UserRole::where('name','=','user')->first();
           $user=new User();
           $user->name=$data['firstName'].''.$data['lastName'];
           $user->email=$data['email'];
           $user->password=$data['password'];
           
           $user->save();
           DB::table('role_user')->insert([
             'role_id'=>'2',
             'user_id'=>$user->id,
           ]);
           return session()->flash('success','User Saved Success');
           //dd($data);
        }
        else{
            return redirect()->back()->with('error','User Register Fail');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
