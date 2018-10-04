<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $categories = Category::orderBy('name','asc')->get();
        $posts      = Post::latest()->paginate(10);

        return view('blogs.posts.index', compact('posts','categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|unique:posts|max:250',
            'content'       => 'required',
            'short_content' => 'required',
            'status'        => 'required|boolean',
            'published_on'  => 'required|date',
            'image'         => 'required|image'
        ]);

        if ($request->hasFile('image')) {

          $imageName = 'post-'.time().'.'.$request->image->getClientOriginalExtension();
          $request->image->move(public_path('images'), $imageName);
        }

        $post = Post::create([
          'title'           => $request->title,
          'slug'            => str_slug($request->title),
          'content'         => $request->content,
          'short_content'   => $request->short_content,
          'status'          => $request->status,
          'published_on'    => $request->published_on,
          'image'           => $imageName,
          'meta_title'      => $request->meta_title,
          'meta_keywords'   => $request->meta_keywords,
          'meta_description'=> $request->meta_description,
        ]);

        $post->categories()->attach($request->category);

        return back()->with('success', 'Post added successfully.');
    }


    public function show(Post $post)
    {
        //
    }


    public function edit(Post $post)
    {
        //
    }


    public function update(Request $request, Post $post)
    {
        //
    }


    public function destroy(Post $post)
    {
        //
    }
}
