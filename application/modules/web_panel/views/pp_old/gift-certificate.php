<?php include 'global/header.php';?>


<style>
   .content-top-breadcumgift {
    background: #000 url(<?php echo base_url('assets');?>/img/category-banner.jpg)repeat scroll 0 0;
    margin: 0px 0 30px;
    height: 156px;
    overflow: hidden;
}
    
</style>
<div class="content-top-breadcumgift">

</div>

<div id="account-voucher" class="container">
  <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Account</a></li>
        <li><a href="#">Gift Certificate</a></li>
      </ul>
    <div class="row">
                <div id="content" class="col-sm-9">
      <h1>Purchase a Gift Certificate</h1>
      <p>This gift certificate will be emailed to the recipient after your order has been paid for.</p>
      <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-to-name">Recipient's Name</label>
          <div class="col-sm-10">
            <input type="text" name="to_name" value="" id="input-to-name" class="form-control" />
                      </div>
        </div>
        <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-to-email">Recipient's e-mail</label>
          <div class="col-sm-10">
            <input type="text" name="to_email" value="" id="input-to-email" class="form-control" />
                      </div>
        </div>
        <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-from-name">Your Name</label>
          <div class="col-sm-10">
            <input type="text" name="from_name" value="" id="input-from-name" class="form-control" />
                      </div>
        </div>
        <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-from-email">Your e-mail</label>
          <div class="col-sm-10">
            <input type="text" name="from_email" value="" id="input-from-email" class="form-control" />
                      </div>
        </div>
        <div class="form-group required">
          <label class="col-sm-2 control-label">Gift Certificate Theme</label>
          <div class="col-sm-10">
                                   <div class="radio">
              <label>
                <input type="radio" name="voucher_theme_id" value="7" />
                Birthday</label>
            </div>
                                                <div class="radio">
              <label>
                <input type="radio" name="voucher_theme_id" value="6" />
                Christmas</label>
            </div>
                                                <div class="radio">
              <label>
                <input type="radio" name="voucher_theme_id" value="8" />
                General</label>
            </div>
                                              </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label" for="input-message"><span data-toggle="tooltip" title="Optional">Message</span></label>
          <div class="col-sm-10">
            <textarea name="message" cols="40" rows="5" id="input-message" class="form-control"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label" for="input-amount"><span data-toggle="tooltip" title="Value must be between ₹1 and ₹1,000">Amount</span></label>
          <div class="col-sm-10">
            <input type="text" name="amount" value="1" id="input-amount" class="form-control" size="5" />
                      </div>
        </div>
        <div class="buttons clearfix">
          <div class="pull-right"> I understand that gift certificates are non-refundable.
                        <input type="checkbox" name="agree" value="1" />
                        &nbsp;
            <input type="submit" value="Continue" class="btn btn-primary" />
          </div>
        </div>
      </form>
      </div>
    <aside id="column-right" class="col-sm-3 hidden-xs">
    <div class="section sidebar">
<div class="section-heading"><div class="border"></div>Account</div>   
 <div class="list-group">
    <a href="#" class="list-group-item">Login</a> <a href="#" class="list-group-item">Register</a> <a href="#" class="list-group-item">Forgotten Password</a>
   <a href="#" class="list-group-item">My Account</a>
    <a href="#" class="list-group-item">Address Book</a> <a href="#" class="list-group-item">Wish List</a> <a href="" class="list-group-item">Order History</a> <a href="" class="list-group-item">Downloads</a><a href="" class="list-group-item">Recurring payments</a> <a href="" class="list-group-item">Reward Points</a> <a href="" class="list-group-item">Returns</a> <a href="" class="list-group-item">Transactions</a> <a href="" class="list-group-item">Newsletter</a>
  </div>
</div>

  </aside>
</div>
</div>
<?php include 'global/footer.php';?>