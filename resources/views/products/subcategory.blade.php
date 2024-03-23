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
                                @php
                                    $serialNumber = 1;
                                @endphp
                                @if ($subCategories->count() > 0)
                                @foreach($subCategories as $key => $subcategory)
                                <tr>
                                <td>{{$serialNumber++}}</td>
                                <td>{{$subcategory->name}}</td>
                                <td>{{$subcategory->slug}}</td>
                                <td><img src="" alt=""></td>
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
                                @endif
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
                    <form id="signupForm">
                        <div class="mb-3">
                            <label for="name" class="form-label">Select Category</label>
                            <select class="form-select mb-3" name ="category_id">
										<option selected="" value="" >Open this select menu</option>
                                        @foreach($categories as $category)
										<option value="{{$category->id}}">{{$category->name}}</option>
										@endforeach
									</select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Sub Category Name</label>
                            <input id="defaultconfig" class="form-control category_name" maxlength="250" name="name"
                                type="text">
                        </div>
                        <div class="mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Sub Category Image</h6>
                                    <p class="mb-3 text-warning">Note: <span class="fst-italic">Image not
                                            required. If you
                                            add
                                            a category image
                                            please add a 400 X 400 size image.</span></p>
                                    <input type="file" class="categoryImage" name="image" id="myDropify" />
                                </div>
                            </div>
                        </div>
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
        const saveCategory = document.querySelector('.save_category');
        saveCategory.addEventListener('click', function(e) {
            e.preventDefault();

            let categoryName = document.querySelector('.category_name').value;
            let image = document.querySelector('.categoryImage').value;

            if (categoryName != null) {

            } else {

            }

        })
    </script>
@endsection
