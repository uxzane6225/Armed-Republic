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
        $products = Product::with('type','category','user')->get();
        $products = Product::latest()->paginate(10);

        return view("products.index", compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $categories = Category::all();

        return view('products.create', compact(['types', 'categories']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','unique:products'],
            'price' => 'required|integer|min:1',
            'stock' => 'required|integer|min:1',
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
        $types = Type::all();
        $categories = Category::all();

        return view('products.edit', compact('product', ['types','categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'type_id' => 'required',
            'category_id' => 'required',
            'employee_id' => 'required'
        ]);

        $product->update([
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
            return redirect()->back()->with('error', 'You are not allowed to delete a Product!');
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product Deleted Successfully');
    }
}
