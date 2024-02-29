<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment=Comment::create([
            'user_id'=>auth()->id(),
            'post_id'=>$request->post_id,
            'body'=>$request->body
        ]);
        return redirect()->back();
    }
}
