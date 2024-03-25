@extends('master')
@section('admin')

<div class="row">
<div class="col-md-12 grid-margin stretch-card d-flex justify-content-end">
    <div class="">
        <h4 class="text-right"><a href="{{route('branch.view')}}" class="btn btn-info">View All Customer</a></h4>
    </div>
</div>
<div class="col-md-12 stretch-card">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title text-info">Add Customer</h6>
									<form>
										<div class="row">
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Select Branch</label>
													<select class="form-select mb-3">
                                                        <option selected="">Select Branch</option>
                                                        <option value="1">One</option>
                                                        
                                                    </select>
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label"> Name</label>
													<input type="text" class="form-control" placeholder="Enter Customer name">
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Phone</label>
													<input type="text" class="form-control" placeholder="Enter Customer Phone">
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
										<div class="row">
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">City</label>
													<input type="text" class="form-control" placeholder="Enter city">
												</div>
											</div><!-- Col -->
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">State</label>
													<input type="text" class="form-control" placeholder="Enter state">
												</div>
											</div><!-- Col -->
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">Zip</label>
													<input type="text" class="form-control" placeholder="Enter zip code">
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
										<div class="row">
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Email address</label>
													<input type="email" class="form-control" placeholder="Enter email">
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Password</label>
													<input type="password" class="form-control" autocomplete="off" placeholder="Password">
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
									</form>
									<button type="button" class="btn btn-primary submit">Submit form</button>
							</div>
						</div>
					</div>
</div>

@endsection