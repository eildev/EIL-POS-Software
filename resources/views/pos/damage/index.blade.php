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
					<div class="col-sm-6">
						<div class="mb-3 form-valid-groups">
							<label class="form-label"> Product <span class="text-danger">*</span></label>
							<input type="text" name="product" class="form-control field_required" placeholder="Enter Damaged Product name">
						</div>
					</div><!-- Col -->
					<div class="col-sm-6">
						<div class="mb-3 form-valid-groups">
							<label class="form-label">Pc<span class="text-danger">*</span></label>
							<input type="text" name="pc" class="form-control" placeholder="0">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="mb-3">
							<label class="form-label">Date</label>
							<input type="date" name="date" class="form-control" placeholder="Enter Date">
						</div>
					</div><!-- Col -->
					<div class="col-sm-6">
						<div class="mb-3">
							<label class="form-label">Note</label>
							<textarea name="note" class="form-control"  placeholder="Write About Damages" rows="4" cols="50"></textarea>
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
                product: {
                    required : true,
                },
                pc: {
                    required : true,
                },
            },
            messages :{
                product: {
                    required : 'Please Enter product Name',
                },
                pc: {
                    required : 'Please Enter pc',
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
