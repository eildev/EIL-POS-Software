@extends('master')
@section('admin')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">New Product</li>
        </ol>
    </nav>
    <form id="signupForm" action="">
        <div class="row">
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="card-title">Add Product</h6>
                            <button class="btn btn-rounded-primary btn-sm"> <i data-feather="eye"></i></button>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Product Name <span
                                        class="text-danger">*</span></label>
                                <input class="form-control  @error('name') is-invalid  @enderror" name="name"
                                    type="text">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
                                <select
                                    class="js-example-basic-single form-select @error('category_id') is-invalid  @enderror"
                                    data-width="100%" name="category_id">
                                    @if ($categories->count() > 0)
                                        <option selected disabled>Select category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @else
                                        <option selected disabled>Please Add Category</option>
                                    @endif
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                @php
                                    $subcategories = App\Models\SubCategory::get();
                                @endphp
                                <label for="ageSelect" class="form-label">Subcategory <span
                                        class="text-danger">*</span></label>
                                <select
                                    class="js-example-basic-single form-select @error('subcategory_id') is-invalid  @enderror"
                                    data-width="100%" name="subcategory_id">
                                    @if ($subcategories->count() > 0)
                                        <option selected disabled>Select subcategory</option>
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @endforeach
                                    @else
                                        <option selected disabled>Please Add Subcategory</option>
                                    @endif
                                </select>
                                @error('subcategory_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                @php
                                    $brands = App\Models\Brand::get();
                                @endphp
                                <label for="ageSelect" class="form-label">Brand <span class="text-danger">*</span></label>
                                <select class="js-example-basic-single form-select @error('brand_id') is-invalid  @enderror"
                                    data-width="100%" name="brand_id">
                                    @if ($brands->count() > 0)
                                        <option selected disabled>Select Brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    @else
                                        <option selected disabled>Please Add Subcategory</option>
                                    @endif
                                </select>
                                @error('brand_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">Cost Price</label>
                                <input class="form-control" name="cost" type='number' />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">Sale Price <span
                                        class="text-danger">*</span></label>
                                <input class="form-control @error('price') is-invalid  @enderror" name="price"
                                    type='number' />
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-12">
                                <label for="" class="form-label">Description</label>
                                <textarea class="form-control" name="tinymce" id="tinymceExample" rows="5"></textarea>
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Product Name <span
                                        class="text-danger">*</span></label>
                                <input class="form-control  @error('name') is-invalid  @enderror" name="name"
                                    type="text">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
                                <select
                                    class="js-example-basic-single form-select @error('category_id') is-invalid  @enderror"
                                    data-width="100%" name="category_id">
                                    @if ($categories->count() > 0)
                                        <option selected disabled>Select category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @else
                                        <option selected disabled>Please Add Category</option>
                                    @endif
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                @php
                                    $subcategories = App\Models\SubCategory::get();
                                @endphp
                                <label for="ageSelect" class="form-label">Subcategory <span
                                        class="text-danger">*</span></label>
                                <select
                                    class="js-example-basic-single form-select @error('subcategory_id') is-invalid  @enderror"
                                    data-width="100%" name="subcategory_id">
                                    @if ($subcategories->count() > 0)
                                        <option selected disabled>Select subcategory</option>
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @endforeach
                                    @else
                                        <option selected disabled>Please Add Subcategory</option>
                                    @endif
                                </select>
                                @error('subcategory_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                @php
                                    $brands = App\Models\Brand::get();
                                @endphp
                                <label for="ageSelect" class="form-label">Brand <span
                                        class="text-danger">*</span></label>
                                <select
                                    class="js-example-basic-single form-select @error('brand_id') is-invalid  @enderror"
                                    data-width="100%" name="brand_id">
                                    @if ($brands->count() > 0)
                                        <option selected disabled>Select Brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    @else
                                        <option selected disabled>Please Add Subcategory</option>
                                    @endif
                                </select>
                                @error('brand_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="password" class="form-label">Cost Price</label>
                                <input class="form-control" name="cost" type='number' />
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="password" class="form-label">Sale Price <span
                                        class="text-danger">*</span></label>
                                <input class="form-control @error('price') is-invalid  @enderror" name="price"
                                    type='number' />
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm password</label>
                                <input id="confirm_password" class="form-control" name="confirm_password"
                                    type="password">
                            </div>
                            <div>
                                <input class="btn btn-primary w-full" type="submit" value="Submit">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
