<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


// class Post extends Model
class Post 
{
    // use HasFactory;

    private static $dok_posts = [
        [
            "title" => "belanja barang keperluan pokok",
            "slug" => "belanja-barang-keperluan-pokok",
            "mak" => 521211,
            "output" => "Kebutuhan Sehari Hari Perkantoran",
            "jenis realisasi" => "Bukti Pembelian",
            "no dokumen" => "W.7.PAS.PAS.8-PB.02.01-56",
            "nilai realisasi" => 1000000,
            "tgl realisasi" => "22 Januari 2023",
            "mekanisme" => "Uang Persediaan",
            "penyedia" => "Toko Dahri"

        ]

        ];

        public static function all()
        {
            return collect(self::$dok_posts);
        }

        public static function find($slug)
        {
            $posts = static::all();
        //     $post= [];
        //     foreach($posts as $p) {
        //     if($p["slug"] === $slug) {
        //     $post = $p;
        //     }
        // }
        return $posts->firstWhere('slug', $slug);
        }
        
};
