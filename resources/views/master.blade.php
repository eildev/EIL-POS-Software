<!DOCTYPE html>
<html lang="en">

<head>
    @include('body.css')
</head>

<body>
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        @include('body.sidebar')
        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            @include('body.navbar')
            <!-- partial -->

            <div class="page-content">
                @yield('admin')
            </div>

            <!-- partial:partials/_footer.html -->
            @include('body.footer')
            <!-- partial -->

        </div>
    </div>
    @include('body.js')
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const flexSwitchCheckDefault = document.querySelector('.flexSwitchCheckDefault');
        const form = document.getElementById('darkModeForm');
        if (flexSwitchCheckDefault && form) {
            flexSwitchCheckDefault.addEventListener('change', function() {
                form.submit();
            });
        }
    });
    $(function() {
        'use strict'

        if ($(".compose-multiple-select").length) {
            $(".compose-multiple-select").select2();
        }

        /*easymde editor*/
        if ($("#easyMdeEditor").length) {
            var easymde = new EasyMDE({
            element: $("#easyMdeEditor")[0]
            });
        }

        });
</script>
</html>
