<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MessageController;
use App\Models\Category;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Message;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('home', [
        'articles' => Article::latest()->take(10)->with('category')->get()
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        "articlesCount" => Article::count(),
        "visitsCount" => Article::sum('visits'),
        "commentsCount" => Comment::count(),
        "categoriesCount" => Category::count(),
        "categoriesStatistics" => DB::table('articles')
            ->join('categories', 'articles.category_id', '=', 'categories.id')
            ->select(DB::raw('categories.name as category, count(*) as count'))
            ->groupBy('categories.name')
            ->get(),
        "commentsStatuses" => DB::table('comments')
            ->select(DB::raw('status, count(*) as count'))
            ->groupBy('status')
            ->get(),
    ]);
})->middleware(['auth'])->name('dashboard');


Route::get('/notifications', function () {
    return view('notifications', [
        "comments" => Comment::where('status', 'Pending Approval')->latest()->paginate(10),
        "messages" => Message::all(),
    ]);
})->middleware(['auth'])->name('notifications');

Route::get('/manage/news', function () {
    return view('manage_news', [
        "articles" => Article::with(['category', 'user'])->latest()->paginate(10),
    ]);
})->middleware(['auth'])->name('manage_news');

Route::get('/manage/comments', function () {
    return view('manage_comments', [
        "comments" => Comment::where('status', '!=', 'Pending Approval')->latest()->paginate(10)
    ]);
})->middleware(['auth'])->name('manage_comments');

Route::get('/manage/categories', function () {
    return view('manage_categories', [
        "categories" => Category::latest()->paginate(10)
    ]);
})->middleware(['auth'])->name('manage_categories');

Route::get('/about', fn () => view('about'));
Route::get('/contact', fn () => view('contact'));
Route::get('/article/all', [ArticleController::class, 'search']);
Route::get('/dashboard/comment/{comment}/show', [CommentController::class, 'visible']);
Route::get('/dashboard/comment/{comment}/hide', [CommentController::class, 'hidden']);
Route::get('/dashboard/comment/{comment}/remove', [CommentController::class, 'remove']);

Route::resource('/article', ArticleController::class);
Route::resource('/article/{article}/comment', CommentController::class);
Route::resource('/category', CategoryController::class);
Route::resource('/message', MessageController::class);
require __DIR__ . '/auth.php';
