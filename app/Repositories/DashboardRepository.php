<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;

class DashboardRepository implements DashboardRepositoryInterface
{
    public function getProductCount()
    {
        return Product::count();
    }

    public function getCategoryCount()
    {
        return Category::count();
    }

    public function getSupplierCount()
    {
        return Supplier::count();
    }

    public function getBarangMasukCount()
    {
        return BarangMasuk::count();
    }
    public function getBarangKeluarCount()
    {
        return BarangKeluar::count();
    }
}
