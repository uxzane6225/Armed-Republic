<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::latest()->paginate(10);

        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'employee_id' => 'required',
        ]);

        Sale::create([
            'customer_id' => $request->customer_id,
            'employee_id' => $request->employee_id,
            'total_cost' => $request->total_cost
        ]);
        
        return redirect()->route('sales.index')->with('success','Sale Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        return view('sales.edit', compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'customer_id' => 'required',
            'employee_id' => 'required',
        ]);

        $sale->update([
            'customer_id' => $request->customer_id,
            'employee_id' => $request->employee_id,
            'total_cost' => $request->total_cost
        ]);

        return redirect()->route('sales.index')->with('success','Sale Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'You are not allowed to delete a user!');
        }
        
        $sale->delete();
        return redirect()->route('types.index')->with('success', 'Sale deleted successfully');
    }
}
