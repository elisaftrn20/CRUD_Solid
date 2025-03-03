<?php

namespace App\Services;

use App\Models\BarangKeluar;
use App\Models\Product;
use App\Models\Supplier;

class BarangKeluarService
{
    // Mengambil semua barang keluar
    public function getAllBarangKeluar()
    {
        return BarangKeluar::all(); // Mengambil semua catatan dari model BarangKeluar
    }

    // Menyimpan barang keluar baru
    public function createBarangKeluar(array $data)
    {
        // Simpan data Barang Keluar
        $barangKeluar = BarangKeluar::create($data);

        // Ambil produk terkait
        $product = $barangKeluar->product;

        // Kurangi stock produk
        if ($product->stock >= $barangKeluar->quantity) {
            $product->stock -= $barangKeluar->quantity;
            $product->save(); // Simpan perubahan stock
            return $barangKeluar;
        } else {
            return null; // stock tidak cukup
        }
    }

    // Memperbarui data barang keluar
    public function updateBarangKeluar($id, array $data)
    {
        $barangKeluar = BarangKeluar::findOrFail($id);
        
        // Ambil produk terkait dengan transaksi ini
        $product = $barangKeluar->product;

        // Jika quantity berubah, perbarui stock produk
        $oldQuantity = $barangKeluar->quantity;
        $newQuantity = $data['quantity'];

        if ($newQuantity > $oldQuantity) {
            // Tambah stock jika quantity bertambah
            $product->stock -= ($newQuantity - $oldQuantity);
        } elseif ($newQuantity < $oldQuantity) {
            // Kurangi stock jika quantity berkurang
            $product->stock += ($oldQuantity - $newQuantity);
        }

        // Validasi stock sebelum update
        if ($product->stock < 0) {
            return null; // Jika stock tidak cukup
        }

        // Update data barang keluar
        $barangKeluar->update($data);

        // Simpan perubahan stock
        $product->save();

        return $barangKeluar;
    }

    // Menghapus barang keluar
    public function deleteBarangKeluar($id)
    {
        $barangKeluar = BarangKeluar::findOrFail($id);
        
        // Ambil produk terkait dengan barang keluar
        $product = $barangKeluar->product;

        // Tambahkan kembali stock produk yang dikeluarkan
        $product->stock += $barangKeluar->quantity; // Perbaiki dari $barangKaeluar menjadi $barangKeluar
        $product->save();  // Simpan perubahan stock

        // Hapus barang keluar
        $barangKeluar->delete();

        return $barangKeluar;
    }

    // Mengambil semua produk
    public function getAllProducts()
    {
        return Product::all(); // Mengambil semua produk
    }

    // Mengambil semua pemasok
    public function getAllSuppliers()
    {
        return Supplier::all(); // Mengambil semua pemasok
    }

    // Mengambil barang keluar berdasarkan ID
    public function getBarangKeluarById($id)
    {
        return BarangKeluar::findOrFail($id); // Mengambil barang keluar berdasarkan ID
    }
}