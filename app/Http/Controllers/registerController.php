<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\CreateUser;


class registerController extends Controller
{
    //

    public function registerUser()
    {
        return view('registeruser');
    }

    public function saveUser(createUser $request) 
    {
        $user = new User;
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->description = $request->description;
        $user->save();

        //$finduser= User::where('email', $user->email)->first();
        
        //$id= $finduser->id;
        //return view('/admin/users/{id}', compact('id'));

        return redirect()->back()->with('success', 'User has been added successfully');
    }
}
