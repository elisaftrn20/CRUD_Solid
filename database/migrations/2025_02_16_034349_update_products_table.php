<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Menambahkan kolom gambar_produk jika belum ada
            if (!Schema::hasColumn('products', 'gambar_produk')) {
                $table->string('gambar_produk')->nullable()->after('category_id');
            }

            // Menghapus kolom sku jika ada
            if (Schema::hasColumn('products', 'sku')) {
                $table->dropColumn('sku');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       
    }
};
