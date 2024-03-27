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
                    <div id="" class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Category Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="showData">
                                @include('pos.products.category-show-table');
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
                    <form id="signupForm" class="categoryForm" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input id="defaultconfig" class="form-control category_name" maxlength="250" name="name"
                                type="text">
                        </div>
                        <div class="mb-3">
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
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save_category">Save</button>
                    <button type="button" class="btn btn-primary update_category d-none">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            // save category
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
                    url: '/category/store',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
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
                            formData.delete(entry[0]);
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
            })


            // show category
            function categoryView() {
                $.ajax({
                    url: '/category/view',
                    method: 'GET',
                    success: function(data) {
                        $('.showData').html(data);
                    }
                })
            }
        });
        $('.category_edit').click(function(e) {
            e.preventDefault();
            // alert(this.getAttribute('data-id'));
            let id = this.getAttribute('data-id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: `/category/edit/${id}`,
                type: 'GET',
                success: function(data) {
                    // console.log(data.category)
                    $('.modal-title').text('Edit Category');
                    $('.save_category').hide();
                    $('.update_category').removeClass('d-none');
                    $('.category_name').val(data.category.name);
                    $('.dropify-render').html(
                        `<img src="http://127.0.0.1:8000/uploads/category/${data.category?.image ?? ''}" alt="cat-image">`
                        );

                }
            });
        })
    </script>
@endsection
