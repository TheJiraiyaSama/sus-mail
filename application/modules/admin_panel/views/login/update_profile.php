<?php $user_data = $this->session->userdata('active_admin_data'); //pre($result);die;  //print_r($city); print_r($state);print_r($user_data);die;   ?>
<style>
    .error{
        color: #e60404  !important;
        font-weight: 400;
    }
</style>
<script>
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31 
        && (charCode < 48 || charCode > 57))
        return false;
        return true;
    }  

    function isNumericKey(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31 
        && (charCode < 48 || charCode > 57))
        return true;
        return false;
    } 
</script>
<div class="col-md-12" style="background-color: white">
        <form role="form" method="post" id="registration_form">
            <div class="row">
              
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" onkeypress="return isNumericKey(event)" value="<?php echo $result['first_name']; ?>" name="first_name" id="first_name" minlength="3" class="form-control input-sm alphabet required" maxlength="24" placeholder="First Name">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" onkeypress="return isNumericKey(event)" value="<?php echo $result['last_name']; ?>" name="last_name" id="last_name" class="form-control input-sm alphabet required" maxlength="36" placeholder="Last Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group" id="is_email_exist">
                        <label>Email Id</label>
                        <input type="email" name="email" value="<?php echo $result['email']; ?>" id="email" class="form-control input-sm" maxlength="36" placeholder="Email Address" readonly>
                        <span id="is_email_exist_feedback"></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6"> 
                    <div class="form-group" id="is_mobile_exist">
                        <label>Mobile Number</label>
                        <input type="text" onkeypress="return isNumberKey(event)" value="<?php echo $result['mobile']; ?>" minlength="10" maxlength="10" name="mobile" id="mobile" minlenght="10" class="form-control number" placeholder="Mobile Number" required>
                        <span id="is_mobile_exist_feedback"></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6"> 
                    <div class="form-group" id="is_mobile_exist">
                        <label>Date of Birth</label>
                        <input type="date"  name="dob" value="<?php echo $result['dob']; ?>" id="dob" class="form-control" placeholder="Date of Birth" required="">
                        <span class="error"></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option <?php
                            if (($result['gender']) == 0) {
                                echo 'SELECTED';
                            }
                            ?> value="0">Male</option>
                            <option <?php
                            if (($result['gender']) == 1) {
                                echo 'SELECTED';
                            }
                            ?> value="1">Female</option>
                            <option <?php
                                if (($result['gender']) == 2) {
                                    echo 'SELECTED';
                                }
                            ?> value="2">Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Address</label>
                        <textarea rows="5" name="address" id="about_text" class="form-control" maxlength="200" placeholder="Enter Your Address"><?php echo $result['address']; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <button type="submit" class="btn btn-info btn-block y-pro" id="update_profile_btn">Update Profile</button>
                </div>
            </div>
        </form>

        <div class="modal fade" id="myModal1" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="width: 100%">
                        <h4 class="modal-title" style="width: 50%; float:left; font-size: 18px;">CHANGE PROFILE PICTURE</h4> 
                        <button type="button" class="close" data-dismiss="modal" style="width: 50%; float:right;text-align: right;">&times;</button>

                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <center>
                                <img id="blah" alt="your image" src="<?php
                                if (!empty($user['profile_image'])) {
                                    $pos = strpos($result['profile_image'], "http");
                                    if ($pos === false) {
                                        echo base_url('uploads/profile/') . $result['profile_image'];
                                    } else {
                                        echo $result['profile_image'];
                                    }
                                } else {
                                    echo base_url('uploads/profile/default.png');
                                }
                                ?>" class="img-rounded" alt="" style="width:60%; margin:0px auto;">
                                <br>
                                <br>
                                <input type="file" onchange="readURL(this);" name="choseprofilepic" style="margin-left: 100px;">
                            </center>
                        </div>
                        <div class="modal-footer">
                            <input style="background-color: #00aeef;" type="submit" name="image_submit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" value="Submit">
                            <button style="line-height: 1;" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript" src="http://www.google.com/jsapi?key=AIzaSyCq9KwSYD5TrVnMsH1C69GQPm4-JdMj-oQ"></script>
<!--<script>
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    }
    function showPosition(position) {
        //alert(position.coords.latitude);
        $('#service_area_latitude').val(position.coords.latitude);
        $('#service_area_longitude').val(position.coords.longitude);
    }
</script>-->
<script>
    $('#email').keyup(function () {
        //alert();exit;
        $("#is_email_exist").removeClass("has-success has-error has-feedback");
        $("#is_email_exist_feedback").removeClass("glyphicon glyphicon-ok glyphicon-remove form-control-feedback");
        var email = $("#email").val();
        var valid_email1 = email.search("@");
        if (valid_email1 != "-1") {
            jQuery.ajax({
                url: "<?php echo base_url('index.php/admin_panel/Registration/ajax_is_email_exist'); ?>",
                method: 'POST',
                dataType: 'json',
                data: {
                    email: email
                },
                success: function (data) {
                    if (data.status == true) {
                        $("#is_email_exist").addClass("has-success has-feedback");
                        $("#is_email_exist_feedback").addClass("glyphicon glyphicon-ok form-control-feedback");
                        //$('#email').val(email);

                    } else {
                        $("#is_email_exist").addClass("has-error has-feedback");
                        $("#is_email_exist_feedback").addClass("glyphicon glyphicon-remove form-control-feedback");
                        //$('#email').val('');
                    }
                }
            });
        }

    });

    $('#mobile').keyup(function () {
        $("#is_mobile_exist").removeClass("has-success has-error has-feedback");
        $("#is_mobile_exist_feedback").removeClass("glyphicon glyphicon-ok glyphicon-remove form-control-feedback");
        var mobile = $("#mobile").val();
        if (mobile.length == 10) {
            jQuery.ajax({
                url: "<?php echo base_url('index.php/admin_panel/Registration/ajax_is_mobile_exist'); ?>",
                method: 'POST',
                dataType: 'json',
                data: {
                    mobile: mobile
                },
                success: function (data) {
                    if (data.status == true) {
                        $("#is_mobile_exist").addClass("has-success has-feedback");
                        $("#is_mobile_exist_feedback").addClass("glyphicon glyphicon-ok form-control-feedback");
                        //$('#mobile').val(mobile);

                    } else {
                        $("#is_mobile_exist").addClass("has-error has-feedback");
                        $("#is_mobile_exist_feedback").addClass("glyphicon glyphicon-remove form-control-feedback");
                        //$('#mobile').val('');
                    }
                }
            });
        }
    });

</script>

</html>