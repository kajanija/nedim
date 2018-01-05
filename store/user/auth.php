<?php
session_start();
include"../db.php";
if (isset($_SESSION["user"])!="") {   
}else{
 header("Location: ../login/?page=login");
}
?>