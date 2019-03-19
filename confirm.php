<?php 
   function redirect() {
   	header('Location: home.php');
   	exit();
   }
  if (!isset($_GET['email']) || !isset($_GET['token'])){
  	redirect();
  }else {
  	$con = mysqli_connect('localhost','id8574819_iste','test123','id8574819_istequiz');

  	$email = mysqli_real_escape_string($con, $_GET['email']);
  	$token = mysqli_real_escape_string($con, $_GET['token']);

  	$sql = $con->query("SELECT id FROM users WHERE email='$email' AND token='$token' AND isEmailConfirmed=0");

  	if($sql->num_rows > 0){
  		$con->query("UPDATE users SET isEmailConfirmed=1, token='' WHERE email='$email'");
  		redirect();
  	}else 
  	   redirect();
  }

?>