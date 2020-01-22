<?php

namespace App\Http\Controllers;

use App\Event;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Event $event)
    {
        $validateData = $request->validate([
            'comment' => 'min:5|max:500|required',
        ]);

        $commentData = array_merge($validateData, ['user_id' => auth()->id()]);
        $event->comments()->create($commentData);

        return back()->with('success', 'You have successfully posted a comment!');
    }

    public function destroy($commentId)
    {
        $comment = Comment::where('id', $commentId)->first();

        if ($comment != null) {
            $comment->delete();
            return back()->with('success', 'You have successfully deleted your comment!');
        }

        return back()->with('error', 'You can\'t delete your comment!');
    }
}
