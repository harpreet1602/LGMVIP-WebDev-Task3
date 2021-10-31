<?php
include("config.php");
session_start();
if(!isset($_SESSION['email']))
{
	header("location:index.php");
}
$email=$_SESSION['email'];
$a=mysqli_query($al,"SELECT * FROM faculty WHERE email='$email'");
$b=mysqli_fetch_array($a);
$pass=$b['password'];
$old=sha1($_POST['old']);
$p1=sha1($_POST['p1']);
$p2=sha1($_POST['p2']);
if($_POST['old']==NULL || $_POST['p1']==NULL || $_POST['p2']==NULL)
{
	// Do Nothing
}
else
{
if($old!=$pass)
{
	$msg="Incorrect Old Password";
}
elseif($p1!=$p2)
	{
		$msg="New Password Didn't Matched";
	}
	else
	{
		mysqli_query($al,"UPDATE faculty SET password='$p2' WHERE email='$email'");
		$msg="Successfully Changed your Password";
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
        <a href="home.php" class="link">HOME</a>
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
<span class="subhead">Change Password</span>
<br />
<br />
<form method="post" action="">
<table cellpadding="3" cellspacing="3" class="design" align="center">
<tr><td colspan="2" class="msg" align="center"><?php echo $msg;?></td></tr>
<tr><td class="labels">Old Password :</td><td><input type="password" name="old" size="25" class="fields" placeholder="Enter Old Password" required="required" /></td></tr>
<tr><td class="labels">New Password :</td><td><input type="password" name="p1" size="25" class="fields" placeholder="Enter New Password" required="required"  /></td></tr>
<tr><td class="labels">Re-Type Password :</td><td><input type="password" name="p2" size="25"  class="fields" placeholder="Re-Type New Password" required="required" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Change Password" class="fields" /></td></tr>
</table>
</form>
<div class="footer">
    Made with <p class="icn"><i class="fas fa-heart"></i></p> by Harpreet Singh
</div>

</div>
</body>
</html>