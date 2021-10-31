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
if(!empty($_POST))
{
	$s1=$_POST['s1'];
	$s2=$_POST['s2'];
	$s3=$_POST['s3'];
	$s4=$_POST['s4'];
	$s5=$_POST['s5'];
	$roll=$_POST['roll'];
	if($s1==NULL || $s2==NULL || $s3==NULL || $s4==NULL || $s5==NULL || $roll==NULL)
	{
		//do nothing
	}
	else
	{
		$total=$s1+$s2+$s3+$s4+$s5;
		$per=($total/500)*100;
		if($per<=35)
		{
			$result="Fair";
		}elseif($per>=36 && $per<=50)
			{
				$result="Good";
			}
			elseif($per>=51 && $per<=70)
				{
					$result="Better";
				}
				else
				{
					$result="Best";
				}
				$sql=mysqli_query($al,"INSERT INTO marks(roll,sem,s1,s2,s3,s4,s5,total,percent,result) VALUES('$roll','$sem','$s1','$s2','$s3','$s4','$s5','$total','$per','$result')");
				if($sql)
				{
					$msg="Successfully Saved Marks";
				}
				else
				{
					$msg="Marks Already Submitted to this Roll No.";
				}
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
<span class="subhead">Submit Marks</span>
<br />
<br />
<?php 
$x=mysqli_query($al,"SELECT * FROM subjects WHERE sem='$sem'");
$y=mysqli_fetch_array($x);
$m=mysqli_query($al,"SELECT * FROM students WHERE sem='$sem'");
?>
<form method="post" action="">
<table border="0" cellpadding="5" cellspacing="5" class="design">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
<tr><td class="labels">Roll No. : </td><td>
<select name="roll" class="fields" required>
<option value="" selected="selected" disabled="disabled">- - Select Roll - -</option>
<?php
while($n=mysqli_fetch_array($m))
{
	?>
<option value="<?php echo $n['roll'];?>"><?php echo $n['roll'];?></option>
<?php } ?>
</select></td></tr>
<tr><td class="labels"><?php echo $y['s1'];?></td><td><input type="text" name="s1" class="fields" size="5" placeholder="100" required="required" /></td></tr>
<tr><td class="labels"><?php echo $y['s2'];?></td><td><input type="text" name="s2" class="fields" size="5" placeholder="100" required="required" /></td></tr>
<tr><td class="labels"><?php echo $y['s3'];?></td><td><input type="text" name="s3" class="fields" size="5" placeholder="100" required="required" /></td></tr>
<tr><td class="labels"><?php echo $y['s4'];?></td><td><input type="text" name="s4" class="fields" size="5" placeholder="100" required="required" /></td></tr>
<tr><td class="labels"><?php echo $y['s5'];?></td><td><input type="text" name="s5" class="fields" size="5" placeholder="100" required="required" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" class="fields" value="Submit" /></td></tr>
</table>
</form>
<div class="footer">
    Made with <p class="icn"><i class="fas fa-heart"></i></p> by Harpreet Singh
</div>

</div>
</body>
</html>