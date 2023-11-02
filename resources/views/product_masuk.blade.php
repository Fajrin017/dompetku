@extends('layouts.main')

@section('container')

<h3 class="mb-4">Barang Masuk</h3>




        <div class="box-body">
            <table id="products-table" class="table table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>QTY</th>
                    <th>Tgl Masuk</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                
                <tr>
                    
                    <td>{{ $product_masuk->id }}</td>
                    <td><a class="text-decoration-none" href="/products_masuk/{{ $product_masuk->slug }} ">{{ $product_masuk->nama }}</a></td>
                    <td>{{ $product_masuk->harga }}</td>
                    <td>{{ $product_masuk->qty }}</td>
                    <td>{{ $product_masuk->tgl_masuk }}</td>
                    <td>Image</td>
                    <td>Category</td>
                    <td></td>
                </tr>
                
                </tbody>
            </table>
        </div>

        <a class="text-decoration-none" href="/products_masuk">Kembali Ke Beranda</a>


@endsection