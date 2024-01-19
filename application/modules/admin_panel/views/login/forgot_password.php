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
        <title>Suspicious E-mail ADMIN LOGIN</title>
        <link href="<?php echo base_url(); ?>auth_panel_assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>auth_panel_assets/css/bootstrap-reset.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>auth_panel_assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>auth_panel_assets/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>auth_panel_assets/css/style-responsive.css" rel="stylesheet" />
    </style>
</head>

<body class="login-body">
    <div class="container">
        <form class="form-signin" method="POST" action="<?php echo site_url('admin_panel/login/index'); ?>">
            <h2 class="form-signin-heading">Forgot Password</h2>
            <div class="login-wrap">
                <input id="id" name="id" hidden="" value="<?php echo base64_decode($_GET['token']); ?>">
                <span id="pass_err" style="color: red"></span>
                <input type="password" maxlength="13" class="form-control" name="password" placeholder="enter new passwrod" id="password">
                <span id="c_pass_err" style="color: red"></span>
                <input type="password" maxlength="13" class="form-control" name="c_password" placeholder="Confirm Password" id="c_password" >
                <button class="btn btn-primary" id="change" type="button">Button</button>
                Password changed &nbsp;<a href="<?php echo site_url('admin_panel/login/index'); ?>">Login</a>
            </div>
        </form>
    </div>

</body>
</html>
<script>
    $("#change").click(function(){
        $('#pass_err').text("");
        $('#c_pass_err').text("");
        if($('#password').val().length < 8 || $('#password').val().length > 13){
            $('#pass_err').text("Password should be 8 to 13 characters");
            exit;
        }
        if($('#password').val()!=$('#c_password').val()){
            $('#c_pass_err').text("Confirm password does not match");
            exit;
        }
        var id = $('#id').val();
        var password = $('#password').val();
        jQuery.ajax({
            url: "<?php echo site_url('admin_panel/login/create_password'); ?>",
            method: 'POST',
            dataType: 'json',
            data: {
                id : id,
                password : password,
            },
            success: function (data) {
                if (data.status == 'success') {
                    alert(data.message);
                } else {
                    alert('Invalid Link');
                }
            }
        });
    });
</script>