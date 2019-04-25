<?php 
session_start();
if(!(isset($_SESSION['id']) && $_SESSION['id']!=0) || ($_SESSION['level']==1)){
			header("Location: index.php");
			exit;
		}
$db = mysqli_connect("localhost","root","","knockout_humpty");
if(mysqli_connect_errno()){
	die("DB connect failed: ".mysqli_connect_error()." (".mysqli_connect_errno().")");
}
	$message = "";
	
	if(isset($_POST['submit'])){	

	$query = "UPDATE users SET ";
	$act = explode(":",$_POST['submit']);
	
	switch($act[1]){
			case "A":
				$query .= "allowed = 1 where id = ".$act[0];
				$message = "UserID: ".$act[0]." has been unblocked.";
				break;
			case "B":
				$query .= "allowed = 0 where id = ".$act[0];
				$message = "UserID: ".$act[0]." has been blocked.";
				break;
			case "P":
				$act[2].="1";
				$query .= "authority = ".$act[2]." where id = ".$act[0];
				$message = "UserID: ".$act[0]." has been promted to ";
				if($act[2]==11) $message .= "admin."; else $message .= "super admin.";
				break;
			case "D":
				$act[2] = intval($act[2]/10);
				$query .= "authority = ".$act[2]." where id = ".$act[0];
				$message = "UserID: ".$act[0]." has been demoted to ";
				if($act[2]==11) $message .=  "admin."; else $message .= "member.";
				break;
	}
	
	$result = mysqli_query($db,$query);
	
	if(!($result && mysqli_affected_rows($db)!=0))
		$message = "User status updation failed due to undefined error!!";
	
	}

?>
<html>
<head>
<title>ADMIN SECTION</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="project_style.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
</script>
</head>
<body background="tex.jpg">
<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="logo.jpeg"><img src="kh_logo.png" height="70px" width="200px"\></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">HOME</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">SUBJECTS <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="physics.php">PHYSICS</a></li>
            <li><a href="chemistry.php">CHEMISTRY</a></li>
            <li><a href="biology.php">BIOLOGY</a></li>
			<li><a href="mathematics.php">MATHEMATICS</a></li>
			<li><a href="computer.php">COMPUTER SCIENCE</a></li>
          </ul>
        </li>
        <li><a href="free.php">FREE LECTURES</a></li>
        <li><a href="paid.php">PAID LECTURES</a></li>
		<li class="active"><a href="admin.php" style="background: rgb(255,0,0,0.5)">ADMIN</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span><?php echo " ".$_SESSION['username'].' [id:'.$_SESSION['id'].'] '; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li style="margin: 25">Name:<br /> <?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></li>
            <li style="margin: 25">Email: <?php echo $_SESSION['email']; ?></li>
          </ul>
        </li>
        <li><a href="login.php?log=0"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container" id="div4">
<center><h1><b>&nbsp;- USER - LIST -</b></h1>
<div class="container">
<table class="table" style="width:30%; border: 1px solid rgb(128,128,128);"><tr><th class="warning" >Super Admin</th><th class="info">Admin</th><th class="success">Allowed</th><th class="danger">Blocked</th></tr></table>
</div></center></div>
<div class="container-fluid" id="div5">
<div class="container"><br />
<center> <form action="admin.php" id=f1 name="A" method="post">
<table class="table table-hover" >
<tr class="active"><th>ID</th><th>Username</th><th>First Name</th><th>Last Name</th><th>DOB</th><th>Email</th><th>Gender</th><th>Nationality</th><th>Actions</th></tr>
<?php

$query = "select * from users order by authority desc";
	$result = mysqli_query($db,$query);
	
	if(!mysqli_num_rows($result)) 
		$message='Nobody here but chickens!!';
	else {
		
while($r = mysqli_fetch_assoc($result)){
			$id = $r['id'];
			$username = $r['username'];
			$fname = $r['fname'];
			$lname = $r['lname'];
			$email = $r['email'];
			$authority = $r['authority'];
			$dob = $r['dob'];
			$gender = $r['gender'];
			$nationality = $r['nationality'];
			$allowed = $r['allowed'];
			
			$temp = "<tr class = '";
			if($allowed==0) $temp .= "danger'";
			else { if($authority==1) $temp .= "success'"; else if($authority==11) $temp .= "info'"; else $temp .= "warning'"; }
			if($_SESSION['id']==$id) $temp .= " style='font-weight: bold; color: #454545; outline: 1px ridge grey;'";
			$temp .= "><td>".$id."</td><td>".$username."</td><td>".$fname."</td><td>".$lname."</td><td>".$dob."</td><td>".$email."</td><td>".$gender."</td><td>".$nationality."</td><td>";
			$temp .= "<button class='actbtn' style='vertical-align:super' name='submit' value='".$id;
			if($allowed==1) $temp .= ":B'><span>Block</span></button>";
			else $temp .= ":A'><span>Unblock</span></button>";
			if($_SESSION['level']>$authority)
				$temp .= "&nbsp;&nbsp;<button class='actbtn' style='vertical-align:super' name='submit' value='".$id.":P:".$authority."'><span>Promote</span></button>";
			if($_SESSION['level']>=$authority && $authority>1)
				$temp .= "&nbsp;&nbsp;<button class='actbtn' style='vertical-align:super' name='submit' value='".$id.":D:".$authority."'><span>Demote</span></button>";
			$temp .= "</td></tr>";
			echo $temp."\n";
			}
	}
	mysqli_free_result($result);
?>
</table>
</form></div></div>
</center>

<br><br><br>
<?php 
if($message!=""){
?>
<script>
alert("<?php echo $message; ?>");
</script>
<?php
}
?>
<?php
include('footer.php');
?>
 <?php
mysqli_close($db);
?>