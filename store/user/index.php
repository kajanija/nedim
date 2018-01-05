<?php
include "auth.php";
if(isset($_GET["page"])){
    $page=$_GET["page"];
    $page1=$page.".php";
    if(file_exists($page1)){
        include $page1;
    }else{
        header ("Location: ../login/?page=login");
    }
}else{
    header ("Location: ../login/?page=login");
}
include "../admin/footer.php";

?>