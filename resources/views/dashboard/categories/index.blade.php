@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <!-- <h1 class="h2">Semua Kategory {{ auth()->user()->name }}</h1> -->
        <h1 class="h2">Semua Kategory Pencatatan</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <h5 style="color:blue;">Jumlah Kategori Yang Telah Diinput : {{ $categories->count() }} </h5>
          </div>
        </div>
      </div>

      @if (session()->has('success'))
        <div class="alert alert-success col-lg-6" role="alert">
        {{ session ('success') }}
        </div>
      @endif

      <div class="table-responsive col-lg-6">
      <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Tambah Data</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Kategori</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category )             
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $category->name }}</td>
              <td>
                <!-- <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-info"><span data-feather="eye"></span></a> -->
              @can('admin')              
                <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
              <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
                <button class="badge bg-danger border-0" onclick="return confirm('Apakah Anda Yakin?')"><span data-feather="x-circle"></span></button>
                @method('delete')
                @csrf
              </form>
              @endcan
              </td>
            </tr>
                
             @endforeach

           </tbody>
        </table>
      </div>

@endsection