@extends('master')
@section('admin')

<div class="row">

<div class="col-md-12 grid-margin stretch-card d-flex justify-content-end">
    <div class="">
        <h4 class="text-right"><a href="{{route('promotion.details.add')}}" class="btn btn-primary">Add Promotion Details</a></h4>
    </div>
</div>
<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h6 class="card-title text-info">View Promotion Details</h6>

                    <div  class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Promotion Name</th>
                                    <th>Product Name</th>
                                    <th>Additional Condition</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="showData">
                            @if ($promotion_details->count() > 0)
                            @foreach ($promotion_details as $key => $promotions_details)
                                <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $promotions_details['promotion']['promotion_name'] ?? ''}}</td>
                                <td>{{ $promotions_details['product']['name'] ?? ''}}</td>
                                <td>{{ $promotions_details->additional_conditions ?? ''}}</td>
                                <td>
                                    <a href="{{route('promotion.details.edit',$promotions_details->id)}}" class="btn btn-sm btn-primary btn-icon">
                                        <i data-feather="edit"></i>
                                    </a>
                                    <a href="{{route('promotion.details.delete',$promotions_details->id)}}" id="delete" class="btn btn-sm btn-danger btn-icon">
                                        <i data-feather="trash-2"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="12">
                                <div class="text-center text-warning mb-2">Data Not Found</div>
                                <div class="text-center">
                                    <a href="{{route('promotion.details.add')}}" class="btn btn-primary">Add Promotion Details<i
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


