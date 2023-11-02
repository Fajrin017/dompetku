@extends('dashboard.layouts.main')

@section('container')

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Nama Kategori</h1>
      </div>

    {{-- menampilkan error validasi --}}
    @if (count($errors) > 0)
        <div class="alert alert-danger col-lg-8">
            <ul>
             @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

<div class="col-lg-6">
      <form action="/dashboard/categories" method="post" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
        <label for="name" class="form-label">Nama Kategori</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
        @error('slug')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <!-- <div class="mb-3">
        <label for="category" class="form-label">Sub Komponen</label>
        <select class="form-select" name="category_id">
        <option selected></option>
            @foreach ($categories as $category )
            @if (old('category_id') == $category->id)
            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>  
            @else
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
            @endforeach
        </select>
    </div> -->



        <script>
          const name = document.querySelector('#name');
          const slug = document.querySelector('#slug');

          name.addEventListener('change', function(){
              fetch('/dashboard/categories/checkSlug?name=' + name.value)
              .then(response => response.json())
              .then(data => slug.value = data.slug)
          });

          </script>

        <button type="submit" class="btn btn-primary mb-5">Simpan</button>
    </form>
</div> 

@endsection