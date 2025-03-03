<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'name' => 'Andi Jaya',
                'perusahaan' => 'PT Jaya Abadi',
                'email' => 'andijaya@gmail.com',
                'phone' => '08123456789',
                'address' => 'Jl. Merdeka No. 1',
            ],
            [
                'name' => 'Budi Santoso',
                'perusahaan' => 'CV Maju Terus',
                'email' => 'budisantoso@gmail.com',
                'phone' => '08198765432',
                'address' => 'Jl. Mawar No. 2',
            ],
            [
                'name' => 'Citra Lestari',
                'perusahaan' => 'UD Sukses Bersama',
                'email' => 'citralestari@gmail.com',
                'phone' => '08211223344',
                'address' => 'Jl. Melati No. 3',
            ],
            [
                'name' => 'Dewi Rahayu',
                'perusahaan' => 'PT Lancar Jaya',
                'email' => 'dewirahayu@gmail.com',
                'phone' => '08334455667',
                'address' => 'Jl. Kenanga No. 4',
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}