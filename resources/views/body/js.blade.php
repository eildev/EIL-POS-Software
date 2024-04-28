<!-- core:js -->
<script src="{{ asset('assets') }}/vendors/core/core.js"></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<script src="{{ asset('assets') }}/vendors/flatpickr/flatpickr.min.js"></script>
<script src="{{ asset('assets') }}/vendors/apexcharts/apexcharts.min.js"></script>
<script src="{{ asset('assets') }}/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="{{ asset('assets') }}/vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
<script src="{{ asset('assets') }}/vendors/prismjs/prism.js"></script>
<script src="{{ asset('assets') }}/vendors/clipboard/clipboard.min.js"></script>
<script src="{{ asset('assets') }}/vendors/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ asset('assets') }}/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="{{ asset('assets') }}/vendors/inputmask/jquery.inputmask.min.js"></script>
<script src="{{ asset('assets') }}/vendors/select2/select2.min.js"></script>
<script src="{{ asset('assets') }}/vendors/typeahead.js/typeahead.bundle.min.js"></script>
<script src="{{ asset('assets') }}/vendors/jquery-tags-input/jquery.tagsinput.min.js"></script>
<script src="{{ asset('assets') }}/vendors/dropzone/dropzone.min.js"></script>
<script src="{{ asset('assets') }}/vendors/dropify/dist/dropify.min.js"></script>
<script src="{{ asset('assets') }}/vendors/pickr/pickr.min.js"></script>
<script src="{{ asset('assets') }}/vendors/moment/moment.min.js"></script>
<script src="{{ asset('assets') }}/vendors/sweetalert2/sweetalert2.min.js"></script>
<script src="{{ asset('assets') }}/vendors/tinymce/tinymce.min.js"></script>
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="{{ asset('assets') }}/vendors/feather-icons/feather.min.js"></script>
<script src="{{ asset('assets') }}/js/template.js"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="{{ asset('assets') }}/js/dashboard-dark.js"></script>
<!-- End custom js for this page -->

<!-- Custom js for this page -->
<script src="{{ asset('assets') }}/js/data-table.js"></script>
<script src="{{ asset('assets') }}/js/form-validation.js"></script>
<script src="{{ asset('assets') }}/js/bootstrap-maxlength.js"></script>
<script src="{{ asset('assets') }}/js/inputmask.js"></script>
<script src="{{ asset('assets') }}/js/select2.js"></script>
<script src="{{ asset('assets') }}/js/typeahead.js"></script>
<script src="{{ asset('assets') }}/js/tags-input.js"></script>
<script src="{{ asset('assets') }}/js/dropzone.js"></script>
<script src="{{ asset('assets') }}/js/dropify.js"></script>
<script src="{{ asset('assets') }}/js/pickr.js"></script>
<script src="{{ asset('assets') }}/js/flatpickr.js"></script>
<script src="{{ asset('assets') }}/js/sweet-alert.js"></script>
<script src="{{ asset('assets') }}/js/tinymce.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    @if (Session::has('message'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('message') }}");
    @endif
    @if (Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{{ session('error') }}");
    @endif
    @if (Session::has('info'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.info("{{ session('info') }}");
    @endif
    @if (Session::has('warning'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.warning("{{ session('warning') }}");
    @endif
</script>
<script src="{{ asset('assets/js/codedeletesweet.js') }}"></script>

<script src="{{ asset('assets/js/myvalidate.min.js') }}"></script>
<!-- End custom js for this page -->
