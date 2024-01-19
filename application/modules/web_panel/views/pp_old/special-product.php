
<?php include 'global/header.php';?>
<style>
   .content-top-breadcumspecial {
    background: #000 url(<?php echo base_url('assets');?>/img/category-banner.jpg)repeat scroll 0 0;
    margin: 0px 0 30px;
    height: 156px;
    overflow: hidden;
}
    
</style>
<div class="content-top-breadcumspecial">

</div>

<div id="product-search" class="container">
  <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Special Offers</a></li>
      </ul>
  <div class="row">
      <?php include 'aside_category.php';?>

   <div id="content" class="col-sm-9">
      <h1>Special Offers</h1>
           <div class="filter-product">
        <div class="btn-grid-list">
          <div class="btn-group btn-group-sm">
            <button type="button" id="grid-view" class="btn btn-default grid" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
            <button type="button" id="list-view" class="btn btn-default list" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
          </div>
        </div>
        <div class="compare-total"><a href="#" id="compare-total">Product Compare (0)</a></div>
        <div class="filter-product-right text-right">
          <div class="sort-filter">
            <div class="col-xs-4 col-sm-4 col-md-4 text-right">
              <label class="control-label" for="input-sort">Sort By:</label>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 text-right">
              <select id="input-sort" class="form-control" onchange="location = this.value;">
                                              <option value="" selected="selected">Default</option>
                                                            <option value="">Name (A - Z)</option>
                                                            <option value="">Name (Z - A)</option>
                                                            <option value="">Price (Low &gt; High)</option>
                                                            <option value="">Price (High &gt; Low)</option>
                                                            <option value="">Rating (Highest)</option>
                                                            <option value="">Rating (Lowest)</option>
                                                            <option value="">Model (A - Z)</option>
                                                            <option value="">Model (Z - A)</option>
                                            </select>
            </div>
          </div>
          <div class="show-filter">
            <div class="col-xs-6 col-sm-6 col-md-6 text-right">
              <label class="control-label" for="input-limit">Show:</label>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 text-right">
              <select id="input-limit" class="form-control" onchange="location = this.value;">
                                              <option value="" selected="selected">12</option>
                                                           <option value="">25</option>
                                                            <option value="">50</option>
                                                            <option value="">75</option>
                                                            <option value="">100</option>
                                            </select>
            </div>
          </div>
        </div>
      </div>
      <div class="row product-layoutrow">        
        <div class="product-layout product-list col-xs-12">
          <div class="product-thumb">
            <div class="image">
                         <p class="tag">11<br/> % <br/> <i>off</i></p>
                        
           
            <a href=""><img src="<?php echo base_url('assets/')?>image/cache/catalog/006-300x300.jpg" alt="Apple" title="Apple" class="img-responsive" /></a>
                                 <div class="saleback"> <span class="sale">sale</span> </div>
                            
                    </div>

            <div class="product-details">
              <div class="caption">
                 
                 <h4><a href="">Apple</a></h4>    
              
                                <p class="price">  <span class="price-new">₹80</span> <span class="price-old">₹90</span>                    <span class="price-tax">Ex Tax: ₹80</span>  </p>
                                  
                <p class="desc">freshly picked for you directly from our farmer.Store them in a cool, dry place away from direct sunlight...</p>
                            
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
              <button type="button" class="addtocart" id="add-cart-42" onclick="var xqty='input-quantity42';
              var aqty = parseInt(document.getElementById(xqty).value); addtoCart(42,aqty);">Add</button>
              <button type="button" class="compare pull-right"  onclick="compare.add('42');">
            <i class="fa fa-exchange"></i></button>
            <button type="button" class="wishlist pull-right" onclick="wishlist.add('42');"><i class="fa fa-heart"></i> </button>
            <a class="quickview pull-right" href="#"><i class="fa fa-eye"></i></a>
            </div>
           
            </div>

      
                </div>
            </div>
          </div>
        
        
