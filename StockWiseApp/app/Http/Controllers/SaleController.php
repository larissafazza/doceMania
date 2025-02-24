<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        //NOTE: criar filtros por dia, metodo de pagamento, horários e valor
        $sales = Sales::all();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        //NOTE: verificar se o produto está disponível e se o estoque é suficiente, torná-lo disabled se não estiver
        //fazer modal? ou colocar na própria index?
        $products = Product::all();
        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();

        $report = Report::whereDate('generated_at', Carbon::now()->toDateString())->first();
        $report_id = $report ? $report->id : null;

        $request->validate([
            'client_name' => 'string',
            'total_cost' => 'required|numeric',
            'payment_method' => 'required|string',
        ]);

        $data = [
            'client_name' => $request->client_name,
            'total_cost' => $request->total_cost,
            'payment_method' => $request->payment_method,
            'user_id' => $user_id,
            'report_id' => $report_id
        ];

        $product->quantity -= $request->quantity;
        $product->save();
    }

    public function show(Sale $sale)
    {
        //NOTE: FAZER UMA MODAL APENAS
        return view('sales.show', compact('sale'));
    }

    public function edit(Sale $sale)
    {
        //NOTE: FAZER UMA MODAL APENAS ?
        return view('sales.edit', compact('sale'));
    }

    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'client_name' => 'string',
            'total_cost' => 'required|numeric',
            'payment_method' => 'required|string',
        ]);

        $$sale->update($request->all());

        return redirect()->route('sales.index')->with('success', 'Product updated successfully');
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'Product deleted successfully');
    }
}
