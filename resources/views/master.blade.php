<!DOCTYPE html>
<html lang="en">

<head>
    @include('body.css')
</head>

<body>
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        @include('body.sidebar')
        @include('body.setting')
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

</html>
