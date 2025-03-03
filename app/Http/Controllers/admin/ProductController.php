<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class ProductController extends Controller
{ 
    protected $productService;
    protected $imageUploadService;

    public function __construct(ProductService $productService, ImageUploadService $imageUploadService)
    {
        $this->productService = $productService;
        $this->imageUploadService = $imageUploadService;
    }

    // Menampilkan semua produk
    public function index()
    {
        $products = $this->productService->getAll();
        return view('pages.products.index', compact('products'));
    }

    // Menampilkan form untuk menambahkan produk
    public function create()
    {
        $categories = $this->productService->getCategories();
        return view('pages.products.create', compact('categories'));
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'gambar_produk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('gambar_produk')) {
            $imagePath = $this->imageUploadService->uploadImage($request->file('gambar_produk'));
            $validated['gambar_produk'] = $imagePath;
        }

        // Simpan produk
        $this->productService->create($validated);
        return redirect('/products')->with('success', 'Produk berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit produk
    public function edit($id)
    {
        $categories = $this->productService->getCategories();
        $product = $this->productService->findById($id);
        return view('pages.products.edit', compact('categories', 'product'));
    }

    // Memperbarui produk yang sudah ada
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'gambar_produk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Cek jika ada gambar baru yang di-upload
        if ($request->hasFile('gambar_produk')) {
            $imagePath = $this->imageUploadService->uploadImage($request->file('gambar_produk'));
            $validated['gambar_produk'] = $imagePath;
        }

        // Update produk
        $this->productService->update($id, $validated);
        return redirect('/products')->with('success', 'Produk berhasil diperbarui.');
    }

    // Menghapus produk
    public function delete($id)
    {
        $this->productService->delete($id);
        return redirect('/products')->with('success', 'Produk berhasil dihapus.');
    }
}
