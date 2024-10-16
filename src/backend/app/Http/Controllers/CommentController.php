<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\StoreCommentRequest;
use App\Http\Requests\Comment\UpdateCommentRequest;
use App\Http\Resources\Comment\CommentCollection;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Comment;
use App\Models\Question;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    public function index(Question $question): JsonResponse
    {
        $comments = $question->comments()->with('replies')->orderBy('created_at', 'asc')->get();

        return response()->json(new CommentCollection($comments), 200);
    }

    public function store(StoreCommentRequest $request, Question $question): JsonResponse
    {
        $validated = $request->validated();

        $comment = $question->comments()->create($validated);

        return response()->json(new CommentResource($comment), 201);
    }

    public function update(UpdateCommentRequest $request, Question $question, Comment $comment): JsonResponse
    {
        $validated = $request->validated();

        $comment->update($validated);

        return response()->json(new CommentResource($comment), 200);
    }

    public function destroy(Question $question, Comment $comment): JsonResponse
    {
        $comment->delete();

        return response()->json(200);
    }
}
