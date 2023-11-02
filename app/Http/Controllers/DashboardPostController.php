<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
// use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;



class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
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
        // return $request->file('dokumen')->store('post-dokumen');

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'mak' => 'required|max:255',
            'output' => 'required|max:255',
            'jenis_realisasi' => 'required|max:255',
            'no_dokumen' => 'required',
            // 'nilai_realisasi' => 'required|numeric|between:1,99999999999999',
            'nilai_realisasi' => 'required|numeric|min:1|max:10000000000',
            'tgl_realisasi' => 'required',
            'mekanisme' => 'required|max:255',
            'penyedia' => 'required',
            'dokumen' => 'mimes:doc,docx,pdf,xls,xlsx,ppt,pptx|file|max:2000',
            'status' => [1]
        ]);

        if($request->file('dokumen')) {
            $validatedData['dokumen'] = $request->file('dokumen')->store('post-dokumen');
            // $validatedData['dokumen'] = 'LP'. date('Ymdhis') .'.'. $request->file('dokumen')->store('post-dokumen')->getClientOriginalExtention();
            // $dokumen->move('dokumen/', $nama_dokumen);
        }


        $validatedData ['user_id'] = auth()->user()->id;

        Post::create($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
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
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'mak' => 'required|max:255',
            'output' => 'required|max:255',
            'jenis_realisasi' => 'required|max:255',
            'no_dokumen' => 'required',
            // 'nilai_realisasi' => 'required|numeric|between:1,99999999999999',
            'nilai_realisasi' => 'required|numeric|min:1|max:10000000000',
            'tgl_realisasi' => 'required',
            'mekanisme' => 'required|max:255',
            'penyedia' => 'required',
            'dokumen' => 'mimes:doc,docx,pdf,xls,xlsx,ppt,pptx|file|max:2000'
        ];

        if($request->slug != $post->slug ){
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if($request->file('dokumen')) {
            if($request->oldDokumen) {
                Storage::delete($request->oldDokumen);
            }
            $validatedData['dokumen'] = $request->file('dokumen')->store('post-dokumen');
        }

        $validatedData ['user_id'] = auth()->user()->id;

        Post::where('id', $post->id)
             ->update($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Data berhasil diubah');
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->dokumen) {
            Storage::delete($post->dokumen);
        }

        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('success', 'Data berhasil dihapus');
    }


    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    // public function approved($id) {
    //     try {
    //         Post::where('id', $id)->update([
    //             'status' => 1
    //         ]);
    //         \Session::flash('sukses', 'Berhasil diverifikasi');
    //     } catch (\Throwable $th) {
    //         \Session::flash('gagal', $th->getMessage());
    //     }
    //     return redirect()->back();
    // }
    

}
