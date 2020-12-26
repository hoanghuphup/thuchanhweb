<?php
include 'lib/session.php';
Session::init();
?>
<?php
include_once 'lib/database.php';
include_once 'helpers/format.php';
spl_autoload_register(function($class){
  include_once "classes/".$class.".php";
});

  $db=new Database();
  $fm=new Format();
  $ct=new cart();
  $us=new user();
  $cat=new category();
  $product=new product();
  $cs=new customer();

?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
 <nav class="nav">
      <div class="navigation container">
        <div class="logo">
          <h1>Shop NVW</h1>
        </div>

        <div class="menu">
          <div class="top-nav">
            <div class="logo">
              <h1>Shop NVW</h1>
            </div>
            <div class="close">
              <i class="bx bx-x"></i>
            </div>
          </div>

          <ul class="nav-list">
          <li class="nav-item">
              <a href="index.php" class="nav-link ">link github</a>
            </li>
            <li class="nav-item">
              <a href="index.php" class="nav-link ">Home</a>
            </li>
            <li class="nav-item">
              <a href="product.php" class="nav-link">Products</a>
            </li>
            <li class="nav-item">
              <a href="#about" class="nav-link scroll-link">About</a>
            </li>
            <li class="nav-item">
              <a href="#contact" class="nav-link scroll-link">Contact</a>
            </li>
            <li class="nav-item">
              <a href="admin/login.php" class="nav-link ">Account</a>
            </li>
            <?php
              if(isset($_GET['customer_id'])){
                Session::destroy();
              }
            ?>
            <li class="nav-item">
            <?php
              $login_check=Session::get('customer_login');
              if($login_check==false){
                echo '<a href="login.php" class="nav-link ">Customer login</a>';
              }else{
                echo '<a href="?customer_id='.Session::get('customer_id').'" class="nav-link ">Customer logout</a>';
              }
            ?>


              <a href="login.php" class="nav-link ">Customer login</a>
            </li>
            <li class="nav-item">
              <a href="cart.php" class="nav-link icon"><i class="bx bx-shopping-bag"></i></a>
            </li>
          </ul>
        </div>

        <a href="cart.php" class="cart-icon">
          <i class="bx bx-shopping-bag"></i>
        </a>

        <div class="hamburger">
          <i class="bx bx-menu"></i>
        </div>
      </div>
    </nav>