@extends('master')
@section('admin')
    <div class="row">
        <div class="col-md-12   grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="input-group flatpickr" id="flatpickr-date">
                                <input type="text" class="form-control from-date flatpickr-input" placeholder="Start date"
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
                            $suppliers = App\Models\Supplier::all();
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
                    <h6 class="card-title">Purchase Table</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Bill Number</th>
                                    <th>Supplier</th>
                                    <th>Purchase Date</th>
                                    <th>Items</th>
                                    <th>Total</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="showData">
                                @include('pos.purchase.table')
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>




    <script>
        // show all purchase 
        // function showAllPurchase() {
        // $.ajax({
        //     url: '/purchase/view-all',
        //     method: 'GET',
        //     success: function(res) {
        //         if (res.status == 200) {
        //             const purchase = res.purchase;
        //             const supplier = res.supplier;
        //             $('.showData').empty();
        //             if (purchase.length > 0) {
        //                 $.each(purchase, function(index, data) {
        //                     console.log(data);
        //                     const tr = document.createElement('tr');
        //                     tr.innerHTML = `
    //                 <td>
    //                     ${index+1}
    //                 </td>
    //                 <td>
    //                     #${data.id ?? 0}
    //                 </td>
    //                 <td>
    //                     ${data.supplier ?? ""}
    //                 </td>
    //                 <td>

    //                 </td>
    //                 <td>

    //                 </td>
    //                 <td>

    //                 </td>
    //                 `;
        //                     $('.showData').append(tr);
        //                 })
        //             } else {
        //                 $('.showData').html(`
    //                 <tr>
    //                     <td colspan='8'>
    //                         <div class="text-center text-warning mb-2">Data Not Found</div>
    //                         <div class="text-center">
    //                             <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalLongScollable">Add
    //                                 Category<i data-feather="plus"></i></button>
    //                         </div>
    //                     </td>
    //                 </tr>`)
        //             }
        //         } else {
        //             Swal.fire({
        //                 position: "top-end",
        //                 icon: "warning",
        //                 title: "Data Not Found",
        //                 showConfirmButton: false,
        //                 timer: 1500
        //             });
        //         }
        //     }
        // })
        // }
        // showAllPurchase();
    </script>
@endsection
