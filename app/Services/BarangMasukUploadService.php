<?php

namespace App\Services;

use App\Repositories\BarangMasukUploadRepositoryInterface;

class BarangMasukUploadService
{
    protected $barangMasukUploadRepository;

    public function __construct(BarangMasukUploadRepositoryInterface $barangMasukUploadRepository)
    {
        $this->barangMasukUploadRepository = $barangMasukUploadRepository;
    }

    public function uploadImage($image)
    {
        // Panggil repository untuk upload gambar
        return $this->barangMasukUploadRepository->uploadImage($image);
    }
}
