<?php
if(!isset($_GET["page"])){
    die('<h1>This page is not fund try  <a href="index.php?page=posts">hire</a></h1>');

}
?>
<script type="text/javascript">
function ChangeUrl(url) {
    if (typeof (history.pushState) != "undefined") {
        var obj = { Title: title, Url: url };
        history.pushState(obj, obj.Url);
    } else {
        alert("Browser does not support HTML5.");
    }
}
</script>
      <div class="section"> 
        <div class="products-in-category-tabs-wrapper container">
          <div class="row">
            <div class="col-md-3">
              <div class="sidebar-product">
                <aside class="categorie">
                  <h4>Product Categories</h4>
                  <ul class="categories">
                      <li><a href="#1b" data-toggle="collapse" data-target="#1b">Search</a></li>
                     <div id="1b" class="collapse"><li ><form method="post" >
                          <input type="text" name="pretrazi" placeholder="Search products"  />
                          
                          <input style="color:black;"type="submit" class="btn" value="Search" name="sub"/>
                          
                          </form></li></div> 
                     
                      <?php
                      
                      echo'<li><a href="?page=posts"><- BACK</a></li>';
                      $query=mysqli_query($con,"SELECT * FROM kategorije");
                      while($r=mysqli_fetch_assoc($query)){
                      $ime=$r['ime'];
                          
                      echo'<li><a href="?page=posts&&category='.$ime.'">'.$ime.'</a></li>';
                      }
                      ?>
                   
                    
                  </ul>
                </aside>
                <aside class="categorie">
                  <h4>Shotcuts</h4>
                  <ul class="categories">
                    <li><a href="?page=home">Home</a></li>
                      <?php 
                      if(isset($_POST["sub"])){
                          $rijec=$_POST["pretrazi"];
                          $rijec1=mysqli_real_escape_string($con,$rijec);
                          if(!empty($rijec1)){
                              $rijec2="%".$rijec1."%";
                          }else{
                              $rijec2="%%";
                          }
                          function nedim(){
                              echo '<li class="active"><a href="#6a" data-toggle="tab">SEARCH RESULT </a></li>
                          <li><a href="#1a" data-toggle="tab">All</a></li>';
                          }
                            
                          
                      
                          
                      
                          function active1(){
                              $active="";
                              echo $active;
                          }
                          function active2(){
                              $active="active";
                              echo $active;
                          }
                          
                          }elseif(!isset($_POST["sub"])){
                          function nedim(){
                              echo '<li class="active"><a href="#1a" data-toggle="tab">All</a></li>';
                              
                          }
                          function active2(){
                              $active="";
                              echo $active;
                          }
                           function active1(){
                              $active="active";
                              echo $active;
                          }
                          
                      }
                          
                          
                      
                          
                          
                         
                      
                      ?>
                      
                    
                    <li><a href="?page=profil">Profil</a></li>
                    <li><a href="?page=favorites">my favorites</a></li>
                    <li><a href="?pahe=contact">Contact Us</a></li>
                  </ul>
                </aside>
               
                <aside class="featured-products">
                  <h4>MOST POPULAR PRODUCTS</h4>
                  <ul>
                    <?php
                      $query=mysqli_query($con,"SELECT * FROM post ORDER BY pregledi DESC LIMIT 3");
                      while($r=mysqli_fetch_assoc($query)){
                          $ime=$r['naslov'];
                          $cijena=$r['cijena'];
                          $thumbnail=$r['thumbnail'];
                          echo'<li><a href="#"><img src="uploadsimage/'.$thumbnail.'" alt="mg-" width="85" height="100"/></a>
                      <p class="mega-right"><span class="product-title">'.$ime.'</span><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">
                            $
                            '.$cijena.'</span></span></p>
                    </li>';
                      }
                      ?>
                    
                  </ul>
                </aside>
              </div>
            </div>
            <div class="col-md-9">
              <div class="products-content product-tab">
                <div class="woocommerce product-listing columns-3 clearfix">
                    
                  <ul class="products-tabs nav nav-pills">
                      <?php 
                     nedim();   
                    
                      ?>
                    
                    <li><a href="#2a" data-toggle="tab">PRICE Low To High</a></li>
                    <li><a href="#3a" data-toggle="tab">PRICE High To Low</a></li>
                    <li><a href="#4a" data-toggle="tab">MOST POPULAR</a></li>
                    <li><a href="#5a" data-toggle="tab">SALE</a></li>
                     
                  </ul>
                  <div class="desc-review-content tab-content clearfix">
                    <!-- pocetak 1A kao ALL--><div id="1a" class="tab-pane <?php active1();?>">
                      <?php
                      
                      if(isset($_GET["category"])){
                          $kategorija=$_GET["category"];
                          $katfull=mysqli_real_escape_string($con,$kategorija);
                          $query=mysqli_query($con,"SELECT * FROM post WHERE kategorija='$katfull'");
                          
                      }elseif(!isset($_GET["category"])){
                          
                      }
                          if(isset($_GET["addtofav"])){
        
        if (isset($_SESSION["user"])!=""){
            $userid=$_SESSION["user"];
            echo $userid;
        $idfav=$_GET["addtofav"];
        $idfav=mysqli_real_escape_string($con,$idfav);
        $query=mysqli_query($con,"INSERT INTO fav (productid,userid) VALUES ('$idfav','$userid')");
            if($query){
                echo'PRODUCT IS IN YOUR FAVORITE';
            }else{
                echo'ERORR';
            }
        }else{
            echo ' YOU MUST LOGIN ';
        }
                          }
   
                      $query=mysqli_query($con,"SELECT * FROM post");
                        while($r=mysqli_fetch_assoc($query)){
                          $naslov=$r['naslov'];
                          $vrsta=$r['vrsta'];
                            $cijena=$r['cijena'];
                            $staracijene=$r['staracijene'];
                            $thumbnail=$r['thumbnail'];
                            $id=$r['id'];
                          if($vrsta=="obicni"){
                              
                              echo'<div class="product-item-wrap has-post-thumbnail">
                        <div class="product-item-inner">
                          <div class="product-thumb">
                            <div class="product-flash-wrap"></div>
                            <div class="product-thumb-primary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="15" title="15" class="attachment-shop_catalog size-shop_catalog wp-post-image"/></div>
                            <div class="product-thumb-secondary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="36" class="attachment-shop_catalog size-shop_catalog"/></div><a href="#" class="product-link">
                              <div class="product-hover-sign">
                                <hr/>
                                <hr/>
                              </div></a>
                            <div class="product-actions">
                              <div class="yith-wcwl-add-to-wishlist add-to-wishlist-224">
                                <div class="yith-wcwl-wishlistexistsbrowse show"><span class="feedback">The product is already in the wishlist!</span><button onclick="ChangeUrl("nanan");">ADD TO FAVORITE</button></div>
                              </div>
                              <div class="woocommerce product compare-button"><a href="#" class="compare button">Compare</a></div>
                              <div class="add-to-cart-wrap"><a href="#" class="add_to_cart_button"><i class="fa fa-cart-plus"></i> Add to cart</a></div><a href="#" class="product-quick-view"><i class="fa fa-search"></i>Quick view</a>
                            </div>
                          </div>
                          <div class="product-info">
                            <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div><span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>'.$cijena.'</span></span><a href="#">
                              <h3>'.$naslov.'</h3></a>
                          </div>
                        </div>
                      </div>';
                      }
                          if($vrsta=="neaktivni"){
                              echo'<div class="product-item-wrap has-post-thumbnail">
                            <div class="product-item-inner">
                              <div class="product-thumb">
                                <div class="product-flash-wrap"><span class="on-sold product-flash">Sold</span></div>
                                <div class="product-thumb-primary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="28" title="28" class="attachment-shop_catalog size-shop_catalog wp-post-image"/></div>
                                <div class="product-thumb-secondary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="36" class="attachment-shop_catalog size-shop_catalog"/></div><a href="#" class="product-link">
                                  <div class="product-hover-sign">
                                    <hr/>
                                    <hr/>
                                  </div></a>
                                <div class="product-actions">
                                  <div class="yith-wcwl-add-to-wishlist add-to-wishlist-189">
                                    <div class="yith-wcwl-add-button show"><a href="#" class="add_to_wishlist"><i class="fa fa-heart-o"></i>    Add to Wishlist</a></div>
                                  </div>
                                  <div class="woocommerce product compare-button"><a href="#" class="compare button">Compare</a></div><a href="#" class="product_type_soldout btn_add_to_cart"><i class="fa fa-shopping-cart"></i></a><a href="#" class="product-quick-view"><i class="fa fa-search"></i>Quick view</a>
                                </div>
                              </div>
                              <div class="product-info">
                                <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div><span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>'.$cijena.'</span></span><a href="#" target="_blank">
                                  <h3>'.$naslov.'</h3></a>
                              </div>
                            </div>
                          </div>';
                          }
                          if($vrsta=="popust"){
                              $staracijena=$r['staracijene'];
                              echo'

 <div class="product-item-wrap has-post-thumbnail">
                            <div class="product-item-inner">
                              <div class="product-thumb">
                                <div class="product-flash-wrap"><span class="on-sale product-flash">8.8%</span><span class="on-sale product-flash">Sale</span></div>
                                <div class="product-thumb-primary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="42" title="42" class="attachment-shop_catalog size-shop_catalog wp-post-image"/></div>
                                <div class="product-thumb-secondary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="47" class="attachment-shop_catalog size-shop_catalog"/></div><a href="#" class="product-link">
                                  <div class="product-hover-sign">
                                    <hr/>
                                    <hr/>
                                  </div></a>
                                <div class="product-actions">
                                  <div class="yith-wcwl-add-to-wishlist add-to-wishlist-384">
                                    <div class="yith-wcwl-add-button show"><a href="#" class="add_to_wishlist"><i class="fa fa-heart-o"></i>    Add to Wishlist</a></div>
                                  </div>
                                  <div class="woocommerce product compare-button"><a href="#" class="compare button">Compare</a></div>
                                  <div class="add-to-cart-wrap"><a rel="nofollow" href="#" class="product_type_external button product_type_external"><i class="fa fa-info"></i> Buy Now</a></div><a href="#" class="product-quick-view"><i class="fa fa-search"></i>Quick view</a>
                                </div>
                              </div>
                              <div class="product-info">
                                <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div><span class="price">
                                  <del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>'.$staracijena.'</span></del><ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>'.$cijena.'</span></ins></span><a href="#" target="_blank">
                                  <h3>'.$naslov.'</h3></a>
                              </div>
                            </div>
                          </div>';
                          }
                          }
                      ?>
                      
                    </div><!--OVO je 1A kao ALL-->
                   <!--Sort by price low to high--> <div id="2a" class="tab-pane">
                      <?php if(isset($_GET["category"])){
                          $kategorija=$_GET["category"];
                          $katfull=mysqli_real_escape_string($con,$kategorija);
                          $query=mysqli_query($con,"SELECT * FROM post WHERE kategorija='$katfull' order by cijena ASC");
                          
                      }elseif(!isset($_GET["category"])){
                          $query=mysqli_query($con,"SELECT * FROM post order by cijena ASC");
                      }
                        while($r=mysqli_fetch_assoc($query)){
                          $naslov=$r['naslov'];
                          $vrsta=$r['vrsta'];
                          if($vrsta=="obicni"){
                              echo'<div class="product-item-wrap has-post-thumbnail">
                        <div class="product-item-inner">
                          <div class="product-thumb">
                            <div class="product-flash-wrap"></div>
                            <div class="product-thumb-primary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="15" title="15" class="attachment-shop_catalog size-shop_catalog wp-post-image"/></div>
                            <div class="product-thumb-secondary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="36" class="attachment-shop_catalog size-shop_catalog"/></div><a href="#" class="product-link">
                              <div class="product-hover-sign">
                                <hr/>
                                <hr/>
                              </div></a>
                            <div class="product-actions">
                              <div class="yith-wcwl-add-to-wishlist add-to-wishlist-224">
                                <div class="yith-wcwl-wishlistexistsbrowse show"><span class="feedback">The product is already in the wishlist!</span><a href="#" rel="nofollow">Browse Wishlist</a></div>
                              </div>
                              <div class="woocommerce product compare-button"><a href="#" class="compare button">Compare</a></div>
                              <div class="add-to-cart-wrap"><a href="#" class="add_to_cart_button"><i class="fa fa-cart-plus"></i> Add to cart</a></div><a href="#" class="product-quick-view"><i class="fa fa-search"></i>Quick view</a>
                            </div>
                          </div>
                          <div class="product-info">
                            <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div><span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>139.00</span></span><a href="#">
                              <h3>'.$naslov.'</h3></a>
                          </div>
                        </div>
                      </div>';
                      }
                          if($vrsta=="neaktivni"){
                              echo'<div class="product-item-wrap has-post-thumbnail">
                            <div class="product-item-inner">
                              <div class="product-thumb">
                                <div class="product-flash-wrap"><span class="on-sold product-flash">Sold</span></div>
                                <div class="product-thumb-primary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="28" title="28" class="attachment-shop_catalog size-shop_catalog wp-post-image"/></div>
                                <div class="product-thumb-secondary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="36" class="attachment-shop_catalog size-shop_catalog"/></div><a href="#" class="product-link">
                                  <div class="product-hover-sign">
                                    <hr/>
                                    <hr/>
                                  </div></a>
                                <div class="product-actions">
                                  <div class="yith-wcwl-add-to-wishlist add-to-wishlist-189">
                                    <div class="yith-wcwl-add-button show"><a href="#" class="add_to_wishlist"><i class="fa fa-heart-o"></i>    Add to Wishlist</a></div>
                                  </div>
                                  <div class="woocommerce product compare-button"><a href="#" class="compare button">Compare</a></div><a href="#" class="product_type_soldout btn_add_to_cart"><i class="fa fa-shopping-cart"></i></a><a href="#" class="product-quick-view"><i class="fa fa-search"></i>Quick view</a>
                                </div>
                              </div>
                              <div class="product-info">
                                <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div><span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>199.00</span></span><a href="#" target="_blank">
                                  <h3>'.$naslov.'</h3></a>
                              </div>
                            </div>
                          </div>';
                          }
                          if($vrsta=="popust"){
                              echo'

 <div class="product-item-wrap has-post-thumbnail">
                            <div class="product-item-inner">
                              <div class="product-thumb">
                                <div class="product-flash-wrap"><span class="on-sale product-flash">8.8%</span><span class="on-sale product-flash">Sale</span></div>
                                <div class="product-thumb-primary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="42" title="42" class="attachment-shop_catalog size-shop_catalog wp-post-image"/></div>
                                <div class="product-thumb-secondary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="47" class="attachment-shop_catalog size-shop_catalog"/></div><a href="#" class="product-link">
                                  <div class="product-hover-sign">
                                    <hr/>
                                    <hr/>
                                  </div></a>
                                <div class="product-actions">
                                  <div class="yith-wcwl-add-to-wishlist add-to-wishlist-384">
                                    <div class="yith-wcwl-add-button show"><a href="#" class="add_to_wishlist"><i class="fa fa-heart-o"></i>    Add to Wishlist</a></div>
                                  </div>
                                  <div class="woocommerce product compare-button"><a href="#" class="compare button">Compare</a></div>
                                  <div class="add-to-cart-wrap"><a rel="nofollow" href="#" class="product_type_external button product_type_external"><i class="fa fa-info"></i> Buy Now</a></div><a href="#" class="product-quick-view"><i class="fa fa-search"></i>Quick view</a>
                                </div>
                              </div>
                              <div class="product-info">
                                <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div><span class="price">
                                  <del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>499.00</span></del><ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>455.00</span></ins></span><a href="#" target="_blank">
                                  <h3>'.$naslov.'</h3></a>
                              </div>
                            </div>
                          </div>';
                          }
                          }
                      
                      ?>
                     
                    </div><!--kraj sort by price-->
                    <!--Sort by price High to low--><div id="3a" class="tab-pane">
                      <?php if(isset($_GET["category"])){
                          $kategorija=$_GET["category"];
                          $katfull=mysqli_real_escape_string($con,$kategorija);
                          $query=mysqli_query($con,"SELECT * FROM post WHERE kategorija='$katfull' order by cijena DESC");
                          
                      }elseif(!isset($_GET["category"])){
                          $query=mysqli_query($con,"SELECT * FROM post order by cijena DESC");
                      }
                        while($r=mysqli_fetch_assoc($query)){
                          $naslov=$r['naslov'];
                          $vrsta=$r['vrsta'];
                          if($vrsta=="obicni"){
                              echo'<div class="product-item-wrap has-post-thumbnail">
                        <div class="product-item-inner">
                          <div class="product-thumb">
                            <div class="product-flash-wrap"></div>
                            <div class="product-thumb-primary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="15" title="15" class="attachment-shop_catalog size-shop_catalog wp-post-image"/></div>
                            <div class="product-thumb-secondary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="36" class="attachment-shop_catalog size-shop_catalog"/></div><a href="#" class="product-link">
                              <div class="product-hover-sign">
                                <hr/>
                                <hr/>
                              </div></a>
                            <div class="product-actions">
                              <div class="yith-wcwl-add-to-wishlist add-to-wishlist-224">
                                <div class="yith-wcwl-wishlistexistsbrowse show"><span class="feedback">The product is already in the wishlist!</span><a href="#" rel="nofollow">Browse Wishlist</a></div>
                              </div>
                              <div class="woocommerce product compare-button"><a href="#" class="compare button">Compare</a></div>
                              <div class="add-to-cart-wrap"><a href="#" class="add_to_cart_button"><i class="fa fa-cart-plus"></i> Add to cart</a></div><a href="#" class="product-quick-view"><i class="fa fa-search"></i>Quick view</a>
                            </div>
                          </div>
                          <div class="product-info">
                            <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div><span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>139.00</span></span><a href="#">
                              <h3>'.$naslov.'</h3></a>
                          </div>
                        </div>
                      </div>';
                      }
                          if($vrsta=="neaktivni"){
                              echo'<div class="product-item-wrap has-post-thumbnail">
                            <div class="product-item-inner">
                              <div class="product-thumb">
                                <div class="product-flash-wrap"><span class="on-sold product-flash">Sold</span></div>
                                <div class="product-thumb-primary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="28" title="28" class="attachment-shop_catalog size-shop_catalog wp-post-image"/></div>
                                <div class="product-thumb-secondary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="36" class="attachment-shop_catalog size-shop_catalog"/></div><a href="#" class="product-link">
                                  <div class="product-hover-sign">
                                    <hr/>
                                    <hr/>
                                  </div></a>
                                <div class="product-actions">
                                  <div class="yith-wcwl-add-to-wishlist add-to-wishlist-189">
                                    <div class="yith-wcwl-add-button show"><a href="#" class="add_to_wishlist"><i class="fa fa-heart-o"></i>    Add to Wishlist</a></div>
                                  </div>
                                  <div class="woocommerce product compare-button"><a href="#" class="compare button">Compare</a></div><a href="#" class="product_type_soldout btn_add_to_cart"><i class="fa fa-shopping-cart"></i></a><a href="#" class="product-quick-view"><i class="fa fa-search"></i>Quick view</a>
                                </div>
                              </div>
                              <div class="product-info">
                                <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div><span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>199.00</span></span><a href="#" target="_blank">
                                  <h3>'.$naslov.'</h3></a>
                              </div>
                            </div>
                          </div>';
                          }
                          if($vrsta=="popust"){
                              echo'

 <div class="product-item-wrap has-post-thumbnail">
                            <div class="product-item-inner">
                              <div class="product-thumb">
                                <div class="product-flash-wrap"><span class="on-sale product-flash">8.8%</span><span class="on-sale product-flash">Sale</span></div>
                                <div class="product-thumb-primary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="42" title="42" class="attachment-shop_catalog size-shop_catalog wp-post-image"/></div>
                                <div class="product-thumb-secondary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="47" class="attachment-shop_catalog size-shop_catalog"/></div><a href="#" class="product-link">
                                  <div class="product-hover-sign">
                                    <hr/>
                                    <hr/>
                                  </div></a>
                                <div class="product-actions">
                                  <div class="yith-wcwl-add-to-wishlist add-to-wishlist-384">
                                    <div class="yith-wcwl-add-button show"><a href="#" class="add_to_wishlist"><i class="fa fa-heart-o"></i>    Add to Wishlist</a></div>
                                  </div>
                                  <div class="woocommerce product compare-button"><a href="#" class="compare button">Compare</a></div>
                                  <div class="add-to-cart-wrap"><a rel="nofollow" href="#" class="product_type_external button product_type_external"><i class="fa fa-info"></i> Buy Now</a></div><a href="#" class="product-quick-view"><i class="fa fa-search"></i>Quick view</a>
                                </div>
                              </div>
                              <div class="product-info">
                                <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div><span class="price">
                                  <del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>499.00</span></del><ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>455.00</span></ins></span><a href="#" target="_blank">
                                  <h3>'.$naslov.'</h3></a>
                              </div>
                            </div>
                          </div>';
                          }
                          }
                      
                      ?>
                    </div><!--Sort by high to low-->
                   <!--Sort by Most POPULAR--> <div id="4a" class="tab-pane">
                       <?php if(isset($_GET["category"])){
                          $kategorija=$_GET["category"];
                          $katfull=mysqli_real_escape_string($con,$kategorija);
                          $query=mysqli_query($con,"SELECT * FROM post WHERE kategorija='$katfull' order by pregledi DESC");
                          
                      }elseif(!isset($_GET["category"])){
                          $query=mysqli_query($con,"SELECT * FROM post order by pregledi DESC");
                      }
                         while($r=mysqli_fetch_assoc($query)){
                          $naslov=$r['naslov'];
                          $vrsta=$r['vrsta'];
                          if($vrsta=="obicni"){
                              echo'<div class="product-item-wrap has-post-thumbnail">
                        <div class="product-item-inner">
                          <div class="product-thumb">
                            <div class="product-flash-wrap"></div>
                            <div class="product-thumb-primary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="15" title="15" class="attachment-shop_catalog size-shop_catalog wp-post-image"/></div>
                            <div class="product-thumb-secondary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="36" class="attachment-shop_catalog size-shop_catalog"/></div><a href="#" class="product-link">
                              <div class="product-hover-sign">
                                <hr/>
                                <hr/>
                              </div></a>
                            <div class="product-actions">
                              <div class="yith-wcwl-add-to-wishlist add-to-wishlist-224">
                                <div class="yith-wcwl-wishlistexistsbrowse show"><span class="feedback">The product is already in the wishlist!</span><a href="#" rel="nofollow">Browse Wishlist</a></div>
                              </div>
                              <div class="woocommerce product compare-button"><a href="#" class="compare button">Compare</a></div>
                              <div class="add-to-cart-wrap"><a href="#" class="add_to_cart_button"><i class="fa fa-cart-plus"></i> Add to cart</a></div><a href="#" class="product-quick-view"><i class="fa fa-search"></i>Quick view</a>
                            </div>
                          </div>
                          <div class="product-info">
                            <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div><span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>139.00</span></span><a href="#">
                              <h3>'.$naslov.'</h3></a>
                          </div>
                        </div>
                      </div>';
                      }
                          if($vrsta=="neaktivni"){
                              echo'<div class="product-item-wrap has-post-thumbnail">
                            <div class="product-item-inner">
                              <div class="product-thumb">
                                <div class="product-flash-wrap"><span class="on-sold product-flash">Sold</span></div>
                                <div class="product-thumb-primary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="28" title="28" class="attachment-shop_catalog size-shop_catalog wp-post-image"/></div>
                                <div class="product-thumb-secondary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="36" class="attachment-shop_catalog size-shop_catalog"/></div><a href="#" class="product-link">
                                  <div class="product-hover-sign">
                                    <hr/>
                                    <hr/>
                                  </div></a>
                                <div class="product-actions">
                                  <div class="yith-wcwl-add-to-wishlist add-to-wishlist-189">
                                    <div class="yith-wcwl-add-button show"><a href="#" class="add_to_wishlist"><i class="fa fa-heart-o"></i>    Add to Wishlist</a></div>
                                  </div>
                                  <div class="woocommerce product compare-button"><a href="#" class="compare button">Compare</a></div><a href="#" class="product_type_soldout btn_add_to_cart"><i class="fa fa-shopping-cart"></i></a><a href="#" class="product-quick-view"><i class="fa fa-search"></i>Quick view</a>
                                </div>
                              </div>
                              <div class="product-info">
                                <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div><span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>199.00</span></span><a href="#" target="_blank">
                                  <h3>'.$naslov.'</h3></a>
                              </div>
                            </div>
                          </div>';
                          }
                          if($vrsta=="popust"){
                              echo'

 <div class="product-item-wrap has-post-thumbnail">
                            <div class="product-item-inner">
                              <div class="product-thumb">
                                <div class="product-flash-wrap"><span class="on-sale product-flash">8.8%</span><span class="on-sale product-flash">Sale</span></div>
                                <div class="product-thumb-primary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="42" title="42" class="attachment-shop_catalog size-shop_catalog wp-post-image"/></div>
                                <div class="product-thumb-secondary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="47" class="attachment-shop_catalog size-shop_catalog"/></div><a href="#" class="product-link">
                                  <div class="product-hover-sign">
                                    <hr/>
                                    <hr/>
                                  </div></a>
                                <div class="product-actions">
                                  <div class="yith-wcwl-add-to-wishlist add-to-wishlist-384">
                                    <div class="yith-wcwl-add-button show"><a href="#" class="add_to_wishlist"><i class="fa fa-heart-o"></i>    Add to Wishlist</a></div>
                                  </div>
                                  <div class="woocommerce product compare-button"><a href="#" class="compare button">Compare</a></div>
                                  <div class="add-to-cart-wrap"><a rel="nofollow" href="#" class="product_type_external button product_type_external"><i class="fa fa-info"></i> Buy Now</a></div><a href="#" class="product-quick-view"><i class="fa fa-search"></i>Quick view</a>
                                </div>
                              </div>
                              <div class="product-info">
                                <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div><span class="price">
                                  <del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>499.00</span></del><ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>455.00</span></ins></span><a href="#" target="_blank">
                                  <h3>'.$naslov.'</h3></a>
                              </div>
                            </div>
                          </div>';
                          }
                          }
                      ?>
                    </div><!--Sort by MOST POPULAR-->
                    <!--RASPRODAJA--><div id="5a" class="tab-pane"><!--RASPRODAJA-->
                     <?php if(isset($_GET["category"])){
                          $kategorija=$_GET["category"];
                          $katfull=mysqli_real_escape_string($con,$kategorija);
                          $query=mysqli_query($con,"SELECT * FROM post WHERE kategorija='$katfull' && vrsta='popust'");
                          
                      }elseif(!isset($_GET["category"])){
    $popust="popust";
                          $query=mysqli_query($con,"SELECT * FROM post WHERE vrsta='popust'");
                      }
                      while($r=mysqli_fetch_assoc($query)){
                          $cijena=$r['cijena'];
                          $naslov=$r['naslov'];
                           echo'

 <div class="product-item-wrap has-post-thumbnail">
                            <div class="product-item-inner">
                              <div class="product-thumb">
                                <div class="product-flash-wrap"><span class="on-sale product-flash">8.8%</span><span class="on-sale product-flash">Sale</span></div>
                                <div class="product-thumb-primary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="42" title="42" class="attachment-shop_catalog size-shop_catalog wp-post-image"/></div>
                                <div class="product-thumb-secondary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="47" class="attachment-shop_catalog size-shop_catalog"/></div><a href="#" class="product-link">
                                  <div class="product-hover-sign">
                                    <hr/>
                                    <hr/>
                                  </div></a>
                                <div class="product-actions">
                                  <div class="yith-wcwl-add-to-wishlist add-to-wishlist-384">
                                    <div class="yith-wcwl-add-button show"><a href="#" class="add_to_wishlist"><i class="fa fa-heart-o"></i>    Add to Wishlist</a></div>
                                  </div>
                                  <div class="woocommerce product compare-button"><a href="#" class="compare button">Compare</a></div>
                                  <div class="add-to-cart-wrap"><a rel="nofollow" href="#" class="product_type_external button product_type_external"><i class="fa fa-info"></i> Buy Now</a></div><a href="#" class="product-quick-view"><i class="fa fa-search"></i>Quick view</a>
                                </div>
                              </div>
                              <div class="product-info">
                                <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div><span class="price">
                                  <del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>499.00</span></del><ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>455.00</span></ins></span><a href="#" target="_blank">
                                  <h3>'.$naslov.'</h3></a>
                              </div>
                            </div>
                          </div>';
                      }
                      
                      ?>
                      
                    </div><!--RASPRODAJA-->
                      <!-- pocetak 1A kao ALL--><div id="6a" class="tab-pane <?php
                          active2();?>">
                      <?php
                      if(isset($_GET["category"])){
                          $kategorija=$_GET["category"];
                          $katfull=mysqli_real_escape_string($con,$kategorija);
                          $query=mysqli_query($con,"SELECT * FROM post WHERE kategorija='$katfull' && naslov LIKE '$rijec2'");
                          echo '<h1>RESULTS FOR : "'.$rijec1.'" IN CATEGORY : "'.$katfull.'"</h1>';
                          
                      }elseif(!isset($_GET["category"])){
                          $query=mysqli_query($con,"SELECT * FROM post WHERE naslov LIKE '$rijec2'");
                          echo '<h1>RESULTS FOR : "'.$rijec1.'"</h1>';
                      }
                      
                      while($r=mysqli_fetch_assoc($query)){
                          $naslov=$r['naslov'];
                          $vrsta=$r['vrsta'];
                          if($vrsta=="obicni"){
                              echo'<div class="product-item-wrap has-post-thumbnail">
                        <div class="product-item-inner">
                          <div class="product-thumb">
                            <div class="product-flash-wrap"></div>
                            <div class="product-thumb-primary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="15" title="15" class="attachment-shop_catalog size-shop_catalog wp-post-image"/></div>
                            <div class="product-thumb-secondary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="36" class="attachment-shop_catalog size-shop_catalog"/></div><a href="#" class="product-link">
                              <div class="product-hover-sign">
                                <hr/>
                                <hr/>
                              </div></a>
                            <div class="product-actions">
                              <div class="yith-wcwl-add-to-wishlist add-to-wishlist-224">
                                <div class="yith-wcwl-wishlistexistsbrowse show"><span class="feedback">The product is already in the wishlist!</span><a href="#" rel="nofollow">Browse Wishlist</a></div>
                              </div>
                              <div class="woocommerce product compare-button"><a href="#" class="compare button">Compare</a></div>
                              <div class="add-to-cart-wrap"><a href="#" class="add_to_cart_button"><i class="fa fa-cart-plus"></i> Add to cart</a></div><a href="#" class="product-quick-view"><i class="fa fa-search"></i>Quick view</a>
                            </div>
                          </div>
                          <div class="product-info">
                            <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div><span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>139.00</span></span><a href="#">
                              <h3>'.$naslov.'</h3></a>
                          </div>
                        </div>
                      </div>';
                      }
                          if($vrsta=="neaktivni"){
                              echo'<div class="product-item-wrap has-post-thumbnail">
                            <div class="product-item-inner">
                              <div class="product-thumb">
                                <div class="product-flash-wrap"><span class="on-sold product-flash">Sold</span></div>
                                <div class="product-thumb-primary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="28" title="28" class="attachment-shop_catalog size-shop_catalog wp-post-image"/></div>
                                <div class="product-thumb-secondary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="36" class="attachment-shop_catalog size-shop_catalog"/></div><a href="#" class="product-link">
                                  <div class="product-hover-sign">
                                    <hr/>
                                    <hr/>
                                  </div></a>
                                <div class="product-actions">
                                  <div class="yith-wcwl-add-to-wishlist add-to-wishlist-189">
                                    <div class="yith-wcwl-add-button show"><a href="#" class="add_to_wishlist"><i class="fa fa-heart-o"></i>    Add to Wishlist</a></div>
                                  </div>
                                  <div class="woocommerce product compare-button"><a href="#" class="compare button">Compare</a></div><a href="#" class="product_type_soldout btn_add_to_cart"><i class="fa fa-shopping-cart"></i></a><a href="#" class="product-quick-view"><i class="fa fa-search"></i>Quick view</a>
                                </div>
                              </div>
                              <div class="product-info">
                                <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div><span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>199.00</span></span><a href="#" target="_blank">
                                  <h3>'.$naslov.'</h3></a>
                              </div>
                            </div>
                          </div>';
                          }
                          if($vrsta=="popust"){
                              echo'

 <div class="product-item-wrap has-post-thumbnail">
                            <div class="product-item-inner">
                              <div class="product-thumb">
                                <div class="product-flash-wrap"><span class="on-sale product-flash">8.8%</span><span class="on-sale product-flash">Sale</span></div>
                                <div class="product-thumb-primary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="42" title="42" class="attachment-shop_catalog size-shop_catalog wp-post-image"/></div>
                                <div class="product-thumb-secondary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="47" class="attachment-shop_catalog size-shop_catalog"/></div><a href="#" class="product-link">
                                  <div class="product-hover-sign">
                                    <hr/>
                                    <hr/>
                                  </div></a>
                                <div class="product-actions">
                                  <div class="yith-wcwl-add-to-wishlist add-to-wishlist-384">
                                    <div class="yith-wcwl-add-button show"><a href="#" class="add_to_wishlist"><i class="fa fa-heart-o"></i>    Add to Wishlist</a></div>
                                  </div>
                                  <div class="woocommerce product compare-button"><a href="#" class="compare button">Compare</a></div>
                                  <div class="add-to-cart-wrap"><a rel="nofollow" href="#" class="product_type_external button product_type_external"><i class="fa fa-info"></i> Buy Now</a></div><a href="#" class="product-quick-view"><i class="fa fa-search"></i>Quick view</a>
                                </div>
                              </div>
                              <div class="product-info">
                                <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div><span class="price">
                                  <del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>499.00</span></del><ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>455.00</span></ins></span><a href="#" target="_blank">
                                  <h3>'.$naslov.'</h3></a>
                              </div>
                            </div>
                          </div>';
                          }
                          }
                          
                      ?>
                      
                    </div><!--OVO je 1A kao ALL-->
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
     
          