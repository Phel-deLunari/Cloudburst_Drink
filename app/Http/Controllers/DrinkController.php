<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use Illuminate\Http\Request;

class DrinkController extends Controller
{
    public function index()
    {
        $drinks = Drink::all(); // Hoặc phân quyền theo user nếu cần
        return view('drinks.index', compact('drinks'));
    }

    public function create()
    {
        return view('drinks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'nullable',
            'price' => 'required|numeric',
        ]);

        Drink::create($request->only(['name', 'type', 'price']));

        return redirect()->route('drinks.index')->with('success', 'Drink created successfully.');
    }

    public function show(Drink $drink)
    {
        return view('drinks.show', compact('drink'));
    }

    public function edit(Drink $drink)
    {
        return view('drinks.edit', compact('drink'));
    }

    public function update(Request $request, Drink $drink)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'nullable',
            'price' => 'required|numeric',
        ]);

        $drink->update($request->only(['name', 'type', 'price']));

        return redirect()->route('drinks.index')->with('success', 'Drink updated successfully.');
    }

    public function destroy(Drink $drink)
    {
        $drink->delete();

        return redirect()->route('drinks.index')->with('success', 'Drink deleted successfully.');
    }
}
