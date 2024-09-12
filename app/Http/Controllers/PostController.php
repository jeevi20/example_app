<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\user;

class PostController extends Controller
{
    public function index()
    {
        $posts = post::where('user_id',auth()->user()->id)->get();
        return view('dashboard', compact('posts'));
    }
     
    //Create form
    public function create()
    {
        return view('post.add');
    }

    //Store a newly created Post
    public function store(Request $request)
    {   
        $request->validate([
            'title'=> 'required',
            'content'=> 'required'
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id
        ]);
        return redirect()-> route('dashboard');
    }

    //edit the post
    public function edit(post $post)
    {
        return view('post.edit', compact('post'));
    }

    //update the post
    public function update(Post $post,Request $request)
    {   
       
       $data = $request->validate([
            'title'=> 'required',
            'content'=> 'required'
        ]);

        $post->update($data);
         
        return redirect()-> route('dashboard');
    }
    //Delete Post
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('dashboard');
    }
}
