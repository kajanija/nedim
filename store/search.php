<?php
ifsearch();

?>
<section>
          <div id="search"class="product">
            <div class="sperator text-center">
              <p>SEARCH RESULTS :</p>
                
              <div class="sperator-bottom"><img src="images/demo/sperator.png" alt="spertor"></div>
              <div class="desc-review-content tab-content clearfix">
                <div id="1a" class="tab-pane active">
                  <div class="home-1-featured-products">
                    <div class="products-in-category-tabs-wrapper">
                      <div class="products-content">
                        <div class="woocommerce product-listing columns-5 clearfix">
                         
                           <?php
                            if(isset($_GET["search"])){
                                    $word=$_GET["search"];
                                    $word2=mysqli_real_escape_string($con,$word);
                                    $word3="%".$word2."%";
                                    $query=mysqli_query($con,"SELECT * FROM post WHERE naslov LIKE '$word3'
                                    ");
                                        if(mysqli_num_rows($query)<1){
                                             echo '<h1>Search for "'.$word.'": No Products</h1>';
        
                                            }else{
                                            echo'<h1>PRODUCTS</h1><br>';
                                            while($r=mysqli_fetch_assoc($query)){
                                                $naslov=$r['naslov'];
                                                $cijena=$r['cijena'];
                                                $vrsta=$r['vrsta'];
                                                
                                                    echo' <div class="product-item-wrap has-post-thumbnail">
                            <div class="product-item-inner">
                              <div class="product-thumb">
                                <div class="product-flash-wrap"></div>
                                <div class="product-thumb-primary"><img width="300" height="400" src="images/demo/tab-1.jpg" alt="41" title="41" class="attachment-shop_catalog size-shop_catalog wp-post-image"/></div>
                                <div class="product-thumb-secondary"><img width="300" height="400" src="images/demo/tab-2.jpg" alt="38" class="attachment-shop_catalog size-shop_catalog"/></div><a href="#" class="product-link">
                                  <div class="product-hover-sign">
                                    <hr/>
                                    <hr/>
                                  </div></a>
                                <div class="product-actions">
                                  <div class="yith-wcwl-add-to-wishlist add-to-wishlist-386">
                                    <div class="yith-wcwl-wishlistexistsbrowse show"><span class="feedback">The product is already in the wishlist!</span><a href="#">Browse Wishlist</a></div>
                                  </div>
                                  <div class="woocommerce product compare-button"><a href="#" data-product_id="386" rel="nofollow" class="compare button">Compare</a></div>
                                  <div class="add-to-cart-wrap"><a href="#" class="add_to_cart_button"><i class="fa fa-cart-plus"></i> Add to cart</a></div><a href="#" class="product-quick-view"><i class="fa fa-search"></i>Quick view</a>
                                </div>
                              </div>
                              <div id="stolica" class="product-info"  >
                                <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div><span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>'.$cijena.'</span></span><a href="#" target="_blank">
                                  <h3>'.$naslov.'</h3></a>
                              </div>
                            </div>
                          </div>';
                                                
                                                
                                                
                                                
                                            }
                                            }
                                            
                                        }elseif(!isset($_GET["search"])){
                                $word2="";
                                $word3="%SEARCH IS NoT SET%";
                            }
                                
                            
                            ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
       
    <section>
          <div class="dales-this-week">
            <div class="sperator text-center">
              <p>THE BLOG</p>
              <div class="sperator-bottom"><img src="images/demo/sperator.png" alt="spertor"/></div>
            </div>
            <div class="home-blog-box">
                <?php
                $query=mysqli_query($con,"SELECT * FROM blog");
                $izbroj=mysqli_num_rows($query);
                if($izbroj<1){
                    $data='<div data-number="0" data-margin="30" data-loop="yes" data-navcontrol="yes" class="sofani-owl-carousel">';
                    echo '<h1>Search for "'.$word.'": No Blogs</h1>';
                    
                }
                if($izbroj==1){
                    $data='<div data-number="1" data-margin="30" data-loop="yes" data-navcontrol="yes" class="sofani-owl-carousel">';
                    echo '<h2 style="text-agiln:center;">BLOGS:</h2>';
                }
                if($izbroj==2){
                    $data='<div data-number="2" data-margin="30" data-loop="yes" data-navcontrol="yes" class="sofani-owl-carousel">';
                    echo '<h2 style="text-agiln:center;">BLOGS:</h2>';
                }if($izbroj==3){
                    $data='<div data-number="3" data-margin="30" data-loop="yes" data-navcontrol="yes" class="sofani-owl-carousel">';
                    echo '<h2 style="text-agiln:center;">BLOGS:</h2>';
                }
                if($izbroj>3){
                    $data='<div data-number="3" data-margin="30" data-loop="yes" data-navcontrol="yes" class="sofani-owl-carousel">';
                    echo '<h2 style="text-agiln:center;">BLOGS:</h2>';
                }
                ?>
                <?php
                echo $data;
                ?>
              
                  <?php
                  $query=mysqli_query($con,"SELECT * FROM blog WHERE naslov LIKE '$word3'");
                  while($r=mysqli_fetch_assoc($query)){
                      $slika=$r['slika'];
                      $datum=$r['datum'];
                      $autor=$r['autor'];
                      $naslov=$r['naslov'];
                      echo'<div class="blog-box"><!--Blog pocetak-->
                  <div class="blog-img">
                    <figure><img src="'.$slika.'" alt="blog" height="250"/></figure>
                    <div class="blog-overlay"></div>
                  </div>
                  <div class="blog-text">
                    <div class="post-content">
                      <div class="post-info"><span class="post-date"><i class="fa fa-calendar"></i>'.$datum.'	    		</span><span class="post-author"><i class="fa fa-pencil-square-o"></i>'.$autor.'</span></div>
                    </div>
                    <h4 class="entry-title"><a href="#">'.$naslov.'</a></h4>
                    <p class="post-excerpt"></p><a href="#" class="btn-readmore">Read more</a>
                  </div>
                </div><!--Blog kraj-->';
                  }
                  
                  ?>
              </div>
            </div>
    
          
        </section>