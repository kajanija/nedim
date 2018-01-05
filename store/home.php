<?php
   iffilter();


?>
      <script type="text/javascript" src="//localhost/store/livechat/php/app.php?widget-init.js"></script>

        <section>
            
            <div class="home-1-highlight yolo-wrap" >
            <div class="container">
              <div class="row">
            <?php
            include"db.php";
            $query=mysqli_query($con,"SELECT * FROM banerkategorija WHERE id=1 ");
                $rezkojakat=mysqli_fetch_array($query);
                  $imekategorije=$rezkojakat['Ime'];
            $query2=mysqli_query($con,"SELECT * FROM kategorije WHERE ime='$imekategorije'");
            if($rez=mysqli_fetch_array($query2)){
                $ime=$rez['ime'];
                $slika=$rez['image'];
                
                echo ' <div class="col-sm-3">
                  <div class="banner-shortcode-wrap style_1">
                    <div class="banner-content title_top"><a href="#">
                        <h3 class="banner-title">'.$ime.'</h3><span class="overlay-bg bg-84deee"></span><img width="277" height="600" src="'.$slika.'" alt="demo"/></a></div>
                  </div>
                </div>';
            }
            
            ?>
          
               
            
                  
                
              </div>
            </div>
          </div>
          <!-- .home-1-highlight-->
        </section>

        <section >
          <div class="product">
            <div class="sperator text-center" >
              <p><?php echo nasloviznadkategorije;?></p>
              <div class="sperator-bottom"><img src="images/demo/sperator.png" alt="spertor"/></div>
            </div>
              <script>$('.collapse').collapse()</script>
            <div class="product-tab" >
              <ul  class="products-tabs nav nav-pills">
                <li class="active"><a href="#1000a" data-toggle="tab" >CATEGORY</a></li>
                  <li><a href="#1a" data-toggle="tab" >SALE</a></li>
                  <li><a href="#2a" data-toggle="tab" >MOST POPULAR</a></li>
               
              </ul>
              <div class="desc-review-content tab-content clearfix">
                <div class="tab-pane active">
                  <div class="home-1-featured-products">
                    <div class="products-in-category-tabs-wrapper">
                      <div  class="products-content">
                        <div class="woocommerce product-listing columns-5 clearfix">
                         <div class="desc-review-content tab-content clearfix">
                             
                             <div id="1000a" class="tab-pane active">
                                 <section>
                                 <div class="dales-this-week">
            <div class="sperator text-center">
              <p>CATEGORYS</p>
              <div class="sperator-bottom"><img src="images/demo/sperator.png" alt="spertor"/></div>
            </div>
            <div class="home-blog-box">
                                 <?php
                                      
                             $query=mysqli_query($con,"SELECT * FROM kategorije");
                                
                                     $izbroj=mysqli_num_rows($query);
                if($izbroj<1){
                    $data='<div data-number="0" data-margin="30" data-loop="yes" data-navcontrol="yes" class="sofani-owl-carousel">';
                    
                    
                }
                if($izbroj==1){
                    $data='<div data-number="1" data-margin="30" data-loop="yes" data-navcontrol="yes" class="sofani-owl-carousel">';
                    
                }
                if($izbroj==2){
                    $data='<div data-number="2" data-margin="30" data-loop="yes" data-navcontrol="yes" class="sofani-owl-carousel">';
                    
                }if($izbroj==3){
                    $data='<div data-number="3" data-margin="30" data-loop="yes" data-navcontrol="yes" class="sofani-owl-carousel">';
                    
                }
                if($izbroj>3){
                    $data='<div data-number="3" data-margin="30" data-loop="yes" data-navcontrol="yes" class="sofani-owl-carousel">';
                    
                }
                
                echo $data;
                
                                      
          
                 while($r=mysqli_fetch_assoc($query)){
                                     $ime=$r['ime'];
                                     $slika=$r['image'];
              
                      echo'<div class="blog-box"><!--Blog pocetak-->
                  <div class="blog-img">
                    <figure><img src="uploadsimage/'.$slika.'" alt="'.$ime.'" height="250"/></figure>
                    <div class="blog-overlay"></div>
                  </div>
                  <div class="blog-text">
                    <div class="post-content">
                    
                    </div>
                    <h4 class="entry-title"><a>'.$ime.'</a></h4>
                    <p class="post-excerpt"></p><a href="?page=posts&&category='.$ime.'" class="btn-readmore">See all product</a>
                  </div>
                </div>';}
                  
                  ?>
                
              </div>
            </div>
    
          
        </section>
                                 
                             </div>
                             <div id="1a" class="tab-pane">
                                 <?php
                                 $query=mysqli_query($con,"SELECT * FROM post WHERE vrsta='popust' limit 15");
                                 while($r=mysqli_fetch_assoc($query)){
                                     $naslov=$r['naslov'];
                                     $staracijena=$r['staracijene'];
                                     $cijena=$r['cijena'];
                                     $thumbnail=$r['thumbnail'];
                                     $id=$r['id'];
                                     echo'

 <div class="product-item-wrap has-post-thumbnail">
                            <div class="product-item-inner">
                              <div class="product-thumb">
                                <div class="product-flash-wrap"><span class="on-sale product-flash">8.8%</span><span class="on-sale product-flash">Sale</span></div>
                                <div class="product-thumb-primary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="42" title="42" class="attachment-shop_catalog size-shop_catalog wp-post-image"/></div>
                                <div class="product-thumb-secondary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="47" class="attachment-shop_catalog size-shop_catalog"/></div><a href="?page=post&&id='.$id.'" class="product-link">
                                  <div class="product-hover-sign">
                                    <hr/>
                                    <hr/>
                                  </div></a>
                                <div class="product-actions">
                                  <div class="yith-wcwl-add-to-wishlist add-to-wishlist-384">
                                  
                                  </div>
                                  <div style="background-color:orange;" class="add-to-cart-wrap"><a href="?page=post&&id='.$id.'" class="add_to_cart_button"><i class="fa fa-cart-plus"></i> Add to cart</a></div>
                                  
                                </div>
                              </div>
                              <div class="product-info" >
                                <div class="rate" ><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div><span class="price">
                                  <del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>'.$staracijena.'</span></del><ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>'.$cijena.'</span></ins></span><a href="#" target="_blank">
                                  <h3>'.$naslov.'</h3></a>
                              </div>
                            </div>
                          </div>';
                                 }
                               
                                 ?>
                                 
                                 
                             </div>
                             <div id="2a" class="tab-pane">
                             <?php
                                 $query=mysqli_query($con,"SELECT * FROM post ORDER BY pregledi DESC limit 15");
                                 while($r=mysqli_fetch_assoc($query)){
                                     $naslov=$r['naslov'];
                                     $staracijena=$r['staracijene'];
                                     $cijena=$r['cijena'];
                                     $thumbnail=$r['thumbnail'];
                                     $id=$r['id'];
                                  echo'<div class="product-item-wrap has-post-thumbnail">
                        <div class="product-item-inner">
                          <div class="product-thumb">
                            <div class="product-flash-wrap"></div>
                            <div class="product-thumb-primary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="15" title="15" class="attachment-shop_catalog size-shop_catalog wp-post-image"/></div>
                            <div class="product-thumb-secondary"><img width="300" height="400" src="uploadsimage/'.$thumbnail.'" alt="36" class="attachment-shop_catalog size-shop_catalog"/></div><a href="?page=post&&id='.$id.'" class="product-link">
                              <div class="product-hover-sign">
                                <hr/>
                                <hr/>
                              </div></a>
                            <div class="product-actions">
                              <div class="yith-wcwl-add-to-wishlist add-to-wishlist-224">
                                
                              </div>
                              
                              <div style="background-color:orange;" class="add-to-cart-wrap"><a href="?page=post&&id='.$id.'" class="add_to_cart_button"><i class="fa fa-cart-plus"></i> Add to cart</a></div>
                            </div>
                          </div>
                          <div class="product-info" style="background-color:orange;">
                            <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div><span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>'.$cijena.'</span></span><a href="#">
                              <h3>'.$naslov.'</h3></a>
                          </div>
                        </div>
                      </div>';
                                 
                                 
                                 
                                 }
                                
                                 ?>
                             
                             
                             
                             </div>
                             
                    
                      
                    
                             
                        </div>
                      </div>
                    </div>
                  </div>
<?php
                       echo'<a href="?page=posts">MORE</a>';
                      ?>
                </div>
             
                      
                  </div>
              </div>
            </div>
          </div>
        </section>

        

        <section>
          <div class="dales-this-week">
            <div class="sperator text-center">
              <p>DEALS THIS WEEK</p>
              <div class="sperator-bottom"><img src="images/demo/sperator.png" alt="spertor"/></div>
            </div>
            <div class="home-1-deals-this-week yolo-wrap">
              <div class="vc_row wpb_row vc_row-fluid">
                <div class="container">
                  <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner vc_custom_1461828027488">
                      <div class="wpb_wrapper">
                        <div id="shortcode-product-wrap-579a08bd562b2" class="shortcode-product-wrap">
                          <div class="product-wrap">
                            <div class="product-inner clearfix product-style-grid product-paging-none product-col-4">
                              <div class="woocommerce product-listing clearfix columns-4">
                                  <?php
                                  $query=mysqli_query($con,"SELECT * FROM post WHERE WEEKOFYEAR(datum)=WEEKOFYEAR(NOW()) limit 15");
                                  while($r=mysqli_fetch_assoc($query)){
                                      $ime=$r['naslov'];
                                      $slika=$r['thumbnail'];
                                      $cijena=$r['cijena'];
                                      $id=$r['id'];
                                     echo'<div class="product-item-wrap button-has-tooltip product-style_1">
                                  <div class="product-item-inner">
                                    <div class="product-thumb white">
                                      <div class="product-flash-wrap"></div>
                                      <div class="product-thumb-primary"><img width="300" height="400" src="uploadsimage/'.$slika.'" alt="52" title="52" class="attachment-shop_catalog size-shop_catalog wp-post-image"/></div>
                                      <div class="product-thumb-secondary"><img width="300" height="400" src="uploadsimage/'.$slika.'" alt="50" class="attachment-shop_catalog size-shop_catalog"/></div><a href="?page=post&&id='.$id.'" class="product-link">
                                        <div class="product-hover-sign">
                                          <hr/>
                                          <hr/>
                                        </div></a>
                                      <div class="product-actions">
                                        
                                        <div class="add-to-cart-wrap"><a href="?page=post&&id='.$id.'" class="add_to_cart_button product_type_simple button product_type_simple add_to_cart_button ajax_add_to_cart"><i class="fa fa-cart-plus"></i> Add to cart</a></div>
                                      </div>
                                    </div>
                                    <div class="product-info">
                                      <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div><span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>'.$cijena.'</span></span><a href="#">
                                        <h3>'.$ime.'</h3></a>
                                    </div>
                                  </div>
                                </div>';
                                      
                                  }
                                  
                                 
                                  ?>
                            
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                        <?php
                       echo'<a href="?page=posts">MORE</a>';
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- .home-1-deals-this-week-->
          </div>
          <!-- .home-1-deals-this-week-->
        </section>

        
        <div class="section">
          <div class="slide-logo">
            <div class="container">
              <div data-number="5" data-margin="10" data-loop="yes" data-navcontrol="yes" class="sofani-owl-carousel">
                <div class="slide-logo-item"><a href="#"><img src="images/demo/slide-logo-1.png" alt="logo1"/></a></div>
                <div class="slide-logo-item"><a href="#"><img src="images/demo/slide-logo-2.png" alt="logo1"/></a></div>
                <div class="slide-logo-item"><a href="#"><img src="images/demo/slide-logo-3.png" alt="logo1"/></a></div>
                <div class="slide-logo-item"><a href="#"><img src="images/demo/slide-logo-4.png" alt="logo1"/></a></div>
                <div class="slide-logo-item"><a href="#"><img src="images/demo/slide-logo-5.png" alt="logo1"/></a></div>
                <div class="slide-logo-item"><a href="#"><img src="images/demo/slide-logo-3.png" alt="logo1"/></a></div>
                <div class="slide-logo-item"><a href="#"><img src="images/demo/slide-logo-5.png" alt="logo1"/></a></div>
              </div>
            </div>
          </div>
        </div>

        <div class="section">
          <div class="sn-newletter-style1">
            <div class="container">
              <div class="sperator text-center">
                <p>NEWSLETTER</p>
                <div class="sperator-bottom"><img src="images/demo/sperator.png" alt="spertor"/></div>
              </div>
              <div class="newletter-content">
                <p>Insert your email</p>
                <form>
                  <input type="email" placeholder="Subscribe your email here"/><i class="fa fa-envelope-o"></i>
                    <input type="submit" class="btn btn-color-white btn-background-dark" value="Subscribe" />
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="section-no-margin">
          <div class="icon-box-home-1"> 
            <div class="container">
              <div class="row">
                <div class="col-md-4">
                  <div class="icon-box icon-box-style1">
                    <div class="icon-box-left"><i class="fa fa-truck color-6fd9ec"></i></div>
                    <div class="icon-box-right">
                      <p>FREE SHIPPING</p><span>
                        Duis sed odio sit amet nibh vulputate
                        a sit amet mauris.</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="icon-box icon-box-style1">
                    <div class="icon-box-left"><i class="fa fa-tag color-ff9999"></i></div>
                    <div class="icon-box-right">
                      <p>Price Promise</p><span>
                        Duis sed odio sit amet nibh vulputate
                        a sit amet mauris.</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="icon-box icon-box-style1">
                    <div class="icon-box-left"><i class="fa fa-adjust color-ffdc73"></i></div>
                    <div class="icon-box-right">
                      <p>3 Years Warranty</p><span>
                        Duis sed odio sit amet nibh vulputate
                        a sit amet mauris.</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php
include"footer.php";
?>
        