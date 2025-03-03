<?php

namespace App\Services;

use App\Repositories\AdminGudangRepositoryInterface;

class AdminGudangService
{
    // Menggunakan camelCase untuk nama properti
    protected $adminGudangRepository;

    // Constructor
    public function __construct(AdminGudangRepositoryInterface $adminGudangRepository)
    {
        $this->adminGudangRepository = $adminGudangRepository;
    }

    // Fungsi untuk mendapatkan semua data admin gudang
    public function getAllAdminGudang()
    {
        return $this->adminGudangRepository->getAllAdminGudang();
    }

    // Fungsi untuk mendapatkan data admin gudang berdasarkan ID
    public function getAdminGudangById($id)
    {
        return $this->adminGudangRepository->getAdminGudangById($id);
    }

    // Fungsi untuk menyimpan admin gudang baru
    public function createAdminGudang($data)
    {
        return $this->adminGudangRepository->createAdminGudang($data);
    }

    // Fungsi untuk memperbarui data admin gudang
    public function updateAdminGudang($id, $data)
    {
        return $this->adminGudangRepository->updateAdminGudang($id, $data);
    }

    // Fungsi untuk menghapus admin gudang
    public function deleteAdminGudang($id)
    {
        return $this->adminGudangRepository->deleteAdminGudang($id);
    }
}
