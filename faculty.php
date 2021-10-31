<?php
include("config.php");
session_start();
if(isset($_SESSION['email']))
{
	header("location:home.php");
}
$email=mysqli_real_escape_string($al,$_POST['email']);
$pass=mysqli_real_escape_string($al,sha1($_POST['pass']));
if($_POST['email']==NULL || $_POST['pass']==NULL)
{
	//do nothing
}
else
{
	$sql=mysqli_query($al,"SELECT * FROM faculty WHERE email='$email' AND password='$pass'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['email']=$email;
		header("location:home.php");
	}
	else
	{
		$msg="Incorrect Email ID or Password";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Result</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div align="center">
<div class="navbar">
    <div class="headline">
    Student Result Management System
    </div>
    <div class="options">
        <div>       
        <a href="home.php" class="link">Home</a>
        </div> 
        <div>
        <a href="register.php" class="link">Student Register</a>
        </div>
        <div>
        <a href="faculty.php" class="link">Faculty Login</a>
        </div>
        <div>
        <a href="registerFaculty.php" class="link">Faculty Registration</a>
        </div>          
    </div>
</div>
<br />
<br />
<span class="subhead">Faculty Login</span>
<br />
<br />
<br />
<form method="post" action="">
<table border="0" cellpadding="5" cellspacing="5" class="design">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
<tr><td class="labels">Email ID: </td><td><input type="text" required="required" name="email" class="fields" size="15" placeholder="Enter Email ID" /></td></tr>
<tr><td class="labels">Password: </td><td><input type="password" required="required" name="pass" class="fields" size="15" placeholder="Enter Password" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Login" class="fields" /></td></tr>
</table>
</form>
<div class="footer">
    Made with <p class="icn"><i class="fas fa-heart"></i></p> by Harpreet Singh
</div>
</div>
</body>
</html>