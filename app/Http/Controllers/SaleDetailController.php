<?php

namespace App\Http\Controllers;

use App\Models\SaleDetail;
use Illuminate\Http\Request;

class SaleDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $saleDetails = SaleDetail::with('product','sale')->get();
        $saleDetails = SaleDetail::latest()->pagination(10);

        return view('saleDetails.index', compact('saleDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('saleDetails.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'sales_id' => 'required',
            'quantity' => 'required'
        ]);

        SaleDetail::create([
            'product_id' => $request->product_id,
            'sales_id' => $request->sales_id,
            'quantity' => $request->quantity
        ]);

        return redirect()->route('saleDetails.index')->with('success','Sale Detail Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SaleDetail $saleDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SaleDetail $saleDetail)
    {
        return view('saleDetails.edit', compact('saleDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SaleDetail $saleDetail)
    {
        $request->validate([
            'product_id' => 'required',
            'sales_id' => 'required',
            'quantity' => 'required'
        ]);

        $saleDetail->update([
            'product_id' => $request->product_id,
            'sales_id' => $request->sales_id,
            'quantity' => $request->quantity
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SaleDetail $saleDetail)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'You are not allowed to delete a user!');
        }
        
        $saleDetail->delete();
        return redirect()->route('saleDetails.index')->with('success', 'Sale deleted successfully');
    }
}
