@extends('master')
@section('admin')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">SMS Marketing</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card d-flex justify-content-end">
            <div class="">
                <h4 class="text-right"><a href="{{ route('employee.view') }}" class="btn btn-info">SMS To Customer</a></h4>
            </div>
        </div>
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title text-info">Add Employee</h6>
                    <div class="row">
                        <div class="col-lg-6">
                            <h4>Choose Customer</h4>
                        </div>
                        <div class="col-lg-6">
                            <h4>Send SMS</h4>
                            <form action="{{ route('sms.To.Customer') }}" method="POST">
                                @csrf
                                <div class="mb-3 form-valid-groups">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <label class="form-label">Purpose<span class="text-danger">*</span></label>
                                            <select name="purpose" id="" class="form-control">
                                                <option value="">-----Select Purpose-----</option>
                                                @php
                                                    $collection = App\Models\SmsCategory::all();
                                                @endphp
                                                @foreach ($collection as $item)
                                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-2 mt-4 ps-0">
                                            <a href="#" class="btn btn-primary submit mt-1 w-100"
                                                data-bs-toggle="modal" data-bs-target="#smsCategoryModal">Add</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 form-valid-groups">
                                    <label class="form-label">Number<span class="text-danger">*</span></label>
                                    <textarea class="form-control field_required" name="number" id="" cols="30" rows="5"
                                        placeholder="01917344267,01744676725...."></textarea>
                                </div>
                                <div class="mb-3 form-valid-groups">
                                    <label class="form-label">SMS Body <span class="text-danger">*</span></label>
                                    <textarea class="form-control field_required" name="sms" id="" cols="30" rows="8"
                                        placeholder="Enter SMS Text"></textarea>
                                </div>
                                <div class="mb-3 form-valid-groups">
                                    <button type="submit" class="btn btn-primary submit w-25">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- SMS Category modal  --}}
    <div class="modal fade " id="smsCategoryModal" tabindex="-1" aria-labelledby="exampleModalScrollableTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">SMS Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form class="smsCategoryForm row">
                        <div class="mb-3 col-md-12">
                            <label for="name" class="form-label">Sms Category Name<span
                                    class="text-danger">*</span></label>
                            <div class="row">
                                <div class="col-md-8">
                                    <input id="defaultconfig" class="form-control name " maxlength="100" name="name"
                                        type="text" onkeyup="errorRemove(this);" onblur="errorRemove(this);">
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-primary w-100 catSave">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#SL</th>
                                        <th>
                                            Category Name
                                        </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="showCategory">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        // remove error 
        function errorRemove(element) {
            if (element.value != '') {
                $(element).siblings('span').hide();
                $(element).css('border-color', 'green');
            }
        }
        $(document).ready(function() {
            $(".catSave").click(function(e) {
                e.preventDefault();
                // alert("ok");
                let formData = new FormData($('.smsCategoryForm')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route('sms.category.store') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if (res.status == 200) {
                            console.log(res);
                            // $('#exampleModalLongScollable').modal('hide');
                            // formData.delete(entry[0]);
                            // alert('added successfully');
                            // $('.categoryForm')[0].reset();
                            // categoryView();
                            // Swal.fire({
                            //     position: "top-end",
                            //     icon: "success",
                            //     title: res.message,
                            //     showConfirmButton: false,
                            //     timer: 1500
                            // });
                        } else {
                            showError('.category_name', res.error.name);
                        }
                    }
                });
            })
        });
    </script>
@endsection
