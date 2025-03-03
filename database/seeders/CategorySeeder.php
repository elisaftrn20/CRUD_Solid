<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category; // Pastikan model Category diimport

class CategorySeeder extends Seeder
{
    /**
     * Jalankan database seeds.
     */
    public function run(): void
    {
        $categories = [
            ["name" => "Elektronik"],
            ["name" => "Pakaian"],
            ["name" => "Makanan & Minuman"],
            ["name" => "Peralatan Rumah Tangga"],
            ["name" => "Kesehatan & Kecantikan"],
            ["name" => "Olahraga & Outdoor"],
            ["name" => "Otomotif"],
            ["name" => "Buku & Alat Tulis"],
        ];

        // Insert multiple categories
        Category::insert($categories);
    }
}
