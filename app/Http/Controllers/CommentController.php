<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['update', 'destroy', 'visible', 'hidden', 'remove']);
    }
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function index(Article $article)
    {
        return $article->comments;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Article $article)
    {
        $comment = new Comment($request->all());
        $comment->author = trim($comment->author);
        $comment->content = trim($comment->content);
        $comment->article_id = $article->id;
        if (empty($comment->content)) {
            return response('Content field is empty', 400);
        } else if (empty($comment->author)) {
            return response('Author field is empty', 400);
        } else {
            $comment->save();
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article, Comment $comment)
    {
        return $comment;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article, Comment $comment)
    {
        $newComment = new Comment($request->all());
        $newComment->content = trim($newComment->content);
        if (empty($newComment->content)) {
            return response('Content field is empty', 400);
        } else if ($comment->content == $newComment->content) {
        } else {
            $comment->content = $newComment->content;
            $comment->save();
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article, Comment $comment)
    {
        $comment->delete();
        return back();
    }

    public function visible(Comment $comment)
    {
        $comment->status = 'Visible';
        $comment->save();
        return back();
    }

    public function hidden(Comment $comment)
    {
        $comment->status = 'Hidden';
        $comment->save();
        return back();
    }

    public function remove(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
