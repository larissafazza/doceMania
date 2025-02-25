<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        $products = Product::all();
        return view('products.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'seller' => ['required','string','max:255'],
            'address' => ['required','string','max:255'],
            'cellphone' => ['required','string','max:255']
        ]);

        Supplier::create($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Fornecedor criado com sucesso!');
    }

    public function edit(Supplier $supplier)
    {
        $products = Product::all();
        return view('products.edit', compact('products', 'suppliers'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'seller' => ['required','string','max:255'],
            'address' => ['required','string','max:255'],
            'cellphone' => ['required','string','max:255']
        ]);

        $supplier->update($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Fornecedor atualizado com sucesso!');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Fornecedor excluído com sucesso!');
    }
}
