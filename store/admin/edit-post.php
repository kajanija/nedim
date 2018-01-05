<style>
div.scroll {
   
    width: 100%;
    height: 300px;
    overflow: scroll;
}
    </style>
<?php

include"css.php";
?>
<script src="../editor/ckeditor.js"></script>
<link href="assets/css/forma.css" rel="stylesheet">

<div id="page-right-content">
    <form method="post">
    <input type="text" name="searchposttxt" placeholder="SEARCH ARTICLE"/>
    <button class="btn" type="submit" name="searchpost">SEARCH</button></form>
<div class="row">   <div style="max-height=20px;">   <ul><?php
    if(isset($_GET["searchpost"])){
        $search=$_GET["searchpost"];
        $search=mysqli_real_escape_string($con,$search);
        $search="%".$search."%";
        $query=mysqli_query($con,"SELECT * FROM post WHERE naslov LIKE '$search'");
        
    }else{
        $query=mysqli_query($con,"SELECT * FROM post");
    }
    echo'<div class="scroll">';
    while($r=mysqli_fetch_assoc($query)){
        $naslov=$r['naslov'];
        $cat=$r['kategorija'];
        $slika=$r['thumbnail'];
        $id=$r['id'];
        echo '<li>
        <a  href="?page=edit-post&&postid='.$id.'">'.$naslov.'</a></li>
                                    ';
        
        
    }
    echo '</div>';
    ?>
    
    </ul>
    </div>
    
    <div class="tab-content">
        <div class="tab-pane active"><h1>EDIT YOUR PRODUCT</h1></div>
        <?php
        if(isset($_GET["searchpost"])){
        $search=$_GET["searchpost"];
        $search=mysqli_real_escape_string($con,$search);
        $search="%".$search."%";
        $query=mysqli_query($con,"SELECT * FROM post WHERE naslov LIKE '$search'");
        
    }else{
        $query=mysqli_query($con,"SELECT * FROM post");
    }
    while($r=mysqli_fetch_assoc($query)){
        $naslov=$r['naslov'];
        $cat=$r['kategorija'];
        $slika=$r['thumbnail'];
        $id=$r['id'];
        echo '<div  id="a'.$id.'" class="tab-pane"  ><h2>'.$naslov.'</h2>
        <div><img src="../uploadsimage/'.$slika.'"></div>
        <div><span><img src="icons/edit.png"><a data-toggle="collapse" data-target="#edit" href="?page=edit-post&&postid='.$id.'">EDIT</a>EDIT</span></div></div>';
        }
    ?>
    
    
    
    
    </div>
    <div id="edit" class="">
        
        <form method="post">
    <?php
        if(isset($_GET["postid"])){
            $postid=$_GET["postid"];
            $postid=mysqli_real_escape_string($con,$postid);
            $query=mysqli_query($con,"SELECT * FROM post WHERE id='$postid'");
            
            if($r=mysqli_fetch_assoc($query)){
                $naslov=$r['naslov'];
                $slika=$r['thumbnail'];
                $cijena=$r['cijena'];
                $opis=$r['opis'];
                $vrsta=$r['vrsta'];
                $datum=$r['datum'];
                $pregledi=$r['pregledi'];
                $kategorija=$r['kategorija'];
                echo'<img src="../uploadsimage/'.$slika.'">';
               echo'<h2>TITLE</h2> <input style="min-width:50%; min-height=50px; font-size:30px;" type="text" name="editnaslov" placeholder="NOW TITLE IS :'.$naslov.'" />
               <h2>NEW PRICE </h2> <input style="min-width:50%; min-height=50px; font-size:30px;" type="text" name="editcijena" placeholder="NOW PRICE IS : '.$cijena.'" />
               <h2>CHANGE PRODUCT </h2>
               <h4>SALLE</h4><input type="radio" name="vrsta" value="popust" />
               <h4>SOLD</h4><input type="radio" name="vrsta" value="neaktivan" />
               <h2>CHANGE CATEGORY</h2>';
                $query=mysqli_query($con,"SELECT * FROM kategorije");
                while($r=mysqli_fetch_assoc($query)){
                    $kat=$r['ime'];
                    echo'<li><span>'.$kat.'</span><input type="radio" name="category" value="'.$kat.'" /></li>';
                    
                }
                echo'<h2>Change Thumbnail</h2>';
                $query=mysqli_query($con,"SELECT * FROM relship WHERE idpost='$postid'");
                    while($r=mysqli_fetch_assoc($query)){
                        $slika=$r['slika'];
                        echo'<li><input type="radio" name="thumbnail" valeu="'.$slika.'"  /><span><img style="max-height:200px; max-width:200px;"  src="../uploadsimage/'.$slika.'"></span></li>';
                    }
                    
                
                 
            echo'<a data-toggle="collapse" data-target="#opis"><h2>EDIT DESCRIPTION</h2></a><div id="opis" class="collapse"><textarea class="ckeditor" style="max-height:500px; max-width:500px;" name="opis">'.$opis.'</textarea></div>'; 
                echo' <button class="finish" type="submit" name="editpost">UPDATE POST</button>';
                
            }
            
            
        }
        
        
        
        ?>
            
        
    </form></div>
    <?php
        if(isset($_POST["editpost"])){
            $editnaslov=$_POST["editnaslov"];
            $editcijena=$_POST["editcijena"];
            if(isset($_POST["vrsta"])){
                $editvrsta=$_POST["vrsta"];
                $editvrsta=htmlspecialchars($editvrsta);
                if($editvrsta=="neaktivan"){
                    $ativnoedit=0;
                }else{
                    $ativnoedit=1; 
                }
            }
            if(isset($_POST["category"])){
                $editcategory=$_POST["category"];
                  $editcategory=htmlspecialchars($editcategory);
            }else{
                $editcategory=$kategorija;
                
            }
            if(isset($_POST["thumbnail"])){
                $editthumbnail=$_POST["thumbnail"];
               
            }else{
                $editthumbnail=$slika;
            }
                
                
                $editopis=$_POST["opis"];
            
            
            $editnaslov=htmlspecialchars($editnaslov);
            $editcijena=htmlspecialchars($editcijena);
                
              
               
                $editopis=htmlspecialchars($editopis);
            if(!empty($editnaslov)){
                $novinaslov=$editnaslov;
                
            }else{
                $novinaslov=$naslov;
            }
             if(!empty($editcijena)){
                $novacijena=$editcijena;
                
            }else{
                $novacijena=$cijena;
            }
             if(isset($editvrsta)){
                $novavrsta=$editvrsta;
                
            }
             if(isset($editcategory)){
                $novacat=$editcategory;
                
            }else{
                $novacat=$kategorija;
             }
             
            if($editopis==$opis){
                $noviopis=$opis;
            }else{
                $noviopis=$editopis;
            }
            if(!isset($editvrsta)){
                if($novacijena<$cijena){
                    $novavrsta="popust";
                     $ativnoedit=1;
                }else{
                     $novavrsta="obicni";
                     $ativnoedit=1;
                }
                
            }
               
            
            
            
            $query=mysqli_query($con,"UPDATE post SET naslov='$novinaslov', cijena='$novacijena',vrsta='$novavrsta', kategorija='$novacat', thumbnail='$editthumbnail', opis='$noviopis',novacijena='$novacijena', staracijene='$cijena', datum='$datum', pregledi='$pregledi', aktivno='$ativnoedit' WHERE id='$postid'");
            if($query){
                echo'SUCCSESS   '.$editthumbnail;
            }
            
        }
        
        ?>
                                
     


                            </div>

                        </div>
                        <!-- end row -->

