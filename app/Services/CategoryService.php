<?php

namespace App\Services;

use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll()
    {
        return $this->categoryRepository->getAll();
    }

    public function getById($id)
    {
        return $this->categoryRepository->findById($id);
    }

    public function store(Request $request)
    {
        // Validate request manually or pass to controller validation
        $request->validate([
            'name' => 'required|unique:categories,name',
        ], [
            'name.required' => 'Nama kategori harus diisi',
            'name.unique' => 'Nama kategori sudah ada',
        ]);

        $category = [
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
        ];

        $this->categoryRepository->create($category);
    }

    public function update(Request $request, $id)
    {
        // Validate request manually or pass to controller validation
        $request->validate([
            'name' => 'required|unique:categories,name',
        ], [
            'name.required' => 'Nama kategori harus diisi',
            'name.unique' => 'Nama kategori sudah ada',
        ]);

        $category = [
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
        ];

        $this->categoryRepository->update($id, $category);
    }

    public function delete($id)
    {
        $this->categoryRepository->delete($id);
    }
}
