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

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;


class ResetpasswordController extends Controller
{

    public function getemail()
    {
        return view('passwords.email');
    }
    public function seneResetLinkEmail()
    {
        $reset_token = str_random(10);

        $user = User::where('email', '=', Input::get('email'));



        if ($user === null) {
            echo "Email Not Found";
        }
        else
        {
            DB::table('users')
                ->where('email', Input::get('email'))
                ->update(['verification_code' => $reset_token]);
            $data = ['verification_code' => $reset_token];

            Mail::send('passwords.resetview', $data, function($message)
            {
                $message->to(Input::get('email'),Input::get('name'))
                    ->subject('Reset Your Password');
            });




            $failures  = Mail::failures();
            if (count($failures)==0) {
                return redirect('home')->with('success', true)->with('message',' Please check your email , password link sent in your email');
            } else {
                return redirect('home')->with('danger', true)->with('message',' Email sending failed, Please try again later');
            }
        }

    }

    public function showResetForm($password_token)
    {
        $data['verification_code'] = $password_token;
        $user = User::where('verification_code', '=', $password_token)->first();
        if ($user === null) {
            // user doesn't exist
            return redirect('home')->with('danger', true)->with('message',' Your Already Update Password once time');
        }
        else{
            return view('passwords.reset',$data);
        }

    }

    public function reset_pasd()
    {
        $rules = array(
            'password' => 'required|string|min:6|confirmed',

        );

        $input = Input::only(
            'password',
            'password_confirmation'
        );
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);

        }

        $returnValue = DB::table('users')
            ->where('verification_code', '=', Input::get('password_token'))
            ->update([
                'password' => Hash::make(Input::get('password'))
            ]);


        if($returnValue == 1)
        {
            $user = User::whereverification_code(Input::get('password_token'))->first();
            $user->verification_code = null;
            $user->save();

            return redirect('home')->with('success', true)->with('message',' Your password reset Success. Please Login Here');

        }
        else{
            return redirect('home')->with('danger', true)->with('message','Something is Wrong.Please Try again');
        }

    }
}