@extends('layouts.main')

@section('container')

<h3 class="mb-4">{{ $product->name }}</h3>


        <div class="box-body">
            <table id="products-table" class="table table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>QTY</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $product-> id }}</td>
                    <td>{{ $product->nama }}</td>
                    <td>{{ $product->harga }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>Image</td>
                    <td>Category</td>
                    <td></td>
                </tr>

                </tbody>
            </table>
        </div>

        <a class="text-decoration-none" href="/products">Kembali Ke Beranda</a>


@endsection