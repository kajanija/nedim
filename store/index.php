
<?php
if(file_exists('install/index.php')){
    header("Location: install/");
}

include "header.php";
?>

<?php
if(isset($_GET["page"])){
    $stranica=$_GET["page"];
    $filename=$stranica.".php";
    if(file_exists($filename)){
        include $filename;
    }else{
        echo "<h1>This page is not fund !!!</h1>";
    }
    
}else{
    include "home.php";
}

?>
   <?php include "footer.php"; ?>