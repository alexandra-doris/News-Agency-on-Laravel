<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Http\Requests\UpdateCategory;
use App\Http\Requests\CreateCategory;

class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createCategory()
    {
        return view('addcategory');
    }

    public function saveCategory(createCategory $request) 
    {
        $cat = new Category;
        $cat->title = $request->title;
        $cat->slug = Str::slug($request->title);
        $cat->description = $request->description;
        if ($request->file('image')!=NULL && $request->file('image')->isValid())
        {
            $cat->image = $request->image->store('public/images/categories');
            $cat->image = substr($cat->image, strlen('public/'));
        } else  $cat->image='images/categories/default-cat.png';
    
        $cat->save();

        return redirect()->back()->with('success', 'Category has been added successfully');
    }

    public function showCategories()
    {
        $cats = Category::simplepaginate(10);
        return view('allcategories', compact('cats'));
    }

    public function viewCategory($id)
    {
        $cat = Category::findOrFail($id);

        return view('viewcategory', compact('cat'));
    }

    public function updateCategory(updateCategory $request, $id) //update Category
    {
        //$request->validate([
        //    'title' => 'required|unique:categories,title'.$request->id,
        //    'slug' => 'required|unique:categories,slug'.$request->id,
        //]);

        $cat = Category::findOrFail($id);

        $cat->title = $request->title;
        $cat->slug = $cat->slug;
        $cat->description = $request->description;
        if ($request->file('image')!=NULL)
        if ($request->file('image')->isValid()){
            if(strcmp($cat->image, "images/categories/default-cat.png")!==0)
                Storage::delete('public/'.$cat->image);
            $cat->image = $request->image->store('public/images/cat');
            $cat->image = substr($cat->image, strlen('public/'));
        }

        $cat->save();
        return redirect()->back()->with('success', 'Category has been updated successfuly.');

    }

    public function deleteCategory(Request $request, $id)
    {
        $cat= Category::findOrFail($id);
        if(strcmp($cat->image, "images/categories/default-cat.png")!==0)
            Storage::delete('public/'.$cat->image);
        //delete all posts
        $posts= Post::where('category_id', $cat->id)->simplepaginate(10);
        foreach($posts as $post){
            if(strcmp($post->image, "images/posts/default-post.png")!==0)
                Storage::delete('public/'.$post->image);
            $post->delete();
        }
        
        $cat->delete();

        

        return redirect('/admin/category')->with('success', 'Category was deleted successfully.');
    }

}
