<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    protected $fillable = ['name','description', 'price', 'stock', 'category_id', 'supplier_id', 'gambar_produk'];  

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluar::class);
    }
    
}
