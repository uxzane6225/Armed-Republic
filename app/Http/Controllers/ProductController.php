<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $products = Product::with(['type','category'])->get();

        return view("products.index", compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = Type::all();
        $category = Category::all();

        return view('products.create', compact(['type', 'category']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','unique'],
            'price' => 'required',
            'stock' => 'required',
            'type_id' => 'required',
            'category_id' => 'required',
            'employee_id' => 'required'
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'type_id' => $request->type_id,
            'category_id' => $request->category_id,
            'employee_id' => $request->employee_id
        ]);

        return redirect()->route('products.index')->with('success','Product Added Succesfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => ['required','unique'],
            'price' => 'required',
            'stock' => 'required',
            'type_id' => 'required',
            'category_id' => 'required',
            'employee_id' => 'required'
        ]);

        $product::udpate([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'type_id' => $request->type_id,
            'category_id' => $request->category_id,
            'employee_id' => $request->employee_id
        ]);

        return redirect()->route('products.index')->with('success', 'Product Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'You are not allowed to delete a user!');
        }

        $user->delete();
        return redirect()->route('products.index')->with('success', 'User deleted successfully');
    }
}
