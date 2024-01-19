<?php include 'global/header.php';?>
<style>
   .content-top-breadcumcontact {
    background: #000 url(<?php echo base_url('assets');?>/img/contant_us.jpg)repeat scroll 0 0;
    margin: 0px 0 30px;
    height: 156px;
    overflow: hidden;
    background-size: 100% 100%;
    background-repeat: no-repeat;
}
}
    
</style>
<div class="content-top-breadcumcontact">
</div>
<div id="information-contact" class="container">
  <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
  <div class="row">
                <div id="content" class="col-sm-12 contactpage">
      <h1>Contact Us</h1>
      <div id="googleMap" style="width:100%;height:500px;">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.0422633036446!2d80.23451921482335!3d13.096508090774037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5265cc1579885f%3A0xa137c0cb8626e5e2!2s8%2C%206%2C%20Palaniappa%201st%20St%2C%20Venkatesapuram%20Colony%2C%20Ayanavaram%2C%20Chennai%2C%20Tamil%20Nadu%20600023!5e0!3m2!1sen!2sin!4v1592710685877!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>  
        <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
                        <div class="col-sm-3"><h2>Metro Mart</h2><br />
              <address>
           Unit No. 8, Old No.6, Palaniappa Street , Kodambakkam, Chennai, TN 60002
              </address>
                          </div>
            <div class="col-sm-3"><h2>Telephone</h2><br>
              1800 440 3638<br />
              <br />
                          </div>
            <div class="col-sm-3">
                
                <h2>Email ID</h2><br>
              care@metromart.co.in<br />
              <br />
                
                                        </div>
          </div>
        </div>
      </div>
        <div  class="form-horizontal">
        <fieldset>
          <legend>Contact Form</legend>
        
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name">Full Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" value="" id="name" class="form-control" placeholder="enter your name..">
             </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-email">E-Mail ID</label>
            <div class="col-sm-10">
                <input type="text" name="email" value="" id="email" class="form-control" placeholder="enter your email id..">
            </div>
          </div>
         
         <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-email">Mobile No.</label>
            <div class="col-sm-10">
                <input type="text" name="phone" value="" id="phone" class="form-control" placeholder="enter your mobile number..">
            </div>
         </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-enquiry">Message</label>
            <div class="col-sm-10">
              <textarea name="message" id="message" rows="10"  class="form-control"></textarea>
            </div>
          </div>
        </fieldset>
        <div class="buttons">
          <div class="pull-right">
            <input class="btn btn-primary" type="submit" id="submit_contact" value="Submit" />
          </div>
        </div>
      </div>
      </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $('#submit_contact').click(function () {
    var name = $('#name').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var message = $('#message').val();
    if(name=='' || email=='' || message==''|| phone==''){
        Swal.fire('Please Fill Required Details','','warning');
        return false;
    }
       $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: '<?php echo site_url('web_panel/Contact_us/index'); ?>',
            data: {name:name,email:email,phone:phone,message:message},
            success: function (data) {
                Swal.fire(
  'Metro Mart !',
  'You have Successfully Submitted!',
  'success'
);
 window.location = "http://metromart.co.in/";

            }
        });
    
})

</script>   

<?php include 'global/footer.php';?>