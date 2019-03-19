<html>
	<head>
		<meta charset = "UTF-8">
		<meta name = "viewport" content = "width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
		<meta http-equiv= "X-UA-Compatible" content="ie=edge">
		<title>Tale of Crypton: Login</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
		<style>
			#left-arrow {
				width:25px;
				height:25px;
				vertical-align: text-bottom;
			}
			span a {
				font-size:28px;
			}
			.row {
				margin-top: 100px;
			}
			#logo-iste {
				width:100px;
				height:100px;
			}


		</style>
    
	</head>
	<body>
		<div class="container">
			<img src="left-sign.svg" id="left-arrow"/><span><a href="home.php">&nbsp Home</a></span>
			<div class="row justify-content-center">
				<div class="col-md-6 col-md-offset-3" align="center">
					<img src="web.png" id="logo-iste"><br/><br/>
          <?php if($msg != "") echo $msg . "<br/><br/>" ?>
					<form method="post" action="login.php">
						<input class="form-control" name="email" placeholder= "Enter Email "><br/>
						<input class="form-control" type="password" name="password" placeholder= "Enter Password"><br/>
						<input class="btn btn-primary" name="login" type="submit" value="Login">
            <p>Haven't Registered yet? <a href="index.php">Register</a></p>
					</form>
				</div>
			</div>
		</div>

		
	</body>

</html>