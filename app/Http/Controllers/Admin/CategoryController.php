<?php

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller; // Extends Controller Laravel standar
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Ambil kategori dengan jumlah makanan terkait (jika relasi 'foods' ada di model Category)
        // dan pagination
        $categories = Category::withCount('foods')->latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create($validated);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function show(Category $category)
    {
        // Biasanya tidak diperlukan untuk admin CRUD sederhana, bisa redirect ke edit atau index
        return redirect()->route('admin.categories.edit', $category);
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update($validated);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $category)
    {
        // Pertimbangkan untuk menambahkan logika jika kategori masih memiliki makanan terkait
        // if ($category->foods()->count() > 0) {
        //     return back()->with('error', 'Kategori tidak bisa dihapus karena masih memiliki makanan terkait.');
        // }
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}