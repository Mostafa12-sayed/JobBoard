<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index($jobId)
    {
        // dd($jobId);
        $job = Job::with([
            'comments' => function ($query) {
                $query->with(['user']);
            }
        ])->findOrFail($jobId);
        $job->comments->each(function ($comment) {
            $comment->replies = $comment->replies ?? collect(); // تأكد من أن replies لا تكون null
        });

        // dd($job->comments);
        return response()->json($job->comments);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'comment' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        $comment = Comment::with('user')->create([
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'parent_id' => $request->parent_id,
            'commentable_id' => $request->commentable_id,
            'commentable_type' => 'App\\Models\\Job',
        ]);

        return response()->json($comment->load('user', 'replies.user'));
    }
}
