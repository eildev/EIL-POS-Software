<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function todayReport()
    {
        return view('pos.report.today.today');
    }
    public function summaryReport()
    {
        return view('pos.report.summary.summary');
    }
    public function customerDueReport()
    {
        return view('pos.report.customer.customer_due');
    }
    public function supplierDueReport()
    {
        return view('pos.report.supplier.supplier_due');
    }
    public function lowStockReport()
    {
        return view('pos.report.products.low_stock');
    }
    public function topProducts()
    {
        return view('pos.report.products.top_products');
    }
    public function purchaseReport()
    {
        return view('pos.report.purchase.purchase');
    }
    public function customerLedger()
    {
        return view('pos.report.customer.customer_ledger');
    }
    public function supplierLedger()
    {
        return view('pos.report.supplier.supplier_ledger');
    }
    public function bankReport()
    {
        return view('pos.report.bank.bank');
    }
    public function stockReport()
    {
        return view('pos.report.products.stock');
    }
}
