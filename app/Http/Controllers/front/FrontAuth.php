<?php

namespace App\Http\Controllers\front;

use Session;
use App\Models\User;
use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class FrontAuth extends Controller
{
    public function login()
    {
        return view('frontend.auth.login');
    }
    public function dologin(Request $request)
    {

        // dd($request->all());

        $validatedData = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required',

        ], [
            'email.required' => 'Email Is Required',
            'email.email' => 'Must Enter a Valid Email',
            'password.required' => 'Password Is Required'
        ]);


        $credential = ['email' => $request->email, 'password' => $request->password];
        $attempt = auth()->guard('web')->attempt($credential);
        $userCount = User::where(['email' => $request->email])->count();
        if ($userCount == 0) {
            session()->flash('success', 'This email does not exist ');
            return redirect()->back();
        }

        $userData = User::where(['email' => $request->email])->first();

        if ($attempt) {
            session()->flash('success', 'Logged Is Succefully');
            return redirect('/');
        } else {
            session()->flash('success', 'Incorrect UserName Or Password');
            return redirect('front/login');
        }
    }


    public function register(Request $request)
    {


        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ], [
            'email.required' => 'Email Is Required',
            'email.email' => 'Must Enter a Valid Email',
            'password.required' => 'Password Is Required'
        ]);

        $request->merge(['password' => bcrypt($request->password)]);
        $user = User::create($request->all());




        if (Auth::attempt($validatedData)) {
            session()->flash('success', 'Now U Can Reservation');
            return redirect('/');
        }
    }
    public function registerView()
    {
        return view('frontend.auth.register');
    }

    public function logout()
    {
        auth()->guard('web')->logout();
        return redirect('front/login');
    }
}
