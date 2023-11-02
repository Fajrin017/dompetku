@extends('layouts.main')

@section('container')

<h3 class="mb-4">Barang Keluar</h3>




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
                @foreach ($products_keluar as $product_keluar )
                <tr>
                    
                    <td>{{ $loop->iteration }}</td>
                    <td><a class="text-decoration-none" href="/products_keluar/{{ $product_keluar->slug }} ">{{ $product_keluar->nama }}</a></td>
                    <td>{{ $product_keluar->harga }}</td>
                    <td>{{ $product_keluar->qty }}</td>
                    <td>{{ $product_keluar->tgl_keluar }}</td>
                    <td>Image</td>
                    <td>Category</td>
                    <td></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>



@endsection