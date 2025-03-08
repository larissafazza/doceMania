<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        //NOTE: no front, verificar se está no final do dia, e só disponibilizar a opção de imprimir se estiver
        // user = auth()->user();
        $date = now()->toDateString();
        $products = Product::all();
        $currentReport = Report::whereDate('date', $date)->first();
        $sales = $currentReport->sales;

        return view('reports.index', compact('products', 'sales', 'currentReport', 'date'));
    }

    public function create()
    {
        //NOTE: it creates automatically in the beginning of the day when the login is made in the day

        $existingReport = Report::whereDate('date', now()->toDateString())->first();

        if ($existingReport) {
            return redirect()->route('reports.index');
        }

        $report = new Report();
        $report->date = now();
        $report->save();

        return redirect()->route('reports.index')->with('success', 'Relatório criado com sucesso');
    }

    public function show(Report $report)
    {
        $sales = $report->sales;
        return view('reports.show', compact('report','sales'));
    }

    public function edit(Report $report)
    {
        //NOTE: É possível editar um relatório? uma vez que ele é automático de acordo com as vendas?
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        //NOTE: Atualiza automaticamente com as vendas
    }

    public function destroy(Report $report)
    {
        //NOTE: não remover histórico
    }
}
