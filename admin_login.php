<?php
require('dbconnection/connection.inc.php');
require('functions.inc.php');
$msg='';
if(isset($_POST['submit'])){
	$username=get_safe_value($con,$_POST['username']);
	$password=get_safe_value($con,$_POST['password']);
	$sql="select * from admin_users where username='$username' and password='$password'";
	$res=mysqli_query($con,$sql);
	$count=mysqli_num_rows($res);
	if($count>0){
		$_SESSION['ADMIN_LOGIN']='yes';
		$_SESSION['ADMIN_USERNAME']=$username;
		header('location:check_order.php');
		die();
	}else{
		$msg="Please enter correct login details";	
	}
	
}
?>
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> Login Form</title>
	<link rel="stylesheet" href="css/admin_login.css">
</head>
<body>

   <button><a href="client_login.php">CLIENT</button></a>
	<div class="container">
		   <h1 class="label">Admin Login</h1>
      <form class="login_form" method="post" name="form">
		      <form method="post">
			      <div class="font">Email or Phone</div>
			      <input type="text"  name="username"placeholder="Username" required>
			      <div class="font font2">Password</div>
			      <input type="password" name="password" placeholder="Password" required>
			      <button type="submit" name="submit">Login</button>
               <div class="field_error"><?php echo $msg?></div>
	         </form>
   </div>
      </form>
      
<script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="assets/js/popper.min.js" type="text/javascript"></script>
      <script src="assets/js/plugins.js" type="text/javascript"></script>
      <script src="assets/js/main.js" type="text/javascript"></script>
</body>
</html>