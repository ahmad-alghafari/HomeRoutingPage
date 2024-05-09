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
                    <h3>Dashboard <span>/ statistics</span></h3>
                </div>
            </div><!-- Page Heading End -->

        </div><!-- Page Headings End -->

        <!-- Top Report Wrap Start -->
        <div class="row">
            <!-- Top Report Start -->
            <div class="col-xlg-3 col-md-6 col-12 mb-30">
                <div class="top-report">

                    <!-- Head -->
                    <div class="head">
                        <h4>Total Visitor</h4>
                        <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a>
                    </div>

                    <!-- Content -->
                    <div class="content">
                        <h5>Todays</h5>
                        <h2>{{\App\Models\Log::whereIn('action',['auth.login' , 'auth.signup' ])->whereDate('created_at', \Carbon\Carbon::today())->count()}}</h2>
                    </div>

                    <!-- Footer -->
                    <div class="footer">
                        <div class="progess">
                            <div class="progess-bar" style="width: 100%;"></div>
                        </div>
                    </div>

                </div>
            </div><!-- Top Report End -->

            <!-- Top Report Start -->
            <div class="col-xlg-3 col-md-6 col-12 mb-30">
                <div class="top-report">

                    <!-- Head -->
                    <div class="head">
                        <h4>Online Accounts</h4>
                        <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a>
                    </div>

                    <!-- Content -->
                    <div class="content">
                        <h5>Now</h5>
                        <h2>{{\App\Models\User::where('status',"1")->count()}}</h2>
                    </div>

                    <!-- Footer -->
                    <div class="footer">
                        <div class="progess">
                            <div class="progess-bar" style="width: 100%;"></div>
                        </div>
                    </div>

                </div>
            </div><!-- Top Report End -->

            <!-- Top Report Start -->
            <div class="col-xlg-3 col-md-6 col-12 mb-30">
                <div class="top-report">

                    <!-- Head -->
                    <div class="head">
                        <h4>Activity</h4>
                        <a href="{{route('admin.logs')}}" class="view"><i class="zmdi zmdi-eye"></i></a>
                    </div>

                    <!-- Content -->
                    <div class="content">
                        <h5>Todays</h5>
                        <h2>{{\App\Models\Log::whereDate('created_at',\Carbon\Carbon::today())->count()}}</h2>
                    </div>

                    <!-- Footer -->
                    <div class="footer">
                        <div class="progess">
                            <div class="progess-bar" style="width: 100%;"></div>
                        </div>
                    </div>

                </div>
            </div><!-- Top Report End -->

            <!-- Top Report Start -->
            <div class="col-xlg-3 col-md-6 col-12 mb-30">
                <div class="top-report">

                    <!-- Head -->
                    <div class="head">
                        <h4>Users Count</h4>
                        <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a>
                    </div>

                    <!-- Content -->
                    <div class="content">
                        <h5>Total</h5>
                        <h2>{{\App\Models\User::all()->count()}}</h2>
                    </div>

                    <!-- Footer -->
                    <div class="footer">
                        <div class="progess">
                            <div class="progess-bar" style="width: 100%;"></div>
                        </div>
                    </div>

                </div>
            </div><!-- Top Report End -->
        </div><!-- Top Report Wrap End -->
    </div><
    <!-- Content Body End -->
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
<!--Moment-->
<script src="{{asset('dasboard/assets/js/plugins/moment/moment.min.js')}}"></script>
<!--Daterange Picker-->
<script src="{{asset('dashboard/assets/js/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('dasboard/assets/js/plugins/daterangepicker/daterangepicker.active.js')}}"></script>
<!--Echarts-->
<script src="{{asset('dashboard/assets/js/plugins/chartjs/Chart.min.js')}}"></script>
<script src="{{asset('dasboard/assets/js/plugins/chartjs/chartjs.active.js')}}"></script>
<!--VMap-->
<script src="{{asset('dashboard/assets/js/plugins/vmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('dasboard/assets/js/plugins/vmap/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset('dashboard/assets/js/plugins/vmap/maps/samples/jquery.vmap.sampledata.js')}}"></script>
<script src="{{asset('dashboard/assets/js/plugins/vmap/vmap.active.js')}}"></script>
</body>
</html>
