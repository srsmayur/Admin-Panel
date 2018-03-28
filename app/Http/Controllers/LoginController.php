<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function login()
    {

        $rules = [
            'email' => 'required|exists:users',
            'password' => 'required'
        ];

        $input = Input::only('email', 'password');

        $validator = Validator::make($input, $rules);

        if($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $credentials = [
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'active_user' => 1
        ];


        if ( ! Auth::attempt($credentials))
        {
            return redirect('home')->with('danger', true)->with('message','Something is wrong with you. Please Again');
        }


        return redirect('dashboard')->with('success', true)->with('message','That was great!');

    }
    public function dologout()
    {
        Session::flush();
        Auth::logout();
        return redirect('home')->with('success', true)->with('message','Your are now Logout!');
    }

}
