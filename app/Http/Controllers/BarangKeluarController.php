<?php

namespace App\Http\Controllers;

use App\Services\BarangKeluarService;
use App\Services\BarangKeluarUploadService;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    protected $barangKeluarService;
    protected $barangKeluarUploadService;

    public function __construct(BarangKeluarService $barangKeluarService, BarangKeluarUploadService $barangKeluarUploadService)
    {
        $this->barangKeluarService = $barangKeluarService;
        $this->barangKeluarUploadService = $barangKeluarUploadService;
    }

    public function index()
    {
        $barangKeluar = $this->barangKeluarService->getAllBarangKeluar();
        return view('pages.barang_keluar.index', compact('barangKeluar'));
    }

    public function create()
    {
        $products = $this->barangKeluarService->getAllProducts();
        $suppliers = $this->barangKeluarService->getAllSuppliers();
        return view('pages.barang_keluar.create', compact('products', 'suppliers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|integer|min:1',
            'exit_date' => 'required|date',
            'gambar_barang_keluar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar_barang_keluar')) {
            $imagePath = $this->barangKeluarUploadService->uploadImage($request->file('gambar_barang_keluar'));
            $validatedData['gambar_barang_keluar'] = $imagePath;
        }

        $this->barangKeluarService->createBarangKeluar($validatedData);

        return redirect()->route('barang_keluar.index')->with('success', 'Barang Keluar berhasil ditambahkan');
    }

    public function edit($id)
    {
        $barangKeluar = $this->barangKeluarService->getBarangKeluarById($id);
        $products = $this->barangKeluarService->getAllProducts();
        $suppliers = $this->barangKeluarService->getAllSuppliers();
        return view('pages.barang_keluar.edit', compact('barangKeluar', 'products', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        $barangKeluar = $this->barangKeluarService->getBarangKeluarById($id);

        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|integer|min:1',
            'exit_date' => 'required|date',
            'gambar_barang_keluar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar_barang_keluar')) {
            // Hapus gambar lama jika ada
            if (!empty($barangKeluar->gambar_barang_keluar)) {
                $this->barangKeluarUploadService->deleteImage($barangKeluar->gambar_barang_keluar);
            }
            $imagePath = $this->barangKeluarUploadService->uploadImage($request->file('gambar_barang_keluar'));
            $validatedData['gambar_barang_keluar'] = $imagePath;
        }

        $this->barangKeluarService->updateBarangKeluar($id, $validatedData);

        return redirect()->route('barang_keluar.index')->with('success', 'Data Barang Keluar berhasil diperbarui!');
    }

    public function delete($id)
    {
        $barangKeluar = $this->barangKeluarService->getBarangKeluarById($id);

        if (!empty($barangKeluar->gambar_barang_keluar)) {
            $this->barangKeluarUploadService->deleteImage($barangKeluar->gambar_barang_keluar);
        }
        
        $this->barangKeluarService->deleteBarangKeluar($id);
        return redirect()->route('barang_keluar.index')->with('success', 'Barang Keluar berhasil dihapus.');
    }
}
