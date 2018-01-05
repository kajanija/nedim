<link rel="stylesheet" type="text/css" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="libs/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="libs/animate/animated.css">
    <link rel="stylesheet" type="text/css" href="libs/owl.carousel.min/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="libs/jquery.mmenu.all/jquery.mmenu.all.css">
    <link rel="stylesheet" type="text/css" href="libs/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" type="text/css" href="libs/direction/css/noJS.css">
    <link rel="stylesheet" type="text/css" href="libs/prettyphoto-master/css/prettyPhoto.css">
    <link rel="stylesheet" type="text/css" href="libs/slick-sider/slick.min.css">

<?php

if(!isset($_GET["page"])){
    die();
}
if(!isset($_SESSION["user"])){
    die('<h1>PLEASE LOGIN OR REGISTER <a href="login/?page=register"> HERE </a></h1>');
}
if(isset($_GET["remove"])){
    if(isset($_SESSION["user"])!=""){
        $userid=$_SESSION["user"];
         if($_GET["remove"]=="all"){
        $query=mysqli_query($con,"DELETE FROM cart where idkorisnika='$userid'");
    }else{
             $idcarta=htmlspecialchars($_GET["remove"]);
             $query=mysqli_query($con,"DELETE FROM cart WHERE idkorisnika='$userid'&&id='$idcarta' ");
         }
        
    }
   
}

?>
       
      <section>
        <div class="container">
          <form class="cart-form" method="post">
            <table>
              <tr>
                <th>Product</th>
                <th>&#32;</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>&#32;</th>
              </tr>
             
                <?php
                if(isset($_SESSION["user"])!=""){
                    $id=$_SESSION["user"];
                    $query=mysqli_query($con,"SELECT * FROM cart WHERE idkorisnika='$id'");
                 $cijenaukupno='';
                    
                    if(mysqli_num_rows($query)>0){
                        while($r=mysqli_fetch_assoc($query)){
                            $naslov=$r['naslov'];
                            $slika=$r['slika'];
                            $cijena=$r['cijena'];
                            $kolicina=$r['kolicina'];
                            $cijenajednog=$r['cijenajednog'];
                            $idcart=$r['id'];
                            
                       
                            
                            $postid=$r['postid'];
                            echo'<tr>
                <td data-title="Product"><a href="?page=post&&id='.$postid.'" class="image-product"><img src="uploadsimage/'.$slika.'" alt="tab-1" width="180" height="220"/></a></td>
                <td data-title="Name"><a href="#" class="name-product">'.$naslov.' </a></td>
                <td data-title="Price"><span class="price">$'.$cijenajednog.'</span></td>
                <td data-title="Quantity"><span class="quanlity">'.$kolicina.'</span>
                  
                </td>
                <td data-title="Total"><span class="total">$'.$cijena.'</span></td>
                <td data-title="Remove"><a href="?page=cart&&remove='.$idcart.'"><i class="fa fa-times"></i></a></td>
              </tr>';
                            
                        }
                    }else{
                        echo" YOU DON'T HAVE ANY PRODUCT IN CART";
                    }
                    
                }
                $result=mysqli_query($con,"SELECT SUM(cijena) AS value_sum FROM cart where idkorisnika='$id'"); 
$row = mysqli_fetch_assoc($result); 
$sumall = $row['value_sum'];
                $result=mysqli_query($con,"SELECT SUM(cijenajednog) AS value_sum FROM cart where idkorisnika='$id'"); 
$row = mysqli_fetch_assoc($result); 
$sumjedan = $row['value_sum'];
                 $result=mysqli_query($con,"SELECT SUM(kolicina) AS value_sum FROM cart where idkorisnika='$id'"); 
