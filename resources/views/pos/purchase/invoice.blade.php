@extends('master')
@section('admin')
    @php
        $branch = App\Models\Branch::findOrFail($purchase->branch_id);
        $supplier = App\Models\Supplier::findOrFail($purchase->supplier_id);
        $products = App\Models\PurchaseItem::where('purchase_id', $purchase->id)->get();
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-none">
                <div class="card-body ">
                    <div class="container-fluid d-flex justify-content-between">
                        <div class="col-lg-3 ps-0">
                            <a href="#" class="noble-ui-logo logo-light d-block mt-3">EIL<span>POS</span></a>
                            <p class="mt-1 mb-1 show_branch_name"><b>{{ $branch->name ?? '' }}</b></p>
                            <p class="show_branch_address">{{ $branch->address ?? 'accordion ' }}</p>
                            <p class="show_branch_email">{{ $branch->email ?? '' }}</p>
                            <p class="show_branch_phone">{{ $branch->phone ?? '' }}</p>


                        </div>
                        <div class="col-lg-3 pe-0 text-end">
                            <p class="mt-1 mb-1 show_supplier_name"><b>{{ $supplier->name ?? '' }}</b></p>
                            <p class="show_supplier_address">{{ $supplier->address ?? '' }}</p>
                            <p class="show_supplier_email">{{ $supplier->email ?? '' }}</p>
                            <p class="show_supplier_phone">{{ $supplier->phone ?? '' }}</p>
                            <p class="text-end mb-1 mt-5">Total </p>
                            <h4 class="text-end fw-normal">৳ {{ $purchase->total_amount ?? 00.0 }}</h4>
                            <h6 class="mb-0 mt-2 text-end fw-normal"><span class="text-muted show_purchase_date">Invoice
                                    Date :</span> {{ $purchase->purchse_date ?? '' }}</h6>
                        </div>
                    </div>
                    <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                        <div class="table-responsive w-100">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Description</th>
                                        <th class="text-end">Quantity</th>
                                        <th class="text-end">Unit cost</th>
                                        <th class="text-end">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($products->count() > 0)
                                        @foreach ($products as $index => $product)
                                            <tr class="text-end">
                                                <td class="text-start">{{ $index + 1 }}</td>
                                                <td class="text-start">{{ $product->product->name }}</td>
                                                <td>{{ $product->quantity }}</td>
                                                <td>{{ $product->unit_price }}</td>
                                                <td>{{ $product->total_price }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="text-end">
                                            <td class="text-start">1</td>
                                            <td class="text-start">PSD to html conversion</td>
                                            <td>02</td>
                                            <td>$55</td>
                                            <td>$110</td>
                                        </tr>
                                        <tr class="text-end">
                                            <td class="text-start">2</td>
                                            <td class="text-start">Package design</td>
                                            <td>08</td>
                                            <td>$34</td>
                                            <td>$272</td>
                                        </tr>
                                        <tr class="text-end">
                                            <td class="text-start">3</td>
                                            <td class="text-start">Html template development</td>
                                            <td>03</td>
                                            <td>$500</td>
                                            <td>$1500</td>
                                        </tr>
                                        <tr class="text-end">
                                            <td class="text-start">4</td>
                                            <td class="text-start">Redesign</td>
                                            <td>01</td>
                                            <td>$30</td>
                                            <td>$30</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="container-fluid mt-5 w-100">
                        <div class="row">
                            <div class="col-md-6 ms-auto">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Sub Total</td>
                                                <td class="text-end">$ 14,900.00</td>
                                            </tr>
                                            <tr>
                                                <td>TAX (12%)</td>
                                                <td class="text-end">$ 1,788.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-bold-800">Total</td>
                                                <td class="text-bold-800 text-end"> $ 16,688.00</td>
                                            </tr>
                                            <tr>
                                                <td>Payment Made</td>
                                                <td class="text-danger text-end">(-) $ 4,688.00</td>
                                            </tr>
                                            <tr class="bg-dark">
                                                <td class="text-bold-800">Balance Due</td>
                                                <td class="text-bold-800 text-end">$ 12,000.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid w-100 btn_group">
                        {{-- <a href="javascript:;" class="btn btn-primary float-end mt-4 ms-2"><i data-feather="send"
                                class="me-3 icon-md"></i>Send Invoice</a> --}}
                        <a href="javascript:;" class="btn btn-outline-primary float-end mt-4" onclick="window.print();"><i
                                data-feather="printer" class="me-2 icon-md"></i>Print</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        @media print {

            nav,
            .footer {
                display: none !important;
            }

            .page-content {
                margin-top: 0 !important;
                padding-top: 0 !important;
            }

            .btn_group {
                display: none !important;
            }
        }
    </style>
@endsection
