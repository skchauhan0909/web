<?php 
session_start();
$db = mysqli_connect("localhost","root","","knockout_humpty");
if(mysqli_connect_errno()){
	die("DB connect failed: ".mysqli_connect_error()." (".mysqli_connect_errno().")");
}
	$message=$query="";
	$result=2;

if(isset($_POST['submit'])){	

	$first_name = $_POST["fname"];
	$last_name = $_POST["lname"];
	$username=$_POST["uname"];
	$password=md5($_POST["pword"]);
	$email = $_POST["email"];
	
	$query = "select * from users where username='".$username."' ";
	$temp = mysqli_query($db,$query);
	if(mysqli_num_rows($temp)){
		$message='Sorry! "'.$username.'" name is already taken.';
		mysqli_free_result($temp);
	}
	else{	
	$insert_into = "INSERT INTO users (allowed,authority,fname,lname,username,password,email";
	$values = " VALUES (1, 1, '".$first_name."', '".$last_name."', '".$username."', '".$password."', '".$email."'";
	
	if($_POST['dob']!=""){
			$insert_into.=",dob";
			$values.=", '".$_POST["dob"]."'";
	}
	if(isset($_POST['sex'])){
			$insert_into.=",gender";
			$values.=", '".$_POST["sex"]."'";
	}
		
	if($_POST['nat']!="noval"){
			$insert_into.=",nationality";
			$values.=", '".$_POST["nat"]."'";
	}
	
	$insert_into.=")";
	$values.=");";
	
	$query=$insert_into.$values;
	$result = mysqli_query($db,$query);
	
	if($result==1){
		header("Location: login.php?log=2");
		exit;
	}
	else if($result==false) {
		$message="<i>Account creation failed, please drop us an email :(<i>";
		}
	}

}
?>
<html>
<head>
<title>Sign Up</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="project_style.css"><link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
function not_null(){
var a,b,c,d,e,f,g;
a=b=c=d=e=f="";
if(document.A.fname.value=="") a="Must give a first name.\n";
if(document.A.lname.value=="") b="Must give a last name.\n";
if(document.A.uname.value=="") c="Must give a username.\n";
if(document.A.pword.value=="") d="Must specify a password.\n";
if(document.A.pword.value!=document.A.cword.value) e="Passwords do not match.\n";
if(document.A.email.value=="") f="Must give an email.\n";
g=a+b+c+d+e+f;
if(!(g=="")) alert(g);
}
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
        <li><a href="
		
		<?php
	  if(isset($_SESSION['id']) && $_SESSION['id']!=0)
		  echo 'paid.php';
	  else
		  echo 'login.php?log=3.php';
	  ?>
		
		">PAID LECTURES</a></li>
	  <?php
	  if(isset($_SESSION['id']) && $_SESSION['id']!=0){
		  if($_SESSION['level']==11 || $_SESSION['level']==111)
			  require('adm.php');
		  require('lin.php');
	  }
	  else
		  require('lout_sign.php');
	  ?>
    </div>
  </div>
</nav>
<div class="container" id="div4">
<center><h1><b>SIGN UP HERE!</b></h1></center></div>
<div class="container-fluid" id="div5">
<div class="container">
<center><form action="signup.php" id=f1 name="A" method="post"> 
<table class="table table-hover" style="width:auto;">
<tr class="active"><td colspan=2><br></td></tr>
<tr class="info"><td>First Name* </td><td>
<input type=text name=fname size=30>
</td></tr>
<tr class="info"><td>Last Name* </td><td>
<input type=text name=lname size=30>
</td></tr>
<tr class="info"><td>DOB </td><td>
<input type=date name=dob size=10>
</td></tr>
<tr class="info"><td>Gender </td><td>
<input type=radio name=sex value=m>Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=radio name=sex value=f>Female&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=radio name=sex value=o>Other
</td></tr>
<tr class="info"><td>Nationality </td><td>
<select name=nat>
<option value=noval>-- Select --</option>
<option value=indian>Indian</option>
<option value=foreigner>Foreigner</option>
</select></td></tr>
<tr class="info"><td>Username* </td><td>
<input type=text name=uname size=30>
</td></tr>
<tr class="info"><td>Password* </td><td>
<input type=password name=pword size=30>
</td></tr>
<tr class="info"><td>Confirm Password* </td><td>
<input type=password name=cword size=30>
</td></tr>
<tr class="info"><td>Email ID* </td><td>
<input type=email name=email size=30>
</td></tr>
<tr class="active"><td colspan=2 align=center><?php echo $message; ?><br><button class="button" style="vertical-align:middle" type=submit name=submit onclick="not_null()"><span>Sign Up</span></button></td></tr></table>
</frameset></center></form>
</div></div>
<br><br><br><br>
<<?php
include('footer.php');
?>
 <?php
mysqli_close($db);
?>