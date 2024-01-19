<?php
  include 'global/header.php';?>
 <style>
   .content-top-breadcumthanku {
    background: #000 url(<?php echo base_url('assets');?>/img/thankyou-min-hyper.jpg)repeat scroll 0 0;
    margin: 0px 0 30px;
    height: 156px;
    overflow: hidden;
    background-size: 100% 100%;
    background-repeat: no-repeat;
}
    
</style>

<div class="content-top-breadcumthanku">
</div>

<section id="cart_items">
		<div class="container">
			<h3>Dear <?php echo $this->session->userdata("cus_name");?></h3>
<h2>Your Order Successfully complete....</h2><hr/>
			
<h3>Total payable amount(including vat) : ₹<?php echo $this->session->userdata("g_total");?></h3>

<h2 style="text-align: justify;">Thanks for purchase. Recfeive your order successfully. We will contact you ASAP with delivery details. For more details please check your registration mail.</h2>
			
		</div>
	</section> <!--/#cart_items-->

 <?php
  include 'global/footer.php';?>