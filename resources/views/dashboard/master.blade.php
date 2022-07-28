<!DOCTYPE html>
<!-- beautify ignore:start -->
<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free"
>
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <meta name="description" content="" />
    @include('dashboard.layouts.header')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('dashboard.layouts.sidebar')
        <!-- Layout container -->
            <div class="layout-page">
                @include('dashboard.layouts.navbar')
        <!-- Content wrapper -->
                <div class="content-wrapper">
                <!-- Content -->
                    @yield('page-header')

                    @yield('content')
                <!-- / Content -->

                <!-- Footer -->
                    @include('dashboard.layouts.footer')
                <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>

            </div>

        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

    </div>


    @include('dashboard.layouts.footer-script')

</body>

</html>
