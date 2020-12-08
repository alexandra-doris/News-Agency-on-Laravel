<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


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

    public function updateUser(UpdateUser $request, $id) //update User
    {
        $user = User::findOrFail($id);

        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->description = $request->description;
        if($request->admin)
            $user->admin = $request->admin;
        if ($request->file('image')!=NULL)
        if ($request->file('image')->isValid()){
            if(strcmp($user->image, "images/users/default-avatar.png")!==0)
                Storage::delete('public/'.$user->image);
            $user->image = $request->image->store('public/images/users');
            $user->image = substr($user->image, strlen('public/'));
        }

        $user->save();
        return redirect()->back()->with('success', 'User has been updated successfuly.');

    }

    public function deleteUser(Request $request, $id)
    {
        //$request->validate([
        //    'userid'=>'required'
        //]);
        
        
        $user= User::findOrFail($id);
        if(strcmp($user->image, "images/users/default-avatar.png")!==0)
            Storage::delete('public/'.$user->image);

        //delete all posts
        $posts= Post::where('posted_by', $user->id)->simplepaginate(10);
        foreach($posts as $post){
            if(strcmp($post->image, "images/posts/default-post.png")!==0)
                Storage::delete('public/'.$post->image);
            $post->delete();
        }
        
        $user->delete();

        return redirect('/admin')->with('success', 'User was deleted successfully.');
        //}
        //return redirect()->back()->with('danger', 'User cannot be deleted, ID is not a match.');
    }

    public function showUsers()
    {
        if(Auth::check()){
            $users = User::simplepaginate(10);
            return view('allusers', compact('users'));
        }
        return redirect()->route('home');

        //$users = DB::table('users')->simplepaginate(15);
        //return view('allusers', ['users' => $users]);
    }

}
