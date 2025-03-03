<?php

namespace App\Services;

use App\Repositories\BarangKeluarUploadRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class BarangKeluarUploadService
{
    protected $barangKeluarUploadRepository;

    public function __construct(BarangKeluarUploadRepositoryInterface $barangKeluarUploadRepository)
    {
        $this->barangKeluarUploadRepository = $barangKeluarUploadRepository;
    }

    public function uploadImage($image)
    {
        // Panggil repository untuk upload gambar
        return $this->barangKeluarUploadRepository->uploadImage($image);
    }
    public function deleteImage($filePath)
    {
        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }
    }
}
