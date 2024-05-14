@extends('master')
@section('admin')
<div>
    <button class="btn btn-info text-center print" onClick="window.print();">Print</button><br><br><br>
    <div class="row">
        @for($i = 0; $i < $product->stock; $i++)
        <div class="col-md-4">
        <div class="barcode-container">
            <span class="dblock">
            {!! DNS1D::getBarcodeHTML($product->barcode, 'PHARMA') !!}</span><br>
            <span style="">{{$product->barcode}}</span><br>
            <span>{{ $product->name ?? '' }} </span><br>
            <span class="bold">{{ $product->price ?? 0 }}TK</span>
        </div>
    </div>
        @endfor
    </div>
    @endsection
</div>

<style>
    .barcode-container {
        text-align: center;
        border: 1px solid #e9ecef;
        padding: 10px;
    }
    .dblock{
        display: inline-block;
    }
    @media print {
        .header{
            display: none!important;
        }
        #printContent, #printContent * {
            visibility: visible;
        }
        #printContent {
            position: absolute;
            left: 0;
            top: 0;
        }
        .header, .nav, .sidebar,.navbar {
            display: none;
        }
        .navbar,.print,.footer{
            margin-top: 0!important;
            display: none!important;
        }
        .footer {
            display: none!important;
        }
}
</style>

<script>
    function printData() {
        window.print();
    }
</script>

