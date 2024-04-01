@extends('master')
@section('admin')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">New Product</li>
        </ol>
    </nav>
    <form class="productForm" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="card-title">Add Product</h6>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Product Name <span
                                        class="text-danger">*</span></label>
                                <input class="form-control name" name="name" type="text" onkeyup="errorRemove(this);"
                                    onblur="errorRemove(this);">
                                <span class="text-danger name_error"></span>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Product Code</label>
                                <input class="form-control" name="barcode" type="text">
                            </div>
                            <div class="mb-3 col-md-4">
                                @php
                                    $categories = App\Models\Category::get();
                                @endphp
                                <label for="ageSelect" class="form-label">Category <span
                                        class="text-danger">*</span></label>
                                <select class="form-select category_id" id="category_name" name="category_id"
                                    onclick="errorRemove(this);" onblur="errorRemove(this);">
                                    @if ($categories->count() > 0)
                                        <option selected disabled>Select category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @else
                                        <option selected disabled>Please Add Category</option>
                                    @endif
                                </select>
                                <span class="text-danger category_id_error"></span>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="ageSelect" class="form-label">Subcategory <span
                                        class="text-danger">*</span></label>
                                <select class="form-select subcategory_id" name="subcategory_id"
                                    onclick="errorRemove(this);" onblur="errorRemove(this);">
                                    <option selected disabled>Please Select Subcategory</option>
                                </select>
                                <span class="text-danger subcategory_id_error"></span>
                            </div>
                            <div class="mb-3 col-md-4">
                                @php
                                    $brands = App\Models\Brand::get();
                                @endphp
                                <label for="ageSelect" class="form-label">Brand <span class="text-danger">*</span></label>
                                <select class="form-select brand_id" name="brand_id" onclick="errorRemove(this);"
                                    onblur="errorRemove(this);">
                                    @if ($brands->count() > 0)
                                        <option selected disabled>Select Brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    @else
                                        <option selected disabled>Please Add Brand</option>
                                    @endif
                                </select>
                                <span class="text-danger brand_id_error"></span>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">Cost Price</label>
                                <input class="form-control" name="cost" type='number' placeholder="00.00" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">Sale Price <span
                                        class="text-danger">*</span></label>
                                <input class="form-control price" name="price" type='number' placeholder="00.00"
                                    onkeyup="errorRemove(this);" onblur="errorRemove(this);" />
                                <span class="text-danger price_error"></span>
                            </div>
                            <div class="mb-3 col-12">
                                <label for="" class="form-label">Description</label>
                                <textarea class="form-control" name="details" id="tinymceExample" rows="5"></textarea>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Stock</label>
                                <input class="form-control" name="stock" type="number" placeholder="00">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Main Unit Stock</label>
                                <input class="form-control" name="main_unit_stock" type="number" placeholder="00">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Total Sold</label>
                                <input class="form-control" name="total_sold" type="number" placeholder="00">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="ageSelect" class="form-label">Color</label>
                                {{-- <div id="pickr_1"></div> --}}
                                <input type="color" class="form-control" name="color" id="">
                            </div>
                            <div class="mb-3 col-12">
                                <label for="ageSelect" class="form-label">Size </label>
                                <select class="form-select size_id" name="size_id">
                                    <option selected disabled>Select Size</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-12">
                                @php
                                    $units = App\Models\Unit::get();
                                @endphp
                                <label for="ageSelect" class="form-label">Unit <span class="text-danger">*</span></label>
                                <select class="form-select unit_id" name="unit_id" onclick="errorRemove(this);"
                                    onblur="errorRemove(this);">
                                    @if ($units->count() > 0)
                                        <option selected disabled>Select Unit</option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach
                                    @else
                                        <option selected disabled>Please Add Unit</option>
                                    @endif
                                </select>
                                <span class="text-danger unit_id_error"></span>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Product Image</h6>
                                        <p class="mb-3 text-warning">Note: <span class="fst-italic">Image not
                                                required. If you
                                                add
                                                a category image
                                                please add a 400 X 400 size image.</span></p>
                                        <input type="file" class="categoryImage" name="image" id="myDropify" />
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input class="btn btn-primary w-full save_product" type="submit" value="Submit">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <script>
        // remove error 
        function errorRemove(element) {
            if (element.value != '') {
                $(element).siblings('span').hide();
                $(element).css('border-color', 'green');
            }
        }
        $(document).ready(function() {
            // show error
            function showError(name, message) {
                $(name).css('border-color', 'red'); // Highlight input with red border
                $(name).focus(); // Set focus to the input field
                $(`${name}_error`).show().text(message); // Show error message
            }

            // when select category
            const category = document.querySelector('#category_name');
            category.addEventListener('change', function() {
                let category_id = $(this).val();
                // alert(category_id);
                // console.log(category_id);
                if (category_id) {
                    $.ajax({
                        url: '/subcategory/find/' + category_id,
                        type: 'GET',
                        dataType: 'JSON',
                        success: function(res) {
                            if (res.status == 200) {
                                // console.log(res.data)
                                // subcategory data 
                                $('select[name="subcategory_id"]').html(
                                    '<option selected disabled>Select a Sub-Category</option>'
                                );
                                $.each(res.data, function(key, item) {
                                    $('select[name="subcategory_id"]').append(
                                        '<option myid="' + item.id +
                                        '" value="' + item.id +
                                        '">' + item
                                        .name + '</option>');
                                })

                                // size selcet 
                                $('select[name="size_id"]').html(
                                    '<option selected disabled>Select a Size</option>');
                                $.each(res.size, function(key, item) {
                                    $('select[name="size_id"]').append(
                                        '<option myid="' + item.id +
                                        '" value="' + item.id +
                                        '">' + item
                                        .size + '</option>');
                                })

                            }
                        }
                    });
                }
            });


            // product save 
            $('.save_product').click(function(e) {
                e.preventDefault();
                // alert('ok')
                let formData = new FormData($('.productForm')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/product/store',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if (res.status == 200) {
                            // console.log(res);
                            $('.productForm')[0].reset();

                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: res.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                            window.location.href = "{{ route('product.view') }}";
                        } else {
                            // console.log(res.error);
                            const error = res.error;
                            // console.log(error)
                            if (error.name) {
                                showError('.name', error.name);
                            }
                            if (error.category_id) {
                                showError('.category_id', error.category_id);
                            }
                            if (error.subcategory_id) {
                                showError('.subcategory_id', error.subcategory_id);
                            }
                            if (error.brand_id) {
                                showError('.brand_id', error.brand_id);
                            }
                            if (error.price) {
                                showError('.price', error.price);
                            }
                            if (error.unit_id) {
                                showError('.unit_id', error.unit_id);
                            }
                        }
                    }
                });
            })
        });
    </script>
@endsection
