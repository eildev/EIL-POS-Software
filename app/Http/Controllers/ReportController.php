<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\PurchaseItem;
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
        $purchaseItem =PurchaseItem::all();
        return view('pos.report.purchase.purchase',compact('purchaseItem'));
    }
    public function PurchaseProductFilter(Request $request){

        $purchaseItem = PurchaseItem::when($request->filterProduct, function ($query) use ($request) {
            return $query->where('product_id', $request->filterProduct);
        })

        ->when($request->startDatePurches && $request->endDatePurches, function ($query) use ($request){
            $query->whereHas('Purchas', function($query) use ($request) {
                return $query->whereBetween('purchse_date', [$request->startDatePurches, $request->endDatePurches]);
               });
       })
        // ->when($request->startDate && $request->endDate, function ($query) use ($request) {
        //     return $query->whereBetween('purchse_date', [$request->startDate, $request->endDate]);
        // })
        ->get();
        return view('pos.report.purchase.purchase-filter-table',compact('purchaseItem'))->render();
    }//
    public function PurchaseDetailsInvoice($id){
        $purchase = Purchase::findOrFail($id);
        return view('pos.report.purchase.purchase_invoice',compact('purchase'));
    }
    public function customerLedger()
    {
        return view('pos.report.customer.customer_ledger');
    }
    public function supplierLedger()
    {
        return view('pos.report.supplier.supplier_ledger');
    }
    public function supplierLedgerFilter(Request $request)
    {
        $transactionQuery = Transaction::query();
        // Filter by supplier_id if provided
        if ($request->supplier_id != "Select Supplier") {
            $transactionQuery->where('supplier_id', $request->supplier_id);
        }
        // Filter by date range if both start_date and end_date are provided
        if ($request->startDate && $request->endDate) {
            $transactionQuery->whereBetween('date', [$request->startDate, $request->endDate]);
        }
        $transactions = $transactionQuery->get();
        $supplier = Supplier::findOrFail($request->supplierId);
        // return response()->json([
        //     'status' => 200,
        //     'transactions' => $transactions,
        //     'supplier' => $supplier,
        // ]);

        return view("pos.report.supplier.show_ledger", compact('supplier', 'transactions'))->render();
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
