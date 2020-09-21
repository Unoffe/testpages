<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function create(CreateCommentRequest $request) {
        $comment = new Comment();
        $comment->text = $request->get('text');
        $comment->active = 1;
        $comment->post_id = $request->get('post_id');
        $comment->user_id = \Auth::id();
        $comment->save();

        return back();
    }
}
