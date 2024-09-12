<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;
use Illuminate\View\View;
use App\Models\Post;
use App\Models\user;
use App\Models\comment;

class CommentController extends Controller
{
    public function index()
    {
      $comments=Comment::where('user_id',auth()->user()->id)->get();
      return view('comment',['comments'=>$comments]);
    }

    public function create(Post $post)
    {
        return view('comment.create',['post'=>$post]);
        
    }

    public function store(Request $request)
    {
      $request->validate([
        'comment'=>'required'
    ]);

    Comment::create(
    [
        'comment'=>$request->comment,
        'user_id'=>auth()->user()->id,
        //'post_id'=>$request->post_id
    ]);

   
    }

    public function edit(Comment $comment)
    {
        return view('comment.edit',['comment'=>$comment]);
    }

    public function Update(Request $request,Comment $comment)
    {
        $data=$request->validate([
            'comment' => 'required'
        ]);

        $comment->update($data);
        return redirect()->to('/comment');
    }

    public function Delete(Comment $comment)
    {
        return view('comment.delete',['comment'=>$comment]);
    }

    public function Destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->to('/comment');
    }

}