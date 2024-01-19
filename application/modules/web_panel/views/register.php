<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-W24T6W7');</script>
    <!-- End Google Tag Manager -->
    <title>Suspicious E-mail Scanning</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
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

</head>
<body id="top">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W24T6W7"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="page_loader"></div>

<!-- Login 4 start -->
<div class="login-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="form-section">
                    <div class="logo-2">
                     <h1>  Sign UP</h1>
                    </div>
                    <h3>Secure Mail System</h3>
     <form  action="<?php echo site_url('web_panel/Register/customer_registration'); ?>" 
        method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="form-group form-box">
                            <input type="text" name="user_id" class="input-text" placeholder="User ID" value="<?php
echo rand();
?>">
                        </div>
                        <div class="form-group form-box">
                            <input type="text" name="first_name" class="input-text" placeholder="First Name">
                        </div>
                        <div class="form-group form-box">
                            <input type="text" name="last_name" class="input-text" placeholder="Last Name">
                        </div>
                        <div class="form-group form-box">
                            <input type="email" name="email" class="input-text" placeholder="Email Address">
                        </div>
                        <div class="form-group form-box">
                            <input type="text" name="mobile" class="input-text" placeholder="Mobile Number">
                        </div>
                        <div class="form-group form-box">
                            <input type="password" name="password" class="input-text" placeholder="Password">
                        </div>
                        
                        <div class="form-group mb-0 clearfix">
                            <button type="submit" class="btn-md btn-theme float-left" id="submit_register">Register</button>
                        </div>
                        <!-- <div class="extra-login clearfix">
                            <span>Or Login With</span>
                        </div> -->
                        <div class="clearfix"></div>
                        <!-- <ul class="social-list">
                            <li><a href="#" class="facebook-color"><i class="fa fa-facebook facebook-i"></i><span>Facebook</span></a></li>
                            <li><a href="#" class="twitter-color"><i class="fa fa-twitter twitter-i"></i><span>Twitter</span></a></li>
                            <li><a href="#" class="google-color"><i class="fa fa-google google-i"></i><span>Google</span></a></li>
                        </ul> -->
                    </form>
                    <p>Already a member? <a href="<?php echo base_url();?>index.php/admin_panel/Admin" class="thembo"> Login here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $('#submit_register').click(function () {
    var first_name = $('#first_name').val();
    var last_name = $('#last_name').val();
    var user_id = $('#user_id').val();
    var mobile = $('#mobile').val();
    var email = $('#email').val();
    var password = $('#password').val();
   
  //alert('first_name'); 
    if(first_name=='' || last_name=='' || password==''|| mobile=='' || email=="" || user_id=='' ){
        Swal.fire('Please Fill Required Details','','warning');
        return false;
    }
    
    $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: '<?php echo base_url('index.php/web_panel/Register/customer_registration'); ?>',
            data: {first_name:first_name,last_name:last_name,mobile:mobile,password:password,user_id:user_id,email:email},
            success: function (data) {
                Swal.fire(
  'Suspicious Email !',
  'You have Successfully Registerd!',
  'success'
);

            }
        });
    
});

</script>   
<!-- External JS libraries -->
<script src="<?php echo base_url('assets/');?>/js/jquery-2.2.0.min.js"></script>
<script src="<?php echo base_url('assets/');?>/js/popper.min.js"></script>
<script src="<?php echo base_url('assets/');?>/js/bootstrap.min.js"></script>
<!-- Custom JS Script -->

</body>

</html>
