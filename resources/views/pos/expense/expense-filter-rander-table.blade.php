
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h6 class="card-title text-info">Expense </h6>

            <div id="tableContainer" class="table-responsive">
                <table class="table">
                    <thead class="action">
                        <tr>
                            <th>SN</th>
                            <th>purpose</th>
                            <th>Amount</th>
                            <th>Spender</th>
                            <th>Bank Account</th>
                            <th>Note</th>
                            <th>Expense Category</th>
                            <th>Expense Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody  class="showData">
                    @if ($expense->count() > 0)
                    @foreach ($expense as $key => $expenses)
                        <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $expenses->purpose ?? ''}}</td>
                        <td>{{ $expenses->amount ?? ''}}</td>
                        <td>{{ $expenses->spender ?? ''}}</td>
                        <td>{{ $expenses['bank']['name'] ?? '-'}}</td>
                        <td>{{ $expenses->note ?? '-'}}</td>
                        <td>{{ $expenses['expenseCat']['name'] ?? ''}}</td>
                        <td>{{ $expenses->expense_date ?? ''}}</td>

                        <td>
                            <a href="{{route('expense.edit',$expenses->id)}}" class="btn btn-sm btn-primary btn-icon">
                                <i data-feather="edit"></i>
                            </a>
                            <a href="{{route('expense.delete',$expenses->id)}}" id="delete" class="btn btn-sm btn-danger btn-icon">
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
                            <a href="{{route('expense.add')}}" class="btn btn-primary">Add Expanse<i
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
