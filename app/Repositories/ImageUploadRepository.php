<?php

namespace App\Repositories;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;

class ImageUploadRepository implements ImageUploadRepositoryInterface
{
    public function uploadImage($gambar_produk)
    {
        $filename = Str::random(20) . '.' . $gambar_produk->getClientOriginalExtension();
        
        $gambar_produk->storeAs('products', $filename, 'public');
        
        return 'storage/products/' . $filename;
    }
}