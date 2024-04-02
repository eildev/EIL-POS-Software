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
                        <h6 class="card-title">Create Purchase</h6>
                        <button class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModalLongScollable"><i class="fa-solid fa-plus"></i> Add
                            Supplier</button>
                    </div>
                    <form id="signupForm" class="row">
                        <div class="mb-3 col-md-6">

                            <label for="ageSelect" class="form-label">Supplier</label>

                            <select class="js-example-basic-single form-select select-supplier" data-width="100%"
                                name="">
                                <option value="">Select Value</option>

                            </select>
                        </div>

                        <div class="mb-3 col-md-6">

                            <label for="password" class="form-label">Purchase Date</label>
                            <div class="input-group flatpickr" id="flatpickr-date">
                                <input type="text" class="form-control purchase_date" placeholder="Select date"
                                    data-input>
                                <span class="input-group-text input-group-addon" data-toggle><i
                                        data-feather="calendar"></i></span>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            @php
                                $products = App\Models\Product::get();
                            @endphp
                            <label for="ageSelect" class="form-label">Product</label>
                            <select class="js-example-basic-single form-select product_id" data-width="100%">
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
                                                    data-width="100%">
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
                                                Grand Total :
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
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentModal"><i
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
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Category</h5>
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

    <script>
        // error remove 
        function errorRemove(element) {
            if (element.value != '') {
                $(element).siblings('span').hide();
                $(element).css('border-color', 'green');
            }
        }
        $(document).ready(function() {
            // console.log('hello');

            // show error 
            function showError(name, message) {
                $(name).css('border-color', 'red');
                $(name).focus();
                $(`${name}_error`).show().text(message);
            }
            // save supplier
            const saveSupplier = document.querySelector('.save_supplier');
            // console.log(saveSupplier);
            saveSupplier.addEventListener('click', function(e) {
                e.preventDefault();
                // alert('ok')
                let formData = new FormData($('.supplierForm')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/supplier/store',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if (res.status == 200) {
                            // console.log(res);
                            $('#exampleModalLongScollable').modal('hide');
                            $('.supplierForm')[0].reset();
                            supplierView();
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
                                showError('.supplier_name', res.error.name);
                            }
                            if (res.error.phone) {
                                showError('.phone', res.error.phone);
                            }
                        }
                    }
                });
            })
            // show supplier
            function supplierView() {
                $.ajax({
                    url: '/supplier/view',
                    method: 'GET',
                    success: function(res) {
                        const suppliers = res.data;
                        // console.log(suppliers);
                        $('.select-supplier').empty();
                        if (suppliers.length > 0) {
                            $('.select-supplier').html(
                                `<option selected disabled>Select a Supplier</option>`);
                            $.each(suppliers, function(index, supplier) {
                                $('.select-supplier').append(
                                    `<option value="${supplier.id}">${supplier.name}</option>`
                                );
                            })
                        } else {
                            $('.select-supplier').html(`
                            <option selected disable>Please add supplier</option>`)
                        }
                    }
                })
            }
            supplierView();

            // Function to update SL numbers
            function updateSLNumbers() {
                $('.showData > tr').each(function(index) {
                    $(this).find('td:first').text(index + 1);
                });
            }

            $('.product_id').change(function() {
                let id = $(this).val();
                // alert(id);
                if ($(`.data_row${id}`).length === 0 && id) {
                    $.ajax({
                        url: '/product/find/' + id,
                        type: 'GET',
                        dataType: 'JSON',
                        success: function(res) {
                            const product = res.data;
                            // console.log(product);
                            // $('.showData').empty();

                            $('.showData').append(
                                `<tr class="data_row${product.id}">
                                    <td>
                                       
                                    </td>
                                    <td>
                                        <input type="text" class="form-control product_name${product.id} border-0 "  name="product_name[]" readonly value="${product.name ?? ""}" />
                                    </td>
                                    <td>
                                        <input type="hidden" name="product_id[]" readonly value="${product.id ?? 0}" />
                                        <input type="number" class="form-control product_price${product.id} border-0 "  name="product_price[]" readonly value="${product.price ?? 0}" />
                                    </td>
                                    <td>
                                        <input type="number" product-id="${product.id}" class="form-control quantity" name="quantity[]" value="" />
                                    </td>
                                    <td>
                                        <input type="number" class="form-control product_subtotal${product.id} border-0 "  name="product_subTotal[]" readonly value="00.00" />
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
                        }
                    })
                }
            })

            // Function to recalculate grand total
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

            $(document).on('keyup', '.quantity', function() {
                let id = $(this).attr("product-id")
                let quantity = $(this).val();
                quantity = parseInt(quantity);
                let productPrice = $('.product_price' + id).val();
                productPrice = parseFloat(productPrice);
                let subTotal = $('.product_subtotal' + id);
                let subTotalPrice = parseFloat(quantity * productPrice).toFixed(2);
                subTotal.val(subTotalPrice);
                calculateTotal();
            })

            $('.promotion_id').change(function() {
                let id = $(this).val();
                // alert(id);
                if (id) {
                    $.ajax({
                        url: '/promotion/find/' + id,
                        type: 'GET',
                        dataType: 'JSON',
                        success: function(res) {
                            const promotion = res.data;
                            // console.log(promotion.percentage);
                            if (promotion.discount_type != 'fixed_amount') {
                                let total = parseFloat($('.total').val());

                                let grandTotalAmount = (total * promotion.discount_value) / 100;
                                console.log(grandTotalAmount);

                                $('.grand_total').val(grandTotalAmount);
                            } else {

                            }

                        }
                    })
                }
            })

            // purchase Delete 
            $(document).on('click', '.purchase_delete', function(e) {
                // alert('ok');
                let id = $(this).attr('data-id');
                let dataRow = $('.data_row' + id);
                dataRow.remove();
                // Recalculate grand total
                calculateTotal();

                updateSLNumbers()
            })
        });
    </script>
@endsection
