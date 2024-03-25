@extends('master')
@section('admin')

<div class="row">
<div class="col-md-12 grid-margin stretch-card d-flex justify-content-end">
    <div class="">
        <h4 class="text-right"><a href="{{route('branch')}}" class="btn btn-info">Add New Branch</a></h4>
    </div>
</div>
<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div id="" class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Branch Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>logo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="showData">
                            @if ($branches->count() > 0)
                            @foreach ($branches as $key => $branch)
                                <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $branch->name ?? ''}}</td>
                                <td>{{ $branch->email ?? ''}}</td>
                                <td>{{ $branch->phone ?? ''}}</td>
                                <td>{{ $branch->address ?? ''}}</td>
                                <td><img src="{{asset('uploads/branch/'. $branch->logo)}}" alt="logo" height="60px" width="60px"></td>
                                <td>
                                    <a href="{{route('branch.edit',$branch->id)}}" class="btn btn-sm btn-primary btn-icon">
                                        <i data-feather="edit"></i>
                                    </a>
                                    <a href="{{route('branch.delete',$branch->id)}}" id="delete" class="btn btn-sm btn-danger btn-icon">
                                        <i data-feather="trash-2"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">
                                <div class="text-center text-warning mb-2">Data Not Found</div>
                                <div class="text-center">
                                    <a href="{{route('branch')}}" class="btn btn-primary">Add Branch<i
                                            data-feather="plus"></i></a>
                                </div>
                            </td>
                        </tr>
                       @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection


