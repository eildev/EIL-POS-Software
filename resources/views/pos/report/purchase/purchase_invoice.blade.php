@extends('master')
@section('admin')
<style>
    .invoice-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo-area img {
    width: 100px; /* Adjust as needed */
    height: auto; /* Maintain aspect ratio */
    margin-right: 10px; /* Add space between the logo and text */
}

.text-right {
    text-align: right;
    padding-right: 40px;
}
</style>
<div class="row" bis_skin_checked="1">
    <div class="col-md-2">

    </div>
    <div class="col-md-8" bis_skin_checked="1">
<div  class="row justify-content-center" bis_skin_checked="1">
    <div class="col-md-7 card card-body" bis_skin_checked="1">
        <div id="print-area" bis_skin_checked="1">
            <div class="invoice-header">
                <div class="logo-area">
                    <img src="" alt="logo">
                    <h4>TOYOTA LEXUS AUTO PARTS</h4>
                </div>
                <address class="text-right">
                    <p>
                        Address : <strong>KUWAIT</strong><br>
                        Phone : <strong>3108081</strong><br>
                        Email : <strong>toyotalexusautoparts@gmail.com</strong>
                    </p>
                </address>
            </div>

            <div class="bill-date">
                <div class="bill-no" >
                    Invoice No: 1
                </div>
                <div class="date" >
                    Date: <strong>30 Jan, 2024</strong>
                </div>
            </div>
            <div class="name" >
                Supplier Name :
                <span>Default Supplier</span>
            </div>
            <div class="address" bis_skin_checked="1">
                Address : <span>Default Address</span>
            </div>
            <div class="mobile-no" bis_skin_checked="1">
                Mobile : <span>111111</span>
            </div>



            <table class="table table-bordered table-plist my-3 order-details">
                <tbody><tr class="bg-primary">
                    <th>#</th>
                    <th>Details</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Net.A</th>
                </tr>
                                                        <tr>
                    <td>1</td>
                    <td>Mobile Phone | 000001 </td>
                    <td>100 pc </td>
                    <td>4,150.00 Tk</td>
                    <td>415,000.00 Tk</td>
                </tr>

                <tr>
                    <td colspan="4" class="text-right">Grand Total : </td>
                    <td>
                        <strong>415000.00 </strong>Tk
                    </td>
                </tr>

                <tr>
                    <td colspan="4" class="text-right">Paid : </td>
                    <td>
                        <strong>415,000.00 </strong>Tk
                    </td>
                </tr>

                <tr>
                    <td colspan="4" class="text-right"> Due : </td>
                    <td>
                        <strong>0.00
                        </strong>Tk
                    </td>
                </tr>

            </tbody></table>

            <p class="note">Note: </p>


        </div>
        <button class="btn btn-secondary btn-block" onclick="print_receipt('print-area')">
            <i class="fa fa-print"></i>
            Print
        </button>
        <div class="row mt-4" bis_skin_checked="1">
            <div class="col-6" bis_skin_checked="1">
                <a href="https://pos.softghor.com/back/purchase/create" class="btn btn-primary btn-block">
                    <i class="fa fa-reply"></i>
                    New Purchase
                </a>
            </div>

            <div class="col-6" bis_skin_checked="1">
                <a href="https://pos.softghor.com/back/purchase" class="btn btn-primary btn-block">
                    <i class="fa fa-reply"></i>
                    Purchase List
                </a>
            </div>
        </div>
    </div>
</div>
</div>
<div class="col-md-2">

</div>
</div>
<style>
    @media print {

        nav ,button,
        .footer {
            display: none !important;
        }

        .page-content {
            margin-top: 0 !important;
            padding-top: 0 !important;
        }

        .btn_group,.buttona {
            display: none !important;
        }
    }
</style>

@endsection
