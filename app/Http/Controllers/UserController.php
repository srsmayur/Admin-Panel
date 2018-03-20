<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        $variable = "here";

        return view('auth.login' , ['variable'=> $variable]);
    }
    public function profile() {

        return view('user.show');
    }
    protected  function edit(User $id)
    {
        return View::make('user.edit');
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->country = $request['country'];
        $user->occupation = $request['occupation'];
        $user->mobile = $request['mobile'];
        $user->weburl = $request['weburl'];

        // Save/update user.
        // This will will update your the row in ur db.
        $user->save();

        return view('user.show')->with('user', $user);

    }

}
