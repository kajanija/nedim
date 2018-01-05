<?php
 $fn = '../uploadsimage/iterior.jpg';
$size = getimagesize($fn);
$ratio = $size[0]/$size[1]; // width/height
if( $ratio > 1) {
    $width = 300;
    $height = 400;
}
else {
    $width = 500*$ratio;
    $height = 500;
}
$src = imagecreatefromstring(file_get_contents($fn));
$dst = imagecreatetruecolor($width,$height);
imagecopyresampled($dst,$src,0,0,0,0,$width,$height,$size[0],$size[1]);
imagedestroy($src);
$target_filename_here='../uploadsimage/iterior1.jpg';
imagepng($dst,$target_filename_here); // adjust format as needed
imagedestroy($dst);
 ?>
