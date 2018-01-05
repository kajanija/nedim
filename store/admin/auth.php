<?php
session_start();
if (isset($_SESSION["admin"])!="") {
    
    $query=mysqli_query($con,"SELECT * FROM admin");
    $r=mysqli_fetch_array($query);
    $email=$r['email'];
    $isadmin=$r['Is_admin'];
    if($isadmin==0){
        echo " Vi niste admin , Molimo napustite admin panel.";
        
    }
 if($isadmin==1){
     define('adminlvl','Head Admin');
     
 }
    if($isadmin==2){
     define('adminlvl','Zamjenik');
     
 }
    if($isadmin==3){
     define('adminlvl','Support');
     
 }
    if($isadmin==4){
     define('adminlvl','Administrator');
     
 }
    if($isadmin==5){
     define('adminlvl','E mail Pomocnik');
     
 }
   
    
}else{
 header("Location: ?page=adminlogin");
}
?>