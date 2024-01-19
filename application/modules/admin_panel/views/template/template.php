<?php //echo ADMIN_ASSETS;die;             ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mosaddek">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
        <link rel="shortcut icon" href="img/favicon.png">

        <title>Suspicious E-mail ADMIN</title>
        <link rel="icon" href="<?php echo base_url() . "/uploads/logo/web_logo.png"; ?>"/>
        <!--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>-->
        <link href="<?php echo ADMIN_ASSETS; ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo ADMIN_ASSETS; ?>css/bootstrap-reset.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo ADMIN_ASSETS; ?>assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>css/gallery.css" />
        <link href="<?php echo ADMIN_ASSETS ?>css/slidebars.css" rel="stylesheet">
        <link  rel="stylesheet" href="<?php echo ADMIN_ASSETS; ?>assets/bootstrap-datepicker/css/datepicker.css">
        <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>assets/bootstrap-fileupload/bootstrap-fileupload.css" />
        <link href="<?php echo ADMIN_ASSETS; ?>assets/toastr-master/toastr.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
        <link href="<?php echo ADMIN_ASSETS; ?>css/style.css" rel="stylesheet">
        <link href="<?php echo ADMIN_ASSETS; ?>css/style-responsive.css" rel="stylesheet" />
        <script type="text/javascript" src="<?php echo ADMIN_ASSETS ?>js/jquery.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link rel="stylesheet" href="<?php echo ADMIN_ASSETS; ?>css/multi-select.css" />
     <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
        <style>
            .bootstrap_time{
                font-weight: 400; font-size: 14px; text-align: left; margin-bottom: 0;
            }
        </style>
    </head>
    <body>
        <section id="container" class="">
            <header class="header white-bg">
                <div class="sidebar-toggle-box">
                    <div data-original-title="Toggle Navigation" data-placement="right" class="fa fa-bars tooltips"></div>
                </div>
                <a href="" class="logo" >Suspicious E-mail <span>ADMIN</span></a>
                <div class="nav notify-row" id="top_menu">
                    <!--  notification start -->
                    <ul class="nav top-menu">
                        <!-- settings start -->
                        <?php
                        $total_request = $this->db->query("select count(*) as total from request_for_buy")->row()->total;
                        $total_request_request = $this->db->query("select count(*) as total from request_for_buy where status=1")->row()->total;
                        $total_request_accept = $this->db->query("select count(*) as total from request_for_buy where status=2")->row()->total;
                        $total_request_pending = $this->db->query("select count(*) as total from request_for_buy where status=3")->row()->total;
                        $total_request_reject = $this->db->query("select count(*) as total from request_for_buy where status=4")->row()->total;
                        ?>
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="fa fa-tasks"></i>&nbsp;Requests
                                <span class="badge bg-success"><?php echo $total_request_request; ?></span>
                            </a>
                            <ul class="dropdown-menu extended tasks-bar">
                                <div class="notify-arrow notify-arrow-green"></div>
                                <li>
                                    <p class="green">You have received <?php echo $total_request; ?> total service request.</p>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="task-info">
                                            <div class="desc">Total Request for buy (<?php echo $total_request_request; ?>)</div>
                                            <div class="percent"><?php echo round(($total_request_request * 100) / $total_request) . "%"; ?></div>
                                        </div>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round(($total_request_request * 100) / $total_request) . "%"; ?>">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="task-info">
                                            <div class="desc">Total Rejected Request (<?php echo $total_request_reject; ?>)</div>
                                            <div class="percent"><?php echo round(($total_request_reject * 100) / $total_request) . "%"; ?></div>
                                        </div>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round(($total_request_reject * 100) / $total_request) . "%"; ?>">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="task-info">
                                            <div class="desc">Total Accepted Request (<?php echo $total_request_accept; ?>)</div>
                                            <div class="percent"><?php echo round(($total_request_accept * 100) / $total_request) . "%"; ?></div>
                                        </div>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round(($total_request_accept * 100) / $total_request) . "%"; ?>">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="task-info">
                                            <div class="desc">Total Holded Request (<?php echo $total_request_pending; ?>)</div>
                                            <div class="percent"><?php echo round(($total_request_pending * 100) / $total_request) . "%"; ?></div>
                                        </div>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round(($total_request_pending * 100) / $total_request) . "%"; ?>">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="external">
                                    <a href="<?php echo ADMIN_PANEL_URL . "request"; ?>">See All Requests</a>
                                </li>
                            </ul>
                        </li>
                        <!-- notification dropdown end -->
                    </ul>
                </div>
                <div class="nav notify-row" id="top_menu">
                </div>
                <div class="top-nav ">
                    <ul class="nav pull-right top-menu">
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class ="fa fa-user"></i>
                                <span class="username">ACCOUNT</span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                                <li>
                                    <a  class=""  href="#"><i class="fa fa-bell-o hide "></i>
                                        <?php
                                        $user_data = $this->session->userdata('active_admin_data');
                                        echo 'Name: ' . $user_data->name . '</br>Email: ' . $user_data->email;
                                        ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('admin_panel/login/logout'); ?>"><i class="fa fa-key"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </header>
            <!--header end-->
            <!--sidebar start-->
            <?php
            //die('fdg');
            $this->load->view('admin_panel/template/SIDEBAR_SUPER_USER');
            ?>

            <!--sidebar end-->
            <!--main content start-->
            <section id="main-content">
                <section class="wrapper site-min-height">
                    <div class="row">
                        <div class="col-lg-12 hide">
                            <ul class="breadcrumb">
                                <li class="active capitalize"><?php echo isset($page_title) ? $page_title : ""; ?></li>
                            </ul>
                        </div>
                        <div class="col-lg-12">
                            <?php echo isset($page_data) ? $page_data : ""; ?>
                        </div>
                    </div>
                </section>
            </section>
            <!--main content end-->

            <!--footer start-->
            <footer class="site-footer">
                <div class="text-center">
                    Backend
                    <a href="#" class="go-top">
                        <i class="fa fa-angle-up"></i>
                    </a>
                </div>
            </footer>
            <!--footer end-->
        </section>
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

        <script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>

        <!-- js placed at the end of the document so the pages load faster -->
        <!--<script src="<?php echo ADMIN_ASSETS; ?>js/jquery.js"></script>-->
        <script src="<?php echo ADMIN_ASSETS; ?>js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="<?php echo ADMIN_ASSETS; ?>js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="<?php echo ADMIN_ASSETS; ?>assets/fancybox/source/jquery.fancybox.js"></script>
        <script src="<?php echo ADMIN_ASSETS; ?>js/jquery.scrollTo.min.js"></script>
        <script src="<?php echo ADMIN_ASSETS; ?>js/slidebars.min.js"></script>
        <script src="<?php echo ADMIN_ASSETS; ?>js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="<?php echo ADMIN_ASSETS; ?>js/respond.min.js" ></script>
        <script src="<?php echo ADMIN_ASSETS; ?>js/modernizr.custom.js"></script>
        <script src="<?php echo ADMIN_ASSETS; ?>js/toucheffects.js"></script>

        <script src="<?php echo ADMIN_ASSETS; ?>js/multi-select.js"></script>
        <script src="<?php echo ADMIN_ASSETS; ?>js/select2.js"></script>
        <!-- file upload button -->
        <script type="text/javascript" src="<?php echo ADMIN_ASSETS; ?>assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
        <script type="text/javascript" src="<?php echo ADMIN_ASSETS; ?>js//wysihtml5-0.3.0.js"></script>
        <script type="text/javascript" src="<?php echo ADMIN_ASSETS; ?>js/bootstrap-wysihtml5.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <!-- Date time  picker -->
        <script type="text/javascript" src="<?php echo ADMIN_ASSETS; ?>assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>

        <!--toastr-->
        <script src="<?php echo ADMIN_ASSETS; ?>assets/toastr-master/toastr.js"></script>
        <script src="<?php echo ADMIN_ASSETS; ?>js/summernote.min.js"></script>
        <script src="<?php echo ADMIN_ASSETS; ?>js/switchry.js"></script>

        <!--common script for all pages-->
        <script src="<?php echo ADMIN_ASSETS; ?>js/common-scripts.js"></script>

        <       <script type="text/javascript" src="<?php echo ADMIN_ASSETS; ?>assets/jquery-knob/js/jquery.knob.js"></script>
        <!--custom tagsinput-->
        <script src="<?php echo ADMIN_ASSETS; ?>js/jquery.tagsinput.js"></script>

        <script>
            $(document).ajaxComplete(function (event, xhr, settings) {
                if (xhr.draw) {
                    alert("ALL current AJAX calls have completed");
                }
            });
        </script>

        <?php /* global ajax handler if authentication failure server will return a code and  it will catch that
         *   end here
         */
        ?>
        <?php echo $javascript; ?>
        <script type="text/javascript">
            var i = -1;
            var toastCount = 0;
            var $toastlast;
            function show_toast(type, text, title) {
                var shortCutFunction = type;
                var msg = text;
                var toastIndex = toastCount++;

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "onclick": null,
                    "showDuration": "3000",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "10000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }

                if ($('#addBehaviorOnToastClick').prop('checked')) {
                    toastr.options.onclick = function () {
                        alert('You can perform some custom action after a toast goes away');
                    };
                }


                if (!msg) {
                    msg = getMessage();
                }

                $("#toastrOptions").text("Command: toastr["
                        + shortCutFunction
                        + "](\""
                        + msg
                        + (title ? "\", \"" + title : '')
                        + "\")\n\ntoastr.options = "
                        + JSON.stringify(toastr.options, null, 2)
                        );

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
                if ($toast.find('#okBtn').length) {
                    $toast.delegate('#okBtn', 'click', function () {
                        alert('you clicked me. i was toast #' + toastIndex + '. goodbye!');
                        $toast.remove();
                    });
                }
                if ($toast.find('#surpriseBtn').length) {
                    $toast.delegate('#surpriseBtn', 'click', function () {
                        alert('Surprise! you clicked me. i was toast #' + toastIndex + '. You could perform an action here.');
                    });
                }
            }



            $('#clearlasttoast').click(function () {
                toastr.clear(getLastToast());
            });
            $('#cleartoasts').click(function () {
                toastr.clear();
            });
