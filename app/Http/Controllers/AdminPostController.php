<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(!auth()->check() || auth()->user()->username !== 'fajrin') {
        //     abort(403);
        // }

        // if(auth()->user()->username !== 'fajrin') {
        //     abort(403);
        // }


        $title = '';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' dalam ' . $category->name;
        }
       
        if(request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' oleh ' . $author->name;
        }

        return view('dashboard.postingan.index',[
            "title" => 'Semua Pencatatan Keuangan' . $title,
            "active" => "postingan",
            // "posts" => Post::all()
            "posts" => Post::latest()->filter(request(['search','category', 'author']))->paginate(25)->withQueryString()
        ]);


        // return view('dashboard.postingan.index',[
        //     'posts' => Post::all(),
            
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $title = '';
        // if(request('category')) {
        //     $category = Category::firstWhere('slug', request('category'));
        //     $title = ' dalam ' . $category->name;
        // }
       
        // if(request('author')) {
        //     $author = User::firstWhere('username', request('author'));
        //     $title = ' oleh ' . $author->name;
        // }

        // return view('dashboard.postingan.show',[
        //     "title" => 'Semua Pencatatan' . $title,
        //     "active" => "postingan",
        //     // "posts" => Post::all()
        //     "posts" => Post::latest()->filter(request(['search','category', 'author']))->paginate(15)->withQueryString()
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
