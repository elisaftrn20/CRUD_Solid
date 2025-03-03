<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SupplierService;

class SupplierController extends Controller
{
    protected $supplierService;

    public function __construct(SupplierService $supplierService)
    {
        $this->supplierService = $supplierService;
    }

    public function index()
    {
        $suppliers = $this->supplierService->getAllSuppliers();
        return view('pages.supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('pages.supplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'perusahaan' => 'required|string',
            'email' => 'required|email|unique:suppliers,email',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        $this->supplierService->createSupplier($request->all());

        return redirect('/suppliers')->with('success', 'Supplier berhasil ditambahkan');
    }

    public function edit($id)
    {
        $supplier = $this->supplierService->getSupplierById($id);
        return view('pages.supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'perusahaan' => 'required|string',
            'email' => 'required|email|unique:suppliers,email,' . $id,
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        $this->supplierService->updateSupplier($id, $request->all());

        return redirect('/suppliers')->with('success', 'Supplier berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->supplierService->deleteSupplier($id);

        return redirect('/suppliers')->with('success', 'Supplier berhasil dihapus');
    }
}
