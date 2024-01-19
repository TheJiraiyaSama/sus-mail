<?php include 'global/header.php';?>

<style>
   .content-top-breadcumculture {
    background: #000 url(<?php echo base_url('assets');?>/img/WORK_CULTURE.jpg)repeat scroll 0 0;
    margin: 0px 0 30px;
    height: 156px;
    overflow: hidden;
    background-size: 100% 100%;
    background-repeat: no-repeat;
}  
    
</style>
<div class="content-top-breadcumculture">
</div>

<div id="information-information" class="container">
  <ul class="breadcrumb">
        <li><a href=""><i class="fa fa-home"></i></a></li>
        <li><a href="">About Us</a></li>
  </ul>
  <div class="row">
   <?php include 'aside_category.php';?>

<div id="content" class="col-sm-9">
      <h1>Work Culture</h1>
      <p> Work Culture</p>
      
</div>
      <?php 
      foreach ($data as $wc){
      ?>
      <h2><?php echo $wc['title'];?></h2>
      <p><?php echo $wc['description'];?></p>
      <?php  } ?>
    </div>
</div>
<?php include 'global/footer.php';?>