<?php
include'../classes/adminlogin.php'
?>
<?php
$class=new adminlogin();
if($_SERVER['REQUEST_METHOD']==='POST'){
    $adminUser=$_POST['adminUser'];
    $adminPass=md5($_POST['adminPass']);
    $login_check=$class->login_admin($adminUser,$adminPass);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
<form class="box" action="login.php" method="POST">
    <h1 class="hihi">Admin Login</h1>
    <span class="h20"><?php 
    if(isset($login_check))
    {
        echo $login_check;
    }
    ?> 

    </span>
    <input type="text" name="adminUser"  placeholder="Username">
    <input type="password" name="adminPass"  placeholder="Password">
    <input type="submit" name="" value="Login">
</form>

</body>
</html>