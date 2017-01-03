<?php

namespace App\Http\Controllers;

use Mail;
use Auth;
use DCN\RBAC\Models\Role;
use Illuminate\Http\Request;
use App\User;

class AccessManagerController extends Controller
{
    /**
     * Create a new controller instance.
     *
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
        $users = User::get()->where('ability',true);

        return view('/Access_Manage',compact('user','users'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'auth' => 'required|in:user,admin',
        ]);

        $user = User::find($id);
        $user->detachAllRoles();
        $role = (new Role())->where('slug',$request->auth)->first();
        $user->attachRole($role);

        Mail::raw('Dear '.$user->name, function ($m) use ($user,$role) {

            $m->to($user->email)->subject('你的權限被更改為 '.$role->name);
        });

        return redirect('/access_manage');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->ability = false;
        $user->save();

        return redirect('/access_manage');
    }

    public function create(Request $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        $role = Role::where('slug','user')->first();

        $user->attachRole($role);

        return redirect('/access_manage');
    }

}
