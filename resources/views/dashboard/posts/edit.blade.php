@extends('dashboard.layouts.main')

@section('container')

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Data Pertanggungjawaban Kami</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
          </button>
        </div>
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
      <form action="/dashboard/posts/{{ $post->slug }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3" enctype="multipart/form-data">
        <label for="title" class="form-label">Uraian Kegiatan</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $post->title) }}">
        @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $post->slug) }}">
        @error('slug')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="category" class="form-label">Sub Komponen</label>
        <select class="form-select" name="category_id">
        <option selected></option>
            @foreach ($categories as $category )
            @if (old('category_id', $post->category_id) == $category->id)
            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>  
            @else
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
            @endforeach
        </select>
    </div>



        <div class="mb-3">
            <label for="mak" class="form-label">Mata Akun Kegiatan(MAK)</label>
            <select type="text" class="form-select" name="mak"  id="mak">
                <option selected></option>
                <option value="521211" @if (old('mak', $post->mak) == "521211") {{ 'selected' }} @endif>521211</option>
                <option value="521219" @if (old('mak', $post->mak) == "521219") {{ 'selected' }} @endif>521219</option>
                <option value="521811" @if (old('mak', $post->mak) == "521811") {{ 'selected' }} @endif>521811</option>
            </select>
        </div>
        <!-- <div class="mb-3">
            <label for="mak" class="form-label">Mata Akun Kegiatan(MAK)</label>
            <select type="text" class="form-select" id="mak" name="mak" value="{{ old('mak', $post->mak) }}" required>
            <option selected></option>
            <option value="521211">521211</option>
            <option value="5212192">521219</option>
            <option value="521811">521811</option>
            </select>
        </div> -->
        <div class="mb-3">
            <label for="output" class="form-label">Rincian Output</label>
            <select type="text" class="form-select" id="output" name="output" value="{{ old('output', $post->output) }}" required>
            <option selected></option>
            <option value="1">5252.BDC.004 Kebutuhan Dasar dan Layanan Kesehatan</option>
            <option value="2">5252.BDC.012 Layanan Pendidikan dan Pengentasan Anak</option>
            <option value="3">5252.BDC.S04 Pelatihan Keterampilan Anak</option>
            <option value="4">5252.BHB.002 Layanan Keamanan dan Ketertiban</option>
            <option value="5">6231.EBA.956 Layanan BMN</option>
            <option value="6">6231.EBA.958 Layanan Humas</option>
            <option value="7">6231.EBA.962 Layanan Umum</option>
            <option value="8">6231.EBA.994 Layanan Perkantoran</option>
            <option value="9">6231.EBB.951 Layanan Sarana Internal</option>
            <option value="10">6231.EBC.954 Layanan Manajemen SDM</option>
            <option value="11">6231.EBD.952 Layanan Perencanaan Penganggaran</option>
            <option value="12">6231.EBD.953 Layanan Pemantauan dan Evaluasi</option>
            <option value="13">6231.EBD.955 Layanan manajemen Keuangan</option>
            <option value="14">6231.EBD.961 Layanan Reformasi</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="jenis_realisasi" class="form-label">Jenis Realisasi</label>
            <select type="text" class="form-select" id="jenis_realisasi" name="jenis_realisasi" value="{{ old('jenis_realisasi', $post->jenis_realisasi) }}" required>
            <option selected></option>
            <option value="Bukti Pembelian">Bukti Pembelian</option>
            <option value="Kuitansi">Kuitansi</option>
            <option value="SPK">SPK</option>
            <option value="Surat Perjanjian">Surat Perjanjian</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="no_dokumen" class="form-label">No Dokumen</label>
            <input type="text" class="form-control" id="no_dokumen" name="no_dokumen" value="{{ old('no_dokumen', $post->no_dokumen) }}" required>
        </div>
        <div class="mb-3">
            <label for="nilai_realisasi" class="form-label">Nilai Realisasi</label>
            <input type="number" class="form-control" id="inputAngka" name="nilai_realisasi" value="{{ old('nilai_realisasi', $post->nilai_realisasi) }}"required>
        </div>

        <div class="mb-3">
            <label for="tgl_realisasi" class="form-label">Tanggal Realisasi</label>
            <input type="date" class="form-control" id="tgl_realisasi" name="tgl_realisasi" value="{{ old('tgl_realisasi', $post->tgl_realisasi) }}" required>
        </div>

        <div class="mb-3">
            <label for="mekanisme" class="form-label">Mekanisme</label>
            <select type="text" class="form-select" id="mekanisme" name="mekanisme" value="{{ old('mekanisme') }}">
                <option value="Pengadaan Langsung" @if (old('mekanisme', $post->mekanisme ) == "Pengadaan Langsung ") {{ 'selected' }} @endif>Pengadaan Langsung</option>
                <option value="Tender" @if (old('mekanisme', $post->mekanisme ) == "Tender") {{ 'selected' }} @endif>Tender</option>
                <option value="E-Purchasing" @if (old('mekanisme', $post->mekanisme ) == "E-Purchasing") {{ 'selected' }} @endif>E-Purchasing</option>
            </select>
        </div>


        <div class="mb-3">
            <label for="penyedia" class="form-label">Penyedia</label>
            <input type="text" class="form-control" name="penyedia" id="penyedia" value="{{ old('penyedia', $post->penyedia) }}">
        </div>
        
        <div class="mb-3">
            <label for="dokumen" class="form-label">Input Dokumen</label>
            <input type="hidden" name="oldDokumen" value="{{ $post->dokumen }}">
            @if ($post->dokumen)
                <iframe src="{{ asset('storage/' . $post->dokumen) }}" type="application/pdf" class="img-thumbnail pdf-preview d-block" width="200" height="300" frameborder="0"></iframe>
            @else
                <iframe src="/img/default.png" type="application/pdf" class="img-thumbnail pdf-preview" width="200" height="300" frameborder="0"></iframe>
            @endif
            <input class="mt-3 form-control @error('dokumen') is-invalid @enderror" type="file" id="dokumen" name="dokumen" onchange="previewPdf()">
            @error('dokumen')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary mb-5">Simpan</button>
    </form>
