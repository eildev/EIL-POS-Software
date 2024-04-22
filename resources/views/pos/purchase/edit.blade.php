@extends('master')
@section('admin')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Purchase</li>
        </ol>
    </nav>

    {{-- form  --}}
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="card-title">Update Purchase</h6>
                        <button class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModalLongScollable"><i class="fa-solid fa-plus"></i> Add
                            Supplier
                        </button>
                    </div>
                    <form id="signupForm" class="row">
                        <div class="mb-3 col-md-6">
                            <label for="ageSelect" class="form-label">Supplier</label>
                            <select class="js-example-basic-single form-select select-supplier supplier_id"
                                data-width="100%" name="" onclick="errorRemove(this);" onblur="errorRemove(this);">
                                <option value="">Select Supplier</option>
                            </select>
                            <span class="text-danger supplier_id_error"></span>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="password" class="form-label">Purchase Date</label>
                            <div class="input-group flatpickr" id="flatpickr-date">
                                <input type="date" class="form-control purchase_date" placeholder="" data-input
                                    onkeyup="errorRemove(this);" onblur="errorRemove(this);"
                                    value="{{ $purchase->purchse_date }}">
                                <span class="input-group-text input-group-addon" data-toggle><i
                                        data-feather="calendar"></i></span>
                            </div>
                            <span class="text-danger purchase_date_error"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            @php
                                $products = App\Models\Product::get();
                            @endphp
                            <label for="ageSelect" class="form-label">Product</label>
                            <select class="js-example-basic-single form-select product_select" data-width="100%"
                                onclick="errorRemove(this);" onblur="errorRemove(this);">
                                @if ($products->count() > 0)
                                    <option selected disabled>Select Product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                @else
                                    <option selected disabled>Please Add Product</option>
                                @endif
                            </select>
                            <span class="text-danger product_select_error"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- table  --}}
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <h6 class="card-title">Purchase Table</h6>
                    </div>
                    <div id="" class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Product</th>
                                    <th>Rate</th>
                                    <th>Qty</th>
                                    <th>Sub Total</th>
                                    <th>
                                        <i class="fa-solid fa-trash-can"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="showData">
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                Total :
                                            </div>
                                            <div class="col-md-8">
                                                <input type="number" class="form-control total border-0 " name="total"
                                                    readonly value="0.00" />
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                Discount :
                                            </div>
                                            <div class="col-md-8">
                                                @php
                                                    $promotions = App\Models\Promotion::get();
                                                @endphp
                                                <select class="js-example-basic-single form-select promotion_id"
                                                    data-width="100%" onclick="errorRemove(this);"
                                                    onblur="errorRemove(this);">
                                                    @if ($promotions->count() > 0)
                                                        <option selected disabled>Select Discount</option>
                                                        @foreach ($promotions as $promotion)
                                                            <option value="{{ $promotion->id }}">
                                                                {{ $promotion->promotion_name }}
                                                                ({{ $promotion->discount_value }} /
                                                                {{ $promotion->discount_type }})
                                                            </option>
                                                        @endforeach
                                                    @else
                                                        <option selected disabled>Please Add Product</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                Carrying Cost :
                                            </div>
                                            <div class="col-md-8">
                                                <input type="number" class="form-control carrying_cost"
                                                    name="carrying_cost" value="0.00" />
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                Sub Total :
                                            </div>
                                            <div class="col-md-8">
                                                <input type="number" class="form-control grand_total border-0 "
                                                    name="grand_total" readonly value="0.00" />
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="my-3">
                        <button class="btn btn-primary payment_btn" data-bs-toggle="modal" data-bs-target="#paymentModal"><i
                                class="fa-solid fa-money-check-dollar"></i>
                            Payment</button>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModalLongScollable" tabindex="-1" aria-labelledby="exampleModalScrollableTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Supplier Info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="signupForm" class="supplierForm row">
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Supplier Name <span
                                    class="text-danger">*</span></label>
                            <input id="defaultconfig" class="form-control supplier_name" maxlength="255" name="name"
                                type="text" onkeyup="errorRemove(this);" onblur="errorRemove(this);">
                            <span class="text-danger supplier_name_error"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Email</label>
                            <input id="defaultconfig" class="form-control email" maxlength="39" name="email"
                                type="email">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Phone Nnumber <span
                                    class="text-danger">*</span></label>
                            <input id="defaultconfig" class="form-control phone" maxlength="39" name="phone"
                                type="tel" onkeyup="errorRemove(this);" onblur="errorRemove(this);">
                            <span class="text-danger phone_error"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Address</label>
                            <input id="defaultconfig" class="form-control address" maxlength="39" name="address"
                                type="text">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Opening Receivable</label>
                            <input id="defaultconfig" class="form-control opening_receivable" maxlength="39"
                                name="opening_receivable" type="number">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Opening Payable</label>
                            <input id="defaultconfig" class="form-control opening_payable" maxlength="39"
                                name="opening_payable" type="number">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save_supplier">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    {{-- payement modal  --}}
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="exampleModalScrollableTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div id="" class="table-responsive mb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Paying Items :</th>
                                    <th>
                                        <span class="paying_items">0</span>
                                    </th>
                                    <th>Grand Total :</th>
                                    <th>
                                        (<span class="grandTotal">00</span>TK)
                                    </th>
                                </tr>
                                <tr>
                                    <th>Total Payable :</th>
                                    <th>
                                        (<span class="total_payable_amount">00</span>TK)
                                    </th>
                                    <th>Total Due :</th>
                                    <th>
                                        <span class="total_due">0</span>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <form id="signupForm" class="supplierForm row">
                        <div class="mb-3 col-md-12">
                            <label for="name" class="form-label">Note</label>
                            <textarea name="note" class="form-control note" id="" placeholder="Enter Note (Optional)"
                                rows="3"></textarea>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Transaction Method <span
                                    class="text-danger">*</span></label>
                            @php
                                $payments = App\Models\PaymentMethod::get();
                            @endphp
                            <select class="form-select payment_method" data-width="100%" onclick="errorRemove(this);"
                                onblur="errorRemove(this);">
                                @if ($payments->count() > 0)
                                    <option selected disabled>Select Payment Method</option>
                                    @foreach ($payments as $payemnt)
                                        <option value="{{ $payemnt->id }}">
                                            {{ $payemnt->name }}
                                        </option>
                                    @endforeach
                                @else
                                    <option selected disabled>Please Add Transaction</option>
                                @endif
                            </select>
                            <span class="text-danger payment_method_error"></span>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Tax</label>
                            @php
                                $taxs = App\Models\Tax::get();
                            @endphp
                            <select class="form-select tax" data-width="100%" onclick="errorRemove(this);"
                                onblur="errorRemove(this);" value="">
                                @if ($taxs->count() > 0)
                                    <option selected disabled>Select Taxes</option>
                                    @foreach ($taxs as $taxs)
                                        <option value="{{ $taxs->percentage }}">
                                            {{ $taxs->percentage }} %
                                        </option>
                                    @endforeach
                                @else
                                    <option selected disabled>Please Add Transaction</option>
                                @endif
                            </select>
                        </div>
                        <div class="mb-3 col-12">
                            <label for="name" class="form-label">Pay Amount <span
                                    class="text-danger">*</span></label>
                            <div class="d-flex align-items-center">
                                <input class="form-control total_payable border-end-0 rounded-0" name="total_payable"
                                    type="number">
                                <button class="btn btn-info border-start-0 rounded-0 paid_btn">Paid</button>
                            </div>
                            <span class="text-danger total_payable_error"></span>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary purchase_btn"><i class="fa-solid fa-cart-shopping"></i>
                        Purchase</button>
                </div>

            </div>
        </div>
    </div>
@endsection
