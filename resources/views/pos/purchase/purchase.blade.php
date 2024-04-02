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
                                <input type="text" class="form-control" placeholder="Select date" data-input>
                                <span class="input-group-text input-group-addon" data-toggle><i
                                        data-feather="calendar"></i></span>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            @php
                                $products = App\Models\Product::get();
                            @endphp
                            <label for="ageSelect" class="form-label">Product</label>
                            <select class="js-example-basic-single form-select" data-width="100%">
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
                                        Grand Total : 0.00
                                    </td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="my-3">
                        <button class="btn btn-primary "><i class="fa-solid fa-money-check-dollar"></i> Payment</button>
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

    <!-- Modal -->
    {{-- <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalScrollableTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="signupForm" class="editSupplierForm row">
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Supplier Name</label>
                            <input id="defaultconfig" class="form-control edit_supplier_name" maxlength="255"
                                name="name" type="text" onkeyup="errorRemove(this);" onblur="errorRemove(this);">
                            <span class="text-danger edit_name_error"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Email</label>
                            <input id="defaultconfig" class="form-control edit_email" maxlength="39" name="email"
                                type="email">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Phone Nnumber</label>
                            <input id="defaultconfig" class="form-control edit_phone" maxlength="39" name="phone"
                                type="tel" onkeyup="errorRemove(this);" onblur="errorRemove(this);">
                            <span class="text-danger edit_phone_error"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Address</label>
                            <input id="defaultconfig" class="form-control edit_address" maxlength="39" name="address"
                                type="text">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Opening Receivable</label>
                            <input id="defaultconfig" class="form-control edit_opening_receivable" maxlength="39"
                                name="opening_receivable" type="number">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Opening Payable</label>
                            <input id="defaultconfig" class="form-control edit_opening_payable" maxlength="39"
                                name="opening_payable" type="number">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_supplier">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div> --}}

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
            // $('select[name="subcategory_id"]').html(
            //     '<option selected disabled>Select a SubCategory</option>'
            // );
            // $.each(res.data, function(key, item) {
            //     $('select[name="subcategory_id"]').append(
            //         '<option myid="' + item.id +
            //         '" value="' + item.id +
            //         '">' + item
            //         .name + '</option>');
            // })
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

            // function purchaseView() {
            //     $.ajax({
            //         url: '/supplier/view',
            //         method: 'GET',
            //         success: function(res) {
            //             const suppliers = res.data;
            //             $('.showData').empty();

            //             if (suppliers.length > 0) {
            //                 $.each(suppliers, function(index, supplier) {
            //                     const tr = document.createElement('tr');
            //                     tr.innerHTML = `
        //                 <td>
        //                     ${index+1}
        //                 </td>
        //                 <td>
        //                     ${supplier.phone ?? ""}
        //                 </td>
        //                 <td>
        //                     ${supplier.email ?? ''}
        //                 </td>
        //                 <td>
        //                     <input type="text" class="form-control" name="" value="${supplier.name ?? ''}" />
        //                 </td>
        //                 <td>
        //                     ${supplier.address ? supplier.address.slice(0,15) : ""}
        //                 </td>
        //                 <td>
        //                     <a href="#" class="btn btn-danger btn-icon supplier_delete" data-id=${supplier.id}>
        //                         <i class="fa-solid fa-trash-can"></i>
        //                     </a>
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
        //                                 Supplier<i data-feather="plus"></i></button>
        //                         </div>
        //                     </td>
        //                 </tr>`)
            //             }

            //         }
            //     })
            // }
            // purchaseView();

            // edit Unit 
            // $(document).on('click', '.supplier_edit', function(e) {
            //     e.preventDefault();
            //     // console.log('0k');
            //     let id = this.getAttribute('data-id');
            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         }
            //     });
            //     $.ajax({
            //         url: `/supplier/edit/${id}`,
            //         type: 'GET',
            //         success: function(res) {
            //             if (res.status == 200) {
            //                 $('.edit_supplier_name').val(res.supplier.name);
            //                 $('.edit_email').val(res.supplier.email);
            //                 $('.edit_phone').val(res.supplier.phone);
            //                 $('.edit_address').val(res.supplier.address);
            //                 $('.edit_email').val(res.supplier.email);
            //                 $('.edit_opening_receivable').val(res.supplier.opening_receivable);
            //                 $('.edit_opening_payable').val(res.supplier.opening_payable);
            //                 $('.update_supplier').val(res.supplier.id);
            //             } else {
            //                 Swal.fire({
            //                     position: "top-end",
            //                     icon: "warning",
            //                     title: "No Data Found",
            //                     showConfirmButton: false,
            //                     timer: 1500
            //                 });
            //             }
            //         }
            //     });
            // })

            // update supplier 
            // $('.update_supplier').click(function(e) {
            //     e.preventDefault();
            //     // alert('ok');
            //     let id = $(this).val();
            //     // console.log(id);
            //     let formData = new FormData($('.editSupplierForm')[0]);
            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         }
            //     });
            //     $.ajax({
            //         url: `/supplier/update/${id}`,
            //         type: 'POST',
            //         data: formData,
            //         processData: false,
            //         contentType: false,
            //         success: function(res) {
            //             if (res.status == 200) {
            //                 $('#edit').modal('hide');
            //                 $('.editSupplierForm')[0].reset();
            //                 supplierView();
            //                 Swal.fire({
            //                     position: "top-end",
            //                     icon: "success",
            //                     title: res.message,
            //                     showConfirmButton: false,
            //                     timer: 1500
            //                 });
            //             } else {
            //                 if (res.error.name) {
            //                     showError('.edit_supplier_name', res.error.name);
            //                 }
            //                 if (res.error.phone) {
            //                     showError('.edit_phone', res.error.phone);
            //                 }
            //             }
            //         }
            //     });
            // })

            // supplier Delete 
            // $(document).on('click', '.supplier_delete', function(e) {
            //     // $('.supplier_delete').click(function(e) {
            //     e.preventDefault();
            //     let id = this.getAttribute('data-id');

            //     Swal.fire({
            //         title: "Are you sure?",
            //         text: "You won't be able to Delete this!",
            //         icon: "warning",
            //         showCancelButton: true,
            //         confirmButtonColor: "#3085d6",
            //         cancelButtonColor: "#d33",
            //         confirmButtonText: "Yes, delete it!"
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             $.ajaxSetup({
            //                 headers: {
            //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //                 }
            //             });
            //             $.ajax({
            //                 url: `/supplier/destroy/${id}`,
            //                 type: 'GET',
            //                 success: function(data) {
            //                     if (data.status == 200) {
            //                         Swal.fire({
            //                             title: "Deleted!",
            //                             text: "Your file has been deleted.",
            //                             icon: "success"
            //                         });
            //                         supplierView();
            //                     } else {
            //                         Swal.fire({
            //                             position: "top-end",
            //                             icon: "warning",
            //                             title: "Deleted Unsuccessful!",
            //                             showConfirmButton: false,
            //                             timer: 1500
            //                         });
            //                     }
            //                 }
            //             });
            //         }
            //     });
            // })
        });
    </script>
@endsection
