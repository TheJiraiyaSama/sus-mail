<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

    <!-- Mirrored from templatevisual.com/demo/learnplus/course-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jun 2018 15:49:04 GMT -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keywords" content="">
        <title>LearnPLUS | Learning Management System HTML Template</title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>website_assets/images/favicon.ico" type="image/x-icon"/>
        <link rel="apple-touch-icon" href="<?php echo base_url(); ?>website_assets/images/apple-touch-icon.png"/>
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>website_assets/images/apple-touch-icon-57x57.png"/>
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>website_assets/images/xapple-touch-icon-72x72.png.pagespeed.ic.lf5d8kCpOf.png"/>
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>website_assets/images/xapple-touch-icon-76x76.png.pagespeed.ic.ATZZpSeito.png"/>
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>website_assets/images/xapple-touch-icon-114x114.png.pagespeed.ic.Fi5O5s2tzL.png"/>
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>website_assets/images/xapple-touch-icon-120x120.png.pagespeed.ic.uPQH0sygdV.png"/>
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>website_assets/images/xapple-touch-icon-144x144.png.pagespeed.ic.yZ9-_sm5OF.png"/>
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>website_assets/images/xapple-touch-icon-152x152.png.pagespeed.ic.gThaVrKtXF.png"/>
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>website_assets/images/xapple-touch-icon-180x180.png.pagespeed.ic.Q8Pmsj5fQM.png"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>website_assets/rs-plugin/css/A.settings.css.pagespeed.cf.xeOyGChsgq.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>website_assets/A.fonts%2c%2c_font-awesome-4.3.0%2c%2c_css%2c%2c_font-awesome.min.css%2bcss%2c%2c_bootstrap.css%2bcss%2c%2c_animate.css%2cMcc.kSNwpaaMDX.css.pagespeed.cf.w2G3xGgFf0.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>website_assets/css/A.menu.css.pagespeed.cf.0_hLwXzYkZ.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>website_assets/css/A.carousel.css.pagespeed.cf.VktteGiLwl.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>website_assets/A.style.css%2bcss%2c%2c_custom.css%2cMcc.HvWh1qoob-.css.pagespeed.cf.pWH5huNcWh.css"/>
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
    </head>
    <style type="text/css">
        .form-option{
            height: 45px;
            border: 1px solid #ddd;
            background-color: #fff;
            font-size: 14px;
            -webkit-transition: all .1s linear;
            -moz-transition: all .1s linear;
            transition: all .1s linear;
            width: 100%;
            margin-bottom: 15px;
        }
        .form-option option{
            font-size: 14px !important;
        }
        .color-blue{
            background-color: #3b5998 !important;
            border-color: #fff!important;
        }
        .color-green{
            background-color: #00a91bba!important;
            border-color: #fff!important;
        }

    </style>
    <body class="login">
        <div id="loader">
            <div class="loader-container">
                <img src="images/site.gif" alt="" class="loader-site">
            </div>
        </div>
        <div id="wrapper">
            <div class="container">
                <div class="row login-wrapper">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="logo logo-center">
                            <a href="<?php echo base_url(); ?>Home/index"><img src="<?php echo base_url(); ?>website_assets/images/xlogin-logo.png.pagespeed.ic.rk5LaeLYSz.png" alt=""></a>
                        </div>
                        <div class="panel panel-login">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <a href="#" class="active" id="login-form-link">Login</a>
                                    </div>
                                    <div class="col-xs-6">
                                        <a href="#" id="register-form-link">Register</a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form id="login-form" action="" method="post" role="form" style="display: block;">
                                            <div class="form-group">
                                                <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                            </div>
                                            <div class="form-group text-center">
                                                <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                                <label for="remember"> &nbsp; Remember Me</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <!--
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="form-control btn btn-default color-blue">Login with facebook</button>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="form-control btn btn-default">Login with gmail</button>
                                                    </div>
                                                    -->
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="form-control btn btn-default color-green">Login </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="text-center">
                                                            <a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <form id="register-form" action="http://phpoll.com/register/process" method="post" role="form" style="display: none;">
                                            <div class="form-group">
                                                <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="mobile no" id="mobile" tabindex="1" class="form-control" placeholder="Mobile" value="">
                                            </div>
                                            <div class="form-group">
                                                <select class="form-option">
                                                    <option value="volvo">State</option>
                                                    <option value="saab">UP</option>
                                                    <option value="mercedes">MP</option>
                                                    <option value="audi">UK</option>
                                                </select>
                                                <select class="form-option">
                                                    <option value="volvo">District</option>
                                                    <option value="saab">Luckonw</option>
                                                    <option value="mercedes">Delhi</option>
                                                    <option value="audi">Noida</option>
                                                </select>
                                                <select class="form-option">
                                                    <option value="volvo">State</option>
                                                    <option value="saab">UP</option>
                                                    <option value="mercedes">MP</option>
                                                    <option value="audi">UK</option>
                                                </select>
                                                <select class="form-option">
                                                    <option value="volvo">Univercity/School/Coaching</option>
                                                    <option value="saab">1</option>
                                                    <option value="mercedes">2</option>
                                                    <option value="audi">2</option>
                                                </select>
                                                <select class="form-option">
                                                    <option value="volvo">Class</option>
                                                    <option value="saab">10</option>
                                                    <option value="mercedes">11</option>
                                                    <option value="audi">12</option>
                                                </select>
                                                <select class="form-option">
                                                    <option value="volvo">Section</option>
                                                    <option value="saab">A</option>
                                                    <option value="mercedes">B</option>
                                                    <option value="audi">C</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="form-control btn btn-default btn-block">Register an Account</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>website_assets/js/jquery.min.js.pagespeed.jm.iDyG3vc4gw.js"></script>
        <script src="<?php echo base_url(); ?>website_assets/js/bootstrap.min.js%2bretina.js%2bwow.js.pagespeed.jc.pMrMbVAe_E.js"></script><script>eval(mod_pagespeed_gFRwwUbyVc);</script>
        <script>eval(mod_pagespeed_rQwXk4AOUN);</script>
        <script>eval(mod_pagespeed_U0OPgGhapl);</script>
        <script src="<?php echo base_url(); ?>website_assets/js/carousel.js%2bcustom.js.pagespeed.jc.nVhk-UfDsv.js"></script><script>eval(mod_pagespeed_6Ja02QZq$f);</script>
        <script>eval(mod_pagespeed_KxQMf5X6rF);</script>
    </body>

    <!-- Mirrored from templatevisual.com/demo/learnplus/course-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jun 2018 15:49:06 GMT -->
</html>