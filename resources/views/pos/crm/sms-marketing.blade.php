@extends('master')
@section('admin')
<div class="row">
<div class="col-md-12 grid-margin stretch-card d-flex justify-content-end">
    <div class="">
        <h4 class="text-right"><a href="{{route('employee.view')}}" class="btn btn-info">SMS To Customer</a></h4>
    </div>
</div>
<div class="col-md-12 stretch-card">
<div class="card">
	<div class="card-body">
		<h6 class="card-title text-info">Add Employee</h6>
        <div class="row">
            <div class="col-lg-6">
                <h4>Choose Customer</h4>
            </div>
            <div class="col-lg-6">
                <h4>Send SMS</h4>
                <form action="{{ route('sms.To.Customer') }}" method="POST">
                    @csrf
                    <div class="mb-3 form-valid-groups">
                        <div class="row">
                            <div class="col-lg-10">
                                <label class="form-label">Purpose<span class="text-danger">*</span></label>
                                <select name="purpose" id="" class="form-control">
                                    <option value="">-----Select Purpose-----</option>
                                    @php
                                        $collection=App\Models\SmsCategory::all();
                                    @endphp
                                    @foreach ($collection as $item)
                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-2 mt-4 ps-0">
                                <button class="btn btn-primary submit mt-1 w-100">Add</button>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 form-valid-groups">
                        <label class="form-label">Number<span class="text-danger">*</span></label>
                        <textarea class="form-control field_required" name="number" id="" cols="30" rows="5" placeholder="01917344267,01744676725...."></textarea>
                    </div>
                    <div class="mb-3 form-valid-groups">
                        <label class="form-label">SMS Body <span class="text-danger">*</span></label>
                        <textarea class="form-control field_required" name="sms" id="" cols="30" rows="8" placeholder="Enter SMS Text"></textarea>
                    </div>
                    <div class="mb-3 form-valid-groups">
                        <button type="submit" class="btn btn-primary submit w-25">Send</button>
                    </div>
                </form>
            </div>
        </div>
	</div>
</div>
</div>
</div>
@endsection
