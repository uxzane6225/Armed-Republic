<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->valdiate([
            'category' => ['required', 'unique']
        ]);

        Category::create([
            "category" => $request->category
        ]);

        return redirect()->route('categories.index')->with('success', 'Category Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category' => ['required','unique']
        ]);

        $category->update([
            'category' => $request->category
        ]);

        return redirect()->route('categories.index')->with('success', 'Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'You are not allowed to delete a user!');
        }
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Caetegory deleted successfully');
    }
}
