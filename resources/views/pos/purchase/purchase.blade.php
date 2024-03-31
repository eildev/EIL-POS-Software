@extends('master')
@section('admin')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Supplier</li>
        </ol>
    </nav>

    {{-- form  --}}
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Validation</h4>
                    <p class="text-muted mb-3">Read the <a href="https://jqueryvalidation.org/" target="_blank"> Official
                            jQuery Validation Documentation </a>for a full list of instructions and other options.</p>
                    <form id="signupForm">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input id="name" class="form-control" name="name" type="text">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" class="form-control" name="email" type="email">
                        </div>
                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Age</label>
                            <select class="form-select" name="age_select" id="ageSelect">
                                <option selected disabled>Select your age</option>
                                <option>12-18</option>
                                <option>18-22</option>
                                <option>22-30</option>
                                <option>30-60</option>
                                <option>Above 60</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="gender_radio" id="gender1">
                                    <label class="form-check-label" for="gender1">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="gender_radio" id="gender2">
                                    <label class="form-check-label" for="gender2">
                                        Female
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="gender_radio" id="gender3">
                                    <label class="form-check-label" for="gender3">
                                        Other
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Skills</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline1">
                                    <label class="form-check-label" for="checkInline1">
                                        Angular
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline2">
                                    <label class="form-check-label" for="checkInline2">
                                        ReactJs
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                    <label class="form-check-label" for="checkInline3">
                                        VueJs
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" class="form-control" name="password" type="password">
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm password</label>
                            <input id="confirm_password" class="form-control" name="confirm_password" type="password">
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <label class="form-check-label" for="termsCheck">
                                    Agree to <a href="#"> terms and conditions </a>
                                </label>
                                <input type="checkbox" class="form-check-input" name="terms_agree" id="termsCheck">
                            </div>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Submit">
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
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="card-title">Supplier Table</h6>
                        <button class="btn btn-rounded-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModalLongScollable"><i data-feather="plus"></i></button>
                    </div>
                    <div id="" class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Opening Receivable</th>
                                    <th>Opening Payable</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="showData">
                            </tbody>
                        </table>
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
                            <label for="name" class="form-label">Supplier Name</label>
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
                            <label for="name" class="form-label">Phone Nnumber</label>
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
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalScrollableTitle"
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
            // show error 
            function showError(name, message) {
                $(name).css('border-color', 'red'); // Highlight input with red border
                $(name).focus(); // Set focus to the input field
                $(`${name}_error`).show().text(message); // Show error message
            }
            // save supplier
            const saveSupplier = document.querySelector('.save_supplier');
            saveSupplier.addEventListener('click', function(e) {
                e.preventDefault();
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


            // show Unit
            function supplierView() {
                $.ajax({
                    url: '/supplier/view',
                    method: 'GET',
                    success: function(res) {
                        const suppliers = res.data;
                        $('.showData').empty();

                        if (suppliers.length > 0) {
                            $.each(suppliers, function(index, supplier) {
                                const tr = document.createElement('tr');
                                tr.innerHTML = `
                            <td>
                                ${index+1}
                            </td>
                            <td>
                                ${supplier.name ?? ""}
                            </td>
                            <td>
                                ${supplier.email ?? ""}
                            </td>
                            <td>
                                ${supplier.phone ?? ""}
                            </td>
                            <td>
                                ${supplier.address ? supplier.address.slice(0,15) : ""}
                            </td>
                            <td>
                                ${supplier.opening_receivable ?? 0 }
                            </td>
                            <td>
                                ${supplier.opening_payable ?? 0 }
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary btn-icon supplier_edit" data-id=${supplier.id} data-bs-toggle="modal" data-bs-target="#edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-icon supplier_delete" data-id=${supplier.id}>
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                            `;
                                $('.showData').append(tr);
                            })
                        } else {
                            $('.showData').html(`
                            <tr>
                                <td colspan='8'>
                                    <div class="text-center text-warning mb-2">Data Not Found</div>
                                    <div class="text-center">
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalLongScollable">Add
                                            Supplier<i data-feather="plus"></i></button>
                                    </div>
                                </td>
                            </tr>`)
                        }

                    }
                })
            }
            supplierView();

            // edit Unit 
            $(document).on('click', '.supplier_edit', function(e) {
                e.preventDefault();
                // console.log('0k');
                let id = this.getAttribute('data-id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: `/supplier/edit/${id}`,
                    type: 'GET',
                    success: function(res) {
                        if (res.status == 200) {
                            $('.edit_supplier_name').val(res.supplier.name);
                            $('.edit_email').val(res.supplier.email);
                            $('.edit_phone').val(res.supplier.phone);
                            $('.edit_address').val(res.supplier.address);
                            $('.edit_email').val(res.supplier.email);
                            $('.edit_opening_receivable').val(res.supplier.opening_receivable);
                            $('.edit_opening_payable').val(res.supplier.opening_payable);
                            $('.update_supplier').val(res.supplier.id);
                        } else {
                            Swal.fire({
                                position: "top-end",
                                icon: "warning",
                                title: "No Data Found",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    }
                });
            })

            // update supplier 
            $('.update_supplier').click(function(e) {
                e.preventDefault();
                // alert('ok');
                let id = $(this).val();
                // console.log(id);
                let formData = new FormData($('.editSupplierForm')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: `/supplier/update/${id}`,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if (res.status == 200) {
                            $('#edit').modal('hide');
                            $('.editSupplierForm')[0].reset();
                            supplierView();
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: res.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            if (res.error.name) {
                                showError('.edit_supplier_name', res.error.name);
                            }
                            if (res.error.phone) {
                                showError('.edit_phone', res.error.phone);
                            }
                        }
                    }
                });
            })

            // supplier Delete 
            $(document).on('click', '.supplier_delete', function(e) {
                // $('.supplier_delete').click(function(e) {
                e.preventDefault();
                let id = this.getAttribute('data-id');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to Delete this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: `/supplier/destroy/${id}`,
                            type: 'GET',
                            success: function(data) {
                                if (data.status == 200) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your file has been deleted.",
                                        icon: "success"
                                    });
                                    supplierView();
                                } else {
                                    Swal.fire({
                                        position: "top-end",
                                        icon: "warning",
                                        title: "Deleted Unsuccessful!",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }
                            }
                        });
                    }
                });
            })
        });
    </script>
@endsection
