
@extends('layouts.main')

@section('container')

<h3 class="mb-4 text-center">{{ $title }}</h3>


 <div class="row justify-content-center">
  <div class="col-md-6">
    <form action="/posts">
        @if(request('category'))
        <input type="hidden" name="category" value="{{ request('category') }}">
        @endif

        @if(request('author'))
        <input type="hidden" name="author" value="{{ request('author') }}">
        @endif
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Pencarian" name="search" value="{{ request('search') }}">
        <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
      </div>
    </form>
  </div>
 </div>  

 @if ($posts->count())
<div class="table-responsive col-lg-12 mb-4">
    <!-- <a href="/dashboard/posts/create" class= "btn btn-primary mb-3">Create New Post</a> -->
        <table class="table table-striped table-sm-8">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Kegiatan / Belanja Barang</th>
              <th scope="col">Tanggal Realisasi</th>
              <th scope="col">Nilai Realisasi</th>
              <th scope="col">Sub Output</th>
              <th scope="col">Dibuat oleh</th>
              <th scope="col">Tgl Input</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $index => $post)
            <tr>
              <!-- <td>{{ $loop->iteration }}</td> -->
              <td>{{ $index + $posts ->firstItem() }}</td>
              <td>{{ $post->title }}</td>
              <td>{{ $post->tgl_realisasi }}</td>
              <td>Rp. {{ number_format($post->nilai_realisasi) }} </td>
              <td><a class="text-decoration-none" href="/posts?category={{ $post->category->slug}}">{{ $post->category->name}}</a></td>
              <td><a class="text-decoration-none" href="/posts?author={{ $post->author->username }}"> {{ $post->author->name }} </a></td>
              <td>{{ $post->created_at }}</td>
              <td class="inline-block">
              <!-- <a class="text-decoration-none" href="/posts/{{$post->slug }}">Lihat Detail</a> -->
                <!-- <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/posts/{{ $post->slug}}" method="post" class="d-inline">
                  @method('delete') -->
                  @csrf
                  <!-- <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button> -->
                <!-- </form> -->
                <a href="/posts/{{ $post->slug }}" class="badge bg-info">Lihat<span data-feather="eye"></span></a>
                <!-- <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit">Edit</span></a>
                  <form action="/dashboard/posts/{{ $post->slug }}" method="post">
                  <button class="badge bg-danger border-0 d-block" onclick="return confirm('Apakah Anda Yakin?')"><span data-feather="x-circle">Delete</span></button>
                  @method('delete') -->
                  @csrf
                  </form>
              </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

<!-- <table class="table">
  <thead>
    <tr class="text-center">
      <th scope="col">#</th>
      <th scope="col">Uraian Pekerjaan</th>
      <th scope="col">MAK</th>
      <th scope="col">Output/SubOutput</th>
      <th scope="col">Jenis Realisasi</th>
      <th scope="col">No Dokumen</th>
      <th scope="col">Nilai Realisasi</th>
      <th scope="col">Tgl Realisasi</th>
      <th scope="col">Mekanisme Bayar</th>
      <th scope="col">Penyedia</th>
      <th scope="col">File Dokumen</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      
      <td><a class="text-decoration-none" href="/posts/{{ $post->slug }} ">{{ $post->title }}</a></td>
      
      <td>{{ $post->mak }}</td>
      <td>{{ $post->output }}</td>
      <td>{{ $post->jenis_realisasi }}</td>
      <td>{{ $post->no_dokumen }}</td>
      <td>{{ $post->nilai_realisasi }}</td>
      <td>{{ $post->tgl_realisasi }}</td>
      <td>{{ $post->mekanisme }}</td>
      <td>{{ $post->penyedia }}</td>
    </tr>
    
  </tbody>
</table> -->

@else 
  <p class="text-center fs-4">Pencatatan Tidak Ditemukan</p> 
@endif 


      <!-- pagination menampilkan halaman -->
      <div class="d-flex justify-content-end mb-5">
      {{ $posts->links() }}
      </div>

@endsection