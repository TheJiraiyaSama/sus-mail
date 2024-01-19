<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//echo $ADMIN_PANEL_URL; 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mosaddek">
        <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <link rel="shortcut icon" href="img/favicon.png">
        <title>Suspicious E-mail LOGIN</title>
        <link href="<?php echo base_url(); ?>auth_panel_assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>auth_panel_assets/css/bootstrap-reset.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>auth_panel_assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>auth_panel_assets/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>auth_panel_assets/css/style-responsive.css" rel="stylesheet" />

    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/');?>/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/');?>/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/');?>/fonts/flaticon/font/flaticon.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/');?>/img/favicon.ico" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPoppins:400,500,700,800,900%7CRoboto:100,300,400,400i,500,700">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/');?>/css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="<?php echo base_url('assets/');?>/css/skins/default.css">
    </style>

    <style type="text/css">
    .login-4 {
    background: rgba(0, 0, 0, 0.04) url(<?php echo base_url(); ?>auth_panel_assets/img/bg-image-7.jpg) top left repeat;
    background-size: cover;
    top: 0;
    width: 100%;
    text-align: center;
    bottom: 0;
    opacity: 1;
    z-index: 999;
    min-height: 100vh;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 30px 0;
}
    </style>
</head>

<body class="login-body">
<!--     <div class="login-4">
    <div class="container">
        <form class="form-signin" method="POST" action="<?php //echo site_url('admin_panel/login/index'); ?>">
            <h2 class="form-signin-heading">Sign In</h2>
            <div class="login-wrap">
                <input type="text" maxlength="50" class="form-control" name="email" placeholder="Enter Email" id="login_username" value="<?php echo set_value('email'); ?>">
                <input type="password" maxlength="13" class="form-control" name="password" placeholder="Password" id="login_pwd" >
                <!-- <label class="checkbox">
                    <span class="pull-right">
                        <a href="#" data-toggle="modal" data-target="#myModal"> Forgot Password?</a>
                    </span>
                </label> -->
    <!--             <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
            </div>
        </form>
    </div> -->
<!-- </div> --> 
<!-- Login 4 start -->
<div class="login-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-section">
                    <div class="logo-2">
                      <h1>Login Here</h1>
                    </div>
                    <h3>Sign into your account</h3>
                    <form method="POST" action="<?php echo site_url('admin_panel/login/index'); ?>">
                        <div class="form-group form-box">
                            <input type="text" name="email"  maxlength="50" class="input-text" placeholder="Email Address" id="login_username" value="<?php echo set_value('email'); ?>">
                        </div>
                        <div class="form-group form-box">
                            <input type="password" name="password" maxlength="13" class="input-text" placeholder="Password" id="login_pwd">
                        </div>
                        <div class="form-group mb-0 clearfix">
                            <button type="submit" class="btn-md btn-theme float-left btn-login btn-block">Login</button>
                            
                        </div>
                        <!-- <div class="extra-login clearfix">
                            <span>Or Login With</span>
                        </div> -->
                        <div class="clearfix"></div>
                       <!--  <ul class="social-list">
                            <li><a href="#" class="facebook-color"><i class="fa fa-facebook facebook-i"></i><span>Facebook</span></a></li>
                            <li><a href="#" class="twitter-color"><i class="fa fa-twitter twitter-i"></i><span>Twitter</span></a></li>
                            <li><a href="#" class="google-color"><i class="fa fa-google google-i"></i><span>Google</span></a></li>
                        </ul> -->
                    </form>
                    <p>Don't have an account? <a href="<?php echo base_url();?>index.php/web_panel/Register" class="thembo"> Register here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login 4 end -->
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Forgot Password</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12" id="enter_password">
                            <div class="form-group">
                                <label>Enter Email</label>
                                <span id="p_err" style="color: red"></span>
                                <input type="email" name="p_email" id="p_email" class="form-control input-sm" placeholder="Enter Email Id">
                            </div>
                            <button type="button" class="btn btn-primary col-md-12" id="change_password">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $('#change_password').click(function(){
        $('#p_err').text("");        
        var email = $('#p_email').val();
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(email)) {
            $('#p_err').text("Please provide a valid email address");
            $('#p_email').focus();
            exit;
        }
        jQuery.ajax({
            url: "<?php echo site_url('admin_panel/login/create_link'); ?>",
            method: 'POST',
            dataType: 'json',
            data: {
                email : email,
            },
            success: function (data) {
                if (data.name == 'p_email') {
                    $('#p_err').text(data.message);
                    $('#p_email').focus();
                } else {
                    alert(data.message);
                }
            }
        });
    });
</script>
<!-- External JS libraries -->
<script src="<?php echo base_url('assets/');?>/js/jquery-2.2.0.min.js"></script>
<script src="<?php echo base_url('assets/');?>/js/popper.min.js"></script>
<script src="<?php echo base_url('assets/');?>/js/bootstrap.min.js"></script>
<!-- Custom JS Script -->
</html>
