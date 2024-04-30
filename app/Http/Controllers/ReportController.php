<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Transaction;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    // today report function
    public function todayReport()
    {
        return view('pos.report.today.today');
    }
    // summary report function
    public function summaryReport()
    {
        return view('pos.report.summary.summary');
    }
    // customer due report function
    public function customerDue()
    {
        $customer = Customer::where('branch_id', Auth::user()->branch_id)
            ->where('wallet_balance', '>', 0)
            ->get();
        return view('pos.report.customer.customer_due', compact('customer'));
    }
    // customer due filter function
    public function customerDueFilter(Request $request)
    {
        $customer = Customer::where('id', $request->customerId)->get();
        // return response()->json([
        //     'status' => 200,
        //     'customer' => $customer,
        // ]);
        // dd($customer);
        return view("pos.report.customer.table", compact('customer'))->render();
    }
    // supplier due report function
    public function supplierDueReport()
    {
        $customer = Supplier::where('branch_id', Auth::user()->branch_id)
            ->where('wallet_balance', '>', 0)
            ->get();
        return view('pos.report.supplier.supplier_due', compact('customer'));
    }
    // supplier due filter function
    public function supplierDueFilter(Request $request)
    {
        $customer = Supplier::where('id', $request->customerId)->get();
        // return response()->json([
        //     'status' => 200,
        //     'customer' => $customer,
        // ]);
        // dd($customer);
        return view("pos.report.customer.table", compact('customer'))->render();
    }
    // low stock report function
    public function lowStockReport()
    {
        $products = Product::where('branch_id', Auth::user()->branch_id)
            ->where('stock', '<=', 10)
            ->get();
        // dd($products);
        return view('pos.report.products.low_stock', compact('products'));
    }
    // Top Products  function
    public function topProducts()
    {
        $products = Product::where('branch_id', Auth::user()->branch_id)
            ->orderBy('total_sold', 'desc')
            ->take(20)
            ->get();
        // dd($products);
        return view('pos.report.products.top_products', compact('products'));
    }
    // purchase Report report function
    // purchase Report report function
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
        return view('pos.report.purchase.purchase');
    }
    // public function purchaseReport()
    // {
    //     return view('pos.report.purchase.purchase');
    // }
    // customer Ledger report function
    public function customerLedger()
    {
        return view('pos.report.customer.customer_ledger');
    }
    // customer Ledger Filter function
    public function customerLedgerFilter(Request $request)
    {
        $transactionQuery = Transaction::query();
        // Filter by supplier_id if provided
        if ($request->customerId != "Select Customer") {
            $transactionQuery->where('customer_id', $request->customerId);
        }
        // Filter by date range if both start_date and end_date are provided
        if ($request->startDate && $request->endDate) {
            $transactionQuery->whereBetween('date', [$request->startDate, $request->endDate]);
        }
        $transactions = $transactionQuery->get();
        $customer = Customer::findOrFail($request->customerId);
        return response()->json([
            'status' => 200,
            'transactions' => $transactions,
            'customer' => $customer,
        ]);
        // return view("pos.report.supplier.show_ledger", compact('supplier', 'transactions'))->render();
    }
    // supplier Ledger report function
    public function supplierLedger()
    {
        return view('pos.report.supplier.supplier_ledger');
    }
    // supplier Ledger Filter function
    public function supplierLedgerFilter(Request $request)
    {
        $transactionQuery = Transaction::query();
        // Filter by supplier_id if provided
        if ($request->supplierId != "Select Supplier") {
            $transactionQuery->where('supplier_id', $request->supplierId);
        }
        // Filter by date range if both start_date and end_date are provided
        if ($request->startDate && $request->endDate) {
            $transactionQuery->whereBetween('date', [$request->startDate, $request->endDate]);
        }
        $transactions = $transactionQuery->get();
        $supplier = Supplier::findOrFail($request->supplierId);
        return response()->json([
            'status' => 200,
            'transactions' => $transactions,
            'supplier' => $supplier,
        ]);

        // return view("pos.report.supplier.show_ledger", compact('supplier', 'transactions'))->render();
    }
    // bank Report function
    public function bankReport()
    {
        return view('pos.report.bank.bank');
    }
    //stock Report function
    public function stockReport()
    {
        $products = Product::where('branch_id', Auth::user()->branch_id)->get();
        return view('pos.report.products.stock', compact('products'));
    }
}
