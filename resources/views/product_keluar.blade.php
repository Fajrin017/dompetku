@extends('layouts.main')

@section('container')

<h3 class="mb-4">{{ $product_keluar->nama }}</h3>




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
                    
                    <td>{{ $product_keluar->id }}</td>
                    <td><a class="text-decoration-none" href="/products_keluar/{{ $product_keluar->slug }} ">{{ $product_keluar->nama }}</a></td>
                    <td>{{ $product_keluar->harga }}</td>
                    <td>{{ $product_keluar->qty }}</td>
                    <td>{{ $product_keluar->tgl_keluar }}</td>
                    <td>Image</td>
                    <td>Category</td>
                    <td></td>
                </tr>
                
                </tbody>
            </table>
        </div>

        <a class="text-decoration-none" href="/products_keluar">Kembali Ke Beranda</a>


@endsection