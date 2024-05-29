@extends('master')
@section('title','| Return Add')
@section('admin')
<div class="row">
<div class="col-md-12 grid-margin stretch-card d-flex justify-content-end">
    <div class="">

        <h4 class="text-right"><a href="{{route('promotion.view')}}" class="btn btn-primary">View All Return</a></h4>
    </div>
</div>
<div class="col-md-12 stretch-card">
<div class="card">
	<div class="card-body">
		<h6 class="card-title text-info">Add Return</h6>
			<form id="myValidForm" action="{{route('promotion.store')}}" method="post">
				@csrf
				<div class="row">
					<!-- Col -->
					<div class="col-sm-6">
						<div class="mb-3 form-valid-groups">
							<label class="form-label" >Sale Item<span class="text-danger">*</span></label>
							<select class="form-select js-example-basic-single" name="sale_id" aria-invalid="false">
                                <option selected="" disabled="">Select Sale</option>
                                @foreach ($saleItem as $item)
                                @if($item->product)
                                    <option value="{{ $item->sale_id }}">{{ $item->product->name }}</option>
                                @else
                                    <option value="{{ $item->sale_id }}">Product Not Found</option>
                                @endif
                                @endforeach

                            </select>
						</div>
					</div><!-- Col -->
					<div class="col-sm-6">
						<div class="mb-3 form-valid-groups">
							<label class="form-label ">Customer Name<span class="text-danger">*</span></label>
							<select class="form-select js-example-basic-single" name="customer_id" aria-invalid="false">
                                <option selected="" disabled="">Select Customer  </option>
                                @foreach ($sale as $salesData)
                                @endforeach
                                 <option value="{{$salesData->customer_id }}">{{$salesData->customer->name}}</option>
                            </select>
						</div>
					</div><!-- Col -->


					<div class="col-sm-6">
						<div class="mb-3 form-valid-groups">
                            <label class="form-label ">Total<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="total" placeholder="Enter total" data-input>
					</div>

                </div>
					<div class="col-sm-6">
						<div class="mb-3 form-valid-groups">
                            <label class="form-label">Discount Amount<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="discount_amount" placeholder="Enter Discount Amount" data-input>
					</div>
                </div>
					<div class="col-sm-6">
						<div class="mb-3 form-valid-groups">
                            <label class="form-label">Grand Total Amount<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="grand_total" placeholder="Enter Grant Total" data-input>
					    </div>
                    </div>
				    </div><!-- Row -->
				<div>
				<input type="submit" class="btn btn-primary submit" value="Return">
				</div>
			</form>
	</div>
</div>
</div>
</div>
<script>
      $(document).ready(function (){
        $('#myValidForm').validate({
            rules: {
                promotion_name: {
                    required : true,
                },
                start_date: {
                    required : true,
                },
                end_date: {
                    required : true,
                },
                discount_type:{
                    required : true,
                },
                discount_value:{
                    required : true,
                },

            },
            messages :{
                promotion_name: {
                    required : 'Please Enter Promotion Name',
                },
                start_date: {
                    required : 'Select Start Date',
                },
                end_date: {
                    required : 'Select End Date',
                },
                discount_type: {
                    required : 'Select Discount Type',
                },
                discount_value: {
                    required : 'Please Enter Discount Value',
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
