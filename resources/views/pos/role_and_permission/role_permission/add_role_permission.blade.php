@extends('master')
@section('title','| Add Role-Permission')
@section('admin')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card d-flex justify-content-end">
            <div class="">
                <h4 class="text-right"><a href="{{ route('all.role') }}" class="btn btn-info">Role-Permission List</a></h4>
            </div>
        </div>
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title text-info">Add Role In Permission</h6>
                    <form id="myValidForm" action="{{ route('role.permission.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <!-- Col -->
                            <div class="col-sm-12">
                                <div class="mb-3 form-valid-groups">
                                    <label class="form-label">Role Name<span class="text-danger">*</span></label>
                                    </label>
                                    <select class="js-example-basic-single form-select" name="role_id"
                                    data-width="100%"  >
                                        <option selected disabled>Select Role Name</option>
                                        @foreach ($role as $roles)
                                        <option value="{{$roles->id}}">{{$roles->name}}</option>
                                        @endforeach
                                     </select>
                                </div>
                            </div><br>
                            <div class="form-check form-check-inline" style="margin-bottom: 20px;margin-left:10px">

                                <label class="form-check-label" for="checkInlineCheckedAll">
                                   Select All Permission</label>
                                <input type="checkbox" class="form-check-input" id="checkInlineCheckedAll" checked="">
                            </div>

                            <hr>
                            @foreach ($permission_group->unique('group_name') as $group )
                            <div class="row">
                                <div class="col-md-3">
                                        {{-- <h5 class="form-label">Group Name</h5><br> --}}
                                    <div class="form-check form-check-inline">

                                        <label class="form-check-label" for="checkInlineChecked{{$group->group_name}}">
                                            {{$group->group_name}} </label>
                                        <input type="checkbox" class="form-check-input" id="checkInlineChecked{{$group->group_name}}" checked="">
                                    </div>
                            </div>
                            <div class="col-md-9">
                                @php
                                    $permissions = App\Models\User::getPermissionByGroupName($group->group_name);
                                @endphp
                                    {{-- <h5 class="form-label">Permission Name </h5><br> --}}
                                    @foreach ($permissions as $permission)


                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" for="checkInlineChecked{{$permission->id}}">
                                        {{$permission->name}}
                                    </label>
                                    <input type="checkbox" name="permission[]" class="form-check-input" id="checkInlineChecked{{$permission->id}}" value="{{$permission->id}}" checked="">
                                </div></br>
                                @endforeach </br>
                            </div>
                        </div><!-- Row -->
                        @endforeach
                        <div>
                            <input type="submit" id="submit_btn" class="btn btn-primary submit" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#checkInlineCheckedAll').click(function(){
		if ($(this).is(':checked')) {
			$('input[type = checkbox]').prop('checked',true);
		}else{
			$('input[type = checkbox]').prop('checked',false);
		}
	    });

        });



    </script>
@endsection
