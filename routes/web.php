<?php

use App\Http\Controllers\articleController;
use App\Http\Controllers\CourseController;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;

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
    $post = App\Models\Blog\Post::latest()->get()->where('published_at', '<', now())->take(4);



    // dd(config(');

    return view('welcome', ['posts' => $post]);
});


Route::get('profile', function () {
    return view('welcome');
})->name("profile");

// Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name("auth.google");
// Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);

Route::get('/article/{post:slug}', [articleController::class, 'show'])->name('article.single');
Route::get('/articles/category/{category:slug}', [articleController::class, 'list'])->name('article.list');

Route::get('/course/{course:slug}', [CourseController::class, 'show'])->name('cours.single');


Route::post('/comment/stor', [articleController::class, 'storComment'])->name('comment.stor');
