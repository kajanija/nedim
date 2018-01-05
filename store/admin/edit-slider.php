  <!-- Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../libs/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../libs/animate/animated.css">
    <link rel="stylesheet" type="text/css" href="../libs/owl.carousel.min/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="../libs/jquery.mmenu.all/jquery.mmenu.all.css">
    <link rel="stylesheet" type="text/css" href="../libs/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" type="text/css" href="../libs/direction/css/noJS.css">
    <link rel="stylesheet" type="text/css" href="../libs/prettyphoto-master/css/prettyPhoto.css">
    <link rel="stylesheet" type="text/css" href="../libs/slick-sider/slick.min.css">

    <!-- Template CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/home.css">
<script src="../editor/ckeditor.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')
    script(src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js')-->
    
<div id="page-right-content">
    
    
    <form method="post">
    <?php
    if(isset($_GET["edit"])){
        $id=$_GET["edit"];
        $id=mysqli_real_escape_string($con,$id);
        $query=mysqli_query($con,"SELECT * FROM slider WHERE id='$id'");
        if($r=mysqli_fetch_assoc($query)){
            $title=$r['title'];
                    $naslov=$r['naslov'];
                    $text=$r['text'];
                    $logo=$r['logo'];
                    $link=$r['link'];
                    $slika=$r['slika'];
            echo '
            <h3>EDIT TITLE</h3>
            <input style="width:50%; height:40px; font-size:30px;"type="text" name="titleslideredit" placeholder="OLD TITLE IS : '.$title.'" />
            <h3>EDIT HEAD TITLE</h3>
            <input style="width:50%; height:40px; font-size:30px;" type="text" name="naslovslideredit" placeholder="OLD HEADTITLE  IS : '.$naslov.'"/>
            <h3>EDIT LOGO TEXT</h3>
            <input style="width:50%; height:40px; font-size:30px;" type="text" name="logoslideredit" placeholder="OLD LOGO TEXT IS : '.$logo.'"/>
            <h3>EDIT READMORE LINK</h3>
            <input style="width:50%; height:40px; font-size:30px;" type="text" name="linkslideredit" placeholder="OLD READMORE LINK  : '.$link.'"/>
            <h3><a data-toggle="collapse" data-target="#editslidertext">EDIT TEXT OF SLIDER</a> </h3>
            
            <div id="editslidertext" class="collapse"><textarea class="ckeditor" name="textslideredit">'.$text.'</textarea></div>
            
            <h3>EDIT BACKGROUNG IMAGE</h3>
            <input style="width:50%; height:40px; font-size:30px;" type="file" name="slika" />
            <h3>BACKGROUNG IMAGE NOW IS </h3>
            <img src="../'.$slika.'" height="300px" width="300px">
            
            
            ';
           
            
            
            
        }
    }
    
    ?><br><button type="submit" name="editslider" >UPDATE SLIDER</button>
                  </form>
    <?php
    if(isset($_POST["editslider"])){
        if(!empty($_POST["titleslideredit"])){
            $titleslideredit=$_POST["titleslideredit"];
            
        }else{
            $titleslideredit=$title;
        }
        if(!empty($_POST["naslovslideredit"])){
            $novinaslov=$_POST["naslovslideredit"];
        }else{
            $novinaslov=$naslov;
        }
        if(!empty($_POST["logoslideredit"])){
            $novilogo=$_POST["logoslideredit"];
            
        }else{
            $novilogo=$logo;
        }
        if(!empty($_POST["linkslideredit"])){
            $novilink=$_POST["linkslideredit"];
        }else{
            $novilink=$link;
        }
            if($_POST["textslideredit"]!=$text){
                $novitext=$_POST["textslideredit"];
            }else{
                $novitext=$text;
            }
        $query=mysqli_query($con,"UPDATE slider SET title='$titleslideredit', naslov='$novinaslov', text='$novitext', logo='$novilogo', link='$novilink' WHERE id='$id'");
        if($query){
            echo' SLIDER IS UPDATED';
        }
        
    }
    
    ?>
    
    <div id="example-wrapper">
<div class="section">
          <div class="slide-home slide-home-1">
            <div data-number="1" data-margin="100" data-loop="yes" data-navcontrol="yes" class="sofani-owl-carousel">
                <?php
               
               
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
                  <figure><img style="max-height: 555px" src="../'.$slika.'" alt="slide" height="555px"/></figure>
                  <div class="slide1-content">'.$logo.'</div>
                </div>
              </div>';
                    
               
                    
                    
                
                
               
                }
                
                ?>
             
              </div>
            </div>
          </div>
        </div>
    <?php
    $query=mysqli_query($con,"SELECT * FROM slider");
    while($r=mysqli_fetch_assoc($query)){
        $naslov=$r['naslov'];
        $id=$r['id'];
        echo'<h1>'.$naslov.'</h1><a href="?page=edit-slider&&edit='.$id.'">EDIT</a><a href="?page=edit-slider&&remove='.$id.'">  REMOVE</a>';
    }
    echo'<h2><a href="?page=edit-slider&&add=1">ADD NEW SLIDER</a></h2>';
    
    ?>
</div>
<script type="text/javascript" src="../libs/jquery/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../libs/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../libs/animate/wow.min.js"></script>
    <script type="text/javascript" src="../libs/owl.carousel.min/owl.carousel.min.js"></script>
    <script type="text/javascript" src="../libs/jquery.mmenu.all/jquery.mmenu.all.min.js"></script>
    <script type="text/javascript" src="../libs/countdown/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="../libs/jquery-appear/jquery.appear.min.js"></script>
    <script type="text/javascript" src="../libs/jquery-countto/jquery.countTo.min.js"></script>
    <script type="text/javascript" src="../libs/direction/js/jquery.hoverdir.js"></script>
    <script type="text/javascript" src="../libs/direction/js/modernizr.custom.97074.js"></script>
    <script type="text/javascript" src="../libs/isotope/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="../libs/isotope/fit-columns.js"></script>
    <script type="text/javascript" src="../libs/isotope/isotope-docs.min.js"></script>
    <script type="text/javascript" src="../libs/mansory/mansory.js"></script>
    <script type="text/javascript" src="../libs/prettyphoto-master/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="../libs/slick-sider/slick.min.js"></script>
    <script type="text/javascript" src="../js/min/main.min.js"></script>