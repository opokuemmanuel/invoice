<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{

    public function show_register()
    {
       return view('dashboard.register')->with('msg');
    }

    public function show_login()
    {
        return view('dashboard.login')->with('message');
    }


    public function register_account(Request $request)
    {

          $check_email = User::where('email',$request->email)->first();
          if ($check_email) {
              return view('dashboard.register')->with('msg', 'email already exist');

          }elseif ($request->password != $request->confirm_password){
              return view('dashboard.register')->with('msg','passwords does not match');
          }else{
              $user = new User();
              $user->email = $request->email;
              $user->password = Hash::make($request->password);
              $result = $user->save();

              if ($result){
                  return redirect('/dashboard');
              }

          }

    }

    public function auth_login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        }else{
           return view('dashboard.login')->with('message','Invalid credentials');
        }

    }

    public function logout(Request $request) {
        Auth::logout();
        return view('dashboard.login')->with('message','Invalid credentials');
    }
}
