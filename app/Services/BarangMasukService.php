<?php

namespace App\Services;

use App\Models\BarangMasuk;
use App\Models\Product;
use App\Models\Supplier;

class BarangMasukService
{
    public function getAllBarangMasuk()
    {
        return BarangMasuk::all();
    }

    public function getBarangMasukById($id)
    {
        return BarangMasuk::findOrFail($id);
    }

    public function getAllSuppliers()
    {
        return Supplier::all(); 
    }

    public function getAllProducts()
    {
        return Product::all();
    }

    public function getBarangMasukByUser($userId)
    {
        return BarangMasuk::where('user_id', $userId)->get();
    }

    // Metode baru untuk menggabungkan logika pengecekan role
    public function getBarangMasukByUserOrRole($user)
    {
        if ($user->role === 'superadmin') {
            // Jika superadmin, ambil semua data barang masuk
            return BarangMasuk::all();
        } else {
            // Jika bukan superadmin, ambil barang masuk berdasarkan user_id
            return BarangMasuk::where('user_id', $user->id)->get();
        }
    }

    public function createBarangMasuk($data)
    {
        $barangMasuk = BarangMasuk::create($data);
        $product = Product::find($data['product_id']);
        $product->stock += $data['quantity'];
        $product->save();

        return $barangMasuk;
    }

    public function updateBarangMasuk($id, $data)
    {
        $barangMasuk = BarangMasuk::findOrFail($id);
        $product = Product::find($barangMasuk->product_id);

        $product->stock -= $barangMasuk->quantity;
        $barangMasuk->update($data);
        $product->stock += $data['quantity'];
        $product->save();

        return $barangMasuk;
    }

    public function deleteBarangMasuk($id)
    {
        $barangMasuk = BarangMasuk::findOrFail($id);
        $product = Product::find($barangMasuk->product_id);

        $product->stock -= $barangMasuk->quantity;
        $product->save();

        $barangMasuk->delete();
    }
}