<?php
//$page_toast_type = "error"; $page_toast = "toast"; $page_toast_title = "title";
if ($page_toast_type != "" && $page_toast != "") {
    ?>
                $('#toast-container').css("width", "100%");
                show_toast('<?php echo $page_toast_type; ?>', '<?php echo $page_toast; ?>', '<?php echo $page_toast_title; ?>');

    <?php
} elseif (isset($_SESSION['page_alert_box_type']) && isset($_SESSION['page_alert_box_title']) && isset($_SESSION['page_alert_box_message'])) {
    ?>
                $('#toast-container').css("width", "100%");
                show_toast('<?php echo $_SESSION['page_alert_box_type']; ?>', '<?php echo $_SESSION['page_alert_box_message']; ?>', '<?php echo $_SESSION['page_alert_box_title']; ?>');
    <?php
    //setcookie('page_alert_box_type', "", time() , "/");
    //setcookie('page_alert_box_title', "", time() , "/");
    //setcookie('page_alert_box_message', "", time(), "/");
    unset($_SESSION['page_alert_box_type']);
    unset($_SESSION['page_alert_box_title']);
    unset($_SESSION['page_alert_box_message']);
}
?>
        </script>
        <!-- <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> -->
        <script src="<?php echo ADMIN_ASSETS; ?>js/tasks.js" type="text/javascript"></script>
        <script>
            jQuery(document).ready(function () {
                TaskList.initTaskWidget();
            });

            $(function () {
                $("#sortable").sortable();
                $("#sortable").disableSelection();
            });

            $(function () {
                $("#sortable_topic").sortable();
                $("#sortable_topic").disableSelection();
            });
        </script>
        <script type="text/javascript">
            $(function () {
                //    fancybox
                jQuery(".fancybox").fancybox();
            });

        </script>
        <!--common script for all pages-->

        <script>

            jQuery(document).ready(function () {

                $('.summernote').summernote({
                    height: 200, // set editor height

                    minHeight: null, // set minimum height of editor
                    maxHeight: null, // set maximum height of editor

                    focus: true                 // set focus to editable area after initializing summernote
                });
            });

        </script>
        <!--select2-->
        <script type="text/javascript">

            $(document).ready(function () {
                $(".js-example-basic-single").select2();

                $(".js-example-basic-multiple").select2();
            });
        </script>
        <!-- swithery-->
        <script type="text/javascript">
            $(document).ready(function () {
                //default
                var elem = document.querySelector('.js-switch');
                var init = new Switchery(elem);


                //small
                var elem = document.querySelector('.js-switch-small');
                var switchery = new Switchery(elem, {size: 'small'});

                //large
                var elem = document.querySelector('.js-switch-large');
                var switchery = new Switchery(elem, {size: 'large'});


                //blue color
                var elem = document.querySelector('.js-switch-blue');
                var switchery = new Switchery(elem, {color: '#7c8bc7', jackColor: '#9decff'});

                //green color
                var elem = document.querySelector('.js-switch-yellow');
                var switchery = new Switchery(elem, {color: '#FFA400', jackColor: '#ffffff'});

                //red color
                var elem = document.querySelector('.js-switch-red');
                var switchery = new Switchery(elem, {color: '#ff6c60', jackColor: '#ffffff'});


            });
        </script>

        <script>
            $(".number").keypress(function (e) {
                //if the letter is not digit then display error and don't type anything
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    //display error message
                    //$("#reg_agent_error_validation").html("Digits Only").show().fadeOut("slow");
                    return false;
                }
            });
            $('.alphabet').keypress(function (e) {
                var regex = new RegExp(/^[a-zA-Z\s]+$/);
                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                if (regex.test(str)) {
                    return true;
                } else {
                    e.preventDefault();
                    return false;
                }
            });
        </script>
        <?php if ($this->session->flashdata('invalid_latlong')) { ?>
            <script>
                alert('Invalid Location! Please select Business Location correctly');
            </script>  
        <?php } ?>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script>
                $(function () {

                    $("#start_date").datepicker({minDate: 0, maxDate: "+90D"});
                });

        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js"></script>
        <script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
    </body>
</html>
