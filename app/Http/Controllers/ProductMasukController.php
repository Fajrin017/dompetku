<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductMasuk;

class ProductMasukController extends Controller
{
    public function index()
    {
        return view('products_masuk', [
            'title' => 'products_masuk',
            'active' => 'Products_Masuk',
            'products_masuk' => ProductMasuk::all()
        ]);
    }

    public function show(ProductMasuk $productMasuk)
    {
        return view('product_masuk', [
            'title' => 'Single Product',
            'active' => 'product_masuk',
            'product_masuk' => $productMasuk
        ]);
    }
}
