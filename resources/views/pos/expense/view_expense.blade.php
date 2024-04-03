@extends('master')
@section('admin')

<div class="row">


{{-- /////////////////Modal//////////////// --}}
<div class="modal fade" id="exampleModalLongScollable" tabindex="-1" aria-labelledby="exampleModalScrollableTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Expense Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="signupForm" class="categoryForm">
                        <div class="mb-3">
                            <label for="name" class="form-label">Expense Category Name</label>
                            <input id="defaultconfig" class="form-control category_name" maxlength="250" name="name"
                                type="text" onkeyup="errorRemove(this);" onblur="errorRemove(this);">
                            <span class="text-danger category_name_error"></span>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save_category">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
{{-- /////////////////End Modal//////////////// --}}

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

{{-- ///////////tab//////////// --}}
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        {{-- <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#" role="tab" aria-controls="contact" aria-selected="false"></a> --}}
        <a class="nav-link active" id="expense-tab" data-bs-toggle="tab" href="#expense" role="tab" aria-controls="profile" aria-selected="false">Expense Report</a>
      </li>

    <li class="nav-item">
      <a class="nav-link " id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">View/Add Expense</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">View Expense Category</a>
    </li>



  </ul>
  <div class="tab-content border border-top-0 p-3" id="myTabContent">
    <div class="tab-pane fade  " id="home" role="tabpanel" aria-labelledby="home-tab">
        {{-- ///Expense --}}
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

                        <div  class="table-responsive">
                            <table id="dataTableExample" class="table">
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

            </div>
        </div>
        {{-- ///End Expense --}}
        {{-- ///Expense Category --}}
        <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab">
            {{-- /// Expense Category --}}
            <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <h6 class="card-title text-info">View Expense Category</h6>
                                        </div>
                                        <div class="col-md-5">
                                            <a href="" class="btn btn-sm bg-info text-dark" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalLongScollable"><i data-feather="plus"></i> Expense Category</a>
                                        </div>

                                    </div>


                                    <div class="table-responsive">
                                        <table id="dataTableExample2" class="table">
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

        </div>
          {{-- End Expense Category --}}
          {{-- /// Expense Report  --}}
          <div class="tab-pane fade show active" id="expense" role="tabpanel" aria-labelledby="expense-tab">
            {{-- /////Expensse Report Start --}}
          <div class="row">
            <div class="col-md-12   grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- Col -->
                            <div class="col-sm-4">
                                <div class="input-group flatpickr" id="flatpickr-date">
                                    <input type="text" class="form-control from-date" placeholder="Select date" data-input>
                                    <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                                  </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="input-group flatpickr" id="flatpickr-date">
                                    <input type="text" class="form-control to-date" placeholder="Select date" data-input>
                                    <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                                  </div>
                            </div>
                            <style>
                                .select2-container--default{
                                    width: 100% !important;
                                }
                            </style>
                            <div class="col-sm-4">
                                <div class="mb-3 w-100">
                                    {{-- <label class="form-label">Amount<span class="text-danger">*</span></label> --}}
                                    <select class="expense_category_name is-valid js-example-basic-single form-control filter-category @error('expense_category_id') is-invalid @enderror" name="expense_category_id" aria-invalid="false" width="100">
                                        <option selected="" disabled="">Select Category </option>
                                        @foreach ($expenseCat as $expanse)
                                         <option value="{{$expanse->id}}">{{$expanse->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-11 mb-2"> <!-- Left Section -->
                                <div class="justify-content-left">
                                    <a href="" class="btn btn-sm bg-info text-dark mr-2" id="filter">Filter</a>
                                    <a class="btn btn-sm bg-primary text-dark" onclick="resetWindow()">Reset</a>
                                </div>
                            </div>

                            <div class="col-md-1"> <!-- Right Section -->
                                <div class="justify-content-end">
                                    <a href="#" onclick="printTable()" class="btn btn-sm bg-info text-dark mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer btn-icon-prepend"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>Print</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {{-- ////list// --}}
           <div id="filter-rander">
            @include('pos.expense.expense-filter-rander-table')
           </div>
          </div>
            {{-- /////Expensse Report End --}}
        </div>
        {{-- /////End Report --}}
    </div>



  </div>
{{-- ///////////tab//////////// --}}

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
                    window.location.reload();
                }
            });
        });


         const saveCategory = document.querySelector('.save_category');
        saveCategory.addEventListener('click', function(e) {
                e.preventDefault();
                let formData = new FormData($('.categoryForm')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/expense/category/store',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if (res.status == 200) {
                            $('#exampleModalLongScollable').modal('hide');
                            // formData.delete(entry[0]);
                            // alert('added successfully');
                            $('.categoryForm')[0].reset();
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: res.message,
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            window.location.reload();
                        } else {
                            showError('.category_name', res.error.name);
                        }
                    }
                });
            })
            });
            const filter = document.querySelector('#filter').addEventListener('click', function(e){
                e.preventDefault();
                filterData();
            });
            document.querySelector('.filter-category').addEventListener('change', function(e){
                e.preventDefault();
                filterData();
            });
    function filterData(){
    let fromDate = document.querySelector('.from-date').value;
    let toDate = document.querySelector('.to-date').value;
   let filterCtegory = document.querySelector('.filter-category').value;
    // console.log(filterCtegory);
    $.ajax({
        url:"{{route('expense.filter.view')}}",
        method:'GET',
        data: {
            fromDate,
            toDate,
            filterCtegory,
        },
        success:function(res){
            jQuery('#filter-rander').html(res);
        }
    });
}//

// Print function
function printTable() {

    // Hide action buttons
    var actionButtons = document.querySelectorAll('.btn-icon');
    actionButtons.forEach(function(button) {
        button.style.display = 'none';
    });
    var actionColumn = document.querySelectorAll('.action th:last-child');
    actionColumn.forEach(function(column) {
        column.style.display = 'none';
    });
    var actionthColumn = document.querySelectorAll('.showData td:last-child');
    actionthColumn.forEach(function(column) {
        column.style.display = 'none';
    });
    // Hide all other elements on the page temporarily
    var bodyContent = document.body.innerHTML;
    var tableContent = document.getElementById('tableContainer').innerHTML;

    document.body.innerHTML = tableContent;

    // Print the specific data table
    window.print();

    // Restore the original content of the page
    document.body.innerHTML = bodyContent;

    // Restore action buttons
    actionButtons.forEach(function(button) {
        button.style.display = 'block';
    });
    // var tabToActivateId = "#expense-tab";
    // window.location.reload();
    window.location.reload();
    // document.getElementById(tabToActivateId).click();
//

}
////reset button
function resetWindow() {
    // Reload the page
    window.location.reload();
    // Restore the "Expense Report" tab after the page reloads
    // document.getElementById("profile-tab").click();
}
</script>
@endsection


