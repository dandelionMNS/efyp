<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view("admin.user_index", compact("users"));
    }

    public function addPage()
    {
        return view("admin.user_add");
    }

    public function add(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->phone_no = $request->input('phone_no');
        $user->role = $request->input('role');
        $user->faculty = $request->input('faculty');
        $user->save();

        $users = User::all();

        return redirect()->route('admin.user.index', ['users' => $users]);
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if($request->input('password') != null){
            $user->password = $request->input('password');
        }
        $user->phone_no = $request->input('phone_no');
        $user->role = $request->input('role');
        $user->faculty = $request->input('faculty');
        $user->save();

        $users = User::all();

        return redirect()->route('admin.user.index', ['users' => $users]);
    }

    public function userDetails($id)
    {
        $user = User::findOrFail($id);
        return view("admin.user_details", compact("user"));
    }
    public function userDelete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user.index');

    }

}
