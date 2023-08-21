<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home.index');
});



Route::get('/teste2', function () {
    return [
        "route" => "teste2"
    ];
})->name("teste2");

Route::get('/dashboard', function () {
    $categories = Category::all()->count();
    $articles = Article::all()->count();
    $comments = Comment::all()->count();

    return view('dashboard', [
        'categories' => $categories,
        'articles' => $articles,
        'comments' => $comments,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(UserController::class)->prefix('users')->group(function () {
        Route::get('/', 'index')->name('users.index');
        Route::get('/edit/{id}', 'edit')->name('users.edit');
        Route::put('/', 'update')->name('users.update');
    });

    Route::controller(CategoryController::class)->prefix('categories')->group(function () {
        Route::get('/', 'index')->name('categories.index');
        Route::post('/', 'store')->name('categeries.create');
    });

    Route::controller(ArticleController::class)->prefix('articles')->group(function () {
        Route::get('/', 'index')->name('articles.index');
        Route::get('/show/{id}', 'show')->name('articles.show');
    });

});

require __DIR__.'/auth.php';
