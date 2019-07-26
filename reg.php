<?php
    session_start();
	$username="";
	$email="";
	$password="";
	$cpassword="";
	$errors=array();
	//connect to database
	$db= mysqli_connect("localhost","root","","project");
	
	//if register button is clicked
	if(isset($_POST['submit_btn']))
	{
		$username=mysqli_real_escape_string($db,$_POST['username']);
		$email=mysqli_real_escape_string($db,$_POST['email']);
		$password=mysqli_real_escape_string($db,$_POST['password']);
		$cpassword=mysqli_real_escape_string($db,$_POST['cpassword']);
	}
	
	
	//ensure that form fiels are filled properly
	if(empty($username))
	{
		array_push($errors,"Username is required");
	}
	if(empty($email))
	{
		array_push($errors,"Email-Id is required");
	}
	if(empty($password))
	{
		array_push($errors,"Password is required");
	}
	if($password!=$cpassword)
	{
	array_push($errors,"The two passwords do not match");	
	}
	
	//if there are no errors save the data to users table
	if(count($errors)==0) 
	{
		$password=md5($password);
		$sql="insert into user(username,email,password) values ('$username','$email','$password')";
		mysqli_query($db,$sql);	
		header('Location:index.html');
	}
	

?>

<html>
<head>
<title>register page</title>
<link rel="stylesheet" href="css/st.css">
<link rel="stylesheet" href="css/register.css">




	  
</head>
<body style="background-color:#787589">
<!-- Header Section-->
<header>
<div class="topnav" id="myTopnav">
  <a href="index.html" class="active">Back</a>
  
</header>

	<div id="main-wrapper">
	<center><h2>sign up form</h2>
	<img src="img/profile.png" class="avatar"/>
	
	<form action="reg.php" method="post">
		<label><h5>Username:</h5></label><br>
		<input name="username" type="text" class="inputvalues" placeholder="type your username" required ><br>
		<br>
		<label><h5>email:</h5></label><br>
		<input name="email" type="email" class="inputvalues" placeholder="type your email" required /><br><br>
		
		
		<label><h5>Password:</h5></label><br>
		<input name="password" type="password" class="inputvalues" placeholder="type your password" required /><br><br>
		<label><h5>confirm Password:</h5></label><br>
		<input name="cpassword" type="password" class="inputvalues" placeholder="confirm password" required /><br><br>
		
		<input name="submit_btn" type="submit" id="register_btn" value="signup" onclick="leave()" required /></br>
		
	</form>
	

	</center>
	
	</div>


</body>
</html>