<?php

namespace App\Http\Middleware;

use App\Models\BadWord;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FilterBadWords
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the request has a 'comment' field
        if ($request->has('comment')) {
            $comment = $request->input('comment');

            // Get all bad words from the database
            $badWords = BadWord::pluck('title')->toArray();
            // dd($comment);
            // Check if the comment contains any bad words
            foreach ($badWords as $badWord) {
                if (stripos($comment, $badWord) !== false) {
                    return response()->json([
                        'message' => 'Your comment contains inappropriate words.'
                    ], 400);
                }
            }
        }

        return $next($request);
    }
}
