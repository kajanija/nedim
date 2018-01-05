<?php
if(isset($_GET["id"])){
    $id=$_GET["id"];
    $id=mysqli_real_escape_string($con,$id);
}
    ?>

<link rel="stylesheet" type="text/css" href="libs/radiostyle.css">

      <section class="product-information">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div id="sync1" class="owl-carousel owl-template">
                  <?php
                    $query=mysqli_query($con,"SELECT * FROM relship WHERE idpost='$id' && vidljivo='1'");
                    while($r=mysqli_fetch_assoc($query)){
                        $thumb=$r['slika'];
                        echo'<div class="item">
                  <figure><img src="uploadsimage/'.$thumb.'" alt="slide" width="540" height="700"/></figure>
                </div>';
                    }
                  
                    ?>
              </div>
              <div id="sync2" class="owl-carousel owl-template">
                  <?php
                    $query=mysqli_query($con,"SELECT * FROM relship WHERE idpost='$id' && vidljivo='1'");
                    while($r=mysqli_fetch_assoc($query)){
                        $thumb=$r['slika'];
                        echo'<div class="item">
                  <figure><img src="uploadsimage/'.$thumb.'" alt="slide" width="180" height="220"/></figure>
                </div>';
                    }
                    ?>
               
                
              </div>
            </div>
            <div class="col-md-6">
              <div class="summary-product entry-summary">
                <h1 class="product_title"><?php
                    $query=mysqli_query($con,"SELECT * FROM post WHERE id='$id'");
                        $r=mysqli_fetch_assoc($query);
                        $naslov=$r['naslov'];
                    $opis=$r['opis'];
                        echo $naslov;
                    $cijena=$r['cijena'];
                    $podnas=$r['podnaslov'];
                    $opis=$r['opis'];
                    $kategorija=$r['kategorija'];
                    $slikazacart=$r['thumbnail'];
                    
                    ?></h1>
                <div class="woocommerce-product-rating"></div>
                <div class="rate-price">
                  
                  <p class="price"><span> Price : <?php echo $cijena; ?></span></p>
                </div>
                <div class="product-single-short-description">
                  <p><?php echo $podnas; ?></p>
                </div>
               <?php
                  if(isset($_POST["buynow"])){
                      
                    
                  }
                  if(isset($_POST["addtocart"])){
                      $kolicina=$_POST["quantity"];
                      $naslov=$naslov;
                      $cijenacart=$kolicina*$cijena;
                      $slikacart=$slikazacart;
                      $cijenajednog=$cijena;
                      $postid=$id;
                      if(isset($_SESSION["user"])!=""){
                          $idkorisnika=$_SESSION["user"];
                          $query=mysqli_query($con,"INSERT INTO cart (slika,naslov,cijena,kolicina,idkorisnika,cijenajednog,postid) VALUES ('$slikacart','$naslov','$cijenacart','$kolicina','$idkorisnika','$cijenajednog','$postid')");
                          if($query){
                              echo'<h2>PRODUCT IS IN YOUR CART, <a href="?page=cart">YOUR CART</a></h2>';
                          }
                      }else{
                          echo'YOU MUST BE LOGED IN';
                      }
                  }
                
                  
                  if(isset($_SESSION["user"])!=""){
                      $idkorisnika=$_SESSION["user"];
                      $query=mysqli_query($con,"SELECT * FROM user WHERE id='$idkorisnika' ");
                      $r=mysqli_fetch_assoc($query);
                      $email=$r['email'];
                      $name=$r['name'];
                      $idkorisnika=$r['id'];
                       $paypal_url = 'https://www.paypal.com/cgi-bin/webscr';
    //Here we can used seller email id. 
    $merchant_email = 'salem_kajanija@hotmail.com';
    //here we can put cancle url when payment is not completed.
    $cancel_return = "http://".$_SERVER['HTTP_HOST'].'/paypal-ipn-php';
    //here we can put cancle url when payment is Successful.
    $success_return = "http://".$_SERVER['HTTP_HOST'].'/paypal-ipn-php/success.php';
    //paypal call this file for ipn
    $notify_url = "http://".$_SERVER['HTTP_HOST'].'/store/pay/ipn.php';
                     
                         echo'
         <form name="myform" action="'.$paypal_url.'" method="post">
        <input type="hidden" name="business" value="'.$merchant_email.'" />
        <input type="hidden" name="notify_url" value="'.$notify_url.'" />
        <input type="hidden" name="cancel_return" value="'.$notify_url.'" />
        <input type="hidden" name="return" value="'.$success_return.'" />
        <input type="hidden" name="rm" value="2" />
        <input type="hidden" name="lc" value="" />
        <input type="hidden" name="no_shipping" value="1" />
        <input type="hidden" name="payer_id" value="'.$idkorisnika.'" />
        <input type="hidden" name="currency_code" value="USD" />
        <input type="hidden" name="page_style" value="paypal" />
        <input type="hidden" name="charset" value="utf-8" />
        <input type="hidden" name="item_name" value="'.$naslov.'" />
        <input type="hidden" name="cbt" value="Back to STORE" />
        <input type="hidden" value="_xclick" name="cmd"/>
        <input type="hidden" name="amount" value="'.$cijena.'" />
                      
                    <input type="submit" name="submit" value=" Buy Now $'.$cijena.'" />
                    </form>
                    
               ';
               
                      
                  }
                  ?>
            
               
                 
                    
                  
                  
                  
                 
                
               
              </div>
            </div>
          </div>
        </div>
      </section>
      <section>
        <div class="container">
          <div class="product-single-tab">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <ul class="nav nav-pills">
                  <li class="active"><a href="#1a" data-toggle="tab">Description</a></li>
                 
                </ul>
                <div class="desc-review-content tab-content clearfix">
                  <div id="1a" class="tab-pane active">
                    <?php echo $opis; ?>
                  </div>
                  <div id="2a" class="tab-pane">
                    <ul class="chose">
                      <li>
                        <label>color</label><span>Black, White, Yellow</span>
                      </li>
                      <li>
                        <label>size</label><span>L, M, S, XL, XXL</span>
                      </li>
                    </ul>
                  </div>
                  <div id="3a" class="tab-pane">
                    <div id="reviews" class="woocommerce-Reviews">
                      <div id="comments">
                        <h2 class="woocommerce-Reviews-title">1 review for <span>Baxter Cleansing Bar</span></h2>
                        <ol class="commentlist">
                          <li class="comment">
                            <div class="comment_container"><img alt="avatar" src="images/demo/avatar.png" width="60" height="60" class="avatar"/>
                              <div class="comment-text">
                                <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div>
                                <p class="meta"><strong>admin</strong>
                                  <time datetime="2016-04-22T01:52:05+00:00">April 22, 2016</time>
                                </p>
                                <div class="description">
                                  <p>Good product!</p>
                                </div>
                              </div>
                            </div>
                          </li>
                        </ol>
                      </div>
                      <div id="review_form_wrapper">
                        <div id="review_form">
                          <div id="respond" class="comment-respond">
                            <h3 id="reply-title" class="comment-reply-title">Add a review </h3>
                            <form class="comment-form">
                              <div class="comment-form-rating">
                                <label>Your Rating</label>
                                <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div>
                              </div>
                              <p class="comment-form-comment">
                                <label>Your Review <span class="required">*</span></label>
                                <textarea id="comment" name="comment" cols="45" rows="3" required=""></textarea>
                              </p>
                              <div class="comment-fields-wrap">
                                <div class="comment-fields-inner clearfix">
                                  <p class="comment-form-author">
                                    <label>Name <span class="required">*</span></label>
                                    <input id="author" name="author" value="" size="30" required="" type="text"/>
                                  </p>
                                  <p class="comment-form-email">
                                    <label>Email <span class="required">*</span></label>
                                    <input id="email" name="email" value="" size="30" required="" type="email"/>
                                  </p>
                                  <p class="form-submit">
                                    <input id="submit" name="submit" value="Submit" type="submit" class="submit"/>
                                  </p>
                                </div>
                              </div>
                            </form>
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
      </section>
      <section class="relative-single-page">
        <div class="container">
          <h2>Related Products</h2>
          <div class="related-logo">
            <div data-number="4" data-margin="10" data-loop="yes" data-navcontrol="yes" class="sofani-owl-carousel">
                <?php
                $query=mysqli_query($con,"SELECT * FROM post WHERE kategorija='$kategorija' limit 4");
                while($r=mysqli_fetch_assoc($query)){
                    $slika=$r['thumbnail'];
                    $id=$r['id'];
                    $naslov=$r['naslov'];
                    $cijena=$r['cijena'];
                    echo'<div class="product-item-wrap has-post-thumbnail">
                <div class="product-item-inner">
                  <div class="product-thumb">
                    <div class="product-flash-wrap"></div>
                    <div class="product-thumb-primary"><img width="300" height="400" src="uploadsimage/'.$slika.'" alt="41" title="41" class="attachment-shop_catalog size-shop_catalog wp-post-image"/></div>
                    <div class="product-thumb-secondary"><img width="300" height="400" src="uploadsimage/'.$slika.'" alt="38" class="attachment-shop_catalog size-shop_catalog"/></div><a href="?page=post&&id='.$id.'" class="product-link">
                      <div class="product-hover-sign">
                        <hr/>
                        <hr/>
                      </div></a>
                    <div class="product-actions">
                      <div class="yith-wcwl-add-to-wishlist add-to-wishlist-386">
                        <div class="yith-wcwl-wishlistexistsbrowse show"><span class="feedback">The product is already in the wishlist!</span><a href="#"></a></div>
                      </div>
                      <div class="woocommerce product compare-button"><a href="#" data-product_id="386" rel="nofollow" class="compare button">Compare</a></div>
                      <div class="add-to-cart-wrap"><a href="#" class="add_to_cart_button"><i class="fa fa-cart-plus"></i> Add to cart</a></div><a href="#" class="product-quick-view"><i class="fa fa-search"></i>Quick view</a>
                    </div>
                  </div>
                  <div class="product-info">
                    <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div><span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>'.$cijena.'</span></span><a href="#" target="_blank">
                      <h3>'.$naslov.'</h3></a>
                  </div>
                </div>
              </div>';
                }
                ?>
                
                
              <!--krajjjj-->
             
            </div>
          </div>
        </div>
      </section>