<?php include 'global/header.php';?>
<style>
    .content-top-breadcumregister {
    background: #000 url(<?php echo base_url('assets');?>/img/sign-up.jpg)repeat scroll 0 0;
    margin: 0px 0 30px;
    height: 156px;
    overflow: hidden;
    background-size: 100% 100%;
    background-repeat: no-repeat;
}  
      
</style>
<div class="content-top-breadcumregister">
</div>
<div id="account-register" class="container">
  <ul class="breadcrumb">
        <li><a href=""><i class="fa fa-home"></i></a></li>
        <li><a href="">Account</a></li>
        <li><a href="">Register</a></li>
      </ul>
    <div class="row">
                <div id="content" class="col-sm-9">
      <h1>Register Account</h1>
      <h5 style='color:red'> <?php echo validation_errors();?></h5>
      <p>If you already have an account with us, please login at the <a href="#">login page</a>.</p>
      <form  action="<?php echo site_url('web_panel/Checkout/customer_registration'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
        <fieldset id="account">
          <legend>Your Personal Details</legend>
         <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-firstname">Full Name</label>
            <div class="col-sm-10">
              <input type="text" name="cus_name" value="" placeholder="First Name" id="cus_name" class="form-control" />
               </div>
          </div>
       
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
            <div class="col-sm-10">
              <input type="email" name="cus_email" value="" placeholder="E-Mail" id="cus_email" class="form-control" />
               </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-telephone">Mobile </label>
            <div class="col-sm-10">
              <input type="text" name="phone" value="" placeholder="Enter Your Mobile Number" id="phone" class="form-control" />
               </div>
          </div>
           </fieldset>
        <fieldset>
          <legend>Your Password</legend>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-password">Password</label>
            <div class="col-sm-10">
              <input type="password" name="cus_password" value="" placeholder="Password" id="cus_password" class="form-control" />
               </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-confirm">Password Confirm</label>
            <div class="col-sm-10">
              <input type="password"  value="" placeholder="Password Confirm" id="con_pass" class="form-control" />
               </div>
          </div>
        </fieldset>
       <div class="buttons">
          <div class="pull-right">
         <input type="submit" value="submit" id="submit_register" class="btn btn-primary" />
          </div>
        </div>
        </form>
      </div>
    <aside id="column-right" class="col-sm-3 hidden-xs">
    <div class="section sidebar">
<div class="section-heading"><div class="border"></div>Account</div>   
<?php include 'account.php';?>
</div>

  </aside>
</div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
     $('#dsubmit_register').click(function () {
    var cus_name = $('#cus_name').val();
    var cus_email = $('#cus_email').val();
    var phone = $('#phone').val();
    var cus_password = $('#cus_password').val();
    var con_pass = $("#con_pass").val();
alert('con_pass'); die;
    if(cus_name=='' || cus_email=='' || password==''|| phone==''){
        Swal.fire('Please Fill Required Details','','warning');
        return false;
    }
    if (cus_password != con_pass) {
                alert("Passwords do not match.");
                return false;
    }
       $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: '<?php echo site_url('web_panel/Checkout/customer_registration'); ?>',
            data: {cus_name:cus_name,cus_email:cus_email,cus_password:cus_password,phone:phone},
            success: function (data) {
                Swal.fire(
  'Metro Mart !',
  'You have Successfully Registerd!',
  'success'
);

            }
        });
    
});

</script>   
<script><!--
// Sort the custom fields
$('#account .form-group[data-sort]').detach().each(function() {
	if ($(this).attr('data-sort') >= 0 && $(this).attr('data-sort') <= $('#account .form-group').length) {
		$('#account .form-group').eq($(this).attr('data-sort')).before(this);
	}

	if ($(this).attr('data-sort') > $('#account .form-group').length) {
		$('#account .form-group:last').after(this);
	}

	if ($(this).attr('data-sort') == $('#account .form-group').length) {
		$('#account .form-group:last').after(this);
	}

	if ($(this).attr('data-sort') < -$('#account .form-group').length) {
		$('#account .form-group:first').before(this);
	}
});

$('input[name=\'customer_group_id\']').on('change', function() {
	$.ajax({
		url: 'index.php?route=account/register/customfield&customer_group_id=' + this.value,
		dataType: 'json',
		success: function(json) {
			$('.custom-field').hide();
			$('.custom-field').removeClass('required');

			for (i = 0; i < json.length; i++) {
				custom_field = json[i];

				$('#custom-field' + custom_field['custom_field_id']).show();

				if (custom_field['required']) {
					$('#custom-field' + custom_field['custom_field_id']).addClass('required');
				}
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
});

$('input[name=\'customer_group_id\']:checked').trigger('change');
//--></script> 
<script><!--
$('button[id^=\'button-custom-field\']').on('click', function() {
	var element = this;

	$('#form-upload').remove();

	$('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" /></form>');

	$('#form-upload input[name=\'file\']').trigger('click');

	if (typeof timer != 'undefined') {
    	clearInterval(timer);
	}

	timer = setInterval(function() {
		if ($('#form-upload input[name=\'file\']').val() != '') {
			clearInterval(timer);

			$.ajax({
				url: 'index.php?route=tool/upload',
				type: 'post',
				dataType: 'json',
				data: new FormData($('#form-upload')[0]),
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: function() {
					$(element).button('loading');
				},
				complete: function() {
					$(element).button('reset');
				},
				success: function(json) {
					$(element).parent().find('.text-danger').remove();

					if (json['error']) {
						$(node).parent().find('input').after('<div class="text-danger">' + json['error'] + '</div>');
					}

					if (json['success']) {
						alert(json['success']);

						$(element).parent().find('input').val(json['code']);
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		}
	}, 500);
});
//--></script> 
<script><!--
$('.date').datetimepicker({
	language: 'en-gb',
	pickTime: false
});

$('.time').datetimepicker({
	language: 'en-gb',
	pickDate: false
});

$('.datetime').datetimepicker({
	language: 'en-gb',
	pickDate: true,
	pickTime: true
});
//--></script> 
<?php include 'global/footer.php';?>