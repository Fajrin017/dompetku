
@extends('layouts.main')

@section('container')

<h3 class="mb-4">Semua Kategori</h3>

@foreach ($categories as $category )
<ul>
    <li>
        <td><a class="text-decoration-none" href="/posts?category={{ $category->slug }} ">{{ $category->name }}</a></td>
    </li>
</ul>



@endforeach


@endsection