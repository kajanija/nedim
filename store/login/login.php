<?php
session_start();
if(isset($_SESSION["user"])!=""){
    header("Location: ../user/?page=home");
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
                                        <h3 class="expired-title">Login in</h3>
                                        <?php
if(isset($_POST["loginadmin"])){
    include "../db.php";
    $email=$_POST["email"];
    $pas=$_POST["pass"];
    $email=mysqli_real_escape_string($con,$email);
    $pas=mysqli_real_escape_string($con,$pas);
    
    $query=mysqli_query($con,"SELECT * FROM user WHERE email='$email' && pass='$pas'");
    $broj=mysqli_num_rows($query);
    if($broj==0){
        echo'LOGIN EMAIL OR PASSWORD IS WRONG';
    }else{
        $r=mysqli_fetch_assoc($query);
        $id=$r['id'];
      
       $_SESSION["user"]=$id;
        
        echo  $_SESSION["user"];
        header("Location: ../user/?page=home");
            
    }
    
    
}
?>
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
                                                <label for="password">Password</label>
                                                <input class="form-control" type="password" required="" name="pass" placeholder="Enter your password">
                                            </div>
                                        </div>

                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn btn-lg btn-primary btn-block" type="submit" name="loginadmin">Log In</button>
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

