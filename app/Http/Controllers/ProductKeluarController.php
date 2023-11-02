<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductKeluar;

class ProductKeluarController extends Controller
{
    public function index()
    {
        return view('products_keluar', [
            'title' => 'products_keluar',
            'active' => 'Products_Keluar',
            'products_keluar' => ProductKeluar::all()
        ]);
    }

    public function show(ProductKeluar $productKeluar)
    {
        return view('product_keluar', [
            'title' => 'Single Product',
            'active' => 'product_keluar',
            'product_keluar' => $productKeluar
        ]);
    }
}