</div>


<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });


    function previewPdf(){
    const dokumen = document.querySelector('#dokumen');
    const pdfPreview = document.querySelector('.pdf-preview');
    
    pdfPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(dokumen.files[0]);

    oFReader.onload = function(oFREvent) {
      pdfPreview.src = oFREvent.target.result;
    }
}

</script>




<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $('#inputAngka').on('keyup',function(){
        var angka = $(this).val();
 
        var hasilAngka = formatRibuan(angka);
 
        $(this).val(hasilAngka);
    });
 
    function formatRibuan(angka){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split           = number_string.split(','),
        sisa            = split[0].length % 3,
        angka_hasil     = split[0].substr(0, sisa),
        ribuan          = split[0].substr(sisa).match(/\d{3}/gi);
 
 
 
        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            angka_hasil += separator + ribuan.join('.');
        }
 
        angka_hasil = split[1] != undefined ? angka_hasil + ',' + split[1] : angka_hasil;
        return angka_hasil;
    }
</script> -->


















<!-- <script type="text/javascript">


    $('#rupiah').on('keyup',function(){
        var angka = $(this).val();
 
        var rupiah = formatRibuan(angka);
 
        $(this).val(rupiah);
    });


    var rupiah = document.getElementById ('rupiah');
    rupiah.addEventlistener('keyup', function(e){
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    })


 
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split           = number_string.split(','),
        sisa            = split[0].length % 3,
        angka_hasil     = split[0].substr(0, sisa),
        ribuan          = split[0].substr(sisa).match(/\d{3}/gi);
 
 
 
        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
 
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp.' + rupiah : '' );
    }

</script> -->
        

@endsection