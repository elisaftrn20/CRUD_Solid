<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Storage;

class BarangKeluarUploadRepository implements BarangKeluarUploadRepositoryInterface
{
    public function uploadImage($gambar_barang_keluar)
    {
        // Contoh menyimpan gambar ke storage dan mengembalikan pathnya
        $path = $gambar_barang_keluar->store('barang_keluar', 'public');
        return $path;
    }
}
