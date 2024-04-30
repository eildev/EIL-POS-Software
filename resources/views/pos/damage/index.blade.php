@extends('master')
@section('admin')
<div class="row">
<div class="col-md-12 grid-margin stretch-card d-flex justify-content-end">
    <div class="">

        <h4 class="text-right"><a href="{{route('customer.view')}}" class="btn btn-info">View All Damage List</a></h4>
    </div>
</div>
<div class="col-md-12 stretch-card">
<div class="card">
	<div class="card-body">
		<h6 class="card-title text-info">Add Damage</h6>
			<form id="myValidForm" action="{{route('damage.store')}}" method="post"  >
				@csrf
				<div class="row">
					<!-- Col -->

                    <div class="mb-3 col-md-6">
                        @php
                            $products = App\Models\Product::get();
                        @endphp
                        <label for="ageSelect" class="form-label">Product</label>
                        <select class="js-example-basic-single form-select product_select" name="product_id" data-width="100%"
                            onclick="errorRemove(this);" onblur="errorRemove(this);">
                            @if ($products->count() > 0)
                                <option selected disabled>Select Damaged Product</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            @else
                                <option selected disabled>Please Add Product</option>
                            @endif
                        </select>
                        <span class="text-danger product_select_error"></span>
                    </div>
					<div class="col-sm-6">
						<div class="mb-3 form-valid-groups">
							<label class="form-label">Pc<span class="text-danger">*</span></label>
							<input type="text" name="pc" class="form-control" placeholder="0">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="mb-3 form-valid-groups">
							<label class="form-label">Date<span class="text-danger">*</span></label>
							<input type="date" name="date" class="form-control" placeholder="Enter Date">
						</div>
					</div><!-- Col -->
					<div class="col-sm-6">
						<div class="mb-3">
							<label class="form-label">Note</label>
							<textarea name="note" class="form-control" placeholder="Write About Damages" rows="4" cols="50"></textarea>
						</div>
					</div><!-- Col -->
				</div><!-- Row -->
				<div >
				<input type="submit" class="btn btn-primary submit" value="Save">
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
                product_id: {
                    required : true,
                },
                pc: {
                    required : true,
                },
                date: {
                    required : true,
                },
            },
            messages :{
                damaged_product_id: {
                    required : 'Please Enter the Name of Damaged Product',
                },
                pc: {
                    required : 'Please Enter the number of Damaged Products',
                },
                date: {
                    required : 'Please Enter date of Damaged Products',
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
