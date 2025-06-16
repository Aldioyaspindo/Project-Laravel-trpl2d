<?php

namespace App\Http\Controllers;

use App\Models\PublishingReport;
use App\Models\SalesReport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\PublishingReportExport;

class ReportController extends Controller
{
    public function publishingIndex()
    {
        $publishingReports = PublishingReport::with('book')->latest()->get();
        return view('publishing_reports.index', compact('publishingReports'));
    }

    public function salesIndex()
    {
        $saleReports = SalesReport::with('sale.book')->latest()->get();
        return view('sales_reports.index', compact('saleReports'));
    }

    public function exportPenerbitanPdf()
    {
        $reports = PublishingReport::with('book')->get();
        $pdf = Pdf::loadView('reports.penerbitan_pdf', compact('reports'));
        return $pdf->download('laporan_penerbitan.pdf');
    }

    public function exportPenerbitanExcel()
    {
        return Excel::download(new PublishingReportExport, 'laporan_penerbitan.xlsx');
    }

    public function exportPenjualanPdf()
    {
        $reports = SalesReport::with('sale.book')->get();
        $pdf = Pdf::loadView('reports.penjualan_pdf', compact('reports'));
        return $pdf->download('laporan_penjualan.pdf');
    }
}
