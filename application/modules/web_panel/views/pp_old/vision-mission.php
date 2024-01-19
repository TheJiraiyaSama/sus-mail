<?php include 'global/header.php';?>

<style>
      .content-top-breadcumvision {
    background: #000 url(<?php echo base_url('assets');?>/img/Mission-and-vision.jpg)repeat scroll 0 0;
    margin: 0px 0 30px;
    height: 156px;
    overflow: hidden;
    background-size: 100% 100%;
    background-repeat: no-repeat;
}  
   
</style>
<div class="content-top-breadcumvision">
</div>

<div id="information-information" class="container">
  <div class="row">
   <?php include 'aside_category.php';?>

  <div id="content" class="col-sm-9">
    
     <h3>Vision Mission</h3>
      <?php foreach ($vision as $v) {?>  
      <h3><?= $v['title'];?></h3>
      <p><?= $v['description'];?></p>
        <?php } ?>
 
</div>
    </div>
</div>


<?php include 'global/footer.php';?>