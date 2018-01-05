<div id="page-right-content">
    
<?php
    

    if(isset($_GET["del"])){
        $slika=$_GET["del"];
        $slika=mysqli_real_escape_string($con,$slika);
                $query=mysqli_query($con,"DELETE FROM relship WHERE slika='$slika'");
            }
    $query=mysqli_query($con,"SELECT id FROM post order by id desc limit 1");
    $r=mysqli_fetch_assoc($query);
    $idofpost=$r['id'];
    $id=$idofpost+1;
    

if(isset($_POST["uploadimage"])){
 
    
    
    $target_dir = "../uploadsimage/";
$target_file=$target_dir . basename($_FILES["image"]["name"]);
    $temp = explode(".", $_FILES["image"]["name"]);
    $p=rand(1,1000000000);
        $a=rand(1,1000000000);
        $b=rand(1,1000000000);
$newfilename = $p.$a.$b.time().round(microtime(true)) . '.' . end($temp);
    $fulnamepath=$newfilename;
if (move_uploaded_file($_FILES["image"]["tmp_name"], "../uploadsimage/" . $newfilename)) {
  
        $query=mysqli_query($con,"INSERT INTO relship (idpost,slika) VALUES ('$id','$fulnamepath')");
    if($query){
        $query=mysqli_query($con,"SELECT * FROM relship WHERE idpost='$id'");
        while($k=mysqli_fetch_assoc($query)){
            $slika=$k['slika'];
            echo '<img src="../uploadsimage/'.$slika.'" height="200" width="200">';
            
        }
        
    }
    } else {
        echo '<img src="'.$target_file.'">';
    }
}
if(isset($_POST["publishpost"])){
    if(!empty($_POST["title"])){
        $title=$_POST["title"];
        $opis=$_POST["editor"];
        $price=$_POST["price"];
        $price=mysqli_real_escape_string($con,$price);
        $opis=mysqli_real_escape_string($con,$opis);
        $title=mysqli_real_escape_string($con,$title);
        $datum=date("Y-m-d");
        $kategorija=$_POST["category"];
        $query=mysqli_query($con,"UPDATE relship SET vidljivo='1' WHERE idpost='$id'");
        if(isset($_GET["thumbnail"])){
        $slikazathumbnail=$_GET["thumbnail"];
            echo'lalalalalal  '.$slikazathumbnail;
            $slikazathumbnail=mysqli_real_escape_string($con,$slikazathumbnail);
        $query=mysqli_query($con,"INSERT INTO post (id,naslov,opis,cijena,autor,kategorija,datum,thumbnail,vrsta) VALUES ('$id','$title','$opis','$price','Nedim Kajanija','$kategorija',now(),'$slikazathumbnail','obicni')");
        if($query){
            echo "<h2>SUCCSESS !!!</h2>";
        
        }
    }else{
        $query=mysqli_query($con,"INSERT INTO post (id,naslov,opis,cijena,autor,kategorija,datum,vrsta) VALUES ('$id','$title','$opis','$price','Nedim Kajanija','$kategorija',now(),'obicni')");
        if($query){
            echo "<h2>SUCCSESS !!!</h2>";
        
        }
        }
        
        
    }}
?>


<script src="../editor/ckeditor.js"></script>
  <link href="assets/css/forma.css" rel="stylesheet">

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#1a">IMAGES</a></li>
  <li><a data-toggle="tab" href="#2a">DESCRIPTION</a></li>
     <li><a data-toggle="tab" href="#3a">TITLE</a></li>
    <li><a data-toggle="tab" href="#4a">PRICE</a></li>
    <li><a data-toggle="tab" href="#5a">CATEGORY</a></li>
    <li><a data-toggle="tab" href="#7a">FINISH</a></li>
   
</ul>
<form method="post" enctype="multipart/form-data">
<div class="tab-content">
  <div id="3a" class="tab-pane fade">
    <input class="input" type="text" name="title" placeholder="TITLE OF YOUR PRODUCT" />
  </div>
  <div id="2a" class="tab-pane fade">
    <textarea class="ckeditor" name="editor"></textarea>
      
  </div>
    <div id="1a" class="tab-pane fade in active">
        <h2>UPLOAD IMAGES</h2>
      <input type="file" name="image" id="image" />
    <button type="submit" name="uploadimage" class="submit">UPLOAD</button>
        
        <?php
        $query=mysqli_query($con,"SELECT * FROM relship WHERE idpost='$id'");
        echo'<br>';
        while($k=mysqli_fetch_assoc($query)){
            $slika=$k['slika'];
            
            echo '
            <div><img src="../uploadsimage/'.$slika.'" alt="" width="100" height="100">
  <div class="bottom-left"><a href="?page=post&&del='.$slika.'">REMOVE</a></div>
  <div class="bottom-left"><a href="?page=post&&thumbnail='.$slika.'">SET AS THUMBNAIL OF THIS PRODUCT</a></div>
  
</div>';
            
        }
        ?>
      
  </div>
    <div id="7a" class="tab-pane fade">
    <button class="finish" type="submit" name="publishpost">PUBLISH</button>
  </div>
     <div id="4a" class="tab-pane fade">
         <input class="input" type="number" name="price" placeholder="PRICE OF PRODUCT (only number !!!)" />
   
  </div>
     <div id="5a" class="tab-pane fade">
         <h3>SELECT CATEGORY</h3>
        <?php
         $query=mysqli_query($con,"SELECT * FROM kategorije");
         while($r=mysqli_fetch_assoc($query)){
             $kat=$r['ime'];
             echo '<br><input id="'.$kat.'" class="category" type="radio" name="category" value="'.$kat.'" /><label for="'.$kat.'class="kate">'.$kat.'</label>';
         }
         
         ?>
   
  </div>
    
    </div>
   
    

</form>
    

</div>