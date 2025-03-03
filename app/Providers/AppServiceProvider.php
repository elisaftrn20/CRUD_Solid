<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\{
    DashboardRepositoryInterface,
    DashboardRepository,
    BarangMasukRepositoryInterface,
    BarangMasukRepository,
    BarangKeluarRepositoryInterface,
    BarangKeluarRepository,
    SupplierRepositoryInterface,
    SupplierRepository,
    ProductRepositoryInterface,
    ProductRepository,
    CategoryRepositoryInterface,
    CategoryRepository,
    AuthRepositoryInterface,
    AuthRepository,
    ImageUploadRepositoryInterface,
    ImageUploadRepository,
    BarangMasukUploadRepositoryInterface,
    BarangMasukUploadRepository,
    BarangKeluarUploadRepositoryInterface,
    BarangKeluarUploadRepository,
    AdminGudangRepositoryInterface,
    AdminGudangRepository,
    
};
use App\Services\{
    BarangMasukService,
    DashboardService,
    RoleRedirectService // Menambahkan RoleRedirectService di sini
};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        // Binding layanan-layanan yang ada
        $this->app->bind(DashboardService::class, DashboardService::class);
        $this->app->bind(DashboardRepositoryInterface::class, DashboardRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(BarangMasukRepositoryInterface::class, BarangMasukRepository::class);
        $this->app->bind(BarangKeluarRepositoryInterface::class, BarangKeluarRepository::class);
        $this->app->bind(SupplierRepositoryInterface::class, SupplierRepository::class);
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(ImageUploadRepositoryInterface::class, ImageUploadRepository::class);
        $this->app->bind(BarangMasukUploadRepositoryInterface::class, BarangMasukUploadRepository::class);
        $this->app->bind(BarangKeluarUploadRepositoryInterface::class, BarangKeluarUploadRepository::class);
        $this->app->bind(AdminGudangRepositoryInterface::class, AdminGudangRepository::class);

        // Binding RoleRedirectService
        $this->app->bind(RoleRedirectService::class, RoleRedirectService::class); // Menambahkan binding RoleRedirectService
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
