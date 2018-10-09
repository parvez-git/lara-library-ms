<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $categories = Category::orderBy('name','asc')->get();

        if(Auth::user()->role_id == 3){
            $posts = Post::with(['user','categories'])->where('user_id',Auth::id())->latest()->paginate(10);
        }else{
            $posts = Post::with(['user','categories'])->latest()->paginate(10);
        }

        return view('blogs.posts.index', compact('posts','categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|unique:posts|max:250',
            'content'       => 'required',
            'short_content' => 'max:500',
            'status'        => 'required|boolean',
            'published_on'  => 'required|date',
            'image'         => 'required|image'
        ]);

        if ($request->hasFile('image')) {

          $imageName = 'post-'.time().'.'.$request->image->getClientOriginalExtension();
          $request->image->move(public_path('images'), $imageName);
        }

        if (Auth::user()->role_id == 3) {
            $status = 0;
        }else{
            $status = $request->status;
        }

        $post = Post::create([
          'title'           => $request->title,
          'slug'            => str_slug($request->title),
          'content'         => $request->content,
          'short_content'   => $request->short_content,
          'status'          => $status,
          'published_on'    => $request->published_on,
          'image'           => $imageName,
          'user_id'         => Auth::id(),
          'meta_title'      => $request->meta_title,
          'meta_keywords'   => $request->meta_keywords,
          'meta_description'=> $request->meta_description,
        ]);

        $post->categories()->attach($request->category);

        return back()->with('success', 'Post added successfully.');
    }


    public function show(Post $post)
    {
        $post = Post::with('categories')->findOrFail($post->id);
        return response()->json(['post' => $post]);
    }


    public function edit(Post $post)
    {
        $post = Post::with('categories')->findOrFail($post->id);
        return response()->json(['post' => $post]);
    }


    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'         => 'required|max:250',
            'content'       => 'required',
            'short_content' => 'max:500',
            'status'        => 'required|boolean',
            'published_on'  => 'required|date',
            'image'         => 'image'
        ]);

        $post = Post::findOrFail($post->id);

        if ($request->hasFile('image')) {

            if(file_exists(public_path('images/') . $post->image)){
                unlink(public_path('images/') . $post->image);
            }
            $imageName = 'post-'.time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);

        } else {
          $imageName = $post->image;
        }

        if (Auth::user()->role_id == 3) {
            $status = 0;
        }else{
            $status = $request->status;
        }

        $post->update([
          'title'           => $request->title,
          'slug'            => str_slug($request->title),
          'content'         => $request->content,
          'short_content'   => $request->short_content,
          'status'          => $status,
          'published_on'    => $request->published_on,
          'image'           => $imageName,
          'user_id'         => $post->user_id,
          'meta_title'      => $request->meta_title,
          'meta_keywords'   => $request->meta_keywords,
          'meta_description'=> $request->meta_description,
        ]);

        $post->categories()->sync($request->category);

        return back()->with('success', 'Post updated successfully.');
    }


    public function destroy(Post $post)
    {
        $post = Post::findOrFail($post->id);

        if(file_exists(public_path('images/') . $post->image)){
          unlink(public_path('images/') . $post->image);
        }

        $post->categories()->detach();
        $post->delete();

        return response()->json(['post' => 'deleted']);
    }
}
