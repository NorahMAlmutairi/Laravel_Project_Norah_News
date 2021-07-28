<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Article;
use Carbon\Carbon;
use Database\Seeders\CategorySeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'search']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('all_articles', [
            'articles' => Article::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_article', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article($request->all());
        $article->user_id = Auth::user()->id;
        $article->published_at = Carbon::now();
        if ($request->file('thumbnail_file') !== null) {
            $allowedMimeTypes = ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/svg+xml'];
            if (in_array($request->file('thumbnail_file')->getMimeType(), $allowedMimeTypes)) {
                $article->thumbnail = str_replace('public/', 'storage/', $request->file('thumbnail_file')->store('public/thumbnails'));
            } else {
                return response('Supported thumbnail formats are: png, jpeg/jpg, gif, bmp, and svg', 409);
            }
        }
        $article->save();
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article->visits++;
        $article->save();
        return view('article', [
            'article' => $article->load(['user', 'category'])
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('edit_article', [
            'categories' => Category::all(),
            'article' => $article->load('category')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $newArticle = new Article($request->all());
        $article->title = $newArticle->title;
        $article->category_id = $newArticle->category_id;
        $article->content = $newArticle->content;
        if ($request->file('thumbnail_file') !== null) {
            $allowedMimeTypes = ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/svg+xml'];
            if (in_array($request->file('thumbnail_file')->getMimeType(), $allowedMimeTypes)) {
                $article->thumbnail = str_replace('public/', 'storage/', $request->file('thumbnail_file')->store('public/thumbnails'));
            } else {
                return response('Supported thumbnail formats are: png, jpeg/jpg, gif, bmp, and svg', 409);
            }
        }
        $article->save();
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return back();
    }

    public function search(Request $request)
    {
        $params = $request->all();
        $articles = Article::latest('articles.created_at');
        if (array_key_exists('search', $params) && $params['search'] !== null) {
            $articles = $articles->where('title', 'like', '%' . $params['search'] . '%');
        } else {
            if (array_key_exists('adv-search', $params) && $params['adv-search'] !== null) {
                $articles = $articles
                    ->join('users', 'users.id', '=', 'articles.user_id')
                    ->where('articles.title', 'like', '%' . $params['adv-search'] . '%')
                    ->orWhere('articles.content', 'like', '%' . $params['adv-search'] . '%')
                    ->orWhere('users.name', 'like', '%' . $params['adv-search'] . '%');
            }
            if (array_key_exists('category', $params) && $params['category'] !== null && is_array($params['category'])) {
                $articles = $articles->whereIn('category_id', $params['category']);
            }
            if (array_key_exists('from', $params) && $params['from'] !== null) {
                $articles = $articles->whereDate('published_at', '>=', Carbon::parse($params['from']));
            }
            if (array_key_exists('to', $params) && $params['to'] !== null) {
                $articles = $articles->whereDate('published_at', '<=', Carbon::parse($params['to']));
            }
        }
        return view('all_articles', [
            'articles' => $articles->paginate(12),
            'categories' => Category::all()
        ]);
    }
}
