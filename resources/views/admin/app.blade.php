<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.part.head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.part.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('admin.part.navbar')
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- End of Page Wrapper -->
        <footer>
            @include('admin.part.footer')
            @yield('footer')
        </footer>
</body>

</html>
