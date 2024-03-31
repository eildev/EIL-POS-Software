@extends('master')
@section('admin')
<div class="row">
<div class="col-md-12 grid-margin stretch-card d-flex justify-content-end">
    <div class="">

        <h4 class="text-right"><a href="{{route('employee.view')}}" class="btn btn-info">View All Expense</a></h4>
    </div>
</div>
<div class="col-md-12 stretch-card">
<div class="card">
	<div class="card-body">
		<h6 class="card-title text-info">Add Expanse</h6>
			<form id="myValidForm" action="{{route('employee.store')}}" method="post" enctype="multipart/form-data" >
				@csrf
				<div class="row">
					<!-- Col -->
					<div class="col-sm-6">
						<div class="mb-3 form-valid-groups">
							<label class="form-label">Purpose<span class="text-danger">*</span></label>
							<input type="text" name="purpose" class="form-control field_required" placeholder="Enter purpose">
						</div>
					</div><!-- Col -->
					<div class="col-sm-6">
						<div class="mb-3 form-valid-groups">
							<label class="form-label">Amount<span class="text-danger">*</span></label>
							<input type="number" name="amount" class="form-control" placeholder="Enter Amount">
						</div>
					</div>
					<div class="col-sm-6 form-valid-group">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3" bis_skin_checked="1">
                                    <label for="ageSelect" class="form-label">Select Expense Category <span class="text-danger">*</span></label>
                                    <select class="form-select expense_category_name is-valid" name="expense_category_id" aria-invalid="false">
                                        <option selected="" disabled="">Select Expense Category </option>
                                        @foreach ($expenseCategory as $expanse )
                                        <option value="{{$expanse->id}}">{{$expanse->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger related_sign_error"></span>
                                </div>
                            </div>
                            <div class="col-sm-6 float-end">
                                <div>
                                    <label for="ageSelect" class="form-label">Add Expense Category <span class="text-danger">*</span></label>
                                    <a href="" class="btn btn-sm bg-info text-dark" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalLongScollable"><i data-feather="plus"></i> Expense Category</a>
                                </div>
                            </div>
                        </div>
					</div><!-- Col -->
					<div class="col-sm-6">
                        <div class="mb-3 form-valid-groups">
                            <label class="form-label">Splender<span class="text-danger">*</span></label>
                            <input type="text" name="spender" class="form-control" placeholder="Enter Amount">
                        </div>
					</div><!-- Col -->

                    <div class="col-sm-6">
                        <div class="mb-3 form-valid-groups">
                            <label class="form-label">Note<span class="text-danger">*</span></label>
                            <textarea name="note" class="form-control" id="" cols="10" rows="5"></textarea>
                        </div>
					</div>
                    <div class="col-sm-6">
                        <div class="mb-3" bis_skin_checked="1">
                            <label for="ageSelect" class="form-label">Select Bank Acoount</label>
                            <select class="form-select expense_category_name is-valid" name="expense_category_id" aria-invalid="false">
                                <option selected="" disabled="" value="">Select Bank</option>
                                @foreach ($bank as $banks )
                                <option value="{{$banks->id}}">{{$banks->name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger related_sign_error"></span>
                        </div>
                    </div>
				</div><!-- Row -->
				<div>
				<input type="submit" class="btn btn-primary submit" value="Save">
				</div>
			</form>
	</div>
</div>
</div>
</div>

{{-- /////////////////Modal//////////////// --}}
<div class="modal fade" id="exampleModalLongScollable" tabindex="-1" aria-labelledby="exampleModalScrollableTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Expense Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="signupForm" class="categoryForm" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="form-label">Expense Category Name</label>
                            <input id="defaultconfig" class="form-control category_name" maxlength="250" name="name"
                                type="text" onkeyup="errorRemove(this);" onblur="errorRemove(this);">
                            <span class="text-danger category_name_error"></span>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save_category">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
{{-- /////////////////End Modal//////////////// --}}

<script type="text/javascript">
    $(document).ready(function (){
        $('#myValidForm').validate({
            rules: {
                full_name: {
                    required : true,
                },
                phone: {
                    required : true,
                },
                email: {
                    required : true,
                },
                address:{
                    required : true,
                },
            },
            messages :{
                full_name: {
                    required : 'Please Enter Employee Name',
                },
                phone: {
                    required : 'Please Enter Customer Phone Number',
                },
                email: {
                    required : 'Please Enter Employee Email',
                },
                address: {
                    required : 'Please Enter  Address',
                },
            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-valid-groups').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
                $(element).addClass('is-valid');
            },
        });
    });
    ////Expense
    const saveCategory = document.querySelector('.save_category');
            saveCategory.addEventListener('click', function(e) {
                e.preventDefault();
                let formData = new FormData($('.categoryForm')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/expense/category/store',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if (res.status == 200) {
                            $('#exampleModalLongScollable').modal('hide');
                            // formData.delete(entry[0]);
                            // alert('added successfully');
                            $('.categoryForm')[0].reset();
                            categoryView();
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: res.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            showError('.category_name', res.error.name);
                        }
                    }
                });
            })
</script>
@endsection
