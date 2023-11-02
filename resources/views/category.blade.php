
@extends('layouts.main')

@section('container')

<h3 class="mb-4">{{$category}}</h3>

@foreach ($posts as $post )
    

<table class="table">
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
</table>

@endforeach


@endsection