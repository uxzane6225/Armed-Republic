<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'types' => $request->type
        ]);

        User::create([
            'types' => $request->type
        ]);

        return redirect()->route('types.index')->with('success', 'Type Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('types.edit', compact('types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $request->validate([
            'type' => ['required', 'unique']
        ]);

        $type->update([
            'type' => $request->type
        ]);

        return redirect()->route('types.index')->with('success', 'Type Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'You are not allowed to delete a user!');
        }
        $type->delete();
        return redirect()->route('types.index')->with('success', 'Caetegory deleted successfully');
    }
}
