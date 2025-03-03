<?php

namespace App\Repositories;

interface DashboardRepositoryInterface
{
    public function getProductCount();
    public function getCategoryCount();
    public function getSupplierCount();
    public function getBarangMasukCount();
    public function getBarangKeluarCount();
}
