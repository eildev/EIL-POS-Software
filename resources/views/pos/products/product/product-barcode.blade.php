@extends('master')
@section('admin')
<div>
    <div class="btn-print">
        <button class="btn btn-info text-center" onClick="window.print();">Print</button> </br></br>
    </div>

    <div class="row">
        @for($i = 0; $i < $product->stock; $i++)
        <div class="col-md-4 p-0 printable">
        <div class="barcode-container">
            <span class="dblock">
                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($product->barcode, 'C39',1,30) }}" alt="Barcode"> </br>
            {{-- {!! DNS1D::getBarcodeHTML($product->barcode, 'PHARMA') !!}</span><br> --}}
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
        .header,.nav, .sidebar,.navbar {
            display: none;
        }
        .navbar{
            margin-top: 0!important;
            display: none!important;
        }
        .footer{
            display: none;
        }
        .btn-print{
            display: none!important;
        }
        .printable {
                display: block !important;

            }

            /* Ensure the printable element takes the full width of the page */
            .printable {
                width: 100%;
            }

}
</style>

<script>
    function printData() {
        window.print();
    }
</script>

