@extends('layouts.main')

@section('container')

<h3 class="mb-4">Halaman Stock</h3>




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
                @foreach ($products as $product )
                <tr>
                    <!-- <td>{{ $product-> id }}</td> -->
                    <td>{{ $loop->iteration }}</td>
                    <td><a class="text-decoration-none" href="/products/{{ $product->slug }} ">{{ $product->nama }}</a></td>
                    <td>{{ $product->harga }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>Image</td>
                    <td>Category</td>
                    <td></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>



@endsection