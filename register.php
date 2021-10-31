<?php
include("config.php");
$roll=$_POST['roll'];
$sem=$_POST['sem'];
$email=$_POST['email'];
$nam=$_POST['name'];

if($roll==NULL || $sem==NULL || $email==NULL || $nam==NULL)
{
	//do nothing
}
else
{
	$sql=mysqli_query($al,"INSERT INTO students(name,roll,sem,email) VALUES('$nam','$roll','$sem','$email')");
	if($sql)
	{
		$msg="Successfully Registered";
	}
	else
	{
		$msg="Email Already Exists";
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
<span class="subhead">Registration</span>
<br />
<br />
<br />
<form method="post" action="">
<table border="0" cellpadding="5" cellspacing="5" class="design">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
<tr><td class="labels">Name :</td><td><input type="text" name="name" class="fields" required="required" size="15" placeholder="Enter Full Name" /></td></tr>
<tr><td class="labels">Roll No.:</td><td><input type="text" name="roll" class="fields" required="required" size="15" placeholder="Enter Roll No." /></td></tr>
<tr><td class="labels">Semester :</td><td><select name="sem" class="fields" required>
<option value="" disabled="disabled" selected="selected">- - Semester - -</option>
<option value="1">First Sem</option>
<option value="2">Second Sem</option>
<option value="3">Third Sem</option>
<option value="4">Fourth Sem</option>
<option value="5">Fifth Sem</option>
<option value="6">Sixth Sem</option>
<option value="7">Seventh Sem</option>
<option value="8">Eighth Sem</option>
</select>
</td></tr>
<tr><td class="labels">E-Mail ID : </td><td><input type="email" name="email" class="fields" size="15" placeholder="Enter Email" required="required" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Register" class="fields" /></td></tr>
</table>
</form>
<div class="footer">
    Made with <p class="icn"><i class="fas fa-heart"></i></p> by Harpreet Singh
</div>
</div>
</body>
</html>