<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{asset('backend')}}/assets/css/default/app.min.css" rel="stylesheet" />
    <link href="{{asset('backend')}}/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="{{asset('backend')}}/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <link href="{{asset('backend')}}/assets/fontawesome/css/font-awesome.min.css" rel="stylesheet" />


    <link href="{{asset('backend')}}/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="{{asset('backend')}}/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
    <!-- Toastr -->
    <link href="{{asset('defaults/toastr/toastr.min.css')}}" rel="stylesheet" />

    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- summernote -->
    <link href="{{asset('backend')}}/assets/plugins/summernote/dist/summernote.css" rel="stylesheet" />

    <style>
        .content {
            padding: 20px;
        }

        .sidebar .nav>li.nav-profile .image img {
            width: 100%;
            height: 100%;
        }

        .panel .panel-heading .panel-title {
            font-size: 15px;

        }

        .borderless td,
        .borderless th {
            border: none;
        }
    </style>

</head>

<body>

    <div id="page-loader" class="fade show">
        <span class="spinner"></span>
    </div>

    <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
        <!--header area-->
        @include('backend.layouts.header')
        <!--sidebar area-->
        @include('backend.layouts.sidebar')
        <!--main content area-->
        @yield('content')

        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="{{asset('backend')}}/assets/js/app.min.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/js/theme/default.min.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/plugins/flot/source/jquery.canvaswrapper.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/plugins/flot/source/jquery.colorhelpers.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/plugins/flot/source/jquery.flot.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/plugins/flot/source/jquery.flot.saturated.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/plugins/flot/source/jquery.flot.browser.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/plugins/flot/source/jquery.flot.drawSeries.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/plugins/flot/source/jquery.flot.uiConstants.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/plugins/flot/source/jquery.flot.time.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/plugins/flot/source/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/plugins/flot/source/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/plugins/flot/source/jquery.flot.crosshair.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/plugins/flot/source/jquery.flot.categories.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/plugins/flot/source/jquery.flot.navigate.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/plugins/flot/source/jquery.flot.touchNavigate.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/plugins/flot/source/jquery.flot.hover.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/plugins/flot/source/jquery.flot.touch.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/plugins/flot/source/jquery.flot.selection.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/plugins/flot/source/jquery.flot.symbol.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/plugins/flot/source/jquery.flot.legend.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/plugins/jquery-sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/plugins/jvectormap-next/jquery-jvectormap.min.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/js/demo/dashboard.js" type="text/javascript"></script>

    <!-- Datatables -->
    <script src="{{asset('backend')}}/assets/plugins/datatables.net/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/plugins/datatables.net-responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/js/demo/table-manage-default.demo.js" type="text/javascript"></script>

    <!-- summernote -->
    <script src="{{asset('backend')}}/assets/plugins/summernote/dist/summernote.min.js" type="text/javascript"></script>

    @yield('customjs')

    <!-- Sweetalert -->
    <script src="{{asset('defaults/sweetalert/sweetalert2@9.js')}}"></script>
    <script src="{{asset('defaults/sweetalert/sweetalertjs.js')}}"></script>
    <!-- Toastr -->
    <script src="{{asset('defaults/toastr/toastr.min.js')}}"></script>
    <script>
        @if(Session::has('message'))
        var type = "{{Session::get('alert-type','info')}}"

        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>

    <!-- No image -->
    <script src="{{asset('defaults/noimage/no-image.js')}}"></script>
    <!-- select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!--summernote -->
    <script>
        $(".summernote").summernote({
            callbacks: {
                // callback for pasting text only (no formatting)
                onPaste: function(e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                    e.preventDefault();
                    bufferText = bufferText.replace(/\r?\n/g, '<br>');
                    document.execCommand('insertHtml', false, bufferText);
                }
            }
        });
    </script>

    <!-- select2 -->
    <script>
        $(document).ready(function() {
            $('.myselect2').select2();
        });
    </script>

    <!--Product Default image one -->
    <script>
        $(document).ready(function() {
            $('#defaultImage').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showDefaultImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    <!--Product Sub image one -->
    <script>
        $(document).ready(function() {
            $('#subImage1').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showSubImage1').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    <!--Product Sub image two -->
    <script>
        $(document).ready(function() {
            $('#subImage2').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showSubImage2').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

</body>

</html>