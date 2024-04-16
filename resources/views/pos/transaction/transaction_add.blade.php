@extends('master')
@section('admin')
<div class="row">
<div class="col-md-12 grid-margin stretch-card d-flex justify-content-end">
    <div class="">

        <h4 class="text-right"><a href="{{route('transaction.view')}}" class="btn btn-info">View Transaction</a></h4>
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
                            <select class="form-select"data-width="100%" name="dirrect_transaction" aria-invalid="false">
                                <option value="no">No</option>
                                <option value="yes">Yes</option>

                            </select>
						</div>
					</div><!-- Col -->
					<div class="col-sm-6">
						<div class="mb-3 form-valid-groups">
							<label class="form-label">Transaction Date<span class="text-danger">*</span></label>
							<div class="input-group flatpickr" id="flatpickr-date">
                                <input type="text" name="date" class="form-control" placeholder="Select date" data-input>
                                <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                              </div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="mb-3 form-valid-groups">
							<label class="form-label">Transaction Type <span class="text-danger">*</span></label>
							<select class="form-select bank_id "data-width="100%" name="transaction_type" aria-invalid="false">
                                <option selected="" disabled value="">Select Type</option>
                                <option value="cashreceive">Cash Receive</option>
                                <option value="cashpayment">Cash Payment</option>
                            </select>
						</div>
					</div><!-- Col -->
					<div class="col-sm-6">
						<div class="mb-3 form-valid-groups">
							<label class="form-label">Account Type<span class="text-danger">*</span></label>
                            <select class="form-select" data-width="100%" name="account_type" id="account_type" aria-invalid="false">
                                <option selected disabled value="">Select Account Type</option>
                                <option value="supplier">Supplier</option>
                                <option value="customer">Customer</option>
                            </select>
						</div>
					</div><!-- Col -->
					<div class="col-sm-6">
						<div class="mb-3">
							<label class="form-label">Account ID<span class="text-danger">*</span></label>
                            <select class="form-select select-account-id" data-width="100%" name="bank_account_id" id="account_id" aria-invalid="false">
                                <option selected disabled value="">Select Account ID</option>
                            </select>
						</div>
					</div><!-- Col -->
                    <div>

                        <div id="account-details" class="col-sm-6">

                        </div>

                    </div>
                    <div class="col-sm-6">
						<div class="mb-3 form-valid-groups">
							<label class="form-label">Amount<span class="text-danger">*</span></label>
							<input type="number" name="balance" class="form-control" placeholder="Enter Amount">
						</div>
					</div>
                    <div class="col-sm-6">
						<div class="mb-3">
							<label class="form-label">Transaction Account</label>
							<select class="form-select "data-width="100%" name="payment_method" aria-invalid="false">
                                <option selected="" disabled value="">Select Account</option>
                                @foreach ($paymentMethod as $payment)
                                <option value="{{$payment->id}}">{{$payment->name}}</option>
                                @endforeach
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

            <table>
                <tbody id="account_data">
                    <!-- Data will be dynamically populated here -->
                </tbody>
            </table>
	</div>
</div>
</div>
</div>
<script>
       document.getElementById("account_type").addEventListener("change", function() {
        var accountType = this.value;
        var options = '<option selected disabled value="">Select Account ID</option>';

        if (accountType === "supplier") {
            @foreach ($supplier as $supply)
                options += '<option  value="{{ $supply->id}}">{{ $supply->name }} </option>';
            @endforeach

        } else if (accountType === "customer") {
            @foreach ($customer as $customers)
                options += '<option value="{{ $customers->id }}">{{ $customers->name }}</option>';
            @endforeach

        }

        document.getElementById("account_id").innerHTML = options;
    });
    //
    document.getElementById("account_id").addEventListener("change", function() {
       var accountId = this.value;
        $('#supplier-info').slideDown();
      //  $('#customer-info').hide();
      if (!accountId) {
        $('#supplier-info').hide();;
    }
     });
    var account_id=  document.querySelector('.select-account-id');
    account_id.addEventListener('change', function(){
// alert('ok');
    let accountId  = this.value;
    // console.log(id);
    $.ajax({
        url: '/getDataForAccountId',
        method: 'GET',
        data: { id: accountId },
        success: function(data) {
            console.log(data);
            $('#account-details').text(data.name);
        },
        error: function(xhr, status, error) {
            // Error handling
            console.error('Request failed:', error);
        }
    });
    });
//Validation
$(document).ready(function (){
        $('#myValidForm').validate({
            rules: {
                account_type: {
                    required : true,
                },
                transaction_type: {
                    required : true,
                },
                date: {
                    required : true,
                },
                balance: {
                    required : true,
                },
            },
            messages :{
                account_type: {
                    required : 'Please Select Account Type',
                },
                date: {
                    required : 'Please Select Date',
                },
                transaction_type: {
                    required : 'Please Select Transaction Type',
                },
                balance: {
                    required : 'Enter Transaction Balance',
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
