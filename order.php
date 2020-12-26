<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">

  <!-- Box icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="./css/styles.css" />
  <title>Your Cart</title>
</head>

<body>
  <!-- Navigation -->
  <?php
    include 'inc/header.php';
  ?>
<?php
              $login_check=Session::get('customer_login');
              if($login_check==false){
				  header('Location:login.php');
			  }
                
?>

<style>
.error_found{
    font-size: 30xp;
    font-weight: bold;
    color: red;
}
</style>
  <!-- Cart Items -->
  <div class="container-md cart">
    <h3 class="error_found">order page</h3>

  </div>



  <!-- Footer -->
  <?php
    include 'inc/footer.php';
  ?>
