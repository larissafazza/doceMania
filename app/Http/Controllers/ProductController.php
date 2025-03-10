<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Http\Controllers\SupplierController;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        return view('products.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'quantity' => 'required|integer',
            'expiration_date' => 'required|date',
            'price' => 'required|numeric',
            'cost' => 'required|numeric',
            'supplier_id' => 'required|integer'
        ]);

        $data = [
            'name' => $request->name,
            'quantity' => $request->quantity,
            'expiration_date' => $request->expiration_date,
            'price' => $request->price,
            'cost' => $request->price,
            'supplier_id' => $request->supplier_id
        ];

        $product = Product::create($data);

        return redirect()->route('products.create')->with('success', 'Produto criado com sucesso!');
        // if ($request->ajax()) {
        //     return response()->json(['message' => 'Oops! Something happened! Product was not added', 'product' => $product], 201);
        // } else {
        //     return response()->json([
        //         'success' => true,
        //         'message' => 'Produto criado com sucesso',
        //         'product' => $product
        //     ]);
        // }
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

    public function getProducts($query, array $filters)
    {
        return Product::all()->filter()->get();
      
        // $query->when($filters['search'] ?? false, fn($query, $search) => 
        //     $query
        //         ->where('name', 'like', '%',  ))
        // //NOTE: should delete? or just keep it as unavailable?
        // $product->delete();

        // return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
