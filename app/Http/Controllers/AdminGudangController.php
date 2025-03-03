<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdminGudangService;

class AdminGudangController extends Controller
{
    protected $adminGudangService;

    public function __construct(AdminGudangService $adminGudangService)
    {
        $this->adminGudangService = $adminGudangService;
    }

    public function index()
    {
        // Mengambil semua data admin gudang
        $admins = $this->adminGudangService->getAllAdminGudang();
        return view('pages.admingudang.index', compact('admins'));
    }

    public function create()
    {
        // Menampilkan halaman form tambah admin gudang
        return view('pages.admingudang.create');
    }

    public function store(Request $request)
    {
        // Validasi input data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Menyimpan data admin gudang baru
        $this->adminGudangService->createAdminGudang($data);

        return redirect()->route('admingudang.index')->with('success', 'Admin Gudang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Mengambil data admin gudang untuk diedit
        $admin = $this->adminGudangService->getAdminGudangById($id);
        return view('pages.admingudang.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
        ]);

        // Memperbarui data admin gudang
        $this->adminGudangService->updateAdminGudang($id, $data);

        return redirect()->route('admingudang.index')->with('success', 'Admin Gudang berhasil diperbarui.');
    }

    public function delete($id)
    {
        // Menghapus data admin gudang
        $this->adminGudangService->deleteAdminGudang($id);

        return redirect()->route('admingudang.index')->with('success', 'Admin Gudang berhasil dihapus.');
    }
}
