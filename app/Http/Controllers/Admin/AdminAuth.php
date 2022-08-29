<?php

namespace App\Http\Controllers\Admin;
use Session;
use App\Models\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminAuth extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }
    public function dologin(Request $request)
    {

        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ] );
       $attempt = auth()->guard('admin')->attempt($validatedData);
        if($attempt){
            Session::flash('success', "Logged In Succefully");
            return redirect('admin');
        }
        else{
            Session::flash('error', "Something Wrong");
            return redirect('admin/login');

        }
    }

    public function register(){
        return view('admin.auth.register');
    }
    public function doregister(Request $request)
    {
        $validatedData =   $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:admins',
            'password' => 'required',

        ]);


        $request->merge(['password' => bcrypt($request->password)]);
        // return $request->all();
        $admin = Admin::create($request->all());

        $attempt = auth()->guard('admin')->attempt($validatedData);
        if($attempt){

            session()->flash('success', 'Admin Has Been Added Succefully');
            return redirect('admin');

        }
        else{

            Session::flash('error', "Try Login Again");
            return redirect('admin/login');

        }

    }
    public function logout()
    {

        $user = auth()->guard('admin')->logout();
        return redirect('admin/login');
    }
}
