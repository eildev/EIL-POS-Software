@extends('master')
@section('admin')
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Customer Customize List</a>
    </li>

  </ul>
  <div class="tab-content border border-print border-top-0 p-3" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="row">
            <div class="col-md-12  grid-margin stretch-card filter_table">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- Col -->
                            <div class="col-sm-3">
                                <div class="mb-3 w-100">
                                    {{-- <label class="form-label">Amount<span class="text-danger">*</span></label> --}}
                                    <select class="transaction_customer_name is-valid js-example-basic-single form-control filter-category @error('transaction_customer_id') is-invalid @enderror" name="transaction_customer_id" aria-invalid="false" width="100">
                                        <option>Select Customer</option>
                                        @foreach ($customer as $customers)
                                        <option value="{{$customers->id}}">{{{$customers->name}}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="input-group flatpickr" id="flatpickr-date">
                                    <input type="text" class="form-control start-date" placeholder="Start date" data-input>
                                    <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                                  </div>
                            </div><!-- Col -->
                            <div class="col-sm-3">
                                <div class="input-group flatpickr" id="flatpickr-date">
                                    <input type="text" class="form-control end-date" placeholder="End date" data-input>
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
                                    <a href="" class="btn btn-sm bg-info text-dark mr-2" id="transactionfilter">Filter</a>
                                    <a class="btn btn-sm bg-primary text-dark" onclick="window.location.reload();">Reset</a>
                                </div>
                            </div>

                            <div class="col-md-1"> <!-- Right Section -->

                                <button type="button"
                                class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0 print-btn">
                                <i class="btn-icon-prepend" data-feather="printer"></i>
                                Print
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {{-- ////list// --}}
         <div id="customer">
            @include('pos.crm.customize_customer.customize_customer-table')
         </div>
        </div>
          </div>
    </div>




@endsection


