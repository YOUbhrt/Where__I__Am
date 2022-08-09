<?php
session_start();
error_reporting(0);
include('includes/config.php');
$error="Il n'y a aucun compte admin";
if(isset($_POST['add']))
{
$fname=$_POST['name'];
$email=$_POST['email']; 
$password=md5($_POST['password']); 
$sql="INSERT INTO admin(username,email,pswrd) VALUES(:fname,:email,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="succès";
    echo "<script type='text/javascript'> document.location = 'login.php'; </script>";

}
else 
{
$error="Quelque chose s'est mal passé. Veuillez réessayer";
}
}
    ?>

<!doctype html>
<html class="no-js" lang="">
<head>
     <?php include "includes/heade.html";?>
<script type="text/javascript">
function valid()
{
if(form.password.value!= form.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
form.confirmpassword.focus();
return false;
}
return true;
}
</script>
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
                    <form method="post"  onsubmit="return valid(this);">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control" placeholder="User Name" name="name"  id="name">
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" placeholder="User E-mail" name="email"  id="email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm your Password" id="confirm" name="confirmpassword">
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="add"  id="add" onclick="return valid(this);" >Register</button>
                       
                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="login.php"> Sign in</a></p>
                        </div>
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
