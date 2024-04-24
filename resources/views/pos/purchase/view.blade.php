@extends('master')
@section('admin')

    <div class="row">
        <div class="col-md-12   grid-margin stretch-card filter_box">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="input-group flatpickr" id="flatpickr-date">
                                <input type="text" class="form-control from-date flatpickr-input start-date"
                                    placeholder="Start date" data-input="" readonly="readonly" name="start_date">
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
                                    placeholder="End date" data-input="" readonly="readonly" name="end_date">
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
                            $suppliers = App\Models\Supplier::all();
                        @endphp
                        <div class="col-md-3">
                            <div class="input-group flatpickr" id="flatpickr-date">
                                <select class="js-example-basic-single form-select product_select" data-width="100%"
                                    name="product_id">
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
                                <select style="height: 40px !important"
                                    class="js-example-basic-single form-select select-supplier supplier_id"
                                    data-width="100%" name="supplier_id">
                                    @if ($suppliers->count() > 0)
                                        <option selected disabled>Select Supplier</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                        @endforeach
                                    @else
                                        <option selected disabled>Please Add Supplier</option>
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
                            <div class="flex text-md-end btn_group">
                                <button type="button"
                                    class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0 print-btn">
                                    <i class="btn-icon-prepend" data-feather="printer"></i>
                                    Print
                                </button>
                                {{-- 
                                <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                                    <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                                    Download Report
                                </button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Purchase Table</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th class="id">#</th>
                                    <th>Bill Number</th>
                                    <th>Supplier</th>
                                    <th>Purchase Date</th>
                                    <th>Items</th>
                                    <th>Total</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    <th class="id">Action</th>
                                </tr>
                            </thead>
                            <tbody id="showData">
                                @include('pos.purchase.table')
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <style>
        @media print {
            .page-content {
                margin-top: 0 !important;
                padding-top: 0 !important;
            }

            button,
            a,
            .filter_box,
            nav,
            .footer,
            .id,
            .dataTables_filter,
            .dataTables_length,
            .dataTables_info {
                display: none !important;
            }

            table {
                padding-right: 50px !important;
            }
        }
    </style>



    <script>
        document.querySelector('#filter').addEventListener('click', function(e) {
            e.preventDefault();
            // alert('ok');
            let startDate = document.querySelector('.start-date').value;
            let endDate = document.querySelector('.end-date').value;

            let product_id = document.querySelector('.product_select').value;
            let supplier_id = document.querySelector('.supplier_id').value;

            // alert(supplier_id);
            $.ajax({
                url: "{{ route('purchase.filter') }}",
                method: 'GET',
                data: {
                    startDate,
                    endDate,
                    product_id,
                    supplier_id,
                },
                success: function(res) {
                    jQuery('#showData').html(res);
                }
            });
        });

        document.querySelector('#reset').addEventListener('click', function(e) {
            e.preventDefault();
            $('.start-date').val("");
            $('.end-date').val("");
            $('.product_select').val(null).trigger('change');
            $('.supplier_id').val(null).trigger('change');
        });

        $('.print-btn').click(function() {
            // Remove the id attribute from the table
            $('#dataTableExample').removeAttr('id');
            $('.table-responsive').removeAttr('class');
            // Trigger the print function
            window.print();
            // Restore the id attribute after printing
            // $('#dataTableExample').attr('id', 'dataTableExample');
        });
    </script>
@endsection
