<?php

namespace App\Services;

use App\Repositories\ImageUploadRepositoryInterface;

class ImageUploadService
{
    protected $imageUploadRepository;

    public function __construct(ImageUploadRepositoryInterface $imageUploadRepository)
    {
        $this->imageUploadRepository = $imageUploadRepository;
    }

    public function uploadImage($image)
    {
        // Panggil repository untuk upload gambar
        return $this->imageUploadRepository->uploadImage($image);
    }
}
