<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $products = Product::where('branch_id', Auth::user()->branch_id)
            ->where('stock', '<=', 10)
            ->get();
        // dd($products);
        return view('pos.report.products.low_stock', compact('products'));
    }
    public function topProducts()
    {
        $products = Product::where('branch_id', Auth::user()->branch_id)
            ->orderBy('total_sold', 'desc')
            ->take(20)
            ->get();
        // dd($products);
        return view('pos.report.products.top_products', compact('products'));
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
        // $transaction = Transaction::where('branch_id', Auth::user()->branch_id)
        //     ->get();
        return view('pos.report.supplier.supplier_ledger');
    }
    public function bankReport()
    {
        return view('pos.report.bank.bank');
    }
    public function stockReport()
    {
        $products = Product::where('branch_id', Auth::user()->branch_id)->get();
        return view('pos.report.products.stock', compact('products'));
    }
}
