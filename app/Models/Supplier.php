<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['name','perusahaan', 'email', 'phone', 'address'];
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluar::class);
    }
}

