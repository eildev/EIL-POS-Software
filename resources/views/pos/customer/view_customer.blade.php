@extends('master')
@section('admin')

<div class="row">

<div class="col-md-12 grid-margin stretch-card d-flex justify-content-end">
    <div class="">
        <h4 class="text-right"><a href="{{route('customer.add')}}" class="btn btn-info">Add New Customer</a></h4>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Opening Receivable</th>
                                    <th>Opening Payable</th>
                                    <th>Wallet Balance</th>
                                    <th>Total Receivable</th>
                                    <th>Total Payable</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="showData">
                            @if ($customers->count() > 0)
                            @foreach ($customers as $key => $customer)
                                <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $customer->name ?? ''}}</td>
                                <td>{{ $customer->email ?? ''}}</td>
                                <td>{{ $customer->phone ?? ''}}</td>
                                <td>{{ $customer->address ?? ''}}</td>
                                <td>{{ $customer->opening_receivable ?? ''}}</td>
                                <td>{{ $customer->opening_payable ?? ''}}</td>
                                <td>{{ $customer->wallet_balance ?? ''}}</td>
                                <td>{{ $customer->total_receivable ?? ''}}</td>
                                <td>{{ $customer->total_payable ?? ''}}</td>
                                <td>
                                    <a href="{{route('customer.edit',$customer->id)}}" class="btn btn-sm btn-primary btn-icon">
                                        <i data-feather="edit"></i>
                                    </a>
                                    <a href="{{route('customer.delete',$customer->id)}}" id="delete" class="btn btn-sm btn-danger btn-icon">
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
                                    <a href="{{route('customer.add')}}" class="btn btn-primary">Add Customer<i
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


