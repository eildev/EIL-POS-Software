@extends('master')
@section('admin')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card d-flex justify-content-end">
            <div class="">

                <h4 class="text-right"><a href="{{ route('promotion.details.view') }}" class="btn btn-primary">View Promotion
                        Details</a></h4>
            </div>
        </div>
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title text-info">Add Promotion Details</h6>
                    <form>
                        <div class="row">
                            <!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3 form-valid-groups">
                                    <label class="form-label">Promotion<span class="text-danger">*</span></label>
                                    <select class="form-select js-example-basic-single promotion_id" name="promotion_id"
                                        aria-invalid="false">
                                        <option selected="" disabled="">Select Promotion</option>
                                        @foreach ($promotions as $promotion)
                                            <option value="{{ $promotion->id }}">{{ $promotion->promotion_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger promotion_id_error"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 form-valid-groups">
                                    <label class="form-label">Promotion Type<span class="text-danger">*</span></label>
                                    <select class="form-select js-example-basic-single promotion_type" name="promotion_type"
                                        aria-invalid="false">
                                        <option selected="" disabled="">Select Promotion Type</option>
                                        <option value="wholesale">Wholesale</option>
                                        <option value="products">Products</option>
                                        <option value="customers">Customer</option>
                                        <option value="branch">Branch</option>
                                        {{-- <option value="jksdhf">Branclsdfj</option> --}}
                                    </select>
                                    <span class="text-danger promotion_type_error"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 form-valid-groups">
                                    <label class="form-label">Additional Conditions</label>
                                    <input type="number" name="additional_conditions"
                                        class="form-control field_required additional_conditions"
                                        placeholder="Enter Addional Condition">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 form-valid-groups logic_field">
                                    {{-- <label class="form-label">Logic<span class="text-danger">*</span></label> --}}
                                </div>
                            </div>

                        </div><!-- Row -->
                        <div>
                            <input type="submit" class="btn btn-primary submit save_promotion_details" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // let promotion = document.querySelector('.promotion_type');
        // console.log(promotion);
        // promotion.addEventListener('click', function() {
        //     console.log('Ok');
        // })


        $(document).ready(function() {

            $(document).on('change', '.promotion_type', function() {
                let type = $(this).val();

                $.ajax({
                    url: "/promotion/details/find",
                    type: 'GET',
                    data: {
                        type: type
                    },
                    success: function(res) {
                        if (res.status == 200) {
                            let wholesale = res.wholesale;
                            let products = res.products;
                            let customers = res.customers;
                            let branch = res.branch;
                            if (wholesale) {
                                $('.logic_field').html('');
                            } else if (products) {
                                let productHTML = `
                                <div class="table-responsive">
                                    <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Available Stock</th>
                                    </tr>
                                </thead>
                                <tbody>`;
                                products.forEach(product => {
                                    productHTML += `
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="check">
                                            <input type="hidden" value="${product.id}">
                                        </td>

                                        <td>${product.name}</td>
                                        <td>${product.stock}</td>
                                    </tr>`;
                                });
                                productHTML += `</tbody></table></div>`;
                                $('.logic_field').html(productHTML);
                            } else if (customers) {
                                let productHTML = `
                                <div class="table-responsive">
                                    <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer Name</th>
                                        <th>Purchase Cost</th>
                                    </tr>
                                </thead>
                                <tbody>`;
                                customers.forEach(customer => {
                                    productHTML += `
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="check">
                                            <input type="hidden" value="${customer.id}">
                                        </td>
                                        <td>${customer.name}</td>
                                        <td>${customer.total_receivable}</td>
                                    </tr>`;
                                });
                                productHTML += `</tbody></table></div>`;
                                $('.logic_field').html(productHTML);
                            } else if (branch) {
                                let productHTML = `
                                <div class="table-responsive">
                                    <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Branch Name</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                <tbody>`;
                                branch.forEach(element => {
                                    productHTML += `
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="check">
                                            <input type="hidden" value="${element.id}">
                                        </td>
                                        <td>${element.name}</td>
                                        <td>${element.address}</td>
                                    </tr>`;
                                });
                                productHTML += `</tbody></table></div>`;
                                $('.logic_field').html(productHTML);
                            } else {
                                toastr.warning(res.message);
                            }
                        } else {
                            toastr.warning(res.message);
                        }
                    }
                })

            });

            let ids = [];
            // Output the updated array to console

            $(document).on('change', 'input[name="check"]', function() {
                ids = []; // Reset the array
                $('input[name="check"]:checked').each(function() {
                    var id = $(this).siblings('input[type="hidden"]').val();
                    ids.push(id);
                });
                // console.log(ids);

            });
            // console.log(ids);

            $(document).on('click', '.save_promotion_details', function(e) {
                e.preventDefault();

                let promotion_id = $('.promotion_id').val();
                let promotion_type = $('.promotion_type').val();
                let additional_conditions = $('.additional_conditions').val();
                let logic;

                if (promotion_type == 'wholesale') {
                    logic = "all";
                } else {
                    logic = ids.join();
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/promotion/details/store',
                    type: 'POST',
                    data: {
                        promotion_id,
                        promotion_type,
                        additional_conditions,
                        logic
                    },
                    success: function(res) {
                        console.log(res);
                        if (res.status == 200) {
                            toastr.success(res.message);
                            // console.log(res);
                        } else {
                            toastr.warning(res.message);
                            // if (res.error.name) {
                            //     showError('.customer_name', res.error.name);
                            // }
                            // if (res.error.phone) {
                            //     showError('.phone', res.error.phone);
                            // }
                        }
                    }
                });
            });




            $('#myValidForm').validate({
                rules: {
                    promotion_id: {
                        required: true,
                    },
                    Product_id: {
                        required: true,
                    },
                    additional_conditions: {
                        required: true,
                    },


                },
                messages: {
                    promotion_id: {
                        required: 'Please Select Promotion',
                    },
                    Product_id: {
                        required: 'Select Product',
                    },
                    additional_conditions: {
                        required: '  Add Adition Conditions',
                    },

                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-valid-groups').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                    $(element).addClass('is-valid');
                },
            });
        });
    </script>
@endsection
