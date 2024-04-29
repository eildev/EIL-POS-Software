@extends('master')
@section('admin')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sale</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="card-title">POS Sale</h6>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="ageSelect" class="form-label">Barcode</label>
                            <div class="input-group">
                                <div class="input-group-text" id="btnGroupAddon"><i class="fa-solid fa-barcode"></i></div>
                                <input type="text" class="form-control barcode_input" placeholder="Barcode"
                                    aria-label="Input group example" aria-describedby="btnGroupAddon">
                            </div>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="password" class="form-label">Date</label>
                            <div class="input-group flatpickr" id="flatpickr-date">
                                <input type="date" class="form-control purchase_date" placeholder="" data-input
                                    onkeyup="errorRemove(this);" onblur="errorRemove(this);">
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
                        <div class="mb-3 col-md-6">
                            <label for="password" class="form-label">Customer</label>
                            <div class="d-flex g-3">
                                <select class="js-example-basic-single form-select select-customer" data-width="100%"
                                    onclick="errorRemove(this);" onblur="errorRemove(this);">

                                </select>
                                <button class="btn btn-primary ms-2" data-bs-toggle="modal"
                                    data-bs-target="#customerModal">Add</button>
                            </div>
                        </div>
                    </div>
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
                                    <th>Price</th>
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
    <div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="exampleModalScrollableTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Customer Info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form class="customerForm row">
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Customer Name <span
                                    class="text-danger">*</span></label>
                            <input id="defaultconfig" class="form-control customer_name" maxlength="255" name="name"
                                type="text" onkeyup="errorRemove(this);" onblur="errorRemove(this);">
                            <span class="text-danger customer_name_error"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Phone Nnumber <span
                                    class="text-danger">*</span></label>
                            <input id="defaultconfig" class="form-control phone" maxlength="39" name="phone"
                                type="tel" onkeyup="errorRemove(this);" onblur="errorRemove(this);">
                            <span class="text-danger phone_error"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Email</label>
                            <input id="defaultconfig" class="form-control email" maxlength="39" name="email"
                                type="email">
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
                    <button type="button" class="btn btn-primary save_new_customer">Save</button>
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
                    <button type="button" class="btn btn-primary order_btn"><i class="fa-solid fa-cart-shopping"></i>
                        Order</button>
                </div>

            </div>
        </div>
    </div>



    <script>
        // error remove 
        function errorRemove(element) {
            if (element.value != '') {
                $(element).siblings('span').hide();
                $(element).css('border-color', 'green');
            }
        }

        $(document).ready(function() {
            $('.barcode_input').focus();
            var currentDate = new Date().toISOString().split('T')[0];
            $('.purchase_date').val(currentDate);
            // show error 
            function showError(name, message) {
                $(name).css('border-color', 'red');
                $(name).focus();
                $(`${name}_error`).show().text(message);
            }

            // customer view function 
            function viewCustomer() {
                $.ajax({
                    url: '/get/customer',
                    method: 'GET',
                    success: function(res) {
                        const customers = res.allData;
                        // console.log(customers);
                        $('.select-customer').empty();
                        if (customers.length > 0) {
                            $('.select-customer').html(
                                `<option selected disabled>Select a Customer</option>`);
                            $.each(customers, function(index, customer) {
                                $('.select-customer').append(
                                    `<option value="${customer.id}">${customer.name}(${customer.phone})</option>`
                                );
                            })
                        } else {
                            $('.select-customer').html(`
                            <option selected disable>Please add Customer</option>`)
                        }
                    }
                })
            }
            viewCustomer();

            const saveCustomer = document.querySelector('.save_new_customer');
            saveCustomer.addEventListener('click', function(e) {
                e.preventDefault();
                // alert('ok')
                let formData = new FormData($('.customerForm')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/add/customer',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if (res.status == 200) {
                            // console.log(res);
                            $('#customerModal').modal('hide');
                            $('.customerForm')[0].reset();
                            viewCustomer();
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: res.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            // console.log(res);
                            if (res.error.name) {
                                showError('.customer_name', res.error.name);
                            }
                            if (res.error.phone) {
                                showError('.phone', res.error.phone);
                            }
                        }
                    }
                });
            })


            // calculate quantity 
            let totalQuantity = 0;

            // Function to update total quantity
            function updateTotalQuantity() {
                totalQuantity = 0;
                $('.quantity').each(function() {
                    let quantity = parseFloat($(this).val());
                    if (!isNaN(quantity)) {
                        totalQuantity += quantity;
                    }
                });
                // console.log(totalQuantity);
            }
            // Function to update SL numbers
            function updateSLNumbers() {
                $('.showData > tr').each(function(index) {
                    $(this).find('td:first').text(index + 1);
                });
            }


            // select product 
            $('.product_select').change(function() {
                let id = $(this).val();

                // alert(id);
                if ($(`.data_row${id}`).length === 0 && id) {
                    $.ajax({
                        url: '/product/find/' + id,
                        type: 'GET',
                        dataType: 'JSON',
                        success: function(res) {
                            const product = res.data;
                            $('.showData').append(
                                `<tr class="data_row${product.id}">
                                    <td>

                                    </td>
                                    <td>
                                        <input type="text" class="form-control product_name${product.id} border-0 "  name="product_name[]" readonly value="${product.name ?? ""}" />
                                    </td>
                                    <td>
                                        <input type="hidden" class="product_id" name="product_id[]" readonly value="${product.id ?? 0}" />
                                        <input type="number" class="form-control product_price${product.id} border-0 "  name="unit_price[]" readonly value="${product.price ?? 0}" />
                                    </td>
                                    <td>
                                        <input type="number" product-id="${product.id}" class="form-control quantity" name="quantity[]" value="1" />
                                    </td>
                                    <td>
                                        <input type="number" class="form-control product_subtotal${product.id} border-0 "  name="total_price[]" readonly value="${product.price ?? 0}" />
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-danger btn-icon purchase_delete" data-id=${product.id}>
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>`
                            );
                            // Update SL numbers
                            updateSLNumbers();
                            updateGrandTotal();
                        }
                    })
                }
            })


            // Function to recalculate total
            function calculateTotal() {
                let total = 0;
                $('.quantity').each(function() {
                    let productId = $(this).attr('product-id');
                    let qty = parseFloat($(this).val());
                    let price = parseFloat($('.product_price' + productId).val());
                    total += qty * price;
                });
                $('.total').val(total.toFixed(2));
            }

            // grandTotalCalulate
            function calculateGrandTotal() {
                let id = $('.promotion_id').val();
                let total = parseFloat($('.total').val());
                if (id) {
                    $.ajax({
                        url: `/promotion/find/${id}`,
                        type: 'GET',
                        dataType: 'JSON',
                        success: function(res) {
                            // console.log(res)
                            const promotion = res.data;
                            if (promotion.discount_type == 'percentage') {
                                let grandTotalAmount = parseFloat(total - ((total * promotion
                                    .discount_value) / 100)).toFixed(2);
                                $('.grand_total').val(grandTotalAmount);
                            } else {
                                let grandTotalAmount = parseFloat(total - promotion.discount_value)
                                    .toFixed(2);
                                $('.grand_total').val(grandTotalAmount);
                            }
                        }
                    })
                } else {
                    $('.grand_total').val(total)
                }
            }
            calculateGrandTotal();
            // Function to update grand total when a product is added or deleted
            function updateGrandTotal() {
                calculateTotal();
                calculateGrandTotal();
                updateTotalQuantity();
            }

            $(document).on('keyup', '.quantity', function() {
                let id = $(this).attr("product-id")
                let quantity = $(this).val();
                quantity = parseInt(quantity);
                let productPrice = $('.product_price' + id).val();
                productPrice = parseFloat(productPrice);
                let subTotal = $('.product_subtotal' + id);
                let subTotalPrice = parseFloat(quantity * productPrice).toFixed(2);
                subTotal.val(subTotalPrice);
                updateGrandTotal();
            })

            // discount 
            $('.promotion_id').change(function() {
                calculateGrandTotal();
            })


            // purchase Delete 
            $(document).on('click', '.purchase_delete', function(e) {
                // alert('ok');
                let id = $(this).attr('data-id');
                let dataRow = $('.data_row' + id);
                dataRow.remove();
                // Recalculate grand total
                updateGrandTotal();
                updateSLNumbers();
                updateTotalQuantity();
            })


            // payment button click event
            $('.payment_btn').click(function(e) {
                e.preventDefault();
                // $('.total_payable_amount').text($('.grand_total').val());
                $('.total_due').text($('.grand_total').val());
                $('.grandTotal').text($('.grand_total').val());
                $('.paying_items').text(totalQuantity);

            })

            // paid amount 
            $('.paid_btn').click(function(e) {
                e.preventDefault();
                // alert('ok');
                let grandTotal = $('.grandTotal').text();
                $('.total_payable').val(grandTotal);
                $('.total_payable_amount').text(grandTotal);
                totalDue();
            })

            // total_payable
            $('.total_payable').keyup(function(e) {
                let grandTotal = parseFloat($('.grandTotal').text());
                let value = parseFloat($(this).val());

                totalDue();
                $('.total_payable_amount').text(value);
            })

            // due 
            function totalDue() {
                let pay = $('.total_payable').val();
                let grandTotal = parseFloat($('.grandTotal').text());
                let due = (grandTotal - pay).toFixed(2);
                $('.total_due').text(due);
            }


            $('.tax').change(function() {
                let grandTotal = parseFloat($('.grand_total').val());
                let value = parseFloat($(this).val());
                // alert(value);

                let taxTotal = ((grandTotal * value) / 100);
                taxTotal = (taxTotal + grandTotal).toFixed(2);
                $('.grandTotal').text(taxTotal);
                $('.total_due').text(taxTotal);
            })


            // order btn 
            $('.order_btn').click(function(e) {
                e.preventDefault();
                // alert('ok');
                let customer_id = $('.select-customer').val();
                let sale_date = $('.purchase_date').val();
                let quantity = totalQuantity;
                let total_amount = parseFloat($('.total').val());
                let discount = $('.promotion_id').val();
                let total = parseFloat($('.grand_total').val());
                let tax = $('.tax').val();
                let change_amount = parseFloat($('.grandTotal').text());
                let actual_discount = change_amount - total;
                let paid = $('.total_payable').val();
                let due = change_amount - paid;
                let note = $('.note').val();
                let payment_method = $('.payment_method').val();
                // let product_id = $('.product_id').val();
                // console.log(total_quantity);

                let products = [];

                $('tr[class^="data_row"]').each(function() {
                    let row = $(this);
                    // Get values from the current row's elements
                    let product_id = row.find('.product_id').val();
                    let quantity = row.find('input[name="quantity[]"]').val();
                    let unit_price = row.find('input[name="unit_price[]"]').val();

                    // Create an object with the gathered data
                    let product = {
                        product_id,
                        quantity,
                        unit_price,
                    };

                    // Push the object into the products array
                    products.push(product);
                });

                let allData = {
                    // for purchase table 
                    customer_id,
                    sale_date,
                    quantity,
                    total_amount,
                    discount,
                    actual_discount,
                    total,
                    change_amount,
                    tax,
                    paid,
                    due,
                    note,
                    payment_method,
                    products
                }

                // console.log(allData);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/sale/store',
                    type: 'POST',
                    data: allData,
                    success: function(res) {
                        if (res.status == 200) {
                            // console.log(res.data);
                            $('#paymentModal').modal('hide');
                            // $('.supplierForm')[0].reset();
                            // supplierView();
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: res.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                            let id = res.saleId;
                            // console.log(id)

                            window.location.href = '/sale/invoice/' + id;

                        } else {

                            if (res.error.payment_method == null) {
                                $('#paymentModal').modal('hide');
                                if (res.error.customer_id) {
                                    showError('.select-customer', res.error.customer_id);
                                }
                                if (res.error.products) {
                                    showError('.product_select', res.error.products);
                                }
                                if (res.error.sale_date) {
                                    showError('.purchase_date', res.error.sale_date);
                                }
                            } else {
                                if (res.error.payment_method) {
                                    showError('.payment_method', res.error.payment_method);
                                }
                            }
                        }
                    }
                });

            })
        })
    </script>
@endsection
