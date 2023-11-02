<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductKeluarController;
use App\Http\Controllers\ProductMasukController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
    return view('home',[
        "title" => "home",
        "active" => "home"
    ]);
});

Route::get('/home', function () {
    return view('home', [
        "title" => "Home",
        'active' => 'home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "about",
        'active' => 'about'
    ]);
});

// Route::get('/posts', function () {

//     return view('posts', [
//         "title" => "Posts",
//         'active' => 'posts',
//         "posts" => Post::all()
//     ]);
// });

Route::get('/posts', [PostController::class, 'index']);


// Halaman single
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function(){
    return view('categories',[
        'title' => 'Semua Sub Komponen',
        'active' => 'category',
        'categories' => Category::all()
    ]);
});

Route::get('/categories/{category:slug}', function(Category $category){
    return view('posts',[
        'title' => "Pencatatan dengan Kategori : $category->name",
        'active' => 'category',
        'posts' => $category->posts->load('author', 'category')
        // 'category' => $category->name
    ]);
});

// Route::get('/authors/{author:username}', function(User $author){
//     return view('posts',[
//         'title' => "Pencatatan dibuat oleh : $author->name",
//         'active' => 'author',
//         'posts' => $author->posts->load('author', 'category')
//     ]);
// });



// Route::get('/products', [ProductController::class, 'index']);
// Route::get('/products/{product:slug}', [ProductController::class, 'show']);


// Route::get('/products_masuk', [ProductMasukController::class, 'index']);
// Route::get('/products_masuk/{product_masuk:slug}', [ProductMasukController::class, 'show']);

// Route::get('/products_keluar', [ProductKeluarController::class, 'index']);
// Route::get('/products_keluar/{product_keluar:slug}', [ProductKeluarController::class, 'show']);


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {
    return view ('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth'); 
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::get('/dashboard/posts/approved', [DashboardPostController::class, 'approved'])->middleware('auth');

Route::resource('/dashboard/postingan', AdminPostController::class)->except('show')->middleware('admin');


Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('admin');
Route::resource('/dashboard/categories', AdminCategoryController::class)->middleware('admin');


