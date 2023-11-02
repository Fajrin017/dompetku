<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class PostController extends Controller
{
    public function index() {
        
        $title = '';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' dalam ' . $category->name;
        }
       
        if(request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' oleh ' . $author->name;
        }

        return view('posts',[
            "title" => 'Semua Pencatatan' . $title,
            "active" => "posts",
            // "posts" => Post::all()
            "posts" => Post::latest()->filter(request(['search','category', 'author']))->paginate(15)->withQueryString()
        ]);
    }

    public function show(Post $post) {
        return view('post',[
            "title" => "Single Post",
            "active" => "post",
            "post" => $post
        ]);          
    }

}
