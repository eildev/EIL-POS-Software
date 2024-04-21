@extends('master')
@section('admin')
<h2 style="margin: 20px">Settings</h2>
<div class="row">
    <div class="col-md-12 stretch-card">

        <div class="card">
            <div class="card-body">
                <h6 class="card-title text-info">Company Details</h6>
                <form id="myValidForm" action="{{ route('expense.store') }}" method="post"
                enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- Col -->
                        <div class="col-sm-12">
                            <div class="mb-3 form-valid-groups">
                                <label class="form-label">Logo
                                    <span class="text-danger">*</span></label>
                                <input type="file" name="purpose" class="form-control field_required"
                                    placeholder="Enter company Name">
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-6">
                            <div class="mb-3 form-valid-groups">
                                <label class="form-label">Company
                                    <span class="text-danger">*</span></label>
                                <input type="text" name="purpose" class="form-control field_required"
                                    placeholder="Enter company Name">
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-6">
                            <div class="mb-3 form-valid-groups">
                                <label class="form-label">Email Addres<span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email Address">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 form-valid-groups">
                                <label class="form-label">Phone
                                    <span class="text-danger">*</span></label>
                                <input type="number" name="phone" class="form-control" placeholder="Enter Phone">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 form-valid-groups">
                                <label class="form-label">Address<span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control" placeholder="Enter Address">
                            </div>
                        </div>
                    </div>
                    <!-- Row -->
                    <div class="row">
                    <h6 class="card-title text-info">Invoice Settings</h6><br><br>
                    <div class="col-sm-6">
                        <div class="mb-3 form-valid-groups">
                            <label class="form-label">Invoice Logo Type<span class="text-danger">*</span></label><br>
                            <input type="radio" id="age1" name="invoice" value="logo">
                            <label for="age1" style="padding-right: 10px;padding-left: 5px">Logo</label>
                            <input type="radio" id="age11" name="invoice" value="name">
                            <label for="age11" style="padding-right: 10px;padding-left: 5px">Name</label>
                            <input type="radio" id="age111" name="invoice" value="both">
                            <label for="age111" style="padding-right: 10px;padding-left: 5px">Both</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3 form-valid-groups">
                            <label class="form-label">Invoice Design<span class="text-danger">*</span></label>
                            <select name="invoice_type" id="" class="form-control">
                                <option value="a4">A4</option>
                                <option value="a4-2" selected="">A4 - 2</option>
                                <option value="a4-3">A4 - 3</option>
                                <option value="pos">Pos Printer</option>
                                <option value="pos-2">Pos Printer - 2</option>
                                <option value="pos-3">Pos Printer - 3</option>
                            </select>
                        </div>
                    </div>
                   </div>
                   <div class="row">
                    <h6 class="card-title text-info">Barcode Settings</h6><br><br>
                    <div class="col-sm-6">
                        <div class="mb-3 form-valid-groups">
                            <label class="form-label">Barcode Type<span class="text-danger">*</span></label><br>
                            <input type="radio" id="barcode" name="barcode" value="single">
                            <label for="barcode" style="padding-right: 10px;padding-left: 5px">Single</label>
                            <input type="radio" id="barcode1" name="barcode" value="a4">
                            <label for="barcode1" style="padding-right: 10px;padding-left: 5px">A4</label>

                        </div>
                    </div>

                   </div>
                   <div class="row">
                    <h6 class="card-title text-info">Other Settings</h6><br><br>
                    <div class="col-sm-6">
                        <div class="mb-3 form-valid-groups">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Dark Mode</label>
                              </div>
                        </div>
                        </div>
                    <div class="col-sm-6">
                        <div class="mb-3 form-valid-groups">
                                <label class="form-label">
                                    Low Stock Quantity<span class="text-danger"></span></label>
                                <input type="text" name="amount" class="form-control" placeholder="Enter Amount" value="5">
                        </div>
                        </div>
                    </div>


                    <div>
                        <input type="submit" class="btn btn-primary submit" value="Save Changes">
                    </div>

                </form>
            </div>
        </div>


    </div>
</div>
@endsection
