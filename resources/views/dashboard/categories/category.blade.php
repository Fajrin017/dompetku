@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pencatatan : {{ $category->name }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
          <h5 style="color:blue;">Jumlah data telah diinput : {{ $posts->count() }}</h5>
            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->
          </div>
          <!-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
          </button> -->
        </div>
      </div>

      
      
      

      @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
        {{ session ('success') }}
        </div>
      @endif

      @php
        $total = 0;
      @endphp
      <div class="table-responsive col-lg-12">
      <!-- <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Tambah Data</a> -->
        <table class="table table-striped table-sm mb-5">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Uraian Kegiatan / Belanja</th>
              <th scope="col">Tgl Realisasi</th>
              <th scope="col">Sub Output</th>
              <th scope="col">Nilai Realisasi</th>
              <th scope="col">Tgl Input</th>
              <th scope="col">Aksi</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post )             
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $post->title }}</td>
              <td>{{ $post->tgl_realisasi }}</td>
              <td><a class="text-decoration-none" href="/dashboard/posts?category={{ $post->category->slug}}">{{ $post->category->name}}</a></td>
              <!-- <td>{{ $post->category->name }}</td> -->
              <!-- <td>{{ $post->nilai_realisasi }}</td> -->
              <td>@currency($post->nilai_realisasi)</td>
              <td>{{ $post->created_at }}</td>
              <td>
                <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
              <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                <button class="badge bg-danger border-0" onclick="return confirm('Apakah Anda Yakin?')"><span data-feather="x-circle"></span></button>
                @method('delete')
                @csrf
              </form>
                <a href="#" ></a>
              </td>
            </tr>
              @php
                $total += ($post->nilai_realisasi );
              @endphp
            @endforeach


            <tr>
              <td colspan="4"><b>TOTAL REALISASI</b></td>
              <td><b>Rp. {{ number_format($total) }}</b></td>
              <td colspan="2"></td>
            </tr>
           </tbody>
        </table>
      </div>



@endsection