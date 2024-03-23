<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
<meta name="author" content="NobleUI">
<meta name="keywords"
    content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>EIL - POS || Eclipse Intellitech LTD POS Software</title>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<!-- End fonts -->

<!-- core:css -->
<link rel="stylesheet" href="{{ asset('assets') }}/vendors/core/core.css">
<!-- endinject -->

<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ asset('assets') }}/vendors/flatpickr/flatpickr.min.css">
<link rel="stylesheet" href="{{ asset('assets') }}/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
<link rel="stylesheet" href="{{ asset('assets') }}/vendors/prismjs/themes/prism.css">
<link rel="stylesheet" href="{{ asset('assets') }}/vendors/select2/select2.min.css">
<link rel="stylesheet" href="{{ asset('assets') }}/vendors/jquery-tags-input/jquery.tagsinput.min.css">
<link rel="stylesheet" href="{{ asset('assets') }}/vendors/dropzone/dropzone.min.css">
<link rel="stylesheet" href="{{ asset('assets') }}/vendors/dropify/dist/dropify.min.css">
<link rel="stylesheet" href="{{ asset('assets') }}/vendors/pickr/themes/classic.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="{{ asset('assets') }}/vendors/sweetalert2/sweetalert2.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css"
    integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- End plugin css for this page -->

<!-- inject:css -->
<link rel="stylesheet" href="{{ asset('assets') }}/fonts/feather-font/css/iconfont.css">
<link rel="stylesheet" href="{{ asset('assets') }}/vendors/flag-icon-css/css/flag-icon.min.css">
<!-- endinject -->

<!-- Layout styles -->
<link rel="stylesheet" href="{{ asset('assets') }}/css/demo1/style.css">
<!-- End layout styles -->

<link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.png" />
<style>
    .btn-rounded-primary {
        padding: 0.3rem;
        font-size: 8px;
        border-radius: 50%;
        color: #fff;
        background: #6571ff;
    }

    .btn-rounded-primary:hover {
        background: #5660d9;
        color: #fff;
    }
</style>
{{-- jquery plugin  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
