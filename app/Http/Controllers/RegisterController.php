<?php

namespace App\Http\Controllers;

use App\User;
use App\helpers;
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
class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('register');
    }
    public function doRegistration(){



        $rules = array(
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'country' => 'max:255',
            'occupation' => 'max:255',
            'mobile' => '',
            'weburl' => 'max:255',
        );

        $input = Input::only(
            'name',
            'email',
            'password',
            'password_confirmation'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);

        }


        $random_code = str_random(10);

        DB::table('users')->insert(
            array(
                'name'     =>   Input::get('name'),
                'email'   =>   Input::get('email'),
                'password' => Hash::make(Input::get('password')),
                'country' => Input::get('country'),
                'occupation' => Input::get('occupation'),
                'mobile' => Input::get('mobile'),
                'weburl' => Input::get('weburl'),
                'verification_code' => $random_code,
                'active_user' => '0',
            )
        );
        $userID = DB::getPdo()->lastInsertId();

        if ($userID)
        {

            $data = ['verification_code' => $random_code]; // Empty array

            Mail::send('email.email_verify', $data, function($message)
            {
                $message->to(Input::get('email'),Input::get('name'))
                    ->subject('Verify your email address');
            });




            $failures  = Mail::failures();
            if (count($failures)==0) {
                return redirect('home')->with('success', true)->with('message',' Please check your email , email verify link sent in your email');
            } else {
                return redirect('home')->with('danger', true)->with('message',' Email sending failed, Please try again later');
            }


        }



    }

    public function email_verify()
    {
        return view('Email.email_verify');
    }

    public function confirm($verification_code)
    {


        if( ! $verification_code)
        {
            return redirect('home')->with('info', true)->with('message',' Your Email is already verified.Please Login here');
        }
        $user = User::whereverification_code($verification_code)->first();
        if ( ! $user)
        {
            return redirect('home')->with('info', true)->with('message',' Your Email is already verified.Please Login here');
        }

        $user->active_user = 1;
        $user->verification_code = null;
        $user->save();



        return redirect('home')->with('success', true)->with('message',' Your Email is successfully verified.Please Login here');

    }

}