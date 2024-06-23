<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|string',
            'commentable_id' => 'required|integer',
            'commentable_type' => 'required|string',
        ]);

        $comment = new Comment([
            'body' => $request->body,
            'user_id' => Auth::id(),
        ]);

        $commentable = $request->commentable_type::find($request->commentable_id);
        $commentable->comments()->save($comment);

        return back();
    }
}
