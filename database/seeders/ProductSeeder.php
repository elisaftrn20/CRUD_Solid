<?php

namespace Database\Seeders;

use App\Models\Product; // Pastikan model Product diimport
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            "name" => "Laptop",
            "description" => "Laptop",  // Perbaiki 'deskription' menjadi 'description'
            "sku" => "12345-ok",
            "price" => 1000000,
            "stock" => 10,
            "category_id" => 1,
        ]);
    }
}
