<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['signin']))
{
$Email=$_POST['mail'];
$password=md5($_POST['password']);
$sql1 ="SELECT email,pswrd FROM admin WHERE email=:Email and pswrd=:password";
$query1= $dbh -> prepare($sql1);
$query1-> bindParam(':Email', $Email, PDO::PARAM_STR);
$query1-> bindParam(':password', $password, PDO::PARAM_STR);
$query1-> execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
if($query1->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['mail'];
$msg="Succès";
header("Location: index.php");

} else{
  $sql ="SELECT * FROM admin";
$query= $dbh -> prepare($sql);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() == 0)
{
    $error="Il n'y a aucun compte admin";
    header("Location: register.php");
}
else{
  $error="Détails non valides";
}
}
}
?>
<!doctype html>
<html class="no-js" lang="">
<head>
   <?php include "includes/heade.html";?>
</head>
<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/wim.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form class="col s12" name="signin" method="post">
                         <?php if($error){?><div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fa fa-ban-circle"></i><strong>Erreur!!</strong> <?php echo htmlentities($error); ?> <a href="#" class="alert-link"></a>
                  </div><?php } 
                else if($msg){?><div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fa fa-ok-sign"></i><strong>Succès </strong> <?php echo htmlentities($msg); ?> <a href="#" class="alert-link"></a>.
                  </div><?php }?>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" id="mail" class="form-control" placeholder="Email" name="mail"  required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Password" name="password" autocomplete="off" >
                        </div>
                        <button type="submit" name="signin" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
