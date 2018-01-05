<div id="page-right-content">
    
    <?php
include "versionnow.php";
$check=file_get_contents('http://localhost/Chat/date/version.php');
if($version<$check){
   
    if(!isset($_GET["install"])){
         echo ' New Version is avible';
    echo ' <br><a href="?page=version&&install=1">INSTALL NEW VERSION</a>';
    }
}else{
    if(!isset($_GET["install"])){
         echo ' New Version not avible';
    }
    
    
}
    if(isset($_GET["install"])){
        if($_GET["install"]==1){
        if(file_put_contents("../update.zip", file_get_contents("http://localhost/Chat/date/Chat.zip"))){
          echo '<br><a href="?page=version&&install=2">Next</a>'; 
        }
        }
        if($_GET["install"]==2){
   $file = '../update.zip';

// get the absolute path to $file
$path = pathinfo(realpath($file), PATHINFO_DIRNAME);

$zip = new ZipArchive;
$res = $zip->open($file);
if ($res === TRUE) {
  // extract it to the path we determined above
  $zip->extractTo($path);
  $zip->close();
  
    if(unlink('../update.zip')){
        $updateversion=fopen('versionnow.php','w+');
        $data='<?php 
        $version='.$check.';
        ?>';
        if(fwrite($updateversion,$data)){
            
            echo'<br><a href="?page=version&&install=3">FINISH</a>';
        }
    }
} else {
  echo "SOMETHING WRONG";
}
         
        }
        if($_GET["install"]==3){
            echo'<h3>UPDATES FINISHED</h3>';
        }
    }
    
    ?>
                     </div>