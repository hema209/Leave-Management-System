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
	<title>admin login</title>
	<link rel="stylesheet" href="./css/style_leave.css">
	
	
	
	<meta name="viewport" content-type="width=device-width initial-scale=1">
	<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 50%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

.d_button {
    background-color: red;
    border: none;
    color: white;
    padding: 5px 5px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 10px;
    margin: 4px 2px;
    cursor: pointer;
}
.a_button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 5px 5px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 10px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
</head>
<body>

	<form action="stafflogin.php" method="post">
		<label><h4>Username:</h4></label><br>
		<input name="username" type="text" class="inputvalues" placeholder="type your username" required ><br><br>
		<label><h4>Password: </h4></label><br>
		<input name="password" type="password" class="inputvalues" placeholder="type your password" required ><br><br>
		<input name="login" type="submit" class="button" value="login"/></br>
		
	</form>

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
	<h2 id="reghead">Student Applying For Leave</h2><br><br>
	<center><img src="img/profile.png" class="avatar"/><br><br>
	<table>
<tr>
<th>id</th>
<th>name</th>
<th>from</th>
<th>to</th>
<th>no. of days</th>
<th>type</th>
<th>reason</th>
<th>Approve/Disapprove</th>
</tr>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id,name,d_from,d_to,days,l_type,reason FROM studentleave";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td> " . $row["id"]." </td><td> " . $row["name"]. " </td><td> " . $row["d_from"]." </td><td> " . $row["d_to"]." </td><td> " . $row["days"]. " </td><td> " . $row["l_type"]. " </td><td> " . $row["reason"]. " </td><td><input type='submit' class='a_button' value='approve' name='approve'>    <input type='submit' class='d_button' value='disapprove' name='disapprove'></td></tr>";
 }
 

} else {
    echo "0 results";
}


mysqli_close($conn);
?> 

</table><br><br>


</center>
<br><br>
<!-- Showcase Section-->
<section>
	
</section>
<section id="showcase">
	<div class="container">
	<h2 id="reghead">Staff Applying For Leave</h2><br><br>
	<center><img src="img/profile.png" class="avatar"/><br><br>
	<table>
<tr>
<th>id</th>
<th>name</th>
<th>from</th>
<th>to</th>
<th>no. of days</th>
<th>type</th>
<th>reason</th>
<th>Approve/Disapprove</th>
</tr>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id,name,d_from,d_to,days,l_type,reason FROM staffleave";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
	echo "<tr><td> " . $row["id"]." </td><td> " . $row["name"]. " </td><td> " . $row["d_from"]." </td><td> " . $row["d_to"]." </td><td> " . $row["days"]. " </td><td> " . $row["l_type"]. " </td><td> " . $row["reason"]. " </td><td><input type='button' name='approve' value='Approved' class='a_button'><input type='button' name='disapprove' value='Dis-Approved' class='d_button'></td></tr>";
    
	
		
	}
} else {
    echo "0 results";
}

mysqli_close($conn);
?> 

</table><br><br>


</center>
	
	
	
	
	
	
	
	
	
	
	
	
	
	</div>
	<!-- Footer Section-->
<footer class="foot">
	<p>Hemangi Koli,Shivani Palkar,Pranali Mhatre, Copyright &copy; 2018</p>
</footer>
</body>
</html>

