<?php include 'global/header.php';?>
<style>
   .content-top-breadcumproduct {
   background: #000 url(<?php echo base_url('assets');?>/img/PRODUCT-DETAILS.jpg)repeat scroll 0 0;
   margin: 0px 0 30px;
   height: 156px;
   overflow: hidden;
   background-size: 100% 100%;
   background-repeat: no-repeat;
   }  
</style>
<div class="content-top-breadcumproduct">
</div>
<?php if($product){?>
<div id="product-product" class="container product">
   <ul class="breadcrumb">
      <li><a href=""><i class="fa fa-home"></i></a></li>
      <li><a href=""><?php echo $product['product_name'];?></a></li>
   </ul>
   <div class="row">
      <div id="content" class="productpage col-sm-12">
         <div class="row">
            <div class="col-sm-6 col-md-5 left">
               <div class="thumbnails">
                  <div class="image"><a class="thumbnail" href="<?php echo base_url('uploads/')?>product/<?php echo $product['image'];?>" title="<?php echo $product['product_name'];?>"><img id="zoom" src="<?php echo base_url('uploads/')?>product/<?php echo $product['image'];?>" data-zoom-image="<?php echo base_url('uploads/')?>product/<?php echo $product['image'];?>" title="<?php echo $product['product_name'];?>" alt="<?php echo $product['product_name'];?>" /></a></div>
                  <div class="product-additional-block swiper-viewport">
                     <!--<div class="image-additional">
                        <div class="item">
                           <div class="product-thumb"> <a href="<?php //echo base_url('uploads/')?>product/<?php //echo $product['image'];?>" title="<?php //echo $product['product_name'];?>" class="elevatezoom-gallery" data-image="<?php //echo base_url('uploads/')?>product/<?php //echo $product['image'];?>" data-zoom-image="<?php //echo base_url('uploads/')?>product/<?php //echo $product['image'];?>"><img src="<?php //echo base_url('uploads/')?>product/<?php //echo $product['image'];?>" width="126" height="151" title="<?php //echo $product['product_name'];?>" alt="<?php //echo $product['product_name'];?>" /></a> </div>
                        </div>
                        <div class="item">
                           <div class="product-thumb"> <a href="<?php //echo base_url('uploads/')?>product/<?php //echo $product['image'];?>" title="<?php //echo $product['product_name'];?>" class="elevatezoom-gallery" data-image="<?php //echo base_url('uploads/')?>product/<?php //echo $product['image'];?>" data-zoom-image="<?php //echo base_url('uploads/')?>product/<?php// echo $product['image'];?>"><img src="<?php //echo base_url('uploads/')?>product/<?php //echo $product['image'];?>" width="126" height="151" title="<?php //echo $product['product_name'];?>" alt="<?php //echo $product['product_name'];?>" /></a> </div>
                        </div>
                        <div class="item">
                           <div class="product-thumb"> <a href="<?php //echo base_url('uploads/')?>product/<?php //echo $product['image'];?>" title="<?php //echo $product['product_name'];?>" class="elevatezoom-gallery" data-image="<?php //echo base_url('uploads/')?>product/<?php //echo $product['image'];?>" data-zoom-image="<?php //echo base_url('uploads/')?>product/<?php //echo $product['image'];?>"><img src="<?php //echo base_url('uploads/')?>product/<?php //echo $product['image'];?>" width="126" height="151" title="<?php //echo $product['product_name'];?>" alt="<?php //echo $product['product_name'];?>" /></a> </div>
                        </div>
                     </div>-->
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-md-7 right">
               <h1><?php echo $product['product_name'];?></h1>
               <h2 class="product-title"><?php echo $product['product_name'];?></h2>
               <ul class="list-unstyled price">
                  <li>
                     <h2 class="product-price"><span class="price-old-live"><?php echo $product['mrp'];?></span></h2>
                  </li>
               </ul>
               <div class="rating">
                  <p>              <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x blank"></i></span>                             <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x blank"></i></span>                             <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x blank"></i></span>                             <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x blank"></i></span>                             <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x blank"></i></span>                <a class="ratings-link" href="#" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">0 reviews</a> </p>
               </div>
               <ul class="list-unstyled detail">
                  <li class="manufacturer">
                     <div class="label">Brand:</div>
                     <a href=""><?php echo $product['brand'];?></a>
                  </li>
                  <li class="model">
                     <div class="label">Product Code: </div>
                     <?php echo $product['id'];?>
                  </li>
                  <li class="stock">
                     Notify me
                  </li>
                  <!--<li class="quantity">
                     <div class="label">Quantity: </div>
                     0</li>-->
               </ul>
               <ul class="list-unstyled price2">
                  <li class="tax">Ex Tax:<span> <span class="price-tax-live">₹10</span></span></li>
               </ul>
               <div id="product">
                  <div class="form-group required ">
                     <label class="control-label">Packet Size</label>
                     <div id="input-option237">
                        <div class="radio">
                           <label>
                           <input type="radio" name="option[237]" value="40" />
                           1kg
                           <span class="pull-right">₹25</span>
                           </label>
                        </div>
                        <div class="radio">
                           <label>
                           <input type="radio" name="option[237]" value="41" />
                           5kg
                           <span class="pull-right">₹40</span>
                           </label>
                        </div>
                        <div class="radio">
                           <label>
                           <input type="radio" name="option[237]" value="42" />
                           10kg
                           <span class="pull-right">₹95</span>
                           </label>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label" for="input-quantity">Qty</label>
                     <input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control" />
                     <input type="hidden" name="product_id" value="40" />
                     <button type="button" id="button-cart" data-loading-text="Loading..." class="btn btn-primary btn-lg btn-block addtocart">Add</button>
                     <div class="btn-group">
                        <button type="button" data-toggle="tooltip" class="btn btn-default wishlist" title="Wish List" onclick="wishlist.add('40');"><i class="fa fa-heart"></i>Wish List</button>
                        <button type="button" data-toggle="tooltip" class="btn btn-default compare" title="Compare" onclick="compare.add('40');"><i class="fa fa-exchange"></i>Compare</button>
                     </div>
                  </div>
               </div>
               <!-- Go to www.addthis.com/dashboard to customize your tools -->
               <div class="addthis_inline_share_toolbox"></div>
            </div>
         </div>
         <div class="col-sm-12 producttab">
            <ul class="nav nav-tabs">
               <li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>
               <li><a href="#tab-review" data-toggle="tab">Reviews (0)</a></li>
            </ul>
            <div class="tab-content">
               <div class="tab-pane active" id="tab-description">
                  <p>freshly picked for you directly from our farmer.</p>
                  <p>Store them in a cool, dry place away from direct sunlight.</p>
                  <p class="intro"><br></p>
                  <p><br></p>
                  <p class="intro"><br></p>
               </div>
               <div class="tab-pane" id="tab-review">
                  <form class="form-horizontal" id="form-review">
                     <div id="review"></div>
                     <h2>Write a review</h2>
                     Please <a href="">login</a> or <a href="">register</a> to review
                  </form>
               </div>
            </div>
         </div>
         <div class="section related wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
            <div class="section-heading">Related Products</div>
            <div class="section-block">
               <div class="section-product  grid ">
                  <div class=" product-items col-xs-4 col-sm-4 col-md-3 col-lg-3">
                     <div class="product-thumb transition">
                        <div class="image">
                           <div class="first_image"> <a href=""> <img src="<?php echo base_url('assets/')?>image/cache/catalog/008-222x222.jpg" alt="Banana" title="Banana" class="img-responsive" /> </a> </div>
                           <div class="swap_image"> <a href=""> <img src="<?php echo base_url('assets/')?>image/cache/catalog/006-222x222.jpg" alt="Banana" title="Banana" class="img-responsive" /> </a></div>
                        </div>
                        <div class="product-details">
                           <div class="caption">
                              <h4><a href="">Banana</a></h4>
                              <p class="price">
                                 ₹110
                                 <span class="price-tax">Ex Tax: ₹100</span>
                              </p>
                              <div id="product-28" class="product_option">
                                 <div class="form-group required ">
                                    <select name="option[230]" id="input-option230" class="form-control">
                                       <option value=""> --- Please Select --- </option>
                                       <option value="23">1kg
                                          (+₹11)
                                       </option>
                                       <option value="24">5kg
                                          (+₹55)
                                       </option>
                                       <option value="25">10kg
                                          (+₹110)
                                       </option>
                                    </select>
                                 </div>
                                 <div class="input-group col-xs-12 col-sm-12 button-group">
                                    <label class="control-label col-sm-2 col-xs-2">Qty</label>
                                    <input type="number" name="quantity" min="1" value="1" size="1" step="1" id="input-quantity28" class="qty form-control col-sm-2 col-xs-9" />
                                    <input type="hidden" name="product_id" value="28" />
                                    <button type="button" class="addtocart col-sm-4 pull-right" id="add-cart-28" onclick="var xqty='input-quantity28';
                                       var aqty = parseInt(document.getElementById(xqty).value); addtoCart(28,aqty);">Add</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class=" product-items col-xs-4 col-sm-4 col-md-3 col-lg-3">
                     <div class="product-thumb transition">
                        <p class="tag">11<br/> % <br/> <i>off</i></p>
                        <div class="image">
                           <div class="first_image"> <a href="#"> <img src="<?php echo base_url('assets/')?>image/cache/catalog/006-222x222.jpg" alt="Apple" title="Apple" class="img-responsive" /> </a> </div>
                           <div class="swap_image"> <a href="#"> <img src="<?php echo base_url('assets/')?>image/cache/catalog/009-222x222.jpg" alt="Apple" title="Apple" class="img-responsive" /> </a></div>
                           <div class="saleback"> <span class="sale">sale</span> </div>
                        </div>
                        <div class="product-details">
                           <div class="caption">
                              <h4><a href="">Apple</a></h4>
                              <p class="price">
                                 <span class="price-new">₹80</span> <span class="price-old">₹90</span>
                                 <span class="price-tax">Ex Tax: ₹80</span>
                              </p>
                              <div id="product-42" class="product_option">
                                 <div class="form-group">
                                    <select name="option[228]" id="input-option228" class="form-control">
                                       <option value=""> --- Please Select --- </option>
                                       <option value="20">250gm
                                          (-₹60)
                                       </option>
                                       <option value="19">1kg
                                       </option>
                                       <option value="22">5kg
                                          (+₹320)
                                       </option>
                                    </select>
                                 </div>
                                 <div class="input-group col-xs-12 col-sm-12 button-group">
                                    <label class="control-label col-sm-2 col-xs-2">Qty</label>
                                    <input type="number" name="quantity" min="1" value="1" size="1" step="1" id="input-quantity42" class="qty form-control col-sm-2 col-xs-9" />
                                    <input type="hidden" name="product_id" value="42" />
                                    <button type="button" class="addtocart col-sm-4 pull-right" id="add-cart-42" onclick="var xqty='input-quantity42';
                                       var aqty = parseInt(document.getElementById(xqty).value); addtoCart(42,aqty);">Add</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="prodbottominfo">
         <ul class="list-unstyled">
            <li data-toggle="tooltip" title="Worldwide Shipping">
               <img src="<?php echo base_url('assets/')?>image/catalog/world.png" alt=""> 
            </li>
            <li data-toggle="tooltip" title="100% Original Product">
               <img src="<?php echo base_url('assets/')?>image/catalog/original.png" alt=""> 
            </li>
            <li data-toggle="tooltip" title="Best Price Guaranteed">
               <img src="<?php echo base_url('assets/')?>image/catalog/inquire.png" alt=""> 
            </li>
            <li title="COD Available in India" data-toggle="tooltip">
               <img src="<?php echo base_url('assets/')?>image/catalog/cod.png" alt=""> 
            </li>
         </ul>
      </div>
      <script>
         $(document).ready(function(){
         
         $('.testimonial').owlCarousel({
             items: 1,
             autoPlay: true,
             singleItem: true,
             navigation: false,
             pagination: false
         });
         });
      </script>
   </div>
</div>
<?php
}
?>
<script><!--
   $('select[name=\'recurring_id\'], input[name="quantity"]').change(function(){
    $.ajax({
      url: 'index.php?route=product/product/getRecurringDescription',
      type: 'post',
      data: $('input[name=\'product_id\'], input[name=\'quantity\'], select[name=\'recurring_id\']'),
      dataType: 'json',
      beforeSend: function() {
        $('#recurring-description').html('');
      },
      success: function(json) {
        $('.alert-dismissible, .text-danger').remove();
   
        if (json['success']) {
          $('#recurring-description').html(json['success']);
        }
      }
    });
   });
   //-->
