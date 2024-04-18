@extends('master')
@section('admin')
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Transaction List</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Add Transaction</a>
    </li>
  </ul>
  <div class="tab-content border border-top-0 p-3" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="row">
            <div class="col-md-12  grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- Col -->
                            <div class="col-sm-3">
                                <div class="mb-3 w-100">
                                    {{-- <label class="form-label">Amount<span class="text-danger">*</span></label> --}}
                                    <select class="expense_category_name is-valid js-example-basic-single form-control filter-category @error('expense_category_id') is-invalid @enderror" name="expense_category_id" aria-invalid="false" width="100">
                                        <option selected="" disabled="">Select Customer</option>
                                         <option value=""></option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3 w-100">
                                    {{-- <label class="form-label">Amount<span class="text-danger">*</span></label> --}}
                                    <select class="expense_category_name is-valid js-example-basic-single form-control filter-category @error('expense_category_id') is-invalid @enderror" name="expense_category_id" aria-invalid="false" width="100">
                                        <option selected="" disabled="">Select Supplier </option>

                                         <option value=""></option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="input-group flatpickr" id="flatpickr-date">
                                    <input type="text" class="form-control from-date" placeholder="Start date" data-input>
                                    <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                                  </div>
                            </div><!-- Col -->
                            <div class="col-sm-3">
                                <div class="input-group flatpickr" id="flatpickr-date">
                                    <input type="text" class="form-control to-date" placeholder="End date" data-input>
                                    <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                                  </div>
                            </div>
                            <style>
                                .select2-container--default{
                                    width: 100% !important;
                                }
                            </style>

                        </div>
                        <div class="row">
                            <div class="col-md-11 mb-2"> <!-- Left Section -->
                                <div class="justify-content-left">
                                    <a href="" class="btn btn-sm bg-info text-dark mr-2" id="filter">Filter</a>
                                    <a class="btn btn-sm bg-primary text-dark" onclick="resetWindow()">Reset</a>
                                </div>
                            </div>

                            <div class="col-md-1"> <!-- Right Section -->
                                {{-- <div class="justify-content-end">
                                    <a href="#" onclick="printTable()" class="btn btn-sm bg-info text-dark mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer btn-icon-prepend"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>Print</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {{-- ////list// --}}
           <div id="filter-rander">
            @include('pos.transaction.transaction-filter-rander-table')
           </div>
          </div>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="row">
            <div class="col-md-12 stretch-card mt-1">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title text-info">Add Transaction</h6>
                            <form id="myValidForm" action="{{route('transaction.store')}}" method="post"  >
                                @csrf
                                <div class="row">
                                    <!-- Col -->
                                    <div class="col-sm-12">
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
                                                <option value="cash_receive">Cash Receive</option>
                                                <option value="cash_payment">Cash Payment</option>
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
                                            <select class="form-select select-account-id" data-width="100%" name="account_id" id="account_id" aria-invalid="false">
                                                <option selected disabled value="">Select Account ID</option>
                                            </select>
                                        </div>
                                    </div><!-- Col -->
                                    <div>
                                        <h5 id="account-details"></h5>
                                        <h5 id="due_invoice_count"></h5>
                                        <h5 id="total_invoice_due"></h5>
                                        <h5 id="personal_balance"></h5>
                                        <h5 id="total_due"></h5>

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 form-valid-groups">
                                            <label class="form-label">Amount<span class="text-danger">*</span></label>
                                            <input type="number" name="amount" class="form-control" placeholder="Enter Amount">
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

                                    <div class="col-sm-12">
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
    // document.getElementById("account_id").addEventListener("change", function() {
    //    var accountId = this.value;
    //     $('#supplier-info').slideDown();
    //   //  $('#customer-info').hide();
    //   if (!accountId) {
    //     $('#supplier-info').hide();;
    // }
    //  });
    var account_id=  document.querySelector('.select-account-id');
    account_id.addEventListener('change', function(){
// alert('ok');
    let accountId  = this.value;
    let account_type = document.querySelector('#account_type').value;
    // console.log(id);
    $.ajax({
        url: '/getDataForAccountId',
        method: 'GET',
        data: { id: accountId,account_type },
        success: function(data) {
           console.log(data);
            $('#account-details').text('Name: ' + data.info.name);
            $('#due_invoice_count').text('Due Invoice Count: '+data.count);
            $('#total_invoice_due').text('Total Invoice Due: '+ data.info.opening_receivable);
            $('#personal_balance').text('Personal Balance: '+ data.info.wallet_balance);
            $('#total_due').text('Total Due: '+data.info.total_payable);
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
