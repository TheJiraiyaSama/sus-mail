<?php 
//echo "<pre>"; print_r($subcat); echo "<pre>";die;
include 'global/header.php';?>
<style>
    .content-top-breadcumcategory {
    background: #000 url(<?php echo base_url('assets');?>/img/CATEGORY.jpg)repeat scroll 0 0;
    margin: 0px 0 30px;
    height: 156px;
    overflow: hidden;
    background-size: 100% 100%;
    background-repeat: no-repeat;
}  
     
</style>
<div class="content-top-breadcumcategory">

</div>

<div id="product-category" class="container category">
  <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Grocery &amp; Staples</a></li>
      </ul>
  <div class="row">
      
      <aside id="column-left" class="col-sm-3 hidden-xs">
    <div class="sidebar section sidebar_category">
<div class="section-heading"><div class="border"></div>Categories</div>   
  <div class="section-block category_block">    
      <ul class="left-category treeview-list treeview">
          
             <?php foreach($cat as $ct) { ?>
          
                 <li class="expandable">
                 <a href="<?php echo base_url().'index.php/web_panel/Category?ct='.$ct['id'];?>"><?php echo $ct['title']; ?></a>
                       
                  <ul class="menu-dropdown">
                     
                      <?php 
                      foreach($subcat as $sct) { 
                        if($sct['master_services_id']==$ct['id']){
                      ?>
                                
                   <li>
                     <a href="<?php echo base_url().'index.php/web_panel/Category?ct='.$ct['id'].'&sct='.$sct['id'];?>"><?php echo $sct['title']; ?></a>
                                
                  <ul class="menu-dropdown">
                             
                    <?php foreach($subsubcat as $ssct) { 
                      if($ssct['master_menu_id']==$ct['id'] && $ssct['master_sub_menu_id']==$sct['id']){
                    ?>
                    <li>
                       <a href="<?php echo base_url().'index.php/web_panel/Category?ct='.$ct['id'].'&sct='.$sct['id'].'&ssct='.$ssct['id'];?>"><?php echo $ssct['title']; ?></a>
                     </li>
               
                   <?php } } ?>
                  
                 </ul>
                    </li>
     
                  <?php
                }

                } 
                  ?>
     
                     </ul>
                     
                     
            </li>
           
          <?php  } ?>
            
         
           
            
         
        </ul>
  </div>
</div>

  </aside>
  
                <div id="content" class="col-sm-9">
      <h1>Grocery &amp; Staples</h1>
            <div class="row category_thumb">         <div class="col-sm-2"><img src="<?php echo base_url('assets/');?>image/cache/catalog/13-281x391.jpg" alt="Grocery &amp; Staples" title="Grocery &amp; Staples" class="img-thumbnail" /></div>
                </div>
      
                 <div class="subcateory">   
    <h3>Refine Search</h3>
            <div class="row">
        <div class="col-sm-3">
          <ul>
                        <li><a href="">Daal &amp; Pulses</a></li>
                        <li><a href="">Dry Fruits &amp; Nuts</a></li>
                        <li><a href="">Edible Oils</a></li>
                        <li><a href="">Riced cauliflower</a></li>
                      </ul>
        </div>
      </div>
            </div>
          
            
      <div class="filter-product">
        <div class="btn-grid-list">
          <div class="btn-group btn-group-sm">
            <button type="button" id="filter-view" class="btn btn-default filter collapsed" data-target="#ajaxfilter" data-toggle="collapse" title="Refine Search"><i class="fa fa-th-list"></i></button>
            <button type="button" id="grid-view" class="btn btn-default grid" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
            <button type="button" id="list-view" class="btn btn-default list" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
            
          </div>
        </div>
        <div class="compare-total"><a href="" id="compare-total">Product Compare (0)</a></div>
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
      <div class="products-collection">
      <div class="row product-layoutrow"> 

<?php  foreach($product as $pt) {?>

        <div class="product-layout product-list col-xs-12">
          <div class="product-thumb">
            <div class="image">
             <a href="<?php echo base_url().'index.php/web_panel/product/product/'.$pt['id'];?>"><img src="<?php echo base_url('uploads/product/'.$pt['image']); ?>" alt="Clasic cioclato" title="Clasic cioclato" class="img-responsive" /></a>
                                         
                    </div>

            <div class="product-details">
              <div class="caption">
                 
                 <h4><a href=""><?php echo substr($pt['product_name'],0,15)?></a></h4>    
              
                                <p class="price">                  ₹<?php echo $pt['mrp'];?>
                                     <span class="price-tax">Ex Tax: ₹80</span>  </p>
                                  
                <p class="desc"><?php echo $pt['description'];?></p>
                            
    <div id="product-31" class="product_option">   
            
                   
                        <div class="form-group required ">              
              <label class="control-label">Packet Size</label>
              <select name="option[233]" id="input-option233" class="form-control">
                <option value=""> --- Please Select --- </option>
                                <option value="30"> ₹<?php echo $pt['mrp'];?>
                 </option>
                
                              </select>
            </div>
                                                                                                                                                
           <div class="input-group col-xs-12 col-sm-12 button-group"> 
             
              <label class="control-label col-sm-2 col-xs-2">Qty</label>
              
              <input type="number" name="quantity" min="1" value="1" size="1" step="1" id="input-quantity31" class="qty form-control col-sm-2 col-xs-9" />
              <input type="hidden" name="product_id" value="31" />
              <button type="button" class="addtocart" id="add-cart-31" onclick="var xqty='input-quantity31';
              var aqty = parseInt(document.getElementById(xqty).value); addtoCart(31,aqty);">Add</button>
              <button type="button" class="compare pull-right"  onclick="compare.add('31');">
            <i class="fa fa-exchange"></i></button>
            <button type="button" class="wishlist pull-right" onclick="wishlist.add('31');"><i class="fa fa-heart"></i> </button>
            <a class="quickview pull-right" href=""><i class="fa fa-eye"></i></a>
            </div>
           
            </div>

      
                </div>
            </div>
          </div>
        
        
</div>
  <?php  } ?>      
   


   
         </div>
      <div class="row">
        <div class="col-sm-6 text-left"></div>
        <div class="col-sm-6 text-right">Showing 1 to 6 of 6 (1 Pages)</div>
      </div>
            </div>
            </div>
    </div>
</div>
<?php include 'global/footer.php';?>

