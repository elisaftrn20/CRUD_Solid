<?php

namespace App\Repositories;

interface AdminGudangRepositoryInterface
{
    // Mendapatkan semua data admin gudang
    public function getAllAdminGudang();

    // Mendapatkan data admin gudang berdasarkan ID
    public function getAdminGudangById($id);

    // Menyimpan admin gudang baru
    public function createAdminGudang($data);

    // Memperbarui admin gudang berdasarkan ID
    public function updateAdminGudang($id, $data);

    // Menghapus admin gudang berdasarkan ID
    public function deleteAdminGudang($id);
}