</div>
               
        <div class="product-layout product-list col-xs-12">
          <div class="product-thumb">
            <div class="image">
                         <p class="tag">20<br/> % <br/> <i>off</i></p>
                        
           
            <a href=""><img src="<?php echo base_url('assets/')?>image/cache/catalog/003-300x300.jpg" alt="Strawberry" title="Strawberry" class="img-responsive" /></a>
                                 <div class="saleback"> <span class="sale">sale</span> </div>
                            
                    </div>

            <div class="product-details">
              <div class="caption">
                 
                 <h4><a href="">Strawberry</a></h4>    
              
                                <p class="price">  <span class="price-new">₹88</span> <span class="price-old">₹110</span>                    <span class="price-tax">Ex Tax: ₹80</span>  </p>
                                  
                <p class="desc">freshly picked for you directly from our farmer.Store them in a cool, dry place away from direct sunlight...</p>
                            
    <div id="product-30" class="product_option">   
            
                                <div class="form-group required ">              
              <select name="option[229]" id="input-option229" class="form-control">
                <option value=""> --- Please Select --- </option>
                                <option value="21">10kg
                                (+₹110)
                 </option>
                              </select>
            </div>
                                                                                                                                                
           <div class="input-group col-xs-12 col-sm-12 button-group"> 
             
              <label class="control-label col-sm-2 col-xs-2">Qty</label>
              
              <input type="number" name="quantity" min="1" value="1" size="1" step="1" id="input-quantity30" class="qty form-control col-sm-2 col-xs-9" />
              <input type="hidden" name="product_id" value="30" />
              <button type="button" class="addtocart" id="add-cart-30" onclick="var xqty='input-quantity30';
              var aqty = parseInt(document.getElementById(xqty).value); addtoCart(30,aqty);">Add</button>
              <button type="button" class="compare pull-right"  onclick="compare.add('30');">
            <i class="fa fa-exchange"></i></button>
            <button type="button" class="wishlist pull-right" onclick="wishlist.add('30');"><i class="fa fa-heart"></i> </button>
            <a class="quickview pull-right" href="#"><i class="fa fa-eye"></i></a>
            </div>
           
            </div>

      
                </div>
            </div>
          </div>
        
        
</div>
               
        <div class="product-layout product-list col-xs-12">
          <div class="product-thumb">
            <div class="image">
                         <p class="tag">10<br/> % <br/> <i>off</i></p>
                        
           
            <a href=""><img src="<?php echo base_url('assets/')?>image/cache/catalog/010-300x300.jpg" alt="Greps" title="Greps" class="img-responsive" /></a>
                                 <div class="saleback"> <span class="sale">sale</span> </div>
                            
                    </div>

            <div class="product-details">
              <div class="caption">
                 
                 <h4><a href="">Greps</a></h4>    
              
                                <p class="price">  <span class="price-new">₹20</span> <span class="price-old">₹22</span>                    <span class="price-tax">Ex Tax: ₹18</span>  </p>
                                  
                <p class="desc">freshly picked for you directly from our farmer.Store them in a cool, dry place away from direct sunlight...</p>
                            
    <div id="product-48" class="product_option">   
            
                                <div class="form-group">              
              <select name="option[240]" id="input-option240" class="form-control">
                <option value=""> --- Please Select --- </option>
                                <option value="49">5kg
                                (+₹55)
                 </option>
                                <option value="48">10kg
                                (+₹11)
                 </option>
                              </select>
            </div>
                                                                                                                                                
           <div class="input-group col-xs-12 col-sm-12 button-group"> 
             
              <label class="control-label col-sm-2 col-xs-2">Qty</label>
              
              <input type="number" name="quantity" min="1" value="1" size="1" step="1" id="input-quantity48" class="qty form-control col-sm-2 col-xs-9" />
              <input type="hidden" name="product_id" value="48" />
              <button type="button" class="addtocart" id="add-cart-48" onclick="var xqty='input-quantity48';
              var aqty = parseInt(document.getElementById(xqty).value); addtoCart(48,aqty);">Add</button>
              <button type="button" class="compare pull-right"  onclick="compare.add('48');">
            <i class="fa fa-exchange"></i></button>
            <button type="button" class="wishlist pull-right" onclick="wishlist.add('48');"><i class="fa fa-heart"></i> </button>
            <a class="quickview pull-right" href="#"><i class="fa fa-eye"></i></a>
            </div>
           
            </div>

      
                </div>
            </div>
          </div>
        
        
</div>
         </div>
      <div class="row">
        <div class="col-sm-6 text-left"></div>
        <div class="col-sm-6 text-right">Showing 1 to 3 of 3 (1 Pages)</div>
      </div>
            </div>
    </div>
</div>

<?php include 'global/footer.php';?>