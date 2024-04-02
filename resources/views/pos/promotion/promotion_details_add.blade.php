@extends('master')
@section('admin')
<div class="row">
<div class="col-md-12 grid-margin stretch-card d-flex justify-content-end">
    <div class="">

        <h4 class="text-right"><a href="{{route('promotion.details.view')}}" class="btn btn-primary">View  Promotion Details</a></h4>
    </div>
</div>
<div class="col-md-12 stretch-card">
<div class="card">
	<div class="card-body">
		<h6 class="card-title text-info">Add Promotion Details</h6>
			<form id="myValidForm" action="{{route('promotion.details.store')}}" method="post">
				@csrf
				<div class="row">
					<!-- Col -->
                    <div class="col-sm-6">
                        <div class="mb-3 form-valid-groups">
                            <label class="form-label">Promotion<span class="text-danger">*</span></label>
                            <select class="form-select" name="promotion_id" aria-invalid="false">
                                <option selected="" disabled="">Select Promotion</option>
                                @foreach ($promotions as $promotion)
                                <option value="{{$promotion->id}}">{{$promotion->promotion_name}}</option>
                                @endforeach
                            </select>
                        </div>
					</div>
                    <div class="col-sm-6">
                        <div class="mb-3 form-valid-groups">
                            <label class="form-label">Product <span class="text-danger">*</span></label>
                            <select class="form-select" name="Product_id" aria-invalid="false">
                                <option selected="" disabled="">Select Product </option>
                                @foreach ($product as $products)
                                <option value="{{$products->id}}">{{$products->name}}</option>
                                @endforeach

                            </select>
                        </div>
					</div>
                    <div class="col-sm-6">
						<div class="mb-3 form-valid-groups">
							<label class="form-label">Additional Conditions<span class="text-danger">*</span></label>
							<input type="number" name="additional_conditions" class="form-control field_required" placeholder="Enter Addional Condition">
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
<script>
      $(document).ready(function (){
        $('#myValidForm').validate({
            rules: {
                promotion_id: {
                    required : true,
                },
                Product_id: {
                    required : true,
                },
                additional_conditions: {
                    required : true,
                },


            },
            messages :{
                promotion_id: {
                    required : 'Please Select Promotion',
                },
                Product_id: {
                    required : 'Select Product',
                },
                additional_conditions: {
                    required : '  Add Adition Conditions',
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
