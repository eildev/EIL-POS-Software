@extends('master')
@section('admin')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sub Category</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center ">
                        <h6 class="card-title">Sub Category Table</h6>
                        <button class="btn btn-rounded-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModalLongScollable"><i data-feather="plus"></i></button>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>SubCategory Name</th>
                                    <th>Slug</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="showData">
                                @include('products.subcategory-show-table')
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
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add SubCategory</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="signupForm" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Select Category</label>
                               <select class="form-select mb-3" name ="category_id" >
										<option selected="" value="" >Open this select menu</option>
                                        @foreach($categories as $category)
										<option value="{{$category->id}}" class="category_id">{{$category->name}}</option>
										@endforeach
									</select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Sub Category Name</label>
                            <input id="defaultconfig" class="form-control subcategory_name" maxlength="250" name="name"
                                type="text">
                        </div>
                        <!-- <div class="mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Sub Category Image</h6>
                                    <p class="mb-3 text-warning">Note: <span class="fst-italic">Image not
                                            required. If you
                                            add
                                            a category image
                                            please add a 400 X 400 size image.</span></p>
                                    <input type="file" class="subcategoryImage" name="subcategoryImage" id="myDropify" />
                                </div>
                            </div>
                        </div> -->
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save_subcategory">Save</button>
                </div> 
            </form>
            </div>
        </div>
    </div>

<!-- ////////////Edit Modal//////////////// -->
<div class="modal fade" id="exampleModalLongScollableEdit" tabindex="-1" aria-labelledby="exampleModalScrollableTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add SubCategory</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body ">
                    <form id="signupForm" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Select Category</label>
                               <select class="form-select mb-3" name ="category_id" >
										<option selected="" value="" >Open this select menu</option>
                                        @foreach($categories as $category)
										<option value="{{$category->id}}" class="category_id">{{$category->name}}</option>
										@endforeach
									</select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Sub Category Name</label>
                            <input id="defaultconfig" value="" class="form-control subcategory_name" maxlength="250" name="name"
                                type="text">
                        </div>
                        <!-- <div class="mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Sub Category Image</h6>
                                    <p class="mb-3 text-warning">Note: <span class="fst-italic">Image not
                                            required. If you
                                            add
                                            a category image
                                            please add a 400 X 400 size image.</span></p>
                                    <input type="file" class="subcategoryImage" name="subcategoryImage" id="myDropify" />
                                </div>
                            </div>
                        </div> -->
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save_subcategory">Save</button>
                </div> 
            </form>
            </div>
        </div>
    </div>
<!-- ////////////Edit Modal End//////////////// -->
    <script>
           $(document).ready(function() {
            // save subcategory 
            const savesubCategory = document.querySelector('.save_subcategory');
            savesubCategory.addEventListener('click', function(e) {
                e.preventDefault();

                let category_id = document.querySelector('.category_id').value;
                let subcategory_name = document.querySelector('.subcategory_name').value;
                // let subcategoryImage = document.querySelector('.subcategoryImage').value;
                
                //console.log(category_id);
                // console.log(subcategory_name);
                //console.log(subcategoryImage);

                if (subcategory_name != "") {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '/subcategory/store',
                        type: 'POST',
                        data: {
                            'subcategory_name': subcategory_name,
                            'category_id': category_id,
                            // 'subcategoryImage': subcategoryImage,
                        },
                        success: function(res) {
                            if (res.status == 200) {
                                $('.category_id').val('');
                                $('.subcategory_name').val('');
                                //  $('.subcategoryImage').val('');
                                $('#exampleModalLongScollable').modal('hide');
                                Swal.fire({
                                    position: "top-end",
                                    icon: "success",
                                    title: res.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                               
                                // console.log(res.data)
                                subCategoryView();
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
                        title: 'Please enter SubCategory Name',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            });
        ///////////////Show Subcategory ////////////
            // show category 
             function subCategoryView() {
                $.ajax({
                    url: '/subcategory/view',
                    method: 'GET',
                    success: function(data) {
                    //  console.log(data);
                        $('.showData').html(data);
                    }
                });
            }
              ///////////Data Edit Subcategory //////////
              function EditsubCategory() {
                $.ajax({
                    url: '/subcategory/edit',
                    method: 'GET',
                    success: function(data) {
                    //  console.log(data);
                       
                    }
                });
            }
        });
       
/////////////////////////Delete Subcategory //////////////////
    //  $('.delete-subcategory').on('click', function(e) {
    //     e.preventDefault();
    //     var subcategoryId = $(this).data('subcategory-id');
    //     $.ajax({
    //         url: '/subcategory/delete/' + subcategoryId,
    //         type: 'DELETE',
    //         data: {
    //             _token: '{{ csrf_token() }}'
    //         },
    //         success: function(response) {
    //             if (response.status == 200) {
    //                 // Optionally, update the UI to reflect the deletion
    //                 alert('Subcategory deleted successfully');
    //             } else {
    //                 alert('Failed to delete subcategory');
    //             }
    //         },
    //         error: function(xhr, status, error) {
    //             console.error(xhr.responseText);
    //         }
    //     });
    // });
    </script>
@endsection
