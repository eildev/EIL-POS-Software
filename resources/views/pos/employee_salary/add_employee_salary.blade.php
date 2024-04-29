
@extends('master')
@section('admin')
<div class="row">
<div class="col-md-12 grid-margin stretch-card d-flex justify-content-end">
    <div class="">

        <h4 class="text-right"><a href="{{route('employee.salary.view')}}" class="btn btn-info">View Salary History</a></h4>
    </div>
</div>
<div class="col-md-12 stretch-card">
<div class="card">
	<div class="card-body">
		<h6 class="card-title text-info">Employee Salary</h6>
			<form id="myValidForm" action="{{route('employee.salary.store')}}" method="post"  >
				@csrf
				<div class="row">
					<!-- Col -->
					<div class="col-sm-6">
						<div class="mb-3 form-valid-groups">
							<label class="form-label">Select Branch <span class="text-danger">*</span></label>
                            <select class="form-select mb-3"  name="branch_id">
                                <option selected="" disabled>Select Branch</option>
                                @foreach ($branch as $branchs)
                                <option value="{{$branchs ->id}}">{{$branchs->name}}</option>
                                @endforeach
                            </select>
						</div>
					</div><!-- Col -->
					<div class="col-sm-6">
						<div class="mb-3 form-valid-groups">
							<label class="form-label">Select Employee Name<span class="text-danger">*</span></label>
							<select class="form-select mb-3" name="employee_id">
                                <option selected="" disabled>Select Employee Name</option>
                                @foreach ($employees as $employee)
                                <option value="{{$employee->id}}">{{$employee->full_name}}({{$employee->salary}} Tk) </option>
                                @endforeach
                            </select>
						</div>
					</div>
					<div class="col-sm-6 form-valid-groups">
						<div class="mb-3" id="flatpickr-date">
							<label class="form-label">Salary Date<span class="text-danger">*</span></label>
                            <input type="text" name="date" class="form-control" placeholder="Date" data-input>
						</div>
					</div><!-- Col -->
					<div class="col-sm-6 form-valid-groups">
						<div class="mb-3">
							<label class="form-label">Salary Amount<span class="text-danger">*</span></label>
							<input type="number" class="form-control" name="debit"  placeholder="0.00">
						</div>
					</div><!-- Col -->
					<div class="col-sm-12 form-valid-groups">
						<div class="mb-3">
							<label class="form-label">Note</label>
							<textarea name="note" class="form-control" id=""  cols="20" rows="5"></textarea>
						</div>
					</div><!-- Col -->
				</div><!-- Row -->
				<div >
				<input type="submit" class="btn btn-primary submit" value="Payment">
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
                branch_id: {
                    required : true,
                },
                employee_id: {
                    required : true,
                },
                date: {
                    required : true,
                },
                debit: {
                    required : true,
                },
            },
            messages :{
                branch_id: {
                    required : 'Please Select Branch Name',
                },
                employee_id: {
                    required : 'Please Select Employee',
                },
                date: {
                    required : 'Please Select Salaray Date',
                },
                debit: {
                    required : 'Please Enter Salary Amount',
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
