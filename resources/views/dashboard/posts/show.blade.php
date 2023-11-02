
@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pertanggungjawaban Keuangan Kami</h1>
        <!-- <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
          </button>
        </div> -->
</div>
             


<div class="col-lg-8">
<table class="table table-bordered table-striped col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <!-- <p>Sub komponen :<a class="text-decoration-none" href="/posts?category={{$post->category->slug }}"> {{ $post->category->name  }}</p> -->
      <p class="text-danger"><b>Sub komponen : {{ $post->category->name  }} </b></p>
    <tr class="col-lg-8">
        <!-- <td><a class="text-decoration-none" href="/posts/{{ $post->slug }} ">{{ $post->title }}</a></td> -->
        <th class="col-lg-8" style="width:250px">Uraian Pekerjaan</th>
        <td><b>{{ $post->title }}</td></b>
    </tr>
    <tr>
        <th>Mata Akun Kegiatan</th>
        <td>{{ $post->mak }}</td>
    </tr>
    <tr>
        <th>Output/SubOutput</th>
        <td>{{ $post->output }}</td>
    </tr>
    <tr>
        <th>Jenis Realisasi</th>
        <td>{{ $post->jenis_realisasi }}</td>
    </tr>
    <tr>
        <th>No Dokumen</th>
        <td>{{ $post->no_dokumen }}</td>
    </tr>
    <tr>
        <th>Nilai Realisasi</th>
        <td>Rp. {{ number_format($post->nilai_realisasi) }} </td>
        <!-- <td>@currency($post->nilai_realisasi)</td> -->
    </tr>
    <tr>
        <th>Tgl Realisasi</th>
        <td>{{ $post->tgl_realisasi }}</td>
    </tr>
    <tr>
        <th>Mekanisme Bayar</th>
        <td>{{ $post->mekanisme }}</td>
    </tr>
    <tr>
        <th>Penyedia</th>
        <td>{{ $post->penyedia }}</td>
    </tr>
    <tr>
      <th>File Dokumen</th>
      @if ($post->dokumen)
      <td>
      <iframe src="{{ asset('storage/' . $post->dokumen) }}" type="application/pdf" class="img-thumbnail pdf-preview d-block" width="200" height="300" frameborder="0"></iframe>
      <a href="{{ asset('storage/' . $post->dokumen) }}"><button class="btn btn-success mt-3" type="button">Download</button></a>
      </td>
      @else
      <td>
        <a href="/img/default.png"></a><button class="btn btn-success" type="button">Download
      </td>
      @endif
    </tr>
</table>
</div>



<a class="btn btn-success mb-5" href="/dashboard/posts"><span data-feather="arrow-left"></span>Kembali</a>
@endsection