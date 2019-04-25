<?php 
session_start();
$db = mysqli_connect("localhost","root","","knockout_humpty");
if(mysqli_connect_errno()){
	die("DB connect failed: ".mysqli_connect_error()." (".mysqli_connect_errno().")");
}
	$message=$notify=$username=$password=$query="";
if($_GET['log']==0) {
	$_SESSION['id']=0;
	$message="Successfully logged out...";
}
if($_GET['log']==2) {
	$notify="<b><center>Account successfully created, please login..</center></b>";
}

if($_GET['log']==3) {
	$notify="<center>Login to access paid content.</center>";
}

if(isset($_POST['submit'])){	

	$username=$_POST["uname"];
	$password=md5($_POST["pword"]);
	$query = "select * from users where username='".$username."' ";
	$result = mysqli_query($db,$query);
	
	if(!mysqli_num_rows($result)){ 
		if($username!="")
			$message='Sorry! "'.$username.'" is not a registered user.';
	}
	else {
		$r = mysqli_fetch_assoc($result);
		if($r['password']!=$password) 
			$message="Login failed! You have entered wrong password.";
		else if($r['allowed']==0){
			$message="<i>You have been blocked, contact admin.</i>";
		}
			else {	
			$_SESSION['id'] = $r['id'];
			$_SESSION['username'] = $r['username'];
			$_SESSION['fname'] = $r['fname'];
			$_SESSION['lname'] = $r['lname'];
			$_SESSION['email'] = $r['email'];
			$_SESSION['level'] = $r['authority'];
			$message="<b>Welcome ".$r['fname']."! You have successfully logged in.<b>";
			}
	}
	mysqli_free_result($result);
}
?>

<html>
<head>
<title>Log In</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="project_style.css"><link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
function not_null(){
var ua,ua2,pa,u;
u=document.A.uname.value;
ua=ua2=pa="";
if(u=="") ua="Must give a username.\n";
else if(u.search(" ")!=-1) ua2="Username cannot have spaces.\n";
if(document.A.pword.value=="") pa="Must specify a password.\n";	;
if(!(ua+ua2+pa=="")) alert(ua+ua2+pa);
}
</script>
<style>
#leg1 {
border-color: red;
}

#f1 {
width: 40%;
background-color: rgb(240,240,240);
}
</style>
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
		  require('lout_log.php');
	  ?>
    </div>
  </div>
</nav>
<div class="container" id="div4">

<?php
	  if(isset($_SESSION['id']) && $_SESSION['id']!=0){
		  echo '<center><h1><b>Welcome '.$_SESSION['fname'].' '.$_SESSION['lname'].'!</b></h1><h6><b>- KNOCKOUT - HUMPTY -</b></h6></center></div>';
	  }
	  else {
		  echo '<center><h1><b>LOG IN</b></h1><h6><b>- KNOCKOUT - HUMPTY -</b></h6></center></div>';
	  }
?>

<div class="container-fluid" id="div7">
<div class="container" id="div8">
<center> <form action="login.php?log=1" id=f1 name="A" method="post">
<table class="table table-hover" >

<?php
	  if(isset($_SESSION['id']) && $_SESSION['id']!=0){
		  echo '<tr class="active"><td colspan=2 align=center>'. $message.'</td></tr>';
	  }
	  else {
		  echo '<tr class="active"><td colspan=2><br>'.$notify.'<br></td></tr>';
		  echo '<tr class="info"><td>Username </td><td><input type=text name=uname size=30></td></tr>';
		  echo '<tr class="info"><td>Password </td><td><input type=password name=pword size=30></td></tr>';
		  echo '<tr class="active"><td colspan=2 align=center>'. $message.'<br>';
		  echo '<button class="button" style="vertical-align:middle" name="submit" type="submit" onclick="not_null()"><span>Log In</span></button></td></tr>';
	  }
?>
</table>
</form></div></div>
</center>
<br><br><br><br>
<?php
include('footer.php');
?>
 <?php
mysqli_close($db);
?>