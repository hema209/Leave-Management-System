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
	
	//ensure that form fiels are filled properly
	if(empty($username))
	{
		array_push($errors,"Username is required");
	}
	if(empty($password))
	{
		array_push($errors,"Password is required");
	}
	
	//if there are no errors save the data to users table
	if(count($errors)==0) 
	{
		$password=md5($password);
		$sq="select * from user where (username='$username' AND password='$password')";
		$result=mysqli_query($db,$sq);	
		
		$sql="insert into staff_login(username) values ('$username')";
		mysqli_query($db,$sql);	
		
		if(mysqli_num_rows($result)>0)
		{
		header('Location:staffleave.php');	
		}
		else
		{
			echo '<script type="text/javascript">alert("enter valid username or password")</script>';
		}
		
		
	}
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
	<center><h2>staff login form</h2>
	<img src="img/profile.png" class="avatar"/>
	
	<form action="stafflogin.php" method="post">
		<label><h4>Username:</h4></label><br>
		<input name="username" type="text" class="inputvalues" placeholder="type your username" required ><br><br>
		<label><h4>Password: </h4></label><br>
		<input name="password" type="password" class="inputvalues" placeholder="type your password" required ><br><br>
		<input name="login" type="submit" class="button" value="login"/></br>
		
	</form>
	</center>
	
	</div>


</body>
</html>