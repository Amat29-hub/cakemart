<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Breeze Admin</title>
    <link rel="stylesheet" href="{{ asset('assetsbackend/vendors/mdi/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assetsbackend/vendors/flag-icon-css/css/flag-icon.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assetsbackend/vendors/css/vendor.bundle.base.css') }}" />
    <link rel="stylesheet" href="{{ asset('assetsbackend/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assetsbackend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assetsbackend/css/style.css') }}">
<style>
.sidebar {
    width: 262px;
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;                /* sidebar full tinggi layar */
    overflow-y: auto;
    z-index: 1000;
}

.main-panel {
    margin-left: 250px;           /* kasih jarak sebesar sidebar */
    padding:0px;
    min-height: 100vh;
}

</style>
    <link rel="shortcut icon" href="{{ asset('assetsbackend/images/favicon.png') }}" />
  </head>
  <body>
    <div class="container-scroller">
        @include('layout.backend.sidebar')

        <div class="main-panel">
            @include('layout.backend.navbar')

            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>
    </div>
    </div>
  </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleBtn = document.querySelector(".menu-toggle");
        const sidebar = document.querySelector(".sidebar");
        const mainPanel = document.querySelector(".main-panel");

        toggleBtn.addEventListener("click", function () {
            if (window.innerWidth <= 991) {
                // Mobile: slide sidebar in/out
                sidebar.classList.toggle("show");
            } else {
                // Desktop: shrink sidebar
                sidebar.classList.toggle("collapsed");
                mainPanel.classList.toggle("expanded");
            }
        });
    });
</script>

    <!-- plugins:js -->
    <script src="{{ asset('assetsbackend/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assetsbackend/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assetsbackend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assetsbackend/vendors/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assetsbackend/vendors/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assetsbackend/vendors/flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('assetsbackend/vendors/flot/jquery.flot.fillbetween.js') }}"></script>
    <script src="{{ asset('assetsbackend/vendors/flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('assetsbackend/vendors/flot/jquery.flot.pie.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assetsbackend/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assetsbackend/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assetsbackend/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assetsbackend/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->
</body>
</html>
