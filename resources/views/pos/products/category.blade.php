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
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="signupForm" class="categoryFormEdit" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input id="defaultconfig" class="form-control edit_category_name" maxlength="250" name="name"
                                type="text">
                        </div>
                        <div class="mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Category Image</h6>
                                    <div style="height:150px;position:relative">
                                        <button class="btn btn-info edit_upload_img"
                                            style="position: absolute;top:50%;left:50%;transform:translate(-50%,-50%)">Browse</button>
                                        <img class="img-fluid showEditImage" {{-- src="{{ asset('uploads/category/387707397.webp') }}" --}} src=""
                                            style="height:100%; object-fit:cover">
                                    </div>
                                    <input hidden type="file" class="categoryImage edit_image" name="image"
                                        id="myDropify" />
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_category">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // image onload when category edit
        const edit_upload_img = document.querySelector('.edit_upload_img');
        const edit_image = document.querySelector('.edit_image');
        edit_upload_img.addEventListener('click', function(e) {
            e.preventDefault();
            edit_image.click();

            edit_image.addEventListener('change', function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('.showEditImage').src = e.target.result;
                }
                reader.readAsDataURL(this.files[0]);
            });
        });



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


        // edit category 
        $(document).on('click', '.category_edit', function(e) {
            e.preventDefault();
            // console.log('0k');
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
                    // console.log(data.category.name);
                    $('.edit_category_name').val(data.category.name);
                    $('.update_category').val(data.category.id);
                    if (data.category.image) {
                        $('.showEditImage').attr('src',
                            'http://127.0.0.1:8000/uploads/category/' + data.category.image);
                    } else {
                        $('.showEditImage').attr('src',
                            'http://127.0.0.1:8000/dummy/image.jpg');
                    }
                }
            });
        })

        // update category 
        $('.update_category').click(function(e) {
            e.preventDefault();
            // alert('ok');
            let id = $('.update_category').val();
            // console.log(id);
            let formData = new FormData($('.categoryFormEdit')[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: `/category/update/${id}`,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    if (res.status == 200) {
                        $('#edit').modal('hide');
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

        // category Delete 
        $('.category_delete').click(function(e) {
            e.preventDefault();
            let id = this.getAttribute('data-id');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: `/category/destroy/${id}`,
                        type: 'GET',
                        success: function(data) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success"
                            });
                            categoryView();
                        }
                    });
                }
            });
        })
    </script>
@endsection
