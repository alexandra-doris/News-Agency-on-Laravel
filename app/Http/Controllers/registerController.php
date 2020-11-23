<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\CreateUser;
use App\Http\Requests\UpdateUser;

class registerController extends Controller
{
    //

    public function registerUser()
    {
        return view('registeruser');
    }

    public function registerUserAdmin()
    {
        return view('adduser');
    }

    public function saveUser(createUser $request) 
    {
        $user = new User;
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->description = $request->description;
        if ($request->file('image')!=NULL && $request->file('image')->isValid())
        {
            $user->image = $request->image->store('public/images/users');
            $user->image = substr($user->image, strlen('public/'));
        } else  $user->image='images/users/default-avatar.png';
        if($request->admin!=NULL)
            $user->admin = $request->admin;
        else $user->admin = 0;
        $user->save();

        //$finduser= User::where('email', $user->email)->first();
        
        //$id= $finduser->id;
        //return view('/admin/users/{id}', compact('id'));

        return redirect()->back()->with('success', 'User has been added successfully');
    }
}
