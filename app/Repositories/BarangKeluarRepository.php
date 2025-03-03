<?php

namespace App\Repositories;

use App\Models\BarangKeluar;

class BarangKeluarRepository implements BarangKeluarRepositoryInterface
{
    protected $barangKeluar;

    public function __construct(BarangKeluar $barangKeluar)
    {
        $this->barangKeluar = $barangKeluar;
    }

    public function getAllBarangKeluar()
    {
        return $this->barangKeluar->with('product', 'supplier')->get();
    }

    public function createBarangKeluar(array $data)
    {
        return $this->barangKeluar->create($data);
    }

    public function updateBarangKeluar($id, array $data)
    {
        $barangKeluar = $this->barangKeluar->findOrFail($id);
        return $barangKeluar->update($data);
    }

    public function deleteBarangKeluar($id)
    {
        $barangKeluar = $this->barangKeluar->findOrFail($id);
        return $barangKeluar->delete();
    }

    public function findBarangKeluarById($id)
    {
        return $this->barangKeluar->findOrFail($id);
    }
}
