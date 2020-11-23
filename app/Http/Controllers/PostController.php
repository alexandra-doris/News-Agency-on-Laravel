<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\UpdatePost;
use App\Http\Requests\CreatePost;

class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createPost()
    {
        $cats = Category::all();
        return view('addpost', compact('cats'));
    }

    public function savePost(createPost $request) 
    {
        $post = new Post;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->subtitle = $request->subtitle;
        $post->body = $request->body;
        if ($request->file('image')!=NULL && $request->file('image')->isValid())
        {
            $post->image = $request->image->store('public/images/posts');
            $post->image = substr($post->image, strlen('public/'));
        } else  $post->image='images/posts/default-post.png';
        $post->posted_by=Auth::id();
        if($request->status!=NULL)
            $post->status=$request->status;
        else $post->status=0;
        $post->category_id=$request->category_id;
    
        $post->save();

        return redirect()->back()->with('success', 'Post has been added successfully');
    }

    public function showPosts()
    {
        $posts = Post::orderBy('status', 'ASC')->orderBy('created_at', 'DESC')->simplepaginate(10); //sort by date posted and by status
        return view('allposts', compact('posts'));
    }

    public function viewPost($id)
    {
        $post = Post::findOrFail($id);
        $cats = Category::all();

        return view('viewpost', compact('post', 'cats'));
    }

    public function updatePost(updatePost $request, $id) //update Category
    {
        $post = Post::findOrFail($id);

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->subtitle = $request->subtitle;
        $post->body = $request->body;
        if ($request->file('image')!=NULL)
        if ($request->file('image')->isValid()){
            if(strcmp($post->image, "images/posts/default-post.png")!==0)
                Storage::delete('public/'.$post->image);
            $post->image = $request->image->store('public/images/posts');
            $post->image = substr($post->image, strlen('public/'));
        }
        $post->posted_by=$request->posted_by;
        $post->status=$request->status;
        $post->category_id=$request->category_id;

        $post->save();
        return redirect()->back()->with('success', 'Post has been updated successfuly.');

    }

    public function deletePost(Request $request, $id)
    {
        $post= Post::findOrFail($id);
        if(strcmp($post->image, "images/posts/default-post.png")!==0)
            Storage::delete('public/'.$post->image);
        $post->delete();

        return redirect('/admin/post')->with('success', 'Post was deleted successfully.');
    }

}
