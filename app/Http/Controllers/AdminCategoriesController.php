<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Redirect;

class AdminCategoriesController extends Controller
{
    //s
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::with(['posts' => function ($query) {
                $query->select('category_id'); }])->withCount('posts')->orderBy('id', 'asc')->paginate(10)
        ]);
    }


    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Category $category)
    {
        $name = request()->validate([
            'name' => ['required', 'min:3', 'max:25'],
        ]);

        $category->update($name);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully . ');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return Redirect::back()->with('success', 'Category deleted successfully .');
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store()
    {
        $name = request()->validate([
            'name' => ['required', 'min:3', 'max:25'],
        ]);

        Category::create($name);

        return redirect()->route('categories.index')->with('success', 'Category created successfully . ');
    }
}
