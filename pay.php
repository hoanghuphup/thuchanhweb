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
  <title>Your Cart to Pay</title>
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
  <?php
  if(isset($_GET['cartid']))
  {
    
    $cartid=$_GET['cartid'];
    $delcart=$ct->del_cart($cartid);
  }
  
  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit']) ){
    $cartID=$_POST['cartID'];
    $solg=$_POST['solg'];
    
    
    $updatesolgcart=$ct->update_to_solg($solg,$cartID);
 } 
  ?>

  <!-- Cart Items -->
  <div class="container-md cart">
    <table>
      
      <?php
      
      if(isset($updatesolgcart)){
        echo $updatesolgcart;
      }
      ?>
      <?php
      
      if(isset($delcart)){
        echo $delcart;
      }
      ?>
      <tr>
        <th>Product name</th>
        
        <th>Quantity</th>
        <th>Price</th>
        
      </tr>
      <?php 
        $get_product_cart=$ct->getproductcart();
        if($get_product_cart){
          $subtotal=0;
          while($result=$get_product_cart->fetch_assoc()){

         
       ?>
      <tr>
        <td>
          <div class="cart-info">
            <img src="admin/uploads/<?php echo $result['image'] ?>" alt="">
            <div>
              <p><?php echo $result['productName'] ?></p>
              <span><?php echo $result['price']." VND"?></span>
              <br />
              <p><?php echo "size: ". $result['getsize'] ?></p>
              <a href="?cartid=<?php echo $result['cartID'] ?>">remove</a>
            </div>
          </div>
        </td>
        <form action="" method="post">
        <input type="hidden" name="cartID" value="<?php echo $result['cartID'] ?>">
        <td><input type="number" value="<?php echo $result['solg'] ?>" min="1">
            <input type="submit" style="color:#fff; background: #fc7c7c" name="submit" value="update">
        </td>
        </form>
        <td><?php $total=$result['price']*$result['solg'];
        echo $total. " VND" ?></td>
        
        
      </tr>
      <?php
       $subtotal+=$total; 
        }

        }
      ?>
     
      
      
      
    </table>

    <div class="total-price">
      <table>
        <?php
        $check=$ct->check_cart();
        if($check){

        
        ?>
        <tr>
          <td>Subtotal</td>
          <td><?php echo $subtotal ?></td>
        </tr>
        <tr>
          <td>VAT(10%)</td>
          <td><?php
            $vat=$subtotal*0.1;
            echo $vat. " VND";
          ?></td>
        </tr>
        <tr>
          <td>Total</td>
          <td><?php
          $gtotal=$vat+$subtotal;
          echo $gtotal." VND";
          ?></td>
        </tr>
        <?php 
        }else{
          echo "your cart is empty!";
        }
        ?>
      </table>
      <a href="login.php" class="checkout btn">Proceed To Checkout</a>

    </div>

  </div>



  <!-- Footer -->
  <?php
    include 'inc/footer.php';
  ?>