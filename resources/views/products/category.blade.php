@extends('master')
@section('admin')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Category</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="card-title">Category Table</h6>
                        <button class="btn btn-rounded-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModalLongScollable"><i data-feather="plus"></i></button>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @if ($categories->count() > 0)
                                    @foreach ($categories as $key => $category)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $category->name ?? '' }}</td>
                                            <td>
                                                <button class="btn btn-success">Status</button>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-icon">
                                                    <i data-feather="edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger btn-icon">
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
                                                <button class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalLongScollable">Add Category<i
                                                        data-feather="plus"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endif --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModalLongScollable" tabindex="-1" aria-labelledby="exampleModalScrollableTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="signupForm">
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input id="defaultconfig" class="form-control category_name" maxlength="250" name="name"
                                type="text">
                        </div>
                        {{-- <div class="mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Category Image</h6>
                                    <p class="mb-3 text-warning">Note: <span class="fst-italic">Image not
                                            required. If you
                                            add
                                            a category image
                                            please add a 400 X 400 size image.</span></p>
                                    <input type="file" class="categoryImage" name="image" id="myDropify" />
                                </div>
                            </div>
                        </div> --}}
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save_category">Save</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            // save category 
            const saveCategory = document.querySelector('.save_category');
            saveCategory.addEventListener('click', function(e) {
                e.preventDefault();

                let categoryName = document.querySelector('.category_name').value;
                // console.log(categoryName);

                if (categoryName != "") {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '/category/store',
                        type: 'POST',
                        data: {
                            'name': categoryName,
                        },
                        success: function(res) {
                            if (res.status == 200) {
                                $('.category_name').val('');
                                $('#exampleModalLongScollable').modal('hide');
                                Swal.fire({
                                    position: "top-end",
                                    icon: "success",
                                    title: res.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                // console.log(res.data)
                                categoryView();
                            } else {
                                Swal.fire({
                                    position: "top-end",
                                    icon: "warning",
                                    title: res.error.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        }
                    });
                } else {
                    Swal.fire({
                        position: "top-end",
                        icon: "warning",
                        title: 'Please enter Category Name',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            })


            // show category 
            const categoryView = () => {
                $.ajax({
                    url: '/category/view',
                    type: 'GET',
                    success: function(data) {
                        if (data.status == 200) {
                            showCategory(data.categories);
                        } else {
                            Swal.fire({
                                position: "top-end",
                                icon: "warning",
                                title: 'data.error.message',
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    }
                })
            }

            categoryView();

            function showCategory(data) {
                data.map((category, key) => {
                    let newRow = `
                            <tr>
                                <td>${key+1}</td>
                                <td>${category.name}</td>
                                <td>${category.status}</td>
                                <td> 
                                    <a href="#" class="btn btn-primary btn-icon">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-icon">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                                `;
                    $('table tbody').append(newRow);
                })
            }
        });
    </script>
@endsection
