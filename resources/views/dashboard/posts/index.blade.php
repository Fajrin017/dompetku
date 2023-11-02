@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pertanggungjawaban Keuangan {{ auth()->user()->name }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <h5 style="color:blue;">Jumlah data telah diinput : {{ $posts->count() }} </h5>
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
      <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Tambah Data</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <!-- <th scope="col">Approved</th> -->
              <th scope="col">Uraian Kegiatan / Belanja</th>
              <th scope="col">Tgl Realisasi</th>
              <th scope="col">Sub Output</th>
              <th scope="col">Nilai Realisasi</th>
              <th scope="col">Tgl Input</th>
              <!-- <th scope="col">Status</th> -->
              <th scope="col">Aksi</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post )             
            <tr>
              <td>{{ $loop->iteration }}</td>
              <!-- <td width="50px"><a href="/dashboard/posts/approved"><span data-feather="toggle-left"></span></a></td> -->
              <td width="350px">{{ $post->title }}</td>
              <td>{{ $post->tgl_realisasi }}</td>
              <td>{{ $post->category->name }}</td>
              <!-- <td>{{ $post->nilai_realisasi }}</td> -->
              <td>Rp. {{ number_format($post->nilai_realisasi) }} </td>
              
              <!-- <td>@currency($post->nilai_realisasi)</td> -->
              <td>{{ $post->created_at }}</td>
              
              <td>
                <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
              @can('admin')              
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
              <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                <button class="badge bg-danger border-0" onclick="return confirm('Apakah Anda Yakin?')"><span data-feather="x-circle"></span></button>
                @method('delete')
                @csrf
              </form>
              @endcan
                <!-- <a href="#" ></a> -->
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