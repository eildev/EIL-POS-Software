@extends('master')
@section('admin')

<div class="row">

<div class="col-md-12 grid-margin stretch-card d-flex justify-content-end">
    <div class="">
        <h4 class="text-right"><a href="{{route('expense.add')}}" class="btn btn-info">Add New Expense</a></h4>
    </div>
</div>
<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h6 class="card-title text-info">View Expense List</h6>

                    <div id="" class="table-responsive">
                        <table class="table">
                            <thead>
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
                            <tbody class="showData">
                            @if ($expense->count() > 0)
                            @foreach ($expense as $key => $expenses)
                                <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $expenses->purpose ?? ''}}</td>
                                <td>{{ $expenses->amount ?? ''}}</td>
                                <td>{{ $expenses->spender ?? ''}}</td>
                                <td>{{ $expenses->bank_account_id ?? ''}}</td>
                                <td>{{ $expenses->note ?? ''}}</td>
                                <td>{{ $expenses->expense_category_id ?? ''}}</td>
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
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h6 class="card-title text-info">View Expense Category</h6>

                    <div id="" class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="showData">

                            @foreach ($expenseCat as $key => $expenseCategory)
                                <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $expenseCategory->name ?? ''}}</td>
                                <td>
                                    <a href="" data-id={{$expenseCategory->id}} data-bs-toggle="modal" data-bs-target="#edit" class="btn btn-sm btn-primary btn-icon category_edit">
                                        <i data-feather="edit"></i>
                                    </a>
                                    <a href="{{route('expense.category.delete',$expenseCategory->id)}}" id="delete" class="btn btn-sm btn-danger btn-icon ">
                                        <i data-feather="trash-2"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>


{{-- //////////////Edit////////// --}}
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="categoryFormEdit" >
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input id="defaultconfig" class="form-control edit_category_name" maxlength="250" name="name"
                            type="text" onkeyup="errorRemove(this);" onblur="errorRemove(this);">
                        <span class="text-danger edit_category_name_error"></span>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary update_expense_category">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
  $(document).ready(function() {
     $(document).on('click', '.category_edit', function(e) {
                e.preventDefault();
                // alert('ok');
                let id = this.getAttribute('data-id');
                // alert(id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: `/expense/category/edit/${id}`,
                    type: 'GET',
                    success: function(data) {
                        // console.log(data.category.name);
                        $('.edit_category_name').val(data.category.name);
                         $('.update_expense_category').val(data.category.id);

                    }
                });
            });
            $(document).on('click', '.update_expense_category', function(e) {
            e.preventDefault();
            let id = $(this).val(); // Get value of the clicked element
            let formData = new FormData($('.categoryFormEdit')[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: `/expense/category/update/${id}`,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    $('#edit').modal('hide');
                    $('.categoryFormEdit')[0].reset();
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: res.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        });
            });
</script>
@endsection


