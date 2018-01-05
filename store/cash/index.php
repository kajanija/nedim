<?php
$start=microtime(true);
$handle=opendir('aa/');

$cache='dir/siple.chach.php';
$modified=date("i",filemtime($cache));
    $now=date("i");
$rez=$now-$modified;
if(file_exists($cache) && $rez<2){
    echo'chche';
    include $cache;
    
}else   
{
    
    $output=NULL;
    
 
   
        
    
    
    
}
    closedir($handle);
    echo $output;
    $fh=fopen($cache, 'w+') or die('ERORR');
    fwrite($fh,$output);
    fclose($fh);
}

$end=microtime(true);
$time= round(($end-$start),4);
echo $time;
?>