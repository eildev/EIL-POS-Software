@extends('master')
@section('admin')
{{-- @php
    $allData = App\Models\PosSetting::findOrFail(1);
@endphp --}}
<h2 style="margin: 20px">Settings</h2>
<div class="row">
    <div class="col-md-12 stretch-card">

        <div class="card">
            <div class="card-body">
                <h6 class="card-title text-info">Company Details</h6>
                <form id="myValidForm" action="{{ route('pos.settings.store') }}" method="post"
                enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="setting_id"value="1">
                    <div class="row">
                        <!-- Col -->

                        <div class="col-sm-6">
                            <div class="mb-3 form-valid-groups">
                                <label class="form-label">Logo
                                    {{-- <img src="{{ asset('uploads/pos_setting/' . $allData->logo) }}" alt="logo"> --}}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-6">
                            <div class="mb-3 form-valid-groups">
                                <label class="form-label">Logo
                                <input type="file" name="logo" id="myDropify" class="form-control field_required"
                                    placeholder="Select Company logo">
                            </div>
                        </div><!-- Col -->

                        <div class="col-sm-6">
                            <div class="mb-3 form-valid-groups">
                                <label class="form-label">Company
                                    {{-- value="{{$allData->company}}"  --}}
                                <input type="text" name="company"  class="form-control" placeholder="Enter company Name" value="{{ !empty($allData->id) ?$allData->company : ''}}">

                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-6">
                            <div class="mb-3 form-valid-groups">
                                <label class="form-label">Email Address
                                    {{-- <span class="text-danger">*</span> --}}
                                </label>
                                <input type="email" name="email" value="{{ !empty($allData->id) ?$allData->email : ''}}"class="form-control" placeholder="Enter email Address">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 form-valid-groups">
                                <label class="form-label">Facebook
                                    {{-- <span class="text-danger">*</span> --}}
                                </label>
                                <input type="text" name="facebook" value="{{ !empty($allData->id) ?$allData->facebook : ''}}" class="form-control" placeholder="Enter facebook url">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 form-valid-groups">
                                <label class="form-label">Header  Text
                                    {{-- <span class="text-danger">*</span> --}}
                                </label>
                                <input type="text" name="header_text" value="{{ !empty($allData->id) ?$allData->header_text : ''}}" class="form-control" placeholder="Enter Header text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 form-valid-groups">
                                <label class="form-label">Footer Text
                                    {{-- <span class="text-danger">*</span> --}}
                                </label>
                                <input type="text" name="footer_text" value="{{ !empty($allData->id) ?$allData->footer_text : ''}}"  class="form-control" placeholder="Enter footer text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 form-valid-groups">
                                <label class="form-label">Phone

                                <input type="number" name="phone"   class="form-control" placeholder="Enter Phone Number"value="{{ !empty($allData->id) ?$allData->phone : ''}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 form-valid-groups">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control"  placeholder="Enter Address"  name="address" value="{{ !empty($allData->id) ?$allData->address : ''}}">
                            </div>
                        </div>
                    </div>
                    <!-- Row -->
                    <div class="row">
                    <h6 class="card-title text-info">Invoice Settings</h6><br><br>
                    <div class="col-sm-6">
                        <div class="mb-3 form-valid-groups">
                            <label class="form-label">Invoice Logo Type</label><br>

                            <input type="radio" id="age11" class="form-check-input" name="invoice_logo_type" value="logo" {{ !empty($allData->id) && $allData->invoice_logo_type == 'Logo' ?  'checked' : '' }}>
                            <label for="age11" style="padding-right: 10px;padding-left: 5px" >Logo</label>

                     <input type="radio" id="age11s" class="form-check-input" name="invoice_logo_type" value="name" {{ !empty($allData->id) && $allData->invoice_logo_type == 'Name' ?  'checked' : '' }}>
                            <label for="age11s" style="padding-right: 10px;padding-left: 5px" >Name</label>

                            <input type="radio" id="age111" class="form-check-input" name="invoice_logo_type" value="both" {{ !empty($allData->id) && $allData->invoice_logo_type == 'Both' ?  'checked' : '' }}>
                            <label for="age111" style="padding-right: 10px;padding-left: 5px" >Both</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3 form-valid-groups">
                            <label class="form-label">Invoice Design
                                {{-- <span class="text-danger">*</span> --}}
                            </label>
                            <select name="invoice_type" class="form-control">
                                <option value="a4" {{ !empty($allData->id) && $allData->invoice_type == 'a4' ?  'selected' : '' }}>A4</option>
                                {{-- <option value="a4-2" selected="">A4 - 2</option> --}}
                                {{-- <option value="a4-3">A4 - 3</option> --}}
                                <option value="pos" {{ !empty($allData->id) && $allData->invoice_type == 'pos' ?  'selected' : '' }}>Pos Printer</option>
                                {{-- <option value="pos-2">Pos Printer - 2</option>
                                <option value="pos-3">Pos Printer - 3</option> --}}
                            </select>
                        </div>
                    </div>
                   </div>
                   <div class="row">
                    <h6 class="card-title text-info">Barcode Settings</h6><br><br>
                    <div class="col-sm-6">
                        <div class="mb-3 form-valid-groups">
                            <label class="form-label">Barcode Type</label><br>
                            <input type="radio" class="form-check-input" id="barcode" name="barcode_type" value="single" {{ !empty($allData->id) && $allData->barcode_type == 'single' ?  'checked' : '' }}>
                            <label for="barcode"  style="padding-right: 10px;padding-left: 5px">Single</label>
                            <input type="radio" class="form-check-input" id="barcode1" name="barcode_type" value="a4" {{ !empty($allData->id) && $allData->barcode_type == 'a4' ?  'checked' : '' }}>
                            <label for="barcode1" style="padding-right: 10px;padding-left: 5px">A4</label>

                        </div>
                    </div>
                   </div>
                   <div class="row">
                    <h6 class="card-title text-info">Other Settings</h6><br><br>
                    <div class="col-sm-6">
                        <div class="mb-3 form-valid-groups">
                            <div class="form-check form-switch">
                                <input class=" form-check-input" type="checkbox" name="dark_mode" role="switch" id="flexSwitchCheckDefault"  {{ $allData->dark_mode == 2 ?  'checked' : '' }}>
                                <label class="form-check-label" for="flexSwitchCheckDefault">Dark Mode</label>
                              </div>
                        </div>
                        </div>
                    <div class="col-sm-6">
                        <div class="mb-3 form-valid-groups">
                                <label class="form-label">
                                    Low Stock Quantity<span class="text-danger"></span></label>
                                <input type="number" required name="low_stock" class="form-control" placeholder="Enter low stock" value="{{ !empty($allData->id) ? $allData->low_stock : ''}}" >
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
