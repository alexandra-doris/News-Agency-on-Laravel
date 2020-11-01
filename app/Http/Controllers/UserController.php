<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\UpdateUser;
use App\Http\Requests\CreateUser;


class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showUser()
    {
        $title = 'Admin page';

        $users= User::get();

        return view('admin', compact('title', 'users'));
    }

    public function viewUser($id)
    {
        $user = User::findOrFail($id);

        return view('viewUser', compact('user'));
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

    public function saveUser(createUser $request) //update User
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

    public function updateUser(UpdateUser $request, $id)
    {
        $user = User::findOrFail($id);

        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->description = $request->description;

        $user->save();
        return redirect()->back()->with('success', 'User has been updated successfuly.');

    }

    public function deleteUser(Request $request, $id)
    {
        $request->validate([
            'userid'=>'required'
        ]);
        
        if($id == $request->userid)
        {
            $user= User::findOrFail($id);
            $user->delete();

            return redirect('/admin');
        }
        return redirect()->back()->with('danger', 'User cannot be deleted, ID is not a match.');
    }

    public function showUsers()
    {
        $users = User::paginate(10);
        return view('allusers', compact('users'));
    }
}
