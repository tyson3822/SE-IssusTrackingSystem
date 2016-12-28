<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
       return view('/Setting',compact('user'));
    }


    public function update(Request $request)
    {      
        print_r($request->name);

        $this->validate($request,[
            'name' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->password = $request->password;
        $user->save();

        flash('Your account has been updated!');
        
        return back();
    }

}
