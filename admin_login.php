<?php
    session_start();
	$username="";
	$password="";
	$cpassword="";
	$errors=array();
	//connect to database
	$db= mysqli_connect("localhost","root","","project");
	
	//if register button is clicked
	if(isset($_POST['login']))
	{
		$username=mysqli_real_escape_string($db,$_POST['username']);
		$password=mysqli_real_escape_string($db,$_POST['password']);
			
	}
		if($username=='hemangi' && $password=='hemangi')
		header('Location:admin.php');
		
		
		
	
?>
<html>
<head>
<title>login page</title>
<link rel="stylesheet" href="css/st.css">

<style>
label{text-indent: 35px;}
.button {margin-bottom:20px;
	margin-top:10px;
	background-color:#483D8B;
	padding:10px;
	color:white;
	width:100px;
	text-align:center;
	font-size:10px;
	font-weight:bold;
}
</style>
</head>
<body style="background-color:#787589">

	<div id="main-wrapper">
	<center><h2>Admin Login Form</h2>
	<img src="img/profile.png" class="avatar"/>
	
	<form action="admin_login.php" method="post">
		<label><h4>Username:</h4></label><br>
		<input name="username" type="text" class="inputvalues" placeholder="Type your username"/><br><br>
		<label><h4>Password: </h4></label><br>
		<input name="password" type="password" class="inputvalues" placeholder="Type your password"/><br><br>
		<input name="login" type="submit" class="button" value="Login"/></br>
		
	</form>
	</center>
	
	</div>


</body>
</html>