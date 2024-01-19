<?php include 'global/header.php';?>


<style>
   .content-top-breadcumreturn {
    background: #000 url(<?php echo base_url('assets');?>/img/category-banner.jpg)repeat scroll 0 0;
    margin: 0px 0 30px;
    height: 156px;
    overflow: hidden;
}
    
</style>
<div class="content-top-breadcumreturn">

</div>

<div id="account-return" class="container">
  <ul class="breadcrumb">
        <li><a href="#"> <i class="fa fa-home"></i></a></li>
        <li><a href="#"> Account</a></li>
        <li><a href="#"> Product Returns</a></li>
      </ul>
    <div class="row"> 
                <div id="content" class="col-sm-9"> 
      <h1>Product Returns</h1>
      <p>Please complete the form below to request an RMA number.</p>
      <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
        <fieldset>
          <legend>Order Information</legend>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
            <div class="col-sm-10">
              <input type="text" name="firstname" value="" placeholder="First Name" id="input-firstname" class="form-control" />
               </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
            <div class="col-sm-10">
              <input type="text" name="lastname" value="" placeholder="Last Name" id="input-lastname" class="form-control" />
               </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
            <div class="col-sm-10">
              <input type="text" name="email" value="Email" placeholder="E-Mail" id="input-email" class="form-control" />
               </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-telephone">Telephone</label>
            <div class="col-sm-10">
              <input type="text" name="telephone" value="" placeholder="Telephone" id="input-telephone" class="form-control" />
               </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-order-id">Order ID</label>
            <div class="col-sm-10">
              <input type="text" name="order_id" value="" placeholder="Order ID" id="input-order-id" class="form-control" />
               </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-date-ordered">Order Date</label>
            <div class="col-sm-3">
              <div class="input-group date">
                <input type="text" name="date_ordered" value="" placeholder="Order Date" data-date-format="YYYY-MM-DD" id="input-date-ordered" class="form-control" />
                <span class="input-group-btn">
                <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                </span></div>
            </div>
          </div>
        </fieldset>
        <fieldset>
          <legend>Product Information</legend>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-product">Product Name</label>
            <div class="col-sm-10">
              <input type="text" name="product" value="" placeholder="Product Name" id="input-product" class="form-control" />
               </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-model">Product Code</label>
            <div class="col-sm-10">
              <input type="text" name="model" value="" placeholder="Product Code" id="input-model" class="form-control" />
               </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-quantity">Quantity</label>
            <div class="col-sm-10">
              <input type="text" name="quantity" value="1" placeholder="Quantity" id="input-quantity" class="form-control" />
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label">Reason for Return</label>
            <div class="col-sm-10">                             <div class="radio">
                <label>
                  <input type="radio" name="return_reason_id" value="1" />
                  Dead On Arrival</label>
              </div>
                                                        <div class="radio">
                <label>
                  <input type="radio" name="return_reason_id" value="4" />
                  Faulty, please supply details</label>
              </div>
                                                        <div class="radio">
                <label>
                  <input type="radio" name="return_reason_id" value="3" />
                  Order Error</label>
              </div>
                                                        <div class="radio">
                <label>
                  <input type="radio" name="return_reason_id" value="5" />
                  Other, please supply details</label>
              </div>
                                                        <div class="radio">
                <label>
                  <input type="radio" name="return_reason_id" value="2" />
                  Received Wrong Item</label>
              </div>
                                           </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label">Product is opened</label>
            <div class="col-sm-10">
              <label class="radio-inline">                 <input type="radio" name="opened" value="1" />
                                Yes</label>
              <label class="radio-inline">                 <input type="radio" name="opened" value="0" checked="checked" />
                                No</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-comment">Faulty or other details</label>
            <div class="col-sm-10">
              <textarea name="comment" rows="10" placeholder="Faulty or other details" id="input-comment" class="form-control"></textarea>
            </div>
          </div>
          
        </fieldset>
                <div class="buttons clearfix">
          <div class="pull-left"><a href="#" class="btn btn-default">Back</a></div>
          <div class="pull-right">
            <input type="submit" value="Submit" class="btn btn-primary" />
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
<script type="text/javascript"><!--
$('.date').datetimepicker({
	language: 'en-gb',
	pickTime: false
});
//--></script> 
<?php include 'global/footer.php';?>