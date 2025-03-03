<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table = 'barang_masuk';
    protected $fillable = [
        'product_id',
        'supplier_id',
        'quantity',
        'purchase_price',
        'entry_date',
        'gambar_barang',
        'user_id',  
    ];
    public function product() {
        return $this->belongsTo(Product::class);
    } 

    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //
}
