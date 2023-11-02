<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ProductKeluar;
use App\Models\ProductMasuk;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Fajrin Hidayattussyalikin',
            'username' => 'fajrin',
            'email' => 'fajrinh@gmail.com',
            'password' => bcrypt('12345')
        ]);

        User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);




        Post::factory(20)->create();

        ProductMasuk::create([
            'product_id'=> 2,
            'nama'=> 'Gula',
            'slug' => 'gula',
            'harga' => 14000,
            'qty' => 100,
            'tgl_masuk' => '2023-08-18'
        ]);

        ProductKeluar::create([
            'product_id'=> 1,
            'nama'=> 'beras',
            'slug' => 'beras',
            'harga' => 100000,
            'qty' => 50,
            'tgl_keluar' => '2023-08-19'
        ]);


        Category::create([
            'name' => 'Kebutuhan Perkantoran',
            'slug' => 'kebutuhan-perkantoran'
        ]);

        Category::create([
            'name' => 'Perlengkapan Mandi',
            'slug' => 'perlengkapan-mandi'
        ]);
        Category::create([
            'name' => 'Pemeliharaan Kendaraan',
            'slug' => 'pemeliharaan-kendaraan'
        ]);

    }
}
