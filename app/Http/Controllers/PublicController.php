<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PublicController extends Controller
{
    //category
    public function viewCategory($slug)
    {
        $cat = Category::where('slug', $slug)->first();
        if($cat){
            $posts_cat = Post::where('category_id', $cat->id)->where('status', 1)->orderBy('created_at', 'DESC')->simplepaginate(10);
            return view('category', compact('cat', 'posts_cat'));
        }
        return view('home');
    }

    //user
    public function viewUser($id)
    {
        $user = User::findOrFail($id);

        return view('viewUser', compact('user'));
    }

    //post
    public function viewPost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        if($post->status==1 || Auth::check()){
            $user = User::findOrFail($post->posted_by);
            $cat = Category::findOrFail($post->category_id);
            $post->views = $post->views+1;
            $post->save();
            return view('post', compact('post', 'cat', 'user'));
        }
        return redirect()->route('home');
    }
}
