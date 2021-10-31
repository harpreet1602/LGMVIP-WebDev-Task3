<?php
include("config.php");
$roll=$_POST['roll'];
$x=mysqli_query($al,"SELECT * FROM students WHERE roll='$roll'");
$y=mysqli_fetch_array($x);
$sem=$y['sem'];
$name=$y['name'];
$a=mysqli_query($al,"SELECT * FROM marks WHERE roll='$roll' AND sem='$sem'");
$b=mysqli_fetch_array($a);
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
<span class="subhead">View Result</span>
<br /><br />

<span class="labels">Name: <?php echo $name;?><br>Roll No.: <?php echo $roll;?><br>Semester : <?php echo $sem;?></span>

<br />
<br />
<?php $m=mysqli_query($al,"SELECT * FROM subjects WHERE sem='$sem'");
$n=mysqli_fetch_array($m);
?>
<table border="0" cellpadding="5" cellspacing="5"  class="design">
<tr><td class="labels" style="text-decoration:underline; color:black;">Subject</td><td class="labels" style="text-decoration:underline;color:black;">Marks</td></tr>
<tr><td class="labels"><?php echo $n['s1'];?></td><td class="labels"><?php echo $b['s1'];?></td></tr>
<tr><td class="labels"><?php echo $n['s2'];?></td><td class="labels"><?php echo $b['s2'];?></td></tr>
<tr><td class="labels"><?php echo $n['s3'];?></td><td class="labels"><?php echo $b['s3'];?></td></tr>
<tr><td class="labels"><?php echo $n['s4'];?></td><td class="labels"><?php echo $b['s4'];?></td></tr>
<tr><td class="labels"><?php echo $n['s5'];?></td><td class="labels"><?php echo $b['s5'];?></td></tr>
<tr><td class="labels" style="color:black;">Percentage : </td><td class="labels" style="color:black;"><?php echo $b['percent'];?> %</td></tr>
<tr><td class="labels" style="color:black;">Result : </td><td class="labels" style="color:black;"><?php echo $b['result'];?></td></tr>
</table>
<div class="footer">
    Made with <p class="icn"><i class="fas fa-heart"></i></p> by Harpreet Singh
</div>

</div>
</body>
</html>