$row = mysqli_fetch_assoc($result); 
$sumkolicina = $row['value_sum'];
                ?>
                 <?php
              if(isset($_POST["cuponcuponcupon"])){
                  $cuponcode=$_POST["cuponcode"];
                  $cuponcode=htmlspecialchars($cuponcode);
                  $query=mysqli_query($con,"SELECT * FROM cupon WHERE sifra='$cuponcode'");
                  if(mysqli_num_rows($query)>0){
                      $r=mysqli_fetch_assoc($query);
                      $value=$r['value'];
                      $posto=$value;
                      $od=$sumall;
                     $postotak= $posto/100*$od;
                      $sumall=$sumall-$postotak;
                      
                  }
                      
              }
              
              ?>
             <?php
                echo'<tr>
                <td data-title="Product"></td>
                <td data-title="Name"><a class="name-product" > TOTAL</a></td>
                <td data-title="Price"><span class="price">$'.$sumjedan.'</span></td>
                <td data-title="Quantity"><span class="quanlity">'.$sumkolicina.'</span>
                  
                </td>
                <td data-title="Total"><span class="total">$'.$sumall.'</span></td>
                <td data-title="Remove"><a href="?page=cart&&remove=all"><i class="fa fa-times"></i></a></td>
              </tr>';
                ?>
              <?php
            ?>
              
            </table>
             
            <div class="button-cart">
              <div class="button-cart-left">
              
                  <input type="text" name="cuponcode" placeholder="CUPON CODE" />
                     <input type="submit" name="cuponcuponcupon" value="CHECK" />
                  
                
                 
              </div>
                
              
                
                
                
                  
                  
            </div>
          
          <div class="row">
            <div class="col-md-6">
              <form class="cart-total">
                <h4>Cart Totals</h4>
                <table>
                  
                  <tr>
                    <td>Total</td>
                    <td> <span class="total">$<?php echo $sumall; ?></span></td>
                  </tr>
                </table>
              </form>
            </div>
          </div>
            </form>
            <?php
            $query=mysqli_query($con,"SELECT * from user WHERE id='$id'");
            $r=mysqli_fetch_assoc($query);
            $email=$r['email'];
            $name=$r['name'];
            
            
            ?>
              <form class="paypal" action="testpaypal/payments.php?cijena=<?php echo $cijena; ?>" method="post" id="paypal_form" target="_blank">
		<input type="hidden" name="cmd" value="_xclick" />
		<input type="hidden" name="no_note" value="1" />
		<input type="hidden" name="lc" value="UK" />
		<input type="hidden" name="currency_code" value="USD" />
		<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
		<input type="hidden" name="first_name" value="<?php echo $name; ?>"  />
		<input type="hidden" name="last_name" value="Customer's Last Name"  />
		<input type="hidden" name="payer_email" value="<?php echo $email; ?>"  />
		<input type="hidden" name="item_number" value="123456" / >
		<input type="submit" name="submit" value="Submit Payment"/>
                  
	</form>
            
          </div>
      </section>
      <div class="section">
        <footer class="footer footer-style-3">
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
          <div class="container">
            <div class="footer-top">
              <div class="row">
                <div class="col-md-4">
                  <div class="header-logo"><a href="index.html" title="YOLO"><img src="images/logo/logo.png" alt="logo" class="logo-img"/></a></div>
                  <div class="footer-top-content">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore</p>
                    <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper</p><a href="#">DETAILS</a>
                  </div>
                </div>
                <div class="col-md-4">
                  <h3>INFORMATION</h3>
                  <ul class="footer-top-content">
                    <li><a href="#">About US</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">News</a></li>
                    <li><a href="#">Store</a></li>
                  </ul>
                </div>
                <div class="col-md-4">
                  <h3>CONTACT US</h3>
                  <div class="icon-box icon-box-style2">
                    <div class="icon-box-left"><i class="fa fa-map-marker"></i></div>
                    <div class="icon-box-right"><span>123 Sky Tower address name, Los Algeles</span></div>
                  </div>
                  <div class="icon-box icon-box-style2">
                    <div class="icon-box-left"><i class="fa fa-phone"></i></div>
                    <div class="icon-box-right"><span>Phone : (012) 345 6789</span></div>
                  </div>
                  <div class="icon-box icon-box-style2">
                    <div class="icon-box-left"><i class="fa fa-envelope-o"></i></div>
                    <div class="icon-box-right"><span>Email : email@yoursite.com</span></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="footer-bottom">
              <div class="click-back-top-footer">
                <button type="button" class="sn-btn sn-btn-style-17 sn-back-to-top fixed-right-bottom"><i class="btn-icon fa fa-angle-up"></i></button>
              </div>
              <div class="footer-bottom-content">
                <div class="copyright">©  2016  Sofani  Designed  with by  <a href="#">YoloTemplate</a></div>
                <figure><img src="images/demo/payment-home-3.png" alt="pay-footer3"/></figure>
              </div>
            </div>
          </div>
        </footer>
      </div>

    
    <!-- .mv-site-->
    
    

    <div class="popup-wrapper">
    </div>
    <!-- .popup-wrapper-->
    <div class="click-back-top-body">
      <button type="button" class="sn-btn sn-btn-style-17 sn-back-to-top fixed-right-bottom"><i class="btn-icon fa fa-angle-up"></i></button>
    </div>

   