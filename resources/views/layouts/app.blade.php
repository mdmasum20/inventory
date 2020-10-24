<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Inventory') }}</title>


    <!-- Base Css Files -->
    <link href="{{ asset('public/backend/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Font Icons -->
    <link href="{{ asset('public/backend/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/backend/assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/backend/css/material-design-iconic-font.min.css') }}" rel="stylesheet">

    <!-- animate css -->
    <link href="{{ asset('public/backend/css/animate.css') }}" rel="stylesheet" />

    <!-- Waves-effect -->
    <link href="{{ asset('public/backend/css/waves-effect.css') }}" rel="stylesheet">

    <!-- DataTables -->
    <link href="{{ asset('public/backend/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- sweet alerts -->
    <link href="{{ asset('public/backend/assets/sweet-alert/sweet-alert.min.css') }}" rel="stylesheet">

    <!-- Custom Files -->
    <link href="{{ asset('public/backend/css/helper.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/backend/css/style.css') }}" rel="stylesheet" type="text/css" />

    <!-- This project custom -->
    <link href="{{ asset('public/backend/css/inventory-custorm.css') }}" rel="stylesheet" type="text/css" />

    <!-- Plugins css -->
    <link href="{{ asset('public/backend/assets/modal-effect/css/component.css') }}" rel="stylesheet">

    <link href="{{ asset('public/backend/assets/tagsinput/jquery.tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/backend/assets/toggles/toggles.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/backend/assets/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/backend/assets/timepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/backend/assets/colorpicker/colorpicker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/backend/assets/jquery-multi-select/multi-select.css') }}"  rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/backend/assets/select2/select2.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('public/backend/js/modernizr.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="{{ asset('//fonts.gstatic.com') }}">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Nunito') }}" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css') }}" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
</head>
<body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Authentication Links -->
        @guest
                            
        @else
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="{{ route('home') }}" class="logo"><i class="md md-terrain"></i> <span>Inventory </span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <form class="navbar-form pull-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                                </div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown hidden-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger">3</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="text-center notifi-title">Notification</li>
                                        <li class="list-group">
                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-user-plus fa-2x text-info"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">New user registered</div>
                                                    <p class="m-0">
                                                       <small>You have 10 unread messages</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>
                                           <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-diamond fa-2x text-primary"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">New settings</div>
                                                    <p class="m-0">
                                                       <small>There are new settings available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                            </a>
                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-bell-o fa-2x text-danger"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">Updates</div>
                                                    <p class="m-0">
                                                       <small>There are
                                                          <span class="text-primary">2</span> new updates available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                            </a>
                                           <!-- last list item -->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <small>See all notifications</small>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{ URL::to('public/backend/images/avatar-1.jpg') }}" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li>
                                        <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                        <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="md md-settings-power"></i> Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>    
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{ route('home') }}" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>

                            <li>
                                <a href="{{ route('pos') }}" class="waves-effect"><i class="md md-home"></i><span> POS </span></a>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-group"></i><span> Employee </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{ route('new.employee') }}"><i class="md-person-add"></i><span>New Empolyee</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('all.emoloyee') }}"><i class="md md-group"></i><span>All Empolyee</span></a>
                                    </li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-group"></i><span> Customer </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{ route('new.customer') }}"><i class="md-person-add"></i><span>New Customer</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('all.customer') }}"><i class="md md-group"></i><span>All Customer</span></a>
                                    </li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-group"></i><span> Supplier </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{ route('new.supplier') }}"><i class="md-person-add"></i><span>New Supplier</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('all.supplier') }}"><i class="md md-group"></i><span>All Supplier</span></a>
                                    </li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-group"></i><span> Salary (EMP) </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{ route('pay_advance.salary') }}"><i class="md-person-add"></i><span>Pay Advance Salary</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('pay.salary') }}"><i class="md-person-add"></i><span>Pay Salary</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('all.salary') }}"><i class="md md-group"></i><span>All Salary</span></a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{ route('all.category') }}" class="waves-effect"><i class="md md-event"></i><span> Categories </span></a>
                            </li>

                            <li>
                                <a href="{{ route('all.product') }}" class="waves-effect"><i class="md md-event"></i><span> Product </span></a>
                            </li>

                            <li>
                                <a href="{{ route('today.expense') }}" class="waves-effect"><i class="md md-event"></i><span> Expense Report </span></a>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-group"></i><span> Sales Report </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{ route('pay_advance.salary') }}"><i class="md-person-add"></i><span>Pay Advance Salary</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('pay.salary') }}"><i class="md-person-add"></i><span>Pay Salary</span></a>
                                    </li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-group"></i><span> Attendence </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{ route('take.attendence') }}"><i class="md-person-add"></i><span>Take Attendence</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('all.attendence') }}"><i class="md-person-add"></i><span>All Attendence</span></a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{ route('company.settings') }}" class="waves-effect"><i class="md md-event"></i><span> Settings </span></a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 
        @endguest

        <main class="py-4">
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        @yield('content')
                    </div> <!-- container -->    
                </div> <!-- content -->
               
                <footer class="footer text-right">
                    2020 © Info Tech.
                </footer>
               
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </main>
    </div>


    <script>
        var resizefunc = [];
    </script>

        <!-- jQuery  -->
        <script src="{{ asset('public/backend/js/jquery.min.js') }}"></script>
        <script src="{{ asset('public/backend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('public/backend/js/waves.js') }}"></script>
        <script src="{{ asset('public/backend/js/wow.min.js') }}"></script>
        <script src="{{ asset('public/backend/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/backend/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('public/backend/assets/chat/moment-2.2.1.js') }}"></script>
        <script src="{{ asset('public/backend/assets/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('public/backend/assets/jquery-detectmobile/detect.js') }}"></script>
        <script src="{{ asset('public/backend/assets/fastclick/fastclick.js') }}"></script>
        <script src="{{ asset('public/backend/assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('public/backend/assets/jquery-blockui/jquery.blockUI.js') }}"></script>

        <!-- sweet alerts -->
        <script src="{{ asset('public/backend/assets/sweet-alert/sweet-alert.min.js') }}"></script>
        <script src="{{ asset('public/backend/assets/sweet-alert/sweet-alert.init.js') }}"></script>

        <!-- flot Chart -->
        <script src="{{ asset('public/backend/assets/flot-chart/jquery.flot.js') }}"></script>
        <script src="{{ asset('public/backend/assets/flot-chart/jquery.flot.time.js') }}"></script>
        <script src="{{ asset('public/backend/assets/flot-chart/jquery.flot.tooltip.min.js') }}"></script>
        <script src="{{ asset('public/backend/assets/flot-chart/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('public/backend/assets/flot-chart/jquery.flot.pie.js') }}"></script>
        <script src="{{ asset('public/backend/assets/flot-chart/jquery.flot.selection.js') }}"></script>
        <script src="{{ asset('public/backend/assets/flot-chart/jquery.flot.stack.js') }}"></script>
        <script src="{{ asset('public/backend/assets/flot-chart/jquery.flot.crosshair.js') }}"></script>

        <!-- Counter-up -->
        <script src="{{ asset('public/backend/assets/counterup/waypoints.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/backend/assets/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
        
        <!-- CUSTOM JS -->
        <script src="{{ asset('public/backend/js/jquery.app.js') }}"></script>

        <!-- Dashboard -->
        <script src="{{ asset('public/backend/js/jquery.dashboard.js') }}"></script>

        <!-- Chat -->
        <script src="{{ asset('public/backend/js/jquery.chat.js') }}"></script>

        <!-- Todo -->
        <script src="{{ asset('public/backend/js/jquery.todo.js') }}"></script>

        <!-- Toastr -->
        <script src="{{ asset('public/backend/js/toastr.js') }}"></script>

        <!-- CUSTOM JS -->
        <!-- <script src="{{ asset('public/backend/js/jquery.app.js') }}"></script> -->

        <!--form validation-->
        <script type="text/javascript" src="{{ asset('public/backend/assets/jquery.validate/jquery.validate.min.js') }}"></script>

        <!--form validation init-->
        <!-- <script src="{{ asset('public/backend/assets/jquery.validate/form-validation-init.js') }}"></script> -->

        <script src="{{ asset('public/backend/assets/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('public/backend/assets/datatables/dataTables.bootstrap.js') }}"></script>

        <!-- Modal-Effect -->
        <script src="{{ asset('public/backend/assets/modal-effect/js/classie.js') }}"></script>
        <script src="{{ asset('public/backend/assets/modal-effect/js/modalEffects.js') }}"></script>


        <script src="{{ asset('public/backend/assets/tagsinput/jquery.tagsinput.min.js') }}"></script>
        <script src="{{ asset('public/backend/assets/toggles/toggles.min.js') }}"></script>
        <script src="{{ asset('public/backend/assets/timepicker/bootstrap-timepicker.min.js') }}"></script>
        <script src="{{ asset('public/backend/assets/timepicker/bootstrap-datepicker.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/backend/assets/colorpicker/bootstrap-colorpicker.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/backend/assets/jquery-multi-select/jquery.multi-select.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/backend/assets/jquery-multi-select/jquery.quicksearch.js') }}"></script>
        <script src="{{ asset('public/backend/assets/bootstrap-inputmask/bootstrap-inputmask.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('public/backend/assets/spinner/spinner.min.js') }}"></script>
        <script src="{{ asset('public/backend/assets/select2/select2.min.js" type="text/javascript') }}"></script>


        <!-- <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js') }}" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script> -->


        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>

        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>
        <!-- Toastr Alert js code -->
        <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js') }}" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
        <script type="text/javascript">
            @if (Session::has('messages')) {
                var type = "{{Session::get('alert-type','info')}}"
                switch(type){
                    case 'info':
                        toastr.info("{{ Session::get('messages') }}");
                        break;
                    case 'success':
                        toastr.info("{{ Session::get('messages') }}");
                        break;
                    case 'warning':
                        toastr.info("{{ Session::get('messages') }}");
                        break;
                    case 'danger':
                        toastr.info("{{ Session::get('messages') }}");
                        break;
                }
            }
            @endif
        </script>

        <script>
            jQuery(document).ready(function() {
                    
                // Tags Input
                jQuery('#tags').tagsInput({width:'auto'});

                // Form Toggles
                jQuery('.toggle').toggles({on: true});

                // Time Picker
                jQuery('#timepicker').timepicker({defaultTIme: false});
                jQuery('#timepicker2').timepicker({showMeridian: false});
                jQuery('#timepicker3').timepicker({minuteStep: 15});

                // Date Picker
                jQuery('#buy_date').datepicker();
                jQuery('#buy_date-inline').datepicker();
                jQuery('#buy_date-multiple').datepicker({
                    numberOfMonths: 3,
                    showButtonPanel: true
                });

                // Date Picker
                jQuery('#expire_date').datepicker();
                jQuery('#expire_date-inline').datepicker();
                jQuery('#expire_date-multiple').datepicker({
                    numberOfMonths: 3,
                    showButtonPanel: true
                });
                //colorpicker start

                $('.colorpicker-default').colorpicker({
                    format: 'hex'
                });
                $('.colorpicker-rgba').colorpicker();


                //multiselect start

                $('#my_multi_select1').multiSelect();
                $('#my_multi_select2').multiSelect({
                    selectableOptgroup: true
                });

                $('#my_multi_select3').multiSelect({
                    selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    afterInit: function (ms) {
                        var that = this,
                            $selectableSearch = that.$selectableUl.prev(),
                            $selectionSearch = that.$selectionUl.prev(),
                            selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                            selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                        that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                            .on('keydown', function (e) {
                                if (e.which === 40) {
                                    that.$selectableUl.focus();
                                    return false;
                                }
                            });

                        that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                            .on('keydown', function (e) {
                                if (e.which == 40) {
                                    that.$selectionUl.focus();
                                    return false;
                                }
                            });
                    },
                    afterSelect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    },
                    afterDeselect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    }
                });

                //spinner start
                $('#spinner1').spinner();
                $('#spinner2').spinner({disabled: true});
                $('#spinner3').spinner({value:0, min: 0, max: 10});
                $('#spinner4').spinner({value:0, step: 5, min: 0, max: 200});
                //spinner end

                // Select2
                jQuery(".select2").select2({
                    width: '100%'
                });
            });
        </script>
</body>
</html>
