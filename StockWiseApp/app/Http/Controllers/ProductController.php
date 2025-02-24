<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $products = Product::all();

        return view('products.index', compact('products', 'user'));
    }

    public function create()
    {
        $user_type =  Auth::type();
        if($user_type == 'admin'){
            return view('todos.create', compact('user_type'));
        } else {
            return redirect()->route('products.index')->with('error', 'Você não possui permissão para acessar essa página.');
        }
        return view('products.create', compact('user_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'quantity' => 'required|integer',
            'expiration_date' => 'required|date',
            'price' => 'required|numeric',
            'supplier_id' => 'required|integer'
        ]);

        $data = [
            'name' => $request->name,
            'quantity' => $request->quantity,
            'expiration_date' => $request->expiration_date,
            'price' => $request->price,
            'supplier_id' => $request->supplier_id
        ];

        $product = Todo::create($data);

        if ($request->ajax()) {
            return response()->json(['message' => 'Oops! Something happened! Product was not added', 'product' => $product], 201);
        } else {
            return redirect()->route('products.index')->with('success', 'Product created successfully');
        }
    }

    public function edit(Product $product)
    {
        $user_type =  Auth::type();
        if($user_type == 'admin'){
            //NOTE: faz uma view para editar ou simplesmente trona o campo da tabela como editável?? ou ainda, que tal uma modal?
            return view('products.edit', compact('product', 'user_type'));
        } else {
            return redirect()->route('products.index')->with('error', 'Você não possui permissão para acessar essa página.');
        }
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string',
            'quantity' => 'required|integer',
            'expiration_date' => 'required|date',
            'price' => 'required|float',
            'supplier_id' => 'required|integer'
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        //NOTE: should delete? or just keep it as unavailable?
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
