<?php

namespace App\Repositories;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;

interface BarangKeluarRepositoryInterface
{
    public function getAllBarangKeluar();
    public function createBarangKeluar(array $data);
    public function updateBarangKeluar($id, array $data);
    public function deleteBarangKeluar($id);
    public function findBarangKeluarById($id);
}
