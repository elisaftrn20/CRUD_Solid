<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminGudangRepository implements AdminGudangRepositoryInterface
{
    // Mendapatkan semua data admin gudang
    public function getAllAdminGudang()
    {
        return User::where('role', 'admingudang')->get();
    }

    // Mendapatkan data admin gudang berdasarkan ID
    public function getAdminGudangById($id)
    {
        return User::findOrFail($id);
    }

    // Menyimpan admin gudang baru
    public function createAdminGudang($data)
    {
        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'admingudang';
        
        return User::create($data);
    }

    // Memperbarui admin gudang berdasarkan ID
    public function updateAdminGudang($id, $data)
    {
        $admin = User::findOrFail($id);

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']); // Jangan update password jika tidak diubah
        }

        return $admin->update($data);
    }

    // Menghapus admin gudang berdasarkan ID
    public function deleteAdminGudang($id)
    {
        $admin = User::findOrFail($id);
        return $admin->delete();
    }
}
