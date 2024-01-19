
<?php include 'global/header.php';?>
<style>
   .content-top-breadcumterms {
    background: #000 url(<?php echo base_url('assets');?>/img/OUR_business.jpg)repeat scroll 0 0;
    margin: 0px 0 30px;
    height: 156px;
    overflow: hidden;
    background-size: 100% 100%;
    background-repeat: no-repeat;
}
    
</style>
<div class="content-top-breadcumterms">

</div>





<div id="information-information" class="container">
  <div class="row">
   <?php include 'aside_category.php';?>

  <div id="content" class="col-sm-9">
    
     <h3>Our   Business</h3>
     <?php foreach ($our as $o) {?>
      <h3><?= $o['title'];?></h3>
      <p><?= $o['description'];?></p>
        <?php } ?>
 
</div>
    </div>
</div>

<?php include 'global/footer.php';?>