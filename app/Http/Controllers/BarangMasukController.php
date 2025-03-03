<?php

namespace App\Http\Controllers;

use App\Services\BarangMasukService;
use App\Services\BarangMasukUploadService;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    protected $barangMasukService;
    protected $barangMasukUploadService;

    public function __construct(BarangMasukService $barangMasukService, BarangMasukUploadService $barangMasukUploadService)
    {
        $this->barangMasukService = $barangMasukService;
        $this->barangMasukUploadService = $barangMasukUploadService;
    }
 
    public function index()
    {
        $user = auth()->user(); // Ambil data user yang sedang login

        // Panggil service untuk mengambil barang masuk berdasarkan role user
        $barangMasuk = $this->barangMasukService->getBarangMasukByUserOrRole($user);

        return view('pages.barang_masuk.index', compact('barangMasuk'));
    }

    public function create()
    {
        $products = $this->barangMasukService->getAllProducts();
        $suppliers = $this->barangMasukService->getAllSuppliers();
        return view('pages.barang_masuk.create', compact('products', 'suppliers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|integer|min:1',
            'purchase_price' => 'required|numeric',
            'entry_date' => 'required|date',
            'gambar_barang' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('gambar_barang')) {
            $imagePath = $this->barangMasukUploadService->uploadImage($request->file('gambar_barang'));
            $validatedData['gambar_barang'] = $imagePath;
        }

        // Menambahkan user_id ke validated data
        $validatedData['user_id'] = auth()->id(); // Menambahkan user_id yang sedang login

        $this->barangMasukService->createBarangMasuk($validatedData);
        return redirect()->route('barang_masuk.index')->with('success', 'Barang Masuk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $barangMasuk = $this->barangMasukService->getBarangMasukById($id);
        $products = $this->barangMasukService->getAllProducts();
        $suppliers = $this->barangMasukService->getAllSuppliers();
        return view('pages.barang_masuk.edit', compact('barangMasuk', 'products', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|integer|min:1',
            'purchase_price' => 'required|numeric',
            'entry_date' => 'required|date',
            'gambar_barang' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Cek jika ada gambar baru yang di-upload
        if ($request->hasFile('gambar_barang')) {
            $imagePath = $this->barangMasukUploadService->uploadImage($request->file('gambar_barang'));
            $validatedData['gambar_barang'] = $imagePath;
        }

        // Menambahkan user_id ke validated data (untuk update)
        $validatedData['user_id'] = auth()->id(); // Menambahkan user_id yang sedang login

        $this->barangMasukService->updateBarangMasuk($id, $validatedData);

        return redirect()->route('barang_masuk.index')->with('success', 'Data Barang Masuk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $this->barangMasukService->deleteBarangMasuk($id);
        return redirect()->route('barang_masuk.index')->with('success', 'Barang Masuk berhasil dihapus.');
    }
}
