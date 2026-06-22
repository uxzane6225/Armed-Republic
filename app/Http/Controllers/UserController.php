<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password'=> 'required',
            'confirm' => 'required'
            // 'phone'=> 'required',
            // 'address'=> 'required',
            // 'birthdate' => 'required',
        ]);

        if ($request->password !== $request->confirm) {
            return redirect()->route('users.create')->with('error','Password did not match!');
        }

        

        $user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            // 'phone' => $request->phone,
            // 'address' => $request->address,
            // 'gender' => $request->gender,
            // 'birthdate' => $request->birthdate,
            'role' => $request->role,
        ]);

        return redirect()->route('users.create')->with('success', 'User Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $users = User::all();
        return view('users.edit', compact('user','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            //'password'=> 'required',
            'role' => 'required'
            // 'phone'=> 'required',
            // 'address'=> 'required',
            // 'birthdate' => 'required',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            //'password' => $request->password,
            'role' => $request->role,
            // 'phone' => $request->phone,
            // 'address' => $request->address,
            // 'gender' => $request->gender,
            // 'birthdate' => $request->birthdate,
        ]);

        return redirect()->route('users.index')->with('success', 'User Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'You are not allowed to delete a user!');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
