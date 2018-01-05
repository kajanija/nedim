<?php
$id=$_SESSION["user"];
$query=mysqli_query($con,"SELECT * FROM fav WHERE userid='$id'");
while($r=mysqli_fetch_array($query)){
    $productid=$r['productid'];
    $array=array($productid);
    $query=mysqli_query($con,"SELECT * FROM post WHERE id in (".implode(',',$array).")");
  while($r=mysqli_fetch_array($query)){
    echo $r['naslov'];
  
}
    
}


    
    

?>