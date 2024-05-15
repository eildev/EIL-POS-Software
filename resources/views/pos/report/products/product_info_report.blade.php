@extends('master')
@section('admin')
<div class="row">
    <div class="col-md-12   grid-margin stretch-card filter_box">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <input class="form-control" type="text" placeholder="price">
                    </div>
                    @php
                        $category = App\Models\Product::all();
                        $subCategory = App\Models\SubCategory::all();
                        $brand = App\Models\Brand::all();
                    @endphp

                    <div class="col-md-3">
                        <div class="input-group flatpickr" id="flatpickr-date">
                            <select class="js-example-basic-single form-select select-brand customer_id"
                                data-width="100%" name="">
                                @if ($brand->count() > 0)
                                    <option selected disabled>Select Brand</option>
                                    @foreach ($brand as $brands)
                                        <option value="{{ $brands->id }}">{{ $brands->name }}</option>
                                    @endforeach
                                @else
                                    <option selected disabled>Please Add Brand</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group flatpickr" id="flatpickr-date">
                            <select class="js-example-basic-single form-select category_select" data-width="100%">
                                @if ($category->count() > 0)
                                    <option selected disabled>Select Category</option>
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                @else
                                    <option selected disabled>Please Add Category</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group flatpickr" id="flatpickr-date">
                            <select class="js-example-basic-single form-select subcategory_select" data-width="100%">
                                @if ($subCategory->count() > 0)
                                    <option selected disabled>Select Sub Category</option>
                                    @foreach ($subCategory as $subcat)
                                        <option value="{{ $subcat->id }}">{{ $subcat->name }}</option>
                                    @endforeach
                                @else
                                    <option selected disabled>Please Add Sub Category</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="justify-content-left">
                            <button class="btn btn-sm bg-info text-dark mr-2" id="filter">Filter</button>
                            <button class="btn btn-sm bg-primary text-dark" id="reset">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">

            <div class="card">
                <div class="card-body">
                    <h6>Product Info</h6> <br>
                    <div class="table-responsive">
                        <table id="example" class="table">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Barcode No</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Unit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($productInfo->count() > 0)
                                    @foreach ($productInfo as $key => $product)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <img src="{{ $product->image ? asset('uploads/product/' . $product->image) : asset('dummy/image.jpg') }}"
                                                    alt="product image">
                                            </td>
                                            <td>{{ $product->name ?? '' }}</td>
                                            <td>{{$product->barcode}}</td>
                                            <td>{{ $product->category->name ?? '' }}</td>
                                            <td>{{ $product->brand->name ?? '' }}</td>
                                            <td>{{ $product->price ?? 0 }}</td>
                                            <td>{{ $product->stock ?? 0 }}</td>
                                            <td>{{ $product->unit->name ?? '' }}</td>
                                        </tr>


                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>

function printModalContent(modalId) {
    var modalBodyContent = document.getElementById(modalId).getElementsByClassName('modal-body')[0].innerHTML;
    var printWindow = window.open('', '_blank');
    printWindow.document.write('<html><head><title>Print</title><link rel="stylesheet" type="text/css" href="print.css" /></head><body>' + modalBodyContent + '</body></html>');
    printWindow.document.close();
    printWindow.print();

}
</script>
    <style>
        .barcode-container {
            text-align: center;
            border: 1px solid #e9ecef;
            padding: 10px;
        }
        .dblock{
            display: inline-block;
        }

    </style>
@endsection
