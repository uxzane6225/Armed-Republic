<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;

class SaleDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $saleDetails = SaleDetail::with('products','sales')->get();
        // $saleDetails = SaleDetail::latest()->paginate(10);

        // return view('saleDetails.index', compact('saleDetails', 'sale'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $products = Product::all();

        // return view('saleDetails.create', compact('sale', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'sales_id' => 'required',
            'quantity' => 'required|integer|min:1'
        ]);

        if ($request->quantity < 1) {
            return redirect()->route('sales.show', ['sale' => $request->sales_id])->with('error', 'Product quantity cannot be 0 or under.');
        }

        $stock = Product::where('id', $request->product_id)->value('stock');
        $price = Product::where('id', $request->product_id)->value('price');

        $total_cost = $price * $request->quantity;


        if ($stock < $request->quantity) {
            return redirect()->route('sales.show', ['sale' => $request->sales_id])->with('error','Product quantity being sold exceeds available stock.');
        }

        SaleDetail::create([
            'product_id' => $request->product_id,
            'sales_id' => $request->sales_id,
            'quantity' => $request->quantity
        ]);

        Sale::where('id', $request->sales_id)->increment('total_cost', $total_cost);
        Product::where('id',$request->product_id)->decrement('stock', $request->quantity);

        // Product::update([
        //     'stock' => $request->quantity
        // ]);

        return redirect()->route('sales.show', $request->sales_id)->with('success','Sale Detail Added Successfully!');
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
    public function edit(SaleDetail $saleDetail, Sale $sale)
    {
        $products = Product::all();
        return view('saleDetails.edit', compact('saleDetail', 'sale', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SaleDetail $saleDetail)
    {
        $request->validate([
            'product_id' => 'required',
            //'sales_id' => 'required',
            'quantity' => 'required|integer|min:1'
        ]);

        $stock = Product::where('id', $request->product_id)->value('stock');
        $price = Product::where('id', $request->product_id)->value('price');

        $sales_id = SaleDetail::where('id', $saleDetail->id)->value('sales_id');
        $current_quantity =  SaleDetail::where('id', $saleDetail->id)->value('quantity');

        $saleDetail->sales_id;

        //$current_total_cost = Sale::where('id', $sales_id)->value('total_cost');
        $new_detail_total = $price * $request->quantity; // 300

        $current_detail_total = $price * $current_quantity; // 500
        //$subTractedTotall = $current_total_cost - $current_detail_total;

        $new_total_cost = 0;
        
        if ($stock < $request->quantity) {
            return redirect()->route('saleDetails.edit', $saleDetail->id)->with('error','Product quantity being sold exceeds available stock.');
        }

        if ($current_detail_total > $new_detail_total) {
            $difference = $current_detail_total - $new_detail_total;
            //$new_total_cost = $current_total_cost - $difference;
            Sale::where('id', $saleDetail->sales_id)->decrement('total_cost', $difference);
        }
        else if ($current_detail_total < $new_detail_total) {
            $difference = $new_detail_total - $current_detail_total;
            //$new_total_cost = $current_total_cost + $difference;
            Sale::where('id', $saleDetail->sales_id)->increment('total_cost', $difference);
        }

        if ($current_quantity > $request->quantity) {
            $extra = $current_quantity - $request->quantity;
            Product::where('id',$request->product_id)->increment('stock', $extra);
        }
        else {
            $extra = $request->quantity - $current_quantity;
            Product::where('id',$request->product_id)->decrement('stock', $extra);
        }

        $saleDetail->update([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity
        ]);

        return redirect()->route('sales.show', ['sale' => $sales_id])->with('success','Sale Detail Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SaleDetail $saleDetail)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'You are not allowed to delete a user!');
        }

        $price = Product::where('id', $saleDetail->product_id)->value('price');
        $total = $price * $saleDetail->quantity;

        Sale::where('id', $saleDetail->sales_id)->decrement('total_cost', $total);
        Product::where('id', $saleDetail->product_id)->increment('stock', $saleDetail->quantity);
        
        $saleDetail->delete();
        return redirect()->route('sales.index')->with('success', 'Sale deleted successfully');
    }
}
