<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getAll();
        return view('pages.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.categories.create');
    }

    public function store(Request $request)
    {
        $this->categoryService->store($request);
        return redirect('/categories');
    }

    public function edit($id)
    {
        $category = $this->categoryService->getById($id);
        return view('pages.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->categoryService->update($request, $id);
        return redirect('/categories');
    }

    public function delete($id)
    {
        $this->categoryService->delete($id);
        return redirect('/categories');
    }
}
