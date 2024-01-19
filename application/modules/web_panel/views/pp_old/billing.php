<?php
  include 'global/header.php';?>
 <style>
   .content-top-breadcumcart {
    background: #000 url(<?php echo base_url('assets');?>/img/CART-min-hyper.jpg)repeat scroll 0 0;
    margin: 0px 0 30px;
    height: 156px;
    overflow: hidden;
    background-size: 100% 100%;
    background-repeat: no-repeat;
}
    
</style>

<div class="content-top-breadcumcart">
</div>

<style type="text/css">
	.billing_info p{color: red;font-style: bold}
</style>
<div id="account-voucher" class="container">
  <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
         <li><a href="#">Billing Address</a></li>
      </ul>
    <div>
    <div id="content" class="col-sm-9">
    		<h2 class="billing_info">
                   			 <?php echo validation_errors();?>
			              </h2>
      <h2>Billing Address</h2>
       <?php echo validation_errors();?>
    <form action="<?php echo base_url()?>index.php/web_panel/Checkout/update_billing" method="post" name="billing_info">
      <div class="form-horizontal">
        <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-to-name">Name</label>
          <div class="col-sm-10">
              <input type="text" name="cus_name" value="<?php echo $cus_info->cus_name?>" id="cus_name" class="form-control" placeholder="enter your full name..">
              
           </div>
        </div>
        	<input type="hidden" name="cus_id" value="<?php echo $cus_info->cus_id?>">
        <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-to-email">E-mail</label>
          <div class="col-sm-10">
              
              
              	<input type="text" placeholder="Email*" class="form-control" name="cus_email" value="<?php echo $cus_info->cus_email?>" readonly="">
                      </div>
        </div>
        <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-from-name">Mobile No.</label>
          <div class="col-sm-10">
              
              	<input type="text" placeholder="Mobile" class="form-control" name="cus_mobile" value="<?php echo $cus_info->cus_mobile?>">
                      </div>
        </div>
        <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-from-email">Address</label>
          <div class="col-sm-10">
             
              	<input type="text" placeholder="Address*" class="form-control" name="cus_address" value="<?php echo $cus_info->cus_address?>">
                      </div>
        </div>
        <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-from-email">City</label>
          <div class="col-sm-10">
              <input type="text" placeholder="City" class="form-control" name="cus_city" value="<?php echo $cus_info->cus_city?>">
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-2 control-label" for="input-amount"><span data-toggle="tooltip" title="Value must be between ₹1 and ₹1,000">Country</span></label>
          <div class="col-sm-10">
    
  <select name="cus_country" class="form-control" value="<?php echo $cus_info->cus_country?>">
										<option>-- Country --</option>
									
										<option value="India">India</option>
									
									</select>
           </div>
        </div>
        
        
        	    <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-from-email">Zip Code</label>
          <div class="col-sm-10">
             
              	
        	<input type="text" placeholder="Zip" class="form-control" name="cus_zip" value="<?php echo $cus_info->cus_zip?>">
                      </div>
        </div>
        <!--<div class="buttons clearfix">-->
        <!--  <div class="pull-right"> -->
                      
        <!--    <input type="submit" value="Submit" id="apply_franchise" class="btn btn-primary">-->
        <!--  </div>-->
        <!--</div>-->
        	Shipping Same As Billing
        <input type="checkbox" name="shipping_info" value="on">
									<input type="submit" value="Save & Continue" class="btn btn-primary">
      </div>
      </form>
      </div>
<?php include 'aside_right.php';?>
</div>
</div>	
	<script type="text/javascript">
		document.forms['billing_info'].elements['cus_country'].value=<?php echo $cus_info->cus_country?>

	</script>

 <?php
  include 'global/footer.php';?>