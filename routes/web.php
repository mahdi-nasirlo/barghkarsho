<?php

use App\Http\Controllers\articleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use App\Http\Livewire\Cart\Cart;
use App\Http\Livewire\Cart\CartAddress;
use App\Http\Livewire\Profile\Profile;
use App\Models\Order;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Shop\Course;
use App\Models\Shop\DiscountItem;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Jackiedo\Cart\Facades\Cart as CartCart;
use Jackiedo\Cart\Facades\Cart as FacadesCart;
use League\OAuth1\Client\Server\Server;
use Jackiedo\Cart\Facades\Cart as CartShop;


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

    return view('welcome', ['posts' => $post]);
})->name('home');

Route::get("/cart", Cart::class)->name("cart.");
Route::get("/cart/order/{order}", [CartController::class, "paymentPage"])->name("cart.address")->middleware("auth");

Route::get('profile', Profile::class)->middleware('auth')->name("profile");

// Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name("auth.google");
// Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);

Route::get('/article/{post:slug}', [articleController::class, 'show'])->name('article.single');
Route::get('/articles/category/{category:slug}', [articleController::class, 'list'])->name('article.list');

Route::get('/course/{course:slug}', [CourseController::class, 'show'])->name('cours.single');


Route::post('/comment/stor', [articleController::class, 'storComment'])->name('comment.stor');

Route::get('/service', [ServiceController::class, 'index'])->name('service');
Route::post('/service', [ServiceController::class, 'sort'])->name('service.sort');

Route::get('/payment/order/{order}', [CartController::class, 'payment'])->name('payment');
Route::get('/payment/callback', [CartController::class, 'callback'])->name('payment.callback');

Route::get('/page/{page:slug}', [PageController::class, "index"])->name("pages");
