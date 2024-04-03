@extends('master')
@section('admin')
<div class="row">
<div class="col-md-12 grid-margin stretch-card d-flex justify-content-end">
    <div class="">

        <h4 class="text-right"><a href="{{route('customer.view')}}" class="btn btn-info">View Transaction</a></h4>
    </div>
</div>
<div class="col-md-12 stretch-card">
<div class="card">
	<div class="card-body">
		<h6 class="card-title text-info">Add Transaction</h6>
			<form id="myValidForm" action="{{route('customer.store')}}" method="post"  >
				@csrf
				<div class="row">
					<!-- Col -->
					<div class="col-sm-6">
						<div class="mb-3 form-valid-groups">
							<label class="form-label">Personal/Direct Transaction</label>
                            <select class="form-select bank_id is-valid form-select"data-width="100%" name="bank_account_id" aria-invalid="false">
                                <option value="no">No</option>
                                <option value="yes">Yes</option>

                            </select>
						</div>
					</div><!-- Col -->
					<div class="col-sm-6">
						<div class="mb-3 form-valid-groups">
							<label class="form-label">Transaction Date<span class="text-danger">*</span></label>
							<div class="input-group flatpickr" id="flatpickr-date">
                                <input type="text" class="form-control" placeholder="Select date" data-input>
                                <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                              </div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="mb-3">
							<label class="form-label">Transaction Type <span class="text-danger">*</span></label>
							<select class="form-select bank_id "data-width="100%" name="bank_account_id" aria-invalid="false">
                                <option selected="" disabled value="">Select Type</option>
                                <option value="cashreceive">Cash Receive</option>
                                <option value="cashpayment">Cash Payment</option>
                            </select>
						</div>
					</div><!-- Col -->
					<div class="col-sm-6">
						<div class="mb-3">
							<label class="form-label">Account Type<span class="text-danger">*</span></label>
							<select class="form-select bank_id "data-width="100%" name="bank_account_id" aria-invalid="false">
                                <option selected="" disabled value="">Select Account Type</option>
                                <option value="supplier">Supplier</option>
                                <option value="Customer">Customer</option>
                            </select>
						</div>
					</div><!-- Col -->
					<div class="col-sm-6">
						<div class="mb-3">
							<label class="form-label">Account ID<span class="text-danger">*</span></label>
							<select class="form-select bank_id "data-width="100%" name="bank_account_id" aria-invalid="false">
                                <option value=""></option>

                            </select>
						</div>
					</div><!-- Col -->
                    <div class="col-sm-6">
						<div class="mb-3 form-valid-groups">
							<label class="form-label">Amount<span class="text-danger">*</span></label>
							<input type="number" name="amount" class="form-control" placeholder="Enter Amount">
						</div>
					</div>
                    <div class="col-sm-6">
						<div class="mb-3">
							<label class="form-label">Transaction Account</label>
							<select class="form-select bank_id "data-width="100%" name="bank_account_id" aria-invalid="false">
                                <option value=""></option>

                            </select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="mb-3">
							<label class="form-label">Note</label>
							<textarea name="note" class="form-control"  placeholder="Write Note (Optional)" rows="4" cols="50"></textarea>
						</div>
					</div><!-- Col -->
				</div><!-- Row -->

				<div >
				<input type="submit" class="btn btn-primary submit" value="Payment">
				</div>
			</form>
	</div>
</div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function (){
        $('#myValidForm').validate({
            rules: {
                name: {
                    required : true,
                },
                phone: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Please Enter Customer Name',
                },
                phone: {
                    required : 'Please Enter Customer Phone Number',
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

</script>
@endsection
