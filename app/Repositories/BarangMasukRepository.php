<?php

namespace App\Repositories;

use App\Models\BarangMasuk;
use App\Repositories\BarangMasukRepositoryInterface;

class BarangMasukRepository implements BarangMasukRepositoryInterface
{
    public function getAll()
    {
        return BarangMasuk::with('product','supplier')->get();
    }

    public function findById($id)
    {
        return BarangMasuk::findOrFail($id);
    }

    public function create(array $data)
    {
        return BarangMasuk::create($data);
    }

    public function update($id, array $data)
    {
        $barangMasuk = BarangMasuk::findOrFail($id);
        $barangMasuk->update($data);
        return $barangMasuk;
    }

    public function delete($id)
    {
        $barangMasuk = BarangMasuk::findOrFail($id);
        $barangMasuk->delete();
    }
}
