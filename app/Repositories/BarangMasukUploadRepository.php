<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Storage;

class BarangMasukUploadRepository implements BarangMasukUploadRepositoryInterface
{
    public function uploadImage($gambar_barang)
    {
        // Contoh menyimpan gambar ke storage dan mengembalikan pathnya
        $path = $gambar_barang->store('barang_masuk', 'public');
        return $path;
    }
}
