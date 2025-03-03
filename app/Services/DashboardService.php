<?php

namespace App\Services;

use App\Repositories\DashboardRepositoryInterface;

class DashboardService
{
    protected $dashboardRepository;

    public function __construct(DashboardRepositoryInterface $dashboardRepository)
    {
        $this->dashboardRepository = $dashboardRepository;
    }

    public function getDashboardData()
    {
        return [
            'productCount' => $this->dashboardRepository->getProductCount(),
            'categoryCount' => $this->dashboardRepository->getCategoryCount(),
            'supplierCount' => $this->dashboardRepository->getSupplierCount(),
            'barangMasukCount' => $this->dashboardRepository->getBarangMasukCount(),
            'barangKeluarCount' => $this->dashboardRepository->getBarangKeluarCount(),
        ];
    }
}
