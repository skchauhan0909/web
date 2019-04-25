<?php 
session_start();
?>
<html>
<head>
<title>TEAM</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="project_style.css"><link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
		  echo 'login.php?log=3';
	  ?>
		
		">PAID LECTURES</a></li>
	  <?php
	  if(isset($_SESSION['id']) && $_SESSION['id']!=0){
		  if($_SESSION['level']==11 || $_SESSION['level']==111)
			  require('adm.php');
		  require('lin.php');
	  }
	  else
		  require('lout_other.php');
	  ?>
    </div>
  </div>
</nav>

<div class="container" id="div4">
<center><h1><b>-- TEAM --</b></h1></center><br>
<div class="container-fluid" id="div5">
<div class="container">
<ul>
<li style="font-size: 22px">One</li>
<li style="font-size: 22px">Two</li>
<li style="font-size: 22px">Three</li>
<li style="font-size: 22px">Four</li>
<li style="font-size: 22px">Five</li>
<li style="font-size: 22px">Six</li>
</div></div></div>

<br><br>
<div class="container-fluid" style="background-color:dodgerblue;">
<div class="container">
<div class="row" style="padding-top:20px;padding-bottom:10px;">
<div class="col-sm-11"><font color="white" id="large_text1">&copy 2019 KNOCKOUT HUMPTY. All rights reserved. Terms of Use | Privacy Policy | Sitemap<br/>Designed by: <a id="link" href="team.php"> ThirdYear2018 
</a></font></div>
<div class="col-sm-1"><img src="mail.png" class="img-responsive">
</div></div></div></div>
</body>
</html>