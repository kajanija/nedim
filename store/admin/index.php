<?php


?>
<?php

if(isset($_GET["page"])){
    
    $page=$_GET["page"];
    $page1=$page.".php";
    
    if(file_exists($page1)){
        
    }else{
        header("Location: ?page=home");
    }
    
    if($_GET["page"]=="adminlogin"){
        
        
    }else{
        include "header.php";
        
    }
    
    if(file_exists($page1)){
        include $page1;
        if($_GET["page"]==$page1."&&logout"){
            include"logout.php";
        }
        
        
        
    }
}else{
    include "auth.php";
}
include "footer.php";

?>


      