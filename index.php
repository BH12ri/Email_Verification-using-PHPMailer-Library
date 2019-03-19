<?php 

   $msg = "";
   use PHPMailer\PHPMailer\PHPMailer;
   $con = mysqli_connect('localhost','id8574819_iste','test123','id8574819_istequiz');
   if(isset($_POST['submit'])){
   	$name = mysqli_real_escape_string($con, $_POST['name']);
   	$email = mysqli_real_escape_string($con, $_POST['email']);   	
    $password = mysqli_real_escape_string($con, $_POST['password']);
   	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

   	if(empty($name) || empty($email) || $password != $cpassword){
   		$msg = "Please enter details correctly";
    }
   	else{
      
   		$sql = $con->query("SELECT id FROM users WHERE email ='$email'");

   		if($sql->num_rows > 0){
   			$msg = "Email already exist";
   		}else{
   			$token = 'qwertyopasdfghjklcvbnmxdASDFGHJKLWERTYQUIOXCVBNM0897612345!@$/()*';
   			$token = str_shuffle($token);
   			$token = substr($token,0,10);

   			$hashedPassword = md5($password);

   			$con->query("INSERT INTO users (name,email,password,isEmailConfirmed,token) VALUES ('$name', '$email', '$hashedPassword', '0', '$token')");

             include_once "PHPMailer/PHPMailer.php";

             $mail = new PHPMailer(true);
             $mail -> setFrom('cc-coordinator@isteknit.org');
             $mail -> addAddress($email, $name);
             $mail -> Subject = "Please verify email";
             $mail -> isHTML(true);
             $mail -> Body = "

               Please click on the link below: <br/><br/>

               <a href='https://testingwebiste.000webhostapp.com/confirm.php?email=$email&token=$token'>Click Here</a>
             ";

            if($mail -> send())
            	$msg = "You have been registered. Please verify your email";
            else 
            	$msg = "Something wrong happened. Please try again.";
   		}
   	}
   }
  
?>

<!doctype html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8">
		<meta name = "viewport" content = "width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
		<meta http-equiv= "X-UA-Compatible" content="ie=edge">
		<title>Register</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container" style="margin-top: 100px;">
			<div class="row justify-content-center">
				<div class="col-md-6 col-md-offset-3" align="center">
					<img src="web.png" style="width:100px;height:100px;"><br/><br/>
          <?php if($msg != "") echo $msg . "<br/><br/>" ?>
					<form method="post" action="index.php">
						<input class="form-control" name="name" placeholder= "Enter Name here"><br/>
						<input class="form-control" name="email" placeholder= "Enter Email "><br/>
						<input class="form-control" type="password" name="password" placeholder= "Enter Password"><br/>
						<input class="form-control" type="password" name="cpassword" placeholder= "Confirm Password"><br/>
						<input class="btn btn-primary" name="submit" type="submit" value="Register">
            <p>Already Registered? <a href="login.php">Login</a></p>
					</form>
				</div>
			</div>
		</div>

	</body>

</html>