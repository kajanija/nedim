<?php
if(isset($_GET["page"])){
    
    if($_GET["page"]=="login"){
        include "login.php";
    }elseif($_GET["page"]=="register"){
        include"register.php";
        
    }elseif($_GET["page"]=="logout"){
        include "logout.php";
        
    }else{
        header("Location: ?page=login");
        
    }
    
    
}else{
    header("Location: ?page=login");
}

?>