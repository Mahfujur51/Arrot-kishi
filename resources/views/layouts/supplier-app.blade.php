
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Arrot | @yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('backend/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">


    <!-- Waves Effect Css -->
    <link href="{{ asset('backend/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('backend/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{ asset('backend/plugins/morrisjs/morris.css') }}" rel="stylesheet" />
    <link href="{{asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">


    <!-- Custom Css -->
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/custom.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('backend/css/themes/all-themes.css') }}" rel="stylesheet" />
    <script src="{{asset('backend/js/loader.js')}}"></script>

    <!-- toster js setup  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <style>
        .invoice {
            position: relative;
            background: #fff;
            border: 1px solid #f4f4f4;
            padding: 20px;
            margin: 10px 25px;
        }

        .invoice-title {
            margin-top: 0;
        }

        /*
     * Misc: print
     * -----------
     */
        @media print {

            .no-print,
            .main-sidebar,
            .left-side,
            .main-header,
            .content-header {
                display: none !important;
            }

            .content-wrapper,
            .right-side,
            .main-footer {
                margin-left: 0 !important;
                min-height: 0 !important;
                -webkit-transform: translate(0, 0) !important;
                -ms-transform: translate(0, 0) !important;
                -o-transform: translate(0, 0) !important;
                transform: translate(0, 0) !important;
            }

            .fixed .content-wrapper,
            .fixed .right-side {
                padding-top: 0 !important;
            }

            .invoice {
                width: 100%;
                border: 0;
                margin: 0;
                padding: 0;
            }

            .invoice-col {
                float: left;
                width: 33.3333333%;
            }

            .table-responsive {
                overflow: auto;
            }

            .table-responsive>.table tr th,
            .table-responsive>.table tr td {
                white-space: normal !important;
            }
        }

    </style>
    @yield('page-styles')
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    @include('includes.supplier.navbar')
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
       @include('includes.supplier.sidebar')
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->

    </section>

    <section class="content">
      @yield('content')
    </section>
    <!-- Moment Plugin Js -->
    <script src="{{ asset('backend/plugins/momentjs/moment.js') }}"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="{{ asset('backend/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
    <!-- Jquery Core Js -->
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.js') }}"></script>



    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('backend/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('backend/plugins/node-waves/waves.js') }}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset('backend/plugins/jquery-countto/jquery.countTo.js') }}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{ asset('backend/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/morrisjs/morris.js') }}"></script>

    <!-- ChartJs -->
    <script src="{{ asset('backend/plugins/chartjs/Chart.bundle.js') }}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{ asset('backend/plugins/flot-charts/jquery.flot.js') }}"></script>
    <script src="{{ asset('backend/plugins/flot-charts/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('backend/plugins/flot-charts/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('backend/plugins/flot-charts/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('backend/plugins/flot-charts/jquery.flot.time.js') }}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{ asset('backend/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('backend/js/admin.js') }}"></script>
    <script src="{{ asset('backend/js/pages/index.js') }}"></script>

    <!-- Demo Js -->
    <script src="{{ asset('backend/js/demo.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>
    <script>
        @if (Session::has('success'))
        toastr.success("{{Session::get('success')}}")
        @endif
        @if (Session::has('info'))
        toastr.info("{{Session::get('info')}}")

        @endif
    </script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>

    <script>

	$(document).on("click", "#delete", function(e){
	   e.preventDefault();
	   var link = $(this).attr("href");
	    swal({
		title: "Are You Sure Want to Delete?",
	        text: "If you delete this, it will be gone forever.",
            	icon: "warning",
            	buttons: true,
            	dangerMode: true,
            })
	    .then((willDelete) => {
            if (willDelete) {
            window.location.href = link;
            } else{
		swal("Safe Data!");
	}

    });
});

 $(document).on("click", "#accept", function(e){
	   e.preventDefault();
	   var link = $(this).attr("href");
	    swal({
		title: "Are You Sure Want to Accept?",
	        text: "If you Accept this, it can't be Deleted.",
            	icon: "warning",
            	buttons: true,
            	dangerMode: true,
            })
	    .then((willDelete) => {
            if (willDelete) {
            window.location.href = link;
            }

      });
    });

</script>
<script>
    var typed = new Typed(".typing", {
        strings: ["Arrot Krishi Ponno Ltd."],
        typeSpeed: 100,
        backSpeed: 100,
        loop: true
    });
</script>

    @yield('page-scripts')
</body>

</html>
