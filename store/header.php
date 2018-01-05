<?php
session_start();
include "db.php";
require "functions.php";
if(isset($_GET["buy"])){
    if(isset($_GET["cijena"])){
        $cijena=$_GET["cijena"];
        header("Location: testpaypal/payments.php?cijena=$cijena");
    }
                
            }
                
if(isset($_POST["headerdir"])){
    header('location:https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring);
}

error_reporting(E_ALL);


if(isset($_POST["search"])){
    $search=$_POST["searchi"];
    
    
   
    if(!empty($search)){
        header("Location: ?page=search&&search=$search");
    }else{
        echo "Unesite Nesto u pretragu";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon-->
    <link rel="shortcut icon" href="images/icon/favicon.png" type="image/x-icon">

    <!-- Web Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Montserrat:400,700|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Ubuntu:300,300i,400,400i,500,500i,700,700i&amp;amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">

    <!-- Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="libs/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="libs/animate/animated.css">
    <link rel="stylesheet" type="text/css" href="libs/owl.carousel.min/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="libs/jquery.mmenu.all/jquery.mmenu.all.css">
    <link rel="stylesheet" type="text/css" href="libs/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" type="text/css" href="libs/direction/css/noJS.css">
    <link rel="stylesheet" type="text/css" href="libs/prettyphoto-master/css/prettyPhoto.css">
    <link rel="stylesheet" type="text/css" href="libs/slick-sider/slick.min.css">

    <!-- Template CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')
    script(src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js')
    
    -->
  </head>
    <?php
    if(isset($_GET["page"])){
        if($_GET["page"]=="cart"){
            echo'<body class="product-page cart">';
        
        }elseif($_GET["page"]=="post"){
           
                
                     echo'<body class="product-page single-product variable-product ">
    </div>';
                 
       
    }else{
            echo'<body class="home-1">';
        }
    }
    
    ?>
  <body class="home-1">
    
    <div class="sn-site">
      <div class="header sn-header-style-1">
        <div class="header-top">
          <div class="container">
            <div class="header-top-left">
              <aside id="text-2" class="widget widget_text">
                  <?php
                  include "db.php";
                  $query=mysqli_query($con,"SELECT * FROM storeinfo");
                  $r=mysqli_fetch_array($query);
                  $storeemail=$r['emil'];
                  $storebrojtelefona=$r['brojtelefona'];
                  $storeradnidani=$r['radi_danima'];
                  $storeradisati=$r['radi_sati'];
                  
                  echo '
                <div class="textwidget"><i class="fa fa-envelope-o"></i>'.$storeemail.'</div>
              </aside>
              <aside id="text-3" class="widget widget_text">
                <div class="textwidget"><i class="fa fa-mobile"></i>'.$storebrojtelefona.'</div>
              </aside>
              <aside id="text-4" class="widget widget_text">
                <div class="textwidget"><i class="fa fa-clock-o"></i>'.  $storeradnidani.' : '.$storeradisati.'</div>
              </aside>';
                    ?>
                </aside>
            </div>
            <div class="header-top-right">
              <div class="header-top-div header-top-search"> 
                  <form method="post" >
                <input type="text"  name="searchi" placeholder="Search Product..." />
                  <input type="submit" class="btn"   value="Search" name="search" />
                      </form>
              </div>
            </div>
          </div>
        </div><a href="#primary-menu"><i class="fa fa-bars"></i></a>
        <div class="container">
          <div class="header-bottom">

            <div class="main-nav-wrapper header-left">
              <div class="header-logo pull-left"><a href="index.html" title="LOGO"><img src="logo.png" alt="logo" class="logo-img"/></a></div>
              <!-- .header-logo-->

              <nav id="primary-menu" class="main-nav">
                <ul class="nav">
                  <li class="active menu-item menu-page"><a href="?page=home">Home</a>
                 
                      
                        <ul class="sub-menu">
                            <?php 
                            $query=mysqli_query($con,"SELECT * FROM kategorije");
                            while($r=mysqli_fetch_array($query)){
                                $id=$r['id'];
                                $ime=$r['ime'];
                                print '<li class="menu-item"><a href="?page=posts&&category='.$id.'">'.$ime.'</a></li>';
                                
                            }
                                
                          
                         ?>
                        </ul>
                     
                      
                    
                  </li>
                  <li class="mega-menu menu-item"><a href="?page=cart">Cart</a>
                    <ul class="sub-menu sub-menu-mega">
                      </ul>
                  <li class="menu-item menu-blog"><a href="?page=posts">Products</a>
                    
                  </li>
                  
                  <li class="menu-item menu-blog"><a href="login/?page=register">LOGIN or REGISTRATION</a>
                    <ul class="sub-menu">
                      <li><a href="login/?page=register">REGISTRATION</a></li>
                      <li><a href="login/?page=login">LOGIN</a></li>
                      
                    </ul>
                  </li>
                </ul>
                <div class="header-customize-item canvas-menu-toggle-wrapper">
                  <div class="canvas-menu-toggle"><i class="fa fa-bars"></i></div>
                </div>
                <ul class="header-customize-item header-social-profile-wrapper">
                  <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#" target="_blank"><i class="fa fa-skype"></i></a></li>
                  <li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>
                  <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                </ul>
              </nav>
              <!-- .header-main-nav-->
            </div>
  <?php
                                if(isset($_SESSION["user"])!=""){
                                    $iduser=$_SESSION["user"];
                                    $query=mysqli_query($con,"SELECT * FROM cart WHERE idkorisnika='$iduser'");
                                   $broj=mysqli_num_rows($query);
                                    $output='';
                                    if($broj>0){
                                         while($r=mysqli_fetch_assoc($query)){
                                            $naslov=$r['naslov'];
                                            $cijena=$r['cijena'];
                                            $output .=' <li>
                              
                              <h4>'.$naslov.'</h4>
                              <p>$'.$cijena.'</p>
                            </li>';
                                        }
                                        
                                    }else{
                                        $output='  <h4>An empty cart</h4>
                              <p>You have no item in your shopping cart</p>';
                                    }
                                        
                                }else{
                                    $output='<h4>You must be loged in</h4>
                              <p>Please login or register <a href="login/?page=register">here</a></p>';
                                    $broj=0;
                                }
                                ?>
            <div class="main-nav-wrapper header-right">
              <div class="header-right-box">
                <div class="header-customize header-customize-right">
                  <div class="shopping-cart-wrapper header-customize-item no-price style-default">
                    <div class="widget_shopping_cart_content">
                      <div class="widget_shopping_cart_icon" href="?page=cart" ><i class="wicon fa fa-cart-plus" ></i><span class="total"><?php echo $broj; ?></span></div>
                      <div class="sub-total-text"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>0.00</span></div>
                      <div class="cart_list_wrapper">
                        <div class="scroll-wrapper cart_list product_list_widget scrollbar-inner">
                          <ul class="cart_list product_list_widget scrollbar-inner scroll-content">
                            <?php
                             echo $output;
                              ?>
                          </ul>
                        </div>
                        <!-- end product list-->
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>

          </div>
        </div>
        <nav data-ps-id="3859a354-888f-fe67-254f-cd059357f1c2" class="yolo-canvas-menu-wrapper dark ps-container"><a href="#" class="yolo-canvas-menu-close"><i class="fa fa-close"></i></a>
          <div class="yolo-canvas-menu-inner sidebar">
            <aside id="text-5" class="widget widget_text">
              <div class="textwidget">
                <div class="about-us-widget text-center">
                  <div class="about-image"><img src="images/demo/about-us.png" alt=""/></div>
                  <div class="about-description">Hi, I am John Doe - web designer & blogger. I love design and travel a lot. Explore new places and meet friends. Enjoy my template!</div>
                </div>
              </div>
            </aside>
            <aside id="yolo-social-profile-2" class="text-center widget widget-social-profile">
              <ul class="social-profile social-icon-bordered">
                <li><a title="Twitter" href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a title="Facebook" href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a title="GooglePlus" href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                <li><a title="Instagram" href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
              </ul>
            </aside>
            <aside id="null-instagram-feed-5" class="instagram-col-3 padding-2 widget widget null-instagram-feed">
              <h4 class="widget-title"><span>Instagram</span></h4>
              <ul class="intagram">
                <li><a href="#"><img src="images/demo/instagram-1.jpg" alt="tag-mega"/></a></li>
                <li><a href="#"><img src="images/demo/instagram-2.jpg" alt="tag-mega"/></a></li>
                <li><a href="#"><img src="images/demo/instagram-3.jpg" alt="tag-mega"/></a></li>
                <li><a href="#"><img src="images/demo/instagram-4.jpg" alt="tag-mega"/></a></li>
                <li><a href="#"><img src="images/demo/instagram-5.jpg" alt="tag-mega"/></a></li>
                <li><a href="#"><img src="images/demo/instagram-6.jpg" alt="tag-mega"/></a></li>
              </ul>
              <p class="clear"><a href="#" rel="me" target="_blank">Follow Me!</a></p>
            </aside>
          </div>
        </nav>
      </div>
        <div id="example-wrapper">
        <div class="section">
          <div class="slide-home slide-home-1">
            <div data-number="1" data-margin="100" data-loop="yes" data-navcontrol="yes" class="sofani-owl-carousel">
                <?php
                if(isset($_GET["page"])){
                    $page=$_GET["page"];
                    if($page!="home"){
                        
                    }else{
                        $query=mysqli_query($con,"SELECT * FROM slider");
                while($r=mysqli_fetch_array($query)){
                    $title=$r['title'];
                    $naslov=$r['naslov'];
                    $text=$r['text'];
                    $logo=$r['logo'];
                    $link=$r['link'];
                    $slika=$r['slika'];
                    echo' <div class="slide1">
                <div class="slide1-left">
                  <div class="title">'.$title.'</div>
                  <h1>'.$naslov.'</h1>
                  <div style="max-width:200px;"> <p style="text-agiln:center; 
                  color: black;
                  max-width: 100px;">'.$text.'</p></div><a href="'.$link.'">Read more</a>
                </div>
                <div class="slide1-right">
                  <figure><img style="max-height: 555px" src="'.$slika.'" alt="slide" height="555px"/></figure>
                  <div class="slide1-content">Nedim</div>
                </div>
              </div>';
                    
                }
                    }
                    
                    
                    
                }elseif(!isset($_GET["page"])){
                     $query=mysqli_query($con,"SELECT * FROM slider");
                while($r=mysqli_fetch_array($query)){
                    $title=$r['title'];
                    $naslov=$r['naslov'];
                    $text=$r['text'];
                    $logo=$r['logo'];
                    $link=$r['link'];
                    $slika=$r['slika'];
                    echo' <div class="slide1">
                <div class="slide1-left">
                  <div class="title">'.$title.'</div>
                  <h1>'.$naslov.'</h1>
                  <div style="max-width:200px;"> <p style="text-agiln:center; 
                  color: black;
                  max-width: 100px;">'.$text.'</p></div><a href="'.$link.'">Read more</a>
                </div>
                <div class="slide1-right">
                  <figure><img style="max-height: 555px" src="'.$slika.'" alt="slide" height="555px"/></figure>
                  <div class="slide1-content">Nedim</div>
                </div>
              </div>';
                    
                }
                }
                
               
                
                ?>
             
              
            </div>
          </div>
        </div>
            