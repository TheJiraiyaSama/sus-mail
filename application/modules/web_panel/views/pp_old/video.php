<?php include 'global/header.php';?>

<style>
 
    
    .content-top-breadcumvideo {
    background: #000 url(<?php echo base_url('assets');?>/img/video.jpg)repeat scroll 0 0;
    margin: 0px 0 30px;
    height: 156px;
    overflow: hidden;
    background-size: 100% 100%;
    background-repeat: no-repeat;
}  
    
.video {
    height: 0;
    position: relative;
    padding-bottom: 56.25%; /* Если видео 16/9, то 9/16*100 = 56.25%. Также и с 4/3 - 3/4*100 = 75% */
}
.video iframe {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
}
</style>
<div class="content-top-breadcumvideo">
</div>


  

    <div class="container">
	<div class="row">
	    
	   <?php foreach($video as $v){?> 
	  <div class="col-sm-4" style="margin-top:25px !important">
            <div class="video">
               <iframe width="704" height="396" src="https://www.youtube.com/embed/<?php echo $v['url'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>     
                 </div>
    	</div>
     
     <?php } ?>
          
     
</div>
</div>
<?php include 'global/footer.php';?>