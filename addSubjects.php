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
$name=$b['name'];
$sem=$b['sem'];
$s1=$_POST['s1'];
$s2=$_POST['s2'];
$s3=$_POST['s3'];
$s4=$_POST['s4'];
$s5=$_POST['s5'];
if($s1==NULL || $s2==NULL || $s3==NULL || $s4==NULL || $s5==NULL)
{
	// do nothing
}
else
{	
	$sql=mysqli_query($al,"INSERT INTO subjects(s1,s2,s3,s4,s5,sem) VALUES('$s1','$s2','$s3','$s4','$s5','$sem')");
	if($sql)
	{
		$msg="Successfully Saved";
	}
	else
	{
		$msg="Subjects are already saved for your Sem";
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
<span class="subhead">Add Subjects</span>
<br />
<br />
<form method="post" action="">
<table border="0" cellpadding="5" cellspacing="5" class="design">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
<tr><td class="labels">Subject 1 : </td><td><input type="text" required="required" size="20" class="fields" placeholder="Enter Subject Name" name="s1" /></td></tr>

<tr><td class="labels">Subject 2 : </td><td><input type="text" required="required" size="20" class="fields" placeholder="Enter Subject Name" name="s2" /></td></tr>

<tr><td class="labels">Subject 3 : </td><td><input type="text" required="required" size="20" class="fields" placeholder="Enter Subject Name" name="s3" /></td></tr>

<tr><td class="labels">Subject 4 : </td><td><input type="text" required="required" size="20" class="fields" placeholder="Enter Subject Name" name="s4" /></td></tr>

<tr><td class="labels">Subject 5 : </td><td><input type="text" required="required" size="20" class="fields" placeholder="Enter Subject Name" name="s5" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" class="fields" value="SAVE" /></td></tr>
</table>
</form>
<div class="footer">
    Made with <p class="icn"><i class="fas fa-heart"></i></p> by Harpreet Singh
</div>
</div>
</body>
</html>