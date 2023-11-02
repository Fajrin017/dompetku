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
                @foreach ($products_masuk as $product_masuk )
                <tr>
                    
                    <td>{{ $loop->iteration }}</td>
                    <td><a class="text-decoration-none" href="/products_masuk/{{ $product_masuk->slug }} ">{{ $product_masuk->nama }}</a></td>
                    <td>{{ $product_masuk->harga }}</td>
                    <td>{{ $product_masuk->qty }}</td>
                    <td>{{ $product_masuk->tgl_masuk }}</td>
                    <td>Image</td>
                    <td>Category</td>
                    <td></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>



@endsection