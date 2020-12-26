<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">

  <!-- Box icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

  <!-- Glidejs -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css" />
  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="./css/styles.css" />
  <title>Boy’s T-Shirt - Codevo</title>
</head>

<body>
  <!-- Navigation -->
  <?php
  include 'inc/header.php';
  ?>
  <?php
    if(!isset($_GET['proid']) || $_GET['proid']== NULL)
    {
        echo "<script>window.location ='404.php' </script> ";
    }else
    {
        $id=$_GET['proid'];
    }
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit']) ){
      $solg=$_POST['solg'];
      $getsize=$_POST['getsize'];
      
      $addtocart=$ct->add_to_cart($getsize,$solg,$id);
   }
  ?>


  <!-- Product Details -->
  <section class="section product-detail">
  
    <div class="details container-md">
    <?php
      $get_product_details=$product->get_details($id);
      if($get_product_details){
        while($result_details=$get_product_details->fetch_assoc()){

        
  ?>
      <div class="left">
        <div class="main">
          <img src="admin/uploads/<?php echo $result_details['image'] ?>" alt="">
        </div>
        


      </div>
     
      <div class="right">
        <span><?php echo $result_details['catName'] ?></span>
        <h1><?php echo $result_details['productName'] ?></h1>
        <div class="price"><?php echo $result_details['price']. " VND" ?></div>
        <form class="form" action="" method="POST">
          <div>
            <select name="getsize">
              <option value="Select Size" selected disabled>Select Size</option>
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="L">L</option>
            </select>
            <span><i class='bx bx-chevron-down'></i></span>
          </div>
          <br>
          <br>
          <input type="number" value="1" name="solg" min="1">
          <input type="submit" class="addCart" name="submit" value="Buy">
          
        </form>
        <?php
            if(isset($addtocart)){
              echo '<span style="color:red;font-size:18px;">Product already added!</span>';
            }
          ?>
        <h3>Product Detail</h3>
        <p><?php echo $result_details['mota'] ?></p>
      </div>
      <?php
      }
    }
      ?>
     
    </div>
   
    
    
  </section>

  <!-- Related -->
 

  <!-- Footer -->
  <?php
    include 'inc/footer.php';
  ?>