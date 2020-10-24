<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function showUsers()
    {
        $title = 'Admin page';

        $users= User::get();

        return view('admin', compact('title', 'users'));
    }

    public function getUser($id)
    {
        $title = 'User:';

        $user= User::findOrFail($id);

        return view('users', compact('title', 'user'));
    }

    public function registerUser()
    {
        return view('registeruser');
    }

    public function saveUser(Request $request)
    {
        $user = new User;
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->description = $request->description;
        $user->save();

        //$finduser= User::where('email', $user->email)->first();
        
        //$id= $finduser->id;
        //return view('/admin/users/{id}', compact('id'));

        return redirect()->back()->with('success', 'User has been added successfully');
    }
}
