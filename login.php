<!DOCTYPE html>
<html lang="en">

<head>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>




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
              if($login_check){
				  header('Location:pay.php');
			  }
                
?>
  <?php
$pd=new product();
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit']) ){
   
   $insertCus=$cs->insert_customer($_POST);
}
?>
<?php
$pd=new product();
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login']) ){
   
   $loginCus=$cs->login_customer($_POST);
}
?>

<div class="main">
    <div class="content">
    	 <div class="login_panel">
			<h3>Existing Customers</h3>
			
			<p>Sign in with the form below.</p>
			<?php

			if(isset($loginCus)){
				echo $loginCus;
			}
			?>
        	<form action="" method="POST">
                	<input  type="text" name="account" class="field" placeholder="Enter email" >
                    <input  type="password" name="password" class="field" placeholder="Enter password" >
                 
                 <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                    <div class="buttons"><div><input type="submit" style="font-size:15px;padding: 10px 15px;
    font-size: 15px;
    font-weight: bold;
	color: #fff;background:#303131;border-radius: 3px;" name="login" class="grey" value="Sign in"></div></div>
			</form>
			</div>
					


    	<div class="register_account">
			<?php

			?>
			<h3>Register New Account</h3>
			<?php 
			if(isset($insertCus)){
				echo $insertCus;
			}
			?>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Enter name" >
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Enter city">
							</div>
							
							<div>
								<input type="text" name="accountname" placeholder="Enter account name">
							</div>
							<div>
								<input type="text" name="email" placeholder="Enter mail">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Enter address">
						</div>
		    		<div>
						<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
							<option value="null">Select a Country</option>         
							<option value="HCM">TP.Ho Chi Minh</option>
							<option value="HP">Hai Phong</option>
							<option value="HN">HA Noi</option>
							<option value="DN">Da Nang</option>
							<option value="GL">Gia lai</option>
							

		         		</select>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Enter phone">
		          </div>
				  
				  <div>
					<input type="text" name="password" placeholder="Enter pass">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><input type="submit" style="font-size:15px;padding: 10px 15px;
    font-size: 15px;
    font-weight: bold;
    color: #fff;background:#303131;border-radius: 3px;" name="submit" class="grey" value="submit">Create Account</div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>




   <?php
    include 'inc/footer.php';
  ?>
  