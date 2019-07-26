<?php
    session_start();
	$name="";
	$d_from="";
	$d_to="";
	$days="";
	$reason="";
	$l_type="";

	
	$errors=array();
	//connect to database
	$db= mysqli_connect("localhost","root","","project");
	
	//if register button is clicked
	if(isset($_POST['submit_btn']))
	{
		$name=mysqli_real_escape_string($db,$_POST['name']);
		$d_from=mysqli_real_escape_string($db,$_POST['d_from']);
		$d_to=mysqli_real_escape_string($db,$_POST['d_to']);
		$days=mysqli_real_escape_string($db,$_POST['days']);
		$reason=mysqli_real_escape_string($db,$_POST['reason']);
		$l_type=mysqli_real_escape_string($db,$_POST['l_type']);
		
		
		
		
		
	}
	
	
	//ensure that form fiels are filled properly
	if(empty($name))
	{
		array_push($errors,"Username is required");
	}
	if(empty($d_from))
	{
		array_push($errors,"Username is required");
	}
	if(empty($d_to))
	{
		array_push($errors,"Username is required");
	}
	if(empty($days))
	{
		array_push($errors,"Username is required");
	}
	if(empty($reason))
	{
		array_push($errors,"Username is required");
	}
	if(empty($l_type))
	{
		array_push($errors,"Username is required");
	}
	
	//if there are no errors save the data to users table
	if(count($errors)==0) 
	{
		$password=md5($password);
		$sql="insert into staffleave(name,d_from,d_to,days,reason,l_type) values ('$name','$d_from','$d_to','$days','$reason','$l_type')";
		mysqli_query($db,$sql);	
		header('Location:staffleave.php');
	}
	

?>

<html>
<head>
	<title>student leave</title>
	<link rel="stylesheet" href="./css/style_leave.css">
	
	
	
	<meta name="viewport" content-type="width=device-width initial-scale=1">
</head>
<body>

<!-- Header Section-->
<header>
<div class="topnav" id="myTopnav">
  <a href="index.html" class="active">Logout</a>
  
</header>


	<!-- Showcase Section-->
<section>
	
</section>
<section id="showcase">
	<div class="container">
	<h2 id="reghead">Apply Leave</h2>
	
	
	
	<form action="staffleave.php" method="post">
			<div class="input-group">
		<label>FullName:</label>
		<input type="text" name="name" required>
			</div>
			
			<p>SELECT LEAVE PERIOD:</p>
	
	<div class="input-group">
		<label>From:</label>
		<input type="date" name="d_from" required>
	</div>
	
	<div class="input-group">
		<label>to:</label>
		<input type="date" name="d_to" required>
	</div>
	
	<div class="input-group">
		<label>days</label>
		<input type="text" name="days" required>
	</div>
	
	<div class="input-group">
		<label>Select Leave Type</label>
		<select name="l_type">
		<option name="l_type">---select---</option>
		<option name="l_type">short</option>
		<option name="l_type">casual</option>
		<option name="l_type">annual</option>
		<option name="l_type">sick</option>
		</select>
		
		
	</div>
	
	<div class="input-group">
		<label>Reason</label>
		<textarea name="reason" rows=5 cols=50 ></textarea>
	</div>
	
	<input name="submit_btn" type="submit" id="register_btn" class="button_1" value="apply" onclick="leave()"/></br>
		
		
	</form>
	

	</center>
	
	</div>
	<!-- Footer Section-->
<footer class="foot">
	<p>PHCET, Copyright &copy; 2018</p>
</footer>
</body>
</html>