</script>
<script><!--
   $('#button-cart').on('click', function() {
    $.ajax({
      url: 'index.php?route=checkout/cart/add',
      type: 'post',
      data: $('#product input[type=\'text\'], #product input[type=\'hidden\'], #product input[type=\'radio\']:checked, #product input[type=\'checkbox\']:checked, #product select, #product textarea'),
      dataType: 'json',
      beforeSend: function() {
        $('#button-cart').button('loading');
      },
      complete: function() {
        $('#button-cart').button('reset');
      },
      success: function(json) {
        $('.alert-dismissible, .text-danger').remove();
        $('.form-group').removeClass('has-error');
   
        if (json['error']) {
          if (json['error']['option']) {
            for (i in json['error']['option']) {
              var element = $('#input-option' + i.replace('_', '-'));
   
              if (element.parent().hasClass('input-group')) {
                element.parent().after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
              } else {
                element.after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
              }
            }
          }
   
          if (json['error']['recurring']) {
            $('select[name=\'recurring_id\']').after('<div class="text-danger">' + json['error']['recurring'] + '</div>');
          }
   
          // Highlight any found errors
          $('.text-danger').parent().addClass('has-error');
        }
   
        if (json['success']) {
          $('.breadcrumb').after('<div class="alert alert-success alert-dismissible">' + json['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
   
           $('#cart > .btn').addClass('active');
           $('#cart > .btn').html('<span class="cart-text">My basket</span><span class="cart-total">Item ' + json['total'] + '</span><span class="cart-total-res">' + json['total'] +'</span>');
   
   
           $('html, body').animate({ scrollTop: 0 }, 'slow');
   
          $('#cart > ul').load('index1e1c.html?route=common/cart/info%20ul%20li');
        }
      },
           error: function(xhr, ajaxOptions, thrownError) {
               alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
           }
    });
   });
   //-->
</script>
<script><!--
   $('.date').datetimepicker({
    language: 'en-gb',
    pickTime: false
   });
   
   $('.datetime').datetimepicker({
    language: 'en-gb',
    pickDate: true,
    pickTime: true
   });
   
   $('.time').datetimepicker({
    language: 'en-gb',
    pickDate: false
   });
   
   $('button[id^=\'button-upload\']').on('click', function() {
    var node = this;
   
    $('#form-upload').remove();
   
    $('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" /></form>');
   
    $('#form-upload input[name=\'file\']').trigger('click');
   
    if (typeof timer != 'undefined') {
        clearInterval(timer);
    }
   
    timer = setInterval(function() {
      if ($('#form-upload input[name=\'file\']').val() != '') {
        clearInterval(timer);
   
        $.ajax({
          url: 'index.php?route=tool/upload',
          type: 'post',
          dataType: 'json',
          data: new FormData($('#form-upload')[0]),
          cache: false,
          contentType: false,
          processData: false,
          beforeSend: function() {
            $(node).button('loading');
          },
          complete: function() {
            $(node).button('reset');
          },
          success: function(json) {
            $('.text-danger').remove();
   
            if (json['error']) {
              $(node).parent().find('input').after('<div class="text-danger">' + json['error'] + '</div>');
            }
   
            if (json['success']) {
              alert(json['success']);
   
              $(node).parent().find('input').val(json['code']);
            }
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
          }
        });
      }
    }, 500);
   });
   //-->
</script>
<script><!--
   $('#review').delegate('.pagination a', 'click', function(e) {
       e.preventDefault();
   
       $('#review').fadeOut('slow');
   
       $('#review').load(this.href);
   
       $('#review').fadeIn('slow');
   });
   
   $('#review').load('index0845.html?route=product/product/review&amp;product_id=40');
   
   $('#button-review').on('click', function() {
    $.ajax({
      url: 'index.php?route=product/product/write&product_id=40',
      type: 'post',
      dataType: 'json',
      data: $("#form-review").serialize(),
      beforeSend: function() {
        $('#button-review').button('loading');
      },
      complete: function() {
        $('#button-review').button('reset');
      },
      success: function(json) {
        $('.alert-dismissible').remove();
   
        if (json['error']) {
          $('#review').after('<div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');
        }
   
        if (json['success']) {
          $('#review').after('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');
   
          $('input[name=\'name\']').val('');
          $('textarea[name=\'text\']').val('');
          $('input[name=\'rating\']:checked').prop('checked', false);
        }
      }
    });
   });
   
   $(document).ready(function() {
   if ($(window).width() > 767) {
      $("#zoom").elevateZoom({
   
          gallery:'product-additional-block',
          //inner zoom
          zoomType : "window",
          cursor: "crosshair"
        });
      var z_index = 0;
   
                      $(document).on('click', '.thumbnail', function () {
                        $('.thumbnails').magnificPopup('open', z_index);
                        return false;
                      });
   
                      $('.product-additional-block a').on('mouseover', function() {
                        var smallImage = $(this).attr('data-image');
                        var largeImage = $(this).attr('data-zoom-image');
                        var ez =   $('#zoom').data('elevateZoom');
                        $('.thumbnail').attr('href', largeImage);
                        ez.swaptheimage(smallImage, largeImage);
                        z_index = $(this).index('.product-additional-block a');
                        return false;
                      });
   
    }else{
      $(document).on('click', '.thumbnail', function () {
      $('.thumbnails').magnificPopup('open', 0);
      return false;
      });
    }
   });
   $(document).ready(function() {
    $('.thumbnails').magnificPopup({
      delegate: 'a.elevatezoom-gallery',
      type: 'image',
      tLoading: 'Loading image #%curr%...',
      mainClass: 'mfp-with-zoom',
      gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
      },
      image: {
        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
        titleSrc: function(item) {
          return item.el.attr('title');
        }
      }
    });
   
      $('.image-additional').owlCarousel({
   
       items: 4,
   
       navigation: true,
   
       pagination: false,
   
       itemsDesktop : [1199, 3],
   
       itemsDesktopSmall : [991, 3],
   
       itemsTablet : [767, 3],
   
       itemsTabletSmall : [479, 2],
   
       itemsMobile : [319, 1]
   
     });
   
   $('.product-carousel').owlCarousel({
          items: 5,
       autoPlay: false,
       singleItem: false,
       navigation: true,
       pagination: false,
       itemsDesktop : [1199,4],
       itemsDesktopSmall : [991,3],
       itemsTablet : [479,2],
       itemsMobile : [319,1]
    });
   
   
   
   });
   
   //-->
</script>
<?php include 'global/footer.php';?>