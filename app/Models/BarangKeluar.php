<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table = 'barang_keluar';
    protected $fillable = [
        'product_id',
        'supplier_id',
        'quantity',
        'exit_date',
        'gambar_barang_keluar',
    ];
    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }
    //
}
