<?php
session_start();
if(isset($_SESSION["user"])!=""){
    header("Location: ../user/?page=home");
}
if(isset($_POST["register"])){
    include "../db.php";
    $email=$_POST["email"];
    $pas=$_POST["pass"];
    $fullname=$_POST["name"];
    $city=$_POST["city"];
    $country=$_POST["country"];
    $state=$_POST["state"];
    $pass2=$_POST["pass2"];
    $email=mysqli_real_escape_string($con,$email);
    $pas=mysqli_real_escape_string($con,$pas);
    $fullname=mysqli_real_escape_string($con,$fullname);
    $city=mysqli_real_escape_string($con,$city);
    $country=mysqli_real_escape_string($con,$country);
    $state=mysqli_real_escape_string($con,$state);
    $pass2=mysqli_real_escape_string($con,$pass2);
    if(!empty($email && $pas && $fullname && $city && $country && $state && $pass2)){
        if($pas==$pass2){
             $query=mysqli_query($con,"INSERT INTO user (email,pass,name,city,country,state) VALUES ('$email','$pas','$fullname','$city','$country','$state')");
            if($query){
                header("Location: ?page=login");
            }else{
                echo ' ERROR TRY AGIN';
            }
            
            
        }else{
            echo ' PASSWORDS IS NOT SAME ';
        }
       
    }else{
        echo"eror";
    }
    
    
    
}
?>

<meta charset="utf-8" />
        <title>SimpleAdmin - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="../admin/assets/images/favicon.ico">

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="../admin/assets/plugins/morris/morris.css">

        <!-- Bootstrap core CSS -->
        <link href="../admin/assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="../admin/assets/css/metisMenu.min.css" rel="stylesheet">
        <!-- Icons CSS -->
        <link href="../admin/assets/css/icons.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="../admin/assets/css/style.css" rel="stylesheet">
        <!-- HOME -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="m-t-40 card-box">

                                <div class="account-content">
                                    <div class="text-center m-b-20">
                                        <img src="../admin/assets/images/warming.svg" title="invite.svg" height="100" class="m-t-10">
                                        <h3 class="expired-title">Make your Account
                                        <h3><a href="?page=login">Login</a></h3></h3>
                                        
                                    </div>
                                    
                                    <form class="form-horizontal" method="post">

                                        <div class="form-group m-b-20">
                                            <div class="col-xs-12">
                                                <label for="emailaddress">Email address</label>
                                                <input class="form-control" type="email" name="email" required="" placeholder="john@deo.com" >
                                            </div>
                                        </div>
                                        <div class="form-group m-b-20">
                                            <div class="col-xs-12">
                                                <label for="emailaddress">Full Name</label>
                                                <input class="form-control" type="text" name="name" required="" placeholder="Johan Jonson" >
                                            </div>
                                        </div>
                                        <div class="form-group m-b-20">
                                            <div class="col-xs-12">
                                                <label for="emailaddress">City</label>
                                                <input class="form-control" type="text" name="city" required="" placeholder="New York" >
                                            </div>
                                        </div>
                                        <div class="form-group m-b-20">
                                            <div class="col-xs-12">
                                                <label for="emailaddress">Country</label>
                                                <input class="form-control" type="text" name="country" required="" placeholder="America" >
                                            </div>
                                        </div>
                                        <div class="form-group m-b-20">
                                            <div class="col-xs-12">
                                                <label for="emailaddress">State</label>
                                                <input class="form-control" type="text" name="state" required="" placeholder="Old Town" >
                                            </div>
                                        </div>
                                        
                                        <div class="form-group m-b-20">
                                            <div class="col-xs-12">
                                                <label for="password">Password</label>
                                                <input class="form-control" type="password" required="" name="pass" placeholder="Enter your password">
                                            </div>
                                        </div>
                                        <div class="form-group m-b-20">
                                            <div class="col-xs-12">
                                                <label for="password">Password Agin</label>
                                                <input class="form-control" type="password" required="" name="pass2" placeholder="Enter your password">
                                            </div>
                                        </div>

                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Register</button>
                                            </div>
                                        </div>

                                    </form>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->
                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
        </section>
        <!-- END HOME -->

