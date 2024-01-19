<?php include 'global/header.php';?>
<style>
       .content-top-breadcumcareer {
    background: #000 url(<?php echo base_url('assets');?>/img/VACANCIES.jpg
)repeat scroll 0 0;
    margin: 0px 0 30px;
    height: 156px;
    overflow: hidden;
    background-size: 100% 100%;
    background-repeat: no-repeat;
}
    
</style>
<div class="content-top-breadcumcareer">

</div>

<div id="account-voucher" class="container">
  <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Account</a></li>
        <li><a href="#">Apply For Franchise</a></li>
      </ul>
    <div>
    <div id="content" class="col-sm-9">
      <h1>Metro Mart Career</h1>
      <h3>Metro Mart Career</h3>
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
          <label class="col-sm-2 control-label" for="input-from-name"> Date Of Birth.</label>
          <div class="col-sm-10">
              <input type="date" name="dob" value="" id="dob" class="form-control" placeholder="enter your date of birth..">
                      </div>
        </div>
          <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-from-email">Address</label>
          <div class="col-sm-10">
              <input type="text" name="address" value="" id="address" class="form-control" placeholder="enter your address..">
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
    
           <div class="form-group">
          <label class="col-sm-2 control-label" for="input-amount"><span data-toggle="tooltip" title="Value must be between ₹1 and ₹1,000">Job Title</span></label>
          <div class="col-sm-10">
    <select class="form-control" id="job_title" name="job_title">
    <option value="Senior Accounts Executive">Senior Accounts Executive</option>
    <option value="Sr. Talent Acquisition, HR">Sr. Talent Acquisition, HR</option>
    <option value="Front Office Receptionist">Front Office Receptionist</option>
    <option value="HR Executive / HR Recruiter ">HR Executive / HR Recruiter </option>
    <option value="Legal Executive">Legal Executive</option>
    <option value="Store Manager">Store Manager</option>
    <option value="Walk In- Accounts Coordinator">Walk In- Accounts Coordinator</option>
  
  </select>
           </div>
        </div>
          <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-from-email">Resume.</label>
          <div class="col-sm-10">
              <input type="file" name="resume" value="" id="resume" class="form-control" placeholder="enter your resume..">
          </div>
        </div>
        <div class="buttons clearfix">
          <div class="pull-right"> 
                      
            <input type="submit" value="Submit" id="apply_career" class="btn btn-primary">
          </div>
        </div>
      </div>
      </div>
   <?php include 'aside_right.php';?>
</div>
</div>
<script>
    $('#apply_career').click(function () {
    var name = $('#name').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var dob = $('#dob').val();
    var address = $('#address').val();
    var state = $('#state').val();
    var city = $('#city').val();
    var resume = $('#resume').val();
    var job_title = $('#job_title').val();
    if(name=='' || email=='' || phone==''|| state=='' || city=='' ){
        Swal.fire('Please Fill Required Details','','warning');
        return false;
    }
    $.ajax({
            type: 'POST',
           // dataType: 'JSON',
             url: '<?php echo site_url('web_panel/Career/index'); ?>',
             data: {name:name,email:email,phone:phone,state:state,city:city,dob:dob,resume:resume,job_title:job_title,address:address},
            success: function (data) {
            if(data.status == true){
                   
                    Swal.fire('Thank You For Metro Mart Career !','','success'); 
                     window.location = "http://metromart.co.in/";
                }else{
                   
                    Swal.fire('Thank You For Metro Mart Career !','','success');
                     window.location = "http://metromart.co.in/";
                }
            }
        });
    
});

</script>   



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<?php include 'global/footer.php';?>