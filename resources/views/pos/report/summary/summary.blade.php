@extends('master')
@section('admin')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Summary Report</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12   grid-margin stretch-card filter_box">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="input-group flatpickr" id="flatpickr-date">
                                <input type="text" class="form-control from-date flatpickr-input start-date"
                                    placeholder="Start date" data-input="" readonly="readonly">
                                <span class="input-group-text input-group-addon" data-toggle=""><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-calendar">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2">
                                        </rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group flatpickr" id="flatpickr-date">
                                <input type="text" class="form-control from-date flatpickr-input end-date"
                                    placeholder="End date" data-input="" readonly="readonly">
                                <span class="input-group-text input-group-addon" data-toggle=""><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-calendar">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2">
                                        </rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg></span>
                            </div>
                        </div>
                        @php
                            $products = App\Models\Product::all();
                            $customers = App\Models\Customer::all();
                        @endphp
                        <div class="col-md-3">
                            <div class="input-group flatpickr" id="flatpickr-date">
                                <select class="js-example-basic-single form-select product_select" data-width="100%">
                                    @if ($products->count() > 0)
                                        <option selected disabled>Select Product</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    @else
                                        <option selected disabled>Please Add Product</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group flatpickr" id="flatpickr-date">
                                <select class="js-example-basic-single form-select select-supplier customer_id"
                                    data-width="100%" name="">
                                    @if ($customers->count() > 0)
                                        <option selected disabled>Select Customer</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    @else
                                        <option selected disabled>Please Add Customer</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="justify-content-left">
                                <button class="btn btn-sm bg-info text-dark mr-2" id="filter">Filter</button>
                                <button class="btn btn-sm bg-primary text-dark" id="reset">Reset</button>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="flex text-md-end ">
                                <button type="button"
                                    class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0 print-btn">
                                    <i class="btn-icon-prepend" data-feather="printer"></i>
                                    Print
                                </button>
                                {{-- <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                                    <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                                    Download Report
                                </button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!--//Top Sale Product Start// --->
        <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <h6 class="card-title text-info">Top Sale Product</h6>

                            <div id="" class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                        <tr>
                                            <th>SN#</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>No Of Sales</th>
                                            <th>Sale Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody class="showData">
                                    @if ($products->count() > 0)
                                        @php
                                            $num = 0;
                                        @endphp
                                        <?php
                                        $totalSaleAmount = 0;
                                        $totalQty = 0;
                                        $totalNoSale = 0;
                                        ?>
                                    @foreach ($products as $key => $productItem)
                                        <tr>
                                        <td>{{ $num++ }}</td>
                                        <td>{{ $productItem->name ?? ''}}</td>
                                        @php
                        $purchaseItems = App\Models\PurchaseItem::where('product_id', $productItem->id)->get();
                         $totalPurchaseQuantity = $purchaseItems->sum('quantity');

                        $saleItems = App\Models\SaleItem::where('product_id', $productItem->id)->get();

                        $totalsaleQuantity = $saleItems->sum('qty');
                        $totalSalePrice = $saleItems->sum('sub_total');
                        $noOfSales = $totalsaleQuantity - $totalPurchaseQuantity
                                         @endphp

                                        <td> {{ $totalsaleQuantity ?? 0 }}</td>
                                        <td>{{$noOfSales}}</td>
                                        <td>{{$totalSalePrice ?? 0}}</td>
                                        <?php
                                        $totalSaleAmount += isset($totalSalePrice) ? $totalSalePrice : 0;
                                        $totalQty += isset($totalsaleQuantity) ? $totalsaleQuantity : 0;
                                        $totalNoSale  += isset($noOfSales) ? $noOfSales : 0;
                                        ?>

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="12">
                                        <div class="text-center text-warning mb-2">Data Not Found</div>
                                    </td>
                                </tr>
                               @endif
                               <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Qty : {{$totalQty}}</th>
                                    <th>Total : {{$totalNoSale}}</th>
                                    <th>Total : {{$totalSaleAmount}}Tk</th>
                                </tr>
                            </tfoot>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
      <!--//Top Sale Product End// --->

    <!-- //Expense Start// --->
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h6 class="card-title text-info">Expense</h6>

                <div id="" class="table-responsive">
                    <table id="dataTableExample2" class="table">
                        <thead>
                            <tr>
                                <th>SN#</th>
                                <th>Expense Purpose</th>
                                <th>Category</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody class="showData">
                        @if ($product->count() > 0)
                            @php
                                $num = 0;
                            @endphp
                        <?php
                        $totalAmount = 0;
                        ?>
                        @foreach ($expense as $key => $expenseData)
                            <tr>
                            <td>{{ $num++ }}</td>
                            <td>{{ $expenseData->purpose ?? ''}}</td>
                            <td>{{$expenseData['expenseCat']['name']  ?? ''}}</td>
                            <td>{{ $expenseData->amount ??''}}</td>
                            <?php $totalAmount += isset($expenseData->amount) ? $expenseData->amount : 0; ?>
                        </tr>
                    @endforeach
                   @else
                    <tr>
                        <td colspan="12">
                            <div class="text-center text-warning mb-2">Data Not Found</div>
                        </td>
                    </tr>
                   @endif

                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th><strong>Total : {{ $totalAmount }} Tk</strong></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
       <!-- //Expense End// --->
    </div> <!-- //Row End//--->


@endsection
