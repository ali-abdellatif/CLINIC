<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{asset('public/dashboard/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('public/dashboard/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('public/dashboard/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('public/dashboard/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

<script src="{{asset('public/dashboard/vendor/js/menu.js')}}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{asset('public/dashboard/vendor/libs/apex-charts/apexcharts.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('public/dashboard/js/main.js')}}"></script>

<!-- Page JS -->
<script src="{{asset('public/dashboard/js/dashboards-analytics.js')}}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
@yield('script')
