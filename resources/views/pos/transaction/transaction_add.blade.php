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
                            <select class="form-select"data-width="100%" name="bank_account_id" aria-invalid="false">
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
						<div class="mb-3">
							<label class="form-label">Transaction Type <span class="text-danger">*</span></label>
							<select class="form-select bank_id "data-width="100%" name="transaction_type" aria-invalid="false">
                                <option selected="" disabled value="">Select Type</option>
                                <option value="cashreceive">Cash Receive</option>
                                <option value="cashpayment">Cash Payment</option>
                            </select>
						</div>
					</div><!-- Col -->
					<div class="col-sm-6">
						<div class="mb-3">
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
                            <select class="form-select" data-width="100%" name="bank_account_id" id="account_id" aria-invalid="false">
                                <option selected disabled value="">Select Account ID</option>
                            </select>
						</div>
					</div><!-- Col -->
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
                options += '<option  value="{{ $supply->id}}">{{ $supply->name }}</option>';
            @endforeach
        } else if (accountType === "customer") {
            @foreach ($customer as $customers)
                options += '<option value="{{ $customers->id }}">{{ $customers->name }}</option>';
            @endforeach
        }

        document.getElementById("account_id").innerHTML = options;
    });
    //
    // document.getElementById("account_id").addEventListener("change", function() {
    //         var accountId = this.value;

    //         // Make an AJAX request to fetch data
    //         fetch('/fetch-account-data/' + accountId)
    //             .then(response => response.json())
    //             .then(data => {
    //                 // Display the data in a table
    //                 displayData(data);
    //             })
    //             .catch(error => {
    //                 console.error('Error:', error);
    //             });
    //     });

    //     function displayData(data) {
    //         // Clear previous data
    //         var tableBody = document.getElementById("account_data");
    //         tableBody.innerHTML = "";

    //         // Iterate over the data and create table rows
    //         data.forEach(item => {
    //             var row = "<tr>";
    //             row += "<td>" + item.field1 + "</td>"; // Replace field1, field2, etc. with your actual field names
    //             row += "<td>" + item.field2 + "</td>";
    //             // Add more fields as needed
    //             row += "</tr>";
    //             tableBody.innerHTML += row;
    //         });
    //     }
</script>
@endsection
