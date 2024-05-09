<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Adomx - Responsive Bootstrap 4 Admin Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('dashboard/assets/images/favicon.ico')}}">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/assets/css/vendor/bootstrap.min.css')}}">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/assets/css/vendor/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/assets/css/vendor/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/assets/css/vendor/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/assets/css/vendor/cryptocurrency-icons.css')}}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/assets/css/plugins/plugins.css')}}">

    <!-- Helper CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/assets/css/helper.css')}}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/assets/css/style.css')}}">
    <livewire:styles />

</head>

<body class="skin-dark">

<div class="main-wrapper">


    <!-- Header Section Start -->
    @include('admin.nav')
    <!-- Header Section End -->

    <!-- Side Header Start -->
    @include('admin.menu')
    <!-- Side Header End -->

    <!-- Content Body Start -->
    <div class="content-body">

        <!-- Page Headings Start -->
        <div class="row justify-content-between align-items-center mb-10">

            <!-- Page Heading Start -->
            <div class="col-12 col-lg-auto mb-20">
                <div class="page-heading">
                    <h3 class="title">Administration <span>/ Table Of All Banded Users</span></h3>

                </div>
            </div><!-- Page Heading End -->

        </div><!-- Page Headings End -->

        <div class="row">
            <!--Static Start-->
            <div class="col-12 mb-30">

                <div class="box">
                    <div class="box-head">
                        <h2 class="title">Users</h2>
                    </div>
                    <div class="box-body">
                        <!--Bordered Table Light Start-->
                        <div class="col-lg-12 col-12 mb-30">
                            <div class="box">
                                <div class="box-head">
                                    <h4 class="title">Monitor all your system users banded here</h4>
                                </div>
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#id</th>
                                            <th class="text-center">Avatar</th>
                                            <th class="text-center">User Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Role</th>
                                            <th class="text-center">Last LogIn</th>
                                            <th class="text-center">Band</th>

                                        </tr>
                                        </thead>
                                        @foreach($users as $user)
                                            <livewire:band-user :$user :key="$user->id">
                                        @endforeach
                                    </table>
                                </div>
                                <div class="mt-4">
                                    {{$users->links('vendor.pagination.custom')}}
                                </div>
                            </div>
                        </div>
                        <!--Bordered Table Light End-->
                    </div>
                </div>
            </div>
            <!--Static End-->
        </div>

    </div><!-- Content Body End -->
</div>

<!-- JS
============================================ -->

<!-- Global Vendor, plugins & Activation JS -->
<script src="{{asset('dashboard/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/vendor/popper.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/vendor/bootstrap.min.js')}}"></script>
<!--Plugins JS-->
<script src="{{asset('dashboard/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/plugins/tippy4.min.js.js')}}"></script>
<!--Main JS-->
<script src="{{asset('dashboard/assets/js/main.js')}}"></script>

<!-- Plugins & Activation JS For Only This Page -->
<script src="{{asset('dashboard/assets/js/plugins/jsgrid/jsgrid.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/plugins/jsgrid/jsgrid-db.js')}}"></script>
<script src="{{asset('dashboard/assets/js/plugins/jsgrid/jsgrid.active.js')}}"></script>
<livewire:scripts />

</body>

</html>
