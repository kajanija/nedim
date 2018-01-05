<?php
function deletedirandfiles($dirPath) {
    if (is_dir($dirPath)) {
        $objects = scandir($dirPath);
        foreach ($objects as $object) {
            if ($object != "." && $object !="..") {
                if (filetype($dirPath . DIRECTORY_SEPARATOR . $object) == "dir") {
                    deleteDirectory($dirPath . DIRECTORY_SEPARATOR . $object);
                } else {
                    unlink($dirPath . DIRECTORY_SEPARATOR . $object);
                }
            }
        }
    reset($objects);
    rmdir($dirPath);
    }
}
function makefile($data,$filename){
    $fh=fopen($filename,"w+");
    fwrite($fh,$data);
    fclose($fh);
        
}


function iffilter(){
    if(isset($_GET["filter"])){
                      echo'

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script>
      $(window).load(function() {
        var theHash = "#div1";
        $("html, body").animate({scrollTop:$(theHash).offset().top}, 800);
      });
    </script>';
        $filter=$_GET["filter"];
     define('nasloviznadkategorije',$filter);
                  }
 if(!isset($_GET["filter"])){
      define('nasloviznadkategorije','');
 }
}
function storeinfo(){
    include "db.php";
    $query=mysqli_query($con,"SELECT * FROM storeinfo");
    $r=mysqli_fetch_array($query);
    
}
function ifsearch(){
    if(isset($_GET["search"])){
                      echo'

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script>
      $(window).load(function() {
        var theHash = "#search";
        $("html, body").animate({scrollTop:$(theHash).offset().top}, 800);
      });
    </script>';
}
}
function resizeImage($filename, $newwidth, $newheight){
    list($width, $height) = getimagesize($filename);
    if($width > $height && $newheight < $height){
        $newheight = $height / ($width / $newwidth);
    } else if ($width < $height && $newwidth < $width) {
        $newwidth = $width / ($height / $newheight);    
    } else {
        $newwidth = $width;
        $newheight = $height;
    }
    $thumb = imagecreatetruecolor($newwidth, $newheight);
    $source = imagecreatefromjpeg($filename);
    imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    return imagejpeg($thumb);
}
?>