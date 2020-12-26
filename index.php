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
  <title>Code</title>
</head>


<body>
  <!-- Header -->
  <header id="home" class="header">
    <?php include 'inc/header.php'; ?>

   <img src="./images/banner.png" alt="" class="hero-img" />

    <div class="hero-content">
      <h2><span class="discount">Welcom to </span> NVW SHOP</h2>
      <h1>
        <span>shopping time</span>
        <span>mode on</span>
      </h1>
      <a class="btn" href="#">shop now</a>
    </div>
  </header>


  <!-- Main -->
  <main>
  
    <section class="advert section">
      <div class="advert-center container">
        <div class="advert-box">
          <div class="dotted">
            <div class="content">
              <h2>
                Tee
              </h2>
              <h4>Best choice</h4>
            </div>
          </div>
          <img src="./images/advert1.png" alt="">
        </div>

        <div class="advert-box">
          <div class="dotted">
            <div class="content">
              <h2>
                Jacket
              </h2>
              <h4>Best choice</h4>
            </div>
          </div>
          <img src="./images/advert2.png" alt="">
        </div>

        
      </div>
    </section>

    <!-- Featured -->
    <section class="section featured">
      <div class="title">
        <h1>Featured Products</h1>
      </div>

      <div class="product-center container">
        <?php
          $product_feathered=$product->getproduct_feathered();
          if($product_feathered){
              while($result=$product_feathered->fetch_assoc()){

              
          
        ?>
        <div class="product">
          <div class="product-header">
            <img src="admin/uploads/<?php echo $result['image'] ?>" alt="">
            <ul class="icons">
              <a href="#"><span><i class="bx bx-heart"></i></span></a>
              <a href="#"><span><i class="bx bx-shopping-bag"></i></span></a>
              <a href="product-details.php?proid=<?php echo $result['productID'] ?>"><span><i class="bx bx-search"></i></span></a>
            </ul>
          </div>
          <div class="product-footer">
            <a href="#">
              <h3><?php echo $result['productName'] ?></h3>
              <h3><?php echo $fm->textShorten($result['mota'],70 ) ?></h3>
              
            </a>
            <div class="rating">
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bx-star"></i>
            </div>
            <h4 class="price"><?php echo $result['price']." VND" ?></h4>
          </div>
        </div>
        <?php
        }
      }
        ?>
        
        
       
      </div>
    </section>

    <!--Latest -->
    <section class="section featured">
      <div class="title">
        <h1>New Products</h1>
      </div>

      <div class="product-center container">
      <?php
          $product_new=$product->getproduct_new();
          if($product_new){
              while($result_new=$product_new->fetch_assoc()){

              
          
        ?>
         <div class="product">
          <div class="product-header">
            <img src="admin/uploads/<?php echo $result_new['image'] ?>" alt="">
            <ul class="icons">
            <a href="#"><span><i class="bx bx-heart"></i></span></a>
              <a href="#"><span><i class="bx bx-shopping-bag"></i></span></a>
              <a href="product-details.php?proid=<?php echo $result_new['productID'] ?>"><span><i class="bx bx-search"></i></span></a>
            </ul>
          </div>
          <div class="product-footer">
            <a href="#">
              <h3><?php echo $result_new['productName'] ?></h3>
              <h3><?php echo $fm->textShorten($result_new['mota'],70 ) ?></h3>
              
            </a>
            <div class="rating">
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bx-star"></i>
            </div>
            <h4 class="price"><?php echo $result_new['price']." VND" ?></h4>
          </div>
        </div>
        <?php
              }
            }
        ?>
        
        
        
       
        
        
        
      </div>
    </section>

    <!-- Product Banner -->
    <section class="section">
      <div class="product-banner">
        <div class="left">
          <img src="./images/test.jpg" alt="" />
        </div>
        <div class="right">
          <div class="content">
            <h2><span class="discount">70% </span> SALE OFF</h2>
            <h1>
              <span>Collect Your</span>
              <span> Collection</span>
            </h1>
            <a class="btn" href="#">shop now</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonials -->
    

    <!-- Brands -->
   
  </main>
  <?php
include 'inc/footer.php';
?>

