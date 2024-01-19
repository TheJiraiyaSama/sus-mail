<?php include 'global/header.php';?>
<style>
    .content-top-breadcumlogin {
    background: #000 url(<?php echo base_url('assets');?>/img/LOGIN.jpg)repeat scroll 0 0;
    margin: 0px 0 30px;
    height: 156px;
    overflow: hidden;
    background-size: 100% 100%;
    background-repeat: no-repeat;
}  
     
</style>
<div class="content-top-breadcumlogin">

</div>
<div id="account-login" class="container">
  <ul class="breadcrumb">
        <li><a href=""><i class="fa fa-home"></i></a></li>
        <li><a href="">Account</a></li>
        <li><a href="">Login</a></li>
      </ul>
      <div class="row">
                <div id="content" class="col-sm-9">
      <div class="row">
        <div class="col-sm-6">
          <div class="well">
            <h2>New Customer</h2>
            <p><strong>Register Account</strong></p>
            <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
            <a href="" class="btn btn-primary">Continue</a></div>
        </div>
        <div class="col-sm-6">
          <div class="well">
            <h2>Returning Customer</h2>
            <p><strong>I am a returning customer</strong></p>
             <?php echo $this->session->flashdata('flash_msg'); ?> 
            <form action="<?= base_url();?>index.php/web_panel/Checkout/customer_login" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label class="control-label" for="input-email">E-Mail Address</label>
                <input type="text" name="cus_email" value="" placeholder="E-Mail Address" id="cus_email" class="form-control" />
              </div>
              <div class="form-group">
                <label class="control-label" for="password">Password</label>
                <input type="password" name="cus_password" value="" placeholder="Password" id="cus_password" class="form-control" />
                <a href="">Forgotten Password</a></div>
              <input type="submit" value="Login" class="btn btn-primary" />
          </form>
          </div>
        </div>
      </div>
      </div>
    <aside id="column-right" class="col-sm-3 hidden-xs">
    <div class="section sidebar">
<div class="section-heading"><div class="border"></div>Account</div>   
<?php include 'account.php';?>
</div>

  </aside>
</div>
</div>
<?php include 'global/footer.php';?>