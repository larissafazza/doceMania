<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Response;
use App\Models\Product;
use App\Models\Sale;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function missing()
    {
        $missingProducts = Product::where('quantity', '<=', 0)->get();

        return view('reports.missing', compact('missingProducts'));
    }
    public function expiration()
    {
        $today = Carbon::now();
        $limitDate = $today->addDays(30);
        $expiringProducts = Product::whereBetween('expiration_date', [Carbon::now(), $limitDate])
            ->orderBy('expiration_date', 'asc')
            ->get();

        return view('reports.expiration', compact('expiringProducts'));
    }

    public function invoicing()
    {

        $today = Carbon::today();
        $sales = Sale::whereDate('date_time', $today)
            ->orderBy('date_time', 'desc')
            ->get();
        $totalSales = $sales->sum('total_cost');

        return view('reports.invoicing', compact('sales', 'today', 'totalSales'));
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
        //NOTE: Atualiza automaticamente com as vendas (?) vai poder alterar?
    }

    public function exportPdf()
    {
        $missingProducts = Product::where('quantity', '<=', 0)->get();

        $pdf = Pdf::loadView('reports.missing_pdf', compact('missingProducts'));

        return $pdf->download('lista_de_faltas.pdf');
    }

    public function exportInvoicingPdf()
    {
        $today = Carbon::today();
        $sales = Sale::whereDate('created_at', $today)->get();
        $totalSales = $sales->sum('total_cost');

        $pdf = Pdf::loadView('reports.invoicing_pdf', compact('sales', 'today', 'totalSales'));

        return $pdf->download('faturamento_' . $today->format('Y-m-d') . '.pdf');
    }
}
