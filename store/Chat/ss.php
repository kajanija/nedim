<?php

include "../db.php";
        if(isset($_SESSION["user"])!=""){
            $id=$_SESSION["user"];
            
            $query=mysqli_query($con,"SELECT * FROM user WHERE id='$id'");
            $r=mysqli_fetch_assoc($query);
            $name=$r['name'];
            $nedim=$name;
          
            
        }
?>