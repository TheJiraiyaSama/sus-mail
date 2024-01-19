<?php include 'global/header.php';?>
<style>
   .content-top-breadcumfranchise {
    background: #000 url(<?php echo base_url('assets');?>/img/APPLY_FOR_FRANCHISE.jpg)repeat scroll 0 0;
    margin: 0px 0 30px;
    height: 156px;
    overflow: hidden;
     background-size: 100% 100%;
    background-repeat: no-repeat;
}
    
</style>
<div class="content-top-breadcumfranchise">

</div>

<div id="account-voucher" class="container">
  <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Account</a></li>
        <li><a href="#">Apply For Franchise</a></li>
      </ul>
    <div>
    <div id="content" class="col-sm-9">
      <h1>Purchase a Gift Certificate</h1>
      <p>Apply For Franchise</p>
      <div class="form-horizontal">
        <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-to-name">Name</label>
          <div class="col-sm-10">
              <input type="text" name="name" value="" id="name" class="form-control" placeholder="enter your full name..">
           </div>
        </div>
        <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-to-email">E-mail</label>
          <div class="col-sm-10">
              <input type="text" name="email" value="" id="email" class="form-control" placeholder="enter your email id..">
                      </div>
        </div>
        <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-from-name">Mobile No.</label>
          <div class="col-sm-10">
              <input type="text" name="phone" value="" id="phone" class="form-control" placeholder="enter your mobile number..">
                      </div>
        </div>
        <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-from-email">State</label>
          <div class="col-sm-10">
              <input type="text" name="state" value=""  id="state" class="form-control" placeholder="enter your state..">
                      </div>
        </div>
        <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-from-email">City</label>
          <div class="col-sm-10">
              <input type="text" name="city" value="" id="city" class="form-control" placeholder="enter your city..">
          </div>
        </div>
        <div class="form-group required">
          <label class="col-sm-2 control-label">Franchise Model</label>
          <div class="col-sm-10">
           <div class="radio">
              <label>
                <input type="radio" name="model" id="model" value="FOFO">
                FOFO Model</label>
            </div>
           <div class="radio">
              <label>
                <input type="radio" name="model" id="model" value="FOCO">
                FOCO Model</label>
            </div>
           <div class="radio">
              <label>
                <input type="radio" name="model"  id="model" value="COCO">
                COCO Model</label>
            </div>
          </div>
        </div>
       
        <div class="form-group">
          <label class="col-sm-2 control-label" for="input-amount"><span data-toggle="tooltip" title="Value must be between ₹1 and ₹1,000">Investment</span></label>
          <div class="col-sm-10">
    <select class="form-control" id="investment" name="investment">
    <option value="10-25">10 lakh to 25 lakh</option>
    <option value="25-50">25 lakh to 50 lakh</option>
    <option value="50-1cr.">50 lakh to 1 CR.</option>
    <option value="1cr.-5cr.">1CR to 5 CR.</option>
  </select>
           </div>
        </div>
        <div class="buttons clearfix">
          <div class="pull-right"> 
                      
            <input type="submit" value="Submit" id="apply_franchise" class="btn btn-primary">
          </div>
        </div>
      </div>
      </div>
<?php include 'aside_right.php';?>
</div>
</div>
<script>
    $('#apply_franchise').click(function () {
    var name = $('#name').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var state = $('#state').val();
    var city = $('#city').val();
    var model = $('#model').val();
    var investment = $('#investment').val();
     if(name=='' || email=='' || phone==''|| state=='' || city=='' || model=='' || investment==''){
        Swal.fire('Please Fill Required Details','','warning');
        return false;
    }
       $.ajax({
            type: 'POST',
           // dataType: 'JSON',
             url: '<?php echo site_url('web_panel/Franchise/index'); ?>',
             data: {name:name,email:email,phone:phone,state:state,city:city,model:model,investment:investment},
            success: function (data) {
            if(data.status == true){
                   
                    Swal.fire('Thank You, Your Application has been Submitted !','','success'); 
                    window.location = "http://metromart.co.in/";
                }else{
                   
                    Swal.fire('Thank You, Your Application has been Submitted !','','success');
                     window.location = "http://metromart.co.in/";
                }
            }
        });
    
});

</script>   



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<?php include 'global/footer.php';?>