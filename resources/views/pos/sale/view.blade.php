@extends('master')
@section('admin')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sale</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12   grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="input-group flatpickr" id="flatpickr-date">
                                <input type="text" class="form-control from-date flatpickr-input"
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
                                <input type="text" class="form-control from-date flatpickr-input" placeholder="End date"
                                    data-input="" readonly="readonly">
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
                                <select class="js-example-basic-single form-select select-supplier supplier_id"
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
                                <button class="btn btn-sm bg-primary text-dark">Reset</button>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="flex text-md-end ">
                                <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0"
                                    onclick="window.print();">
                                    <i class="btn-icon-prepend" data-feather="printer"></i>
                                    Print
                                </button>
                                <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                                    <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                                    Download Report
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Sales Table</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Invoice <br>Number</th>
                                    <th>Customer</th>
                                    <th>Items</th>
                                    <th>Date</th>
                                    <th>Discount</th>
                                    <th>Receivable</th>
                                    <th>Paid</th>
                                    <th>Product <br> Returned</th>
                                    <th>Due</th>
                                    <th>Purchase <br> Cost</th>
                                    <th>Profit</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($sales->count() > 0)
                                    @foreach ($sales as $index => $data)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>#{{ $data->invoice_number ?? 0 }}</td>
                                            <td>{{ $data->customer->name ?? '' }}</td>
                                            <td>
                                                <ul>
                                                    @foreach ($data->saleItem as $item)
                                                        <li>{{ $item->product->name ?? '' }}
                                                            <br>({{ $item->product->barcode ?? '' }})
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>{{ $data->sale_date ?? 0 }}</td>
                                            <td>৳ {{ $data->actual_discount ?? 0 }}</td>
                                            <td>
                                                ৳ {{ $data->receivable ?? 0 }}
                                            </td>

                                            <td>
                                                ৳ {{ $data->paid ?? 0 }}
                                            </td>
                                            <td>
                                                no
                                            </td>
                                            <td>
                                                ৳ {{ $data->due ?? 0 }}
                                            </td>
                                            <td> ৳
                                                @php
                                                    $totalCost = 0;
                                                @endphp
                                                @foreach ($data->saleItem as $item)
                                                    @php
                                                        $totalCost += $item->product->cost ?? 0;
                                                    @endphp
                                                @endforeach
                                                {{ $totalCost }}
                                            </td>
                                            <td>
                                                ৳ @php
                                                    $totalSale = 0;
                                                @endphp
                                                @foreach ($data->saleItem as $item)
                                                    @php
                                                        $totalSale += $item->product->price ?? 0;
                                                    @endphp
                                                @endforeach
                                                {{ $totalSale - $totalCost }}
                                            </td>
                                            <td>
                                                paid
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-warning dropdown-toggle" type="button"
                                                        id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Manage
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <a class="dropdown-item"
                                                            href="{{ route('sale.invoice', $data->id) }}"><i
                                                                class="fa-solid fa-file-invoice me-2"></i> Invoice</a>
                                                        <a class="dropdown-item "
                                                            href="{{ route('sale.view.details', $data->id) }}"><i
                                                                class="fa-solid fa-eye me-2"></i> Show</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                style="transform: rotate(90deg);"
                                                                class="fa-solid fa-arrow-turn-down me-2"></i></i>
                                                            Return</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="fa-solid fa-money-bill me-2"></i> Add Payment</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('sale.edit', $data->id) }}"><i
                                                                class="fa-solid fa-pen-to-square me-2"></i> Edit</a>
                                                        <a class="dropdown-item" id="delete"
                                                            href="{{ route('sale.destroy', $data->id) }}"><i
                                                                class="fa-solid fa-trash-can me-2"></i>Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="9"> No Data Found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
