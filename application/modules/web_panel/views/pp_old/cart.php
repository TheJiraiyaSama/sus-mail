<?php
  include 'global/header.php';?>
 <style>
   .content-top-breadcumcart {
    background: #000 url(<?php echo base_url('assets');?>/img/CART-min-hyper.jpg)repeat scroll 0 0;
    margin: 0px 0 30px;
    height: 156px;
    overflow: hidden;
    background-size: 100% 100%;
    background-repeat: no-repeat;
}
    
</style>

<div class="content-top-breadcumcart">
</div>
  
  <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $cart_content = $this->cart->contents();
					
						?>
<?php foreach ($cart_content as $items){ ?>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="<?php echo $items['options']['pro_image']?>" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#"><?php echo $items['product_name']?></a></h4>
                                <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                            <form action="<?php echo base_url()?>update-cart-qty" method="post">
                        <input  class="form-control" id="exampleInputEmail1" type="text" name="qty" value="<?php echo $items['qty']?>">
                        <input  type="hidden" name="rowid" value="<?php echo $items['rowid']?>">


                        <form>
                        </td>
                        
                        <td class="col-sm-1 col-md-1 text-center"><strong>Rs.<?php echo $items['selling_price']?></strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>Rs.<?php echo $items['subtotal']?></strong></td>
                        <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </button></td>
                    </tr>
               <?php } ?>
                    <tr>
                        <?php 
								$cart_total = $this->cart->total();
							?>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>₹<?php echo $cart_total;?></strong></h5></td>
                    </tr>
                    <tr>
                        <?php
								$tax = ($cart_total*2)/100;
							?>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>₹<?php echo $tax?></strong></h5></td>
                    </tr>
                      <tr>
                      <?php
								$shiping = "0";
								if($cart_total>0 && $cart_total<49){
									$shiping = 0;
								}elseif($cart_total>50 && $cart_total<98){
									$shiping = 2;
								}elseif($cart_total>99 && $cart_total<198){
									$shiping = 5;
								}elseif($cart_total>199){
									$shiping = 10;
								}elseif($cart_total<0){
									$shiping = 0;
								}
							?>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>shipping Cost</h5></td>
                        <td class="text-right"><h5><strong>₹<?php echo $shiping?></strong></h5></td>
                    </tr>
                    <tr>
                        <?php $g_total = $cart_total+$tax+$shiping;?>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong><?php
									$gdata = array();
									$gdata['g_total'] = $g_total;
									$this->session->set_userdata($gdata);
							 		echo "₹$g_total";
							 	?></strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <a href="<?php echo base_url();?>index.php" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                       </a>
                        
                        
                        </td>
                        <td>
                            
                            <a href="<?php echo base_url();?>index.php/web_panel/Checkout/billing" class="btn btn-success" role="button">Procced to Checkout</a>
                       </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
  <?php
  include 'global/footer.php';?>