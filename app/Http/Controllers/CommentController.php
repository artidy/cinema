<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCommentRequest;
use App\Http\Responses\PaginatedResponse;
use App\Models\Comment;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Film $film
     * @return Response
     */
    public function index(Film $film): Response
    {
        return $this->success([
            'count' => $film->comments_count,
            'comments' => $film->comments(),
        ]);
    }

    public function addComment(AddCommentRequest $comment, Film $film): Response
    {
        return $this->success($film->comments()->create([
            'text' => $comment->text,
            'rating' => $comment->rating,
            'user_id' => Auth::id(),
        ]));
    }

    public function deleteComment(Comment $comment): Response
    {
        return $this->success($comment->delete());
    }
}
