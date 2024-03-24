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
                            <tbody>
                                <!-- @php
                                    $serialNumber = 1;
                                @endphp
                                @if ($subCategories->count() > 0)
                                @foreach($subCategories as $key => $subcategory)
                                <tr>
                                <td>{{$serialNumber++}}</td>
                                <td>{{$subcategory->name}}</td>
                                <td>{{$subcategory->slug}}</td>
                                <td><img src="{{asset('uploads/subcategory/'.$subcategory->image)}}" alt="Sub category Image"></td>
                                <td>@if($subcategory->status == 0)
                                    <a href="" class="btn btn-sm bg-success">Active</a>
                                    @else
                                    <a href="" class="btn btn-sm bg-warning">Inactive</a>
                                    @endif
                                </td>
                                <td><a href="" class="btn btn-sm btn-xs bg-info"><i class="edit-icon " data-feather="edit"></i></a> 
                                   <a href=""class="btn btn-sm btn-xs bg-danger"><i class="delete-icon" data-feather="trash-2"></i> </a>
                                </td>
                                </tr>
                                @endforeach
                                @else
                                    <td colspan="6">
                                        <div class="text-center text-warning mb-2">Data Not Found</div>
                                        <div class="text-center">
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalLongScollable">Add SubCategory<i
                                                    data-feather="plus"></i></button>
                                        </div>
                                    </td>
                                @endif -->
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
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save_subcategory">Save</button>
                </div>
            </div>
        </div>
    </div>


    <script>
           $(document).ready(function() {
            // save subcategory 
            const savesubCategory = document.querySelector('.save_subcategory');
            savesubCategory.addEventListener('click', function(e) {
                e.preventDefault();

                let category_id = document.querySelector('.category_id').value;
                let subcategory_name = document.querySelector('.subcategory_name').value;
                // let subcategoryImage = document.querySelector('.subcategoryImage').value;
                
                //  console.log(category_id);
                //  console.log(subcategory_name);
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
                            subCategoryView()
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
            })
        ///////////////Show Subcategory ////////////
            // show category 
            const subCategoryView = () => {
                $.ajax({
                    url: '/subcategory/view',
                    type: 'GET',
                    success: function(data) {
                        if (data.status == 200) {
                            showSubCategory(data.subcategories);
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
        subCategoryView();
         ///////////Data Show Subcategory //////////
function showSubCategory(data) {
    data.map((subcategories, key) => {
        let newRow = `
                <tr>
                    <td>${key+1}</td>
                    <td>${subcategories.name ?? ""}</td>
                    <td>${subcategories.slug ?? ""}</td>
                    <td>${subcategories.image ?? ""}</td>
                    <td>
                        <button type="button" class="btn btn-primary" id="${subcategories.status}">Active</button>    
                    </td>
                    <td> 
                        <a href="#" class="btn btn-primary btn-icon category_edit" id="${subcategories.id}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-icon category_delete" id="${subcategories.id}">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                    </td>
                </tr>`;
        $('table tbody').append(newRow);
    })
}  });
    </script>
@endsection
