<?php
session_start();
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="project_style.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<title>KNOCKOUT HUMPTY :: Homepage</title>
<script>
$(document).ready(function(){
$("#pd1").click(function(){
$("#pd2").slideToggle("slow");
});
});
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
        <li class="active"><a href="index.php">HOME</a></li>
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
<div class="container-fluid" id="div2" id="slide">  
<div class="container">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
<li data-target="#myCarousel" data-slide-to="1"></li>
<li data-target="#myCarousel" data-slide-to="2"></li>
</ol>
<div class="carousel-inner">
<div class="item active">
<img src="banner1.jpeg" alt="Welcome to KNOCKOUT HUMPTY!" style="width:100%;">
<div class="carousel-caption">
<h3>Welcome to KNOCKOUT HUMPTY!</h3>
<p>Our classes are always so much fun!</p>
</div>
</div>

<div class="item">
<img src="banner2.jpg" alt="FREE LECTURES!!" style="width:100%;">
<div class="carousel-caption">
<h3>FREE LECTURES!!</h3>
<p>Try free courses and enhance your knowledge!</p>
</div>
</div>
    
<div class="item">
<img src="banner3.jpg" alt="PAID LECTURES!!</" style="width:100%;">
<div class="carousel-caption">
<h3>PAID LECTURES!!</h3>
<p>Sit back and learn from our carefully designed, course specific lectures!</p>
</div>
</div>
  
</div>
<a class="left carousel-control" href="#myCarousel" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>
</div>

</div>
<div class="container-fluid" id="div3">
<div class="container">
<div class="row" >
<div class="col-sm-6" style="padding-right:30px;" ><font color="white" size="80px">About<hr style="color:white;background-color:white;height:3px;top:-5px;" /></font><font color="white" id="large_text">"KNOCKOUT HUMPTY provides learning solutions"<br>We 
create and market affordable courses that <br/>comply with board standards and strive to  make students <br/>achieve their best and secure great ranks in<br/>competetive exams.</font><br/><br/>
</div>
<div class="col-sm-6" style="padding-top:0px;"><img src="about_kh.png" class="img-responsive" width="320px"></div></div></div></div>
<div class="container-fluid" >
<div class="container">
<div class="row" style="padding-bottom:30px;padding-top:20px;">
<div class="col-sm-6" style="padding-top:0px;"><img src="doubt.png" height="120px" width="420px" class="img-responsive"></div>
<div class="col-sm-6" style="padding-right:30px;"><font color="#454545" size="80px">24x7 Assisstance</font><h6><div class="hr2"><hr/></div></h6><b><font color="#404040" id="large_text">We are always online to help our students.<br>
Our staff members are always there to help solve problems and clear the doubts, be it 12 at night or 12 at noon, our responsive staff has always got your back, because we know it's important for you, our students.<br>Get help from the experts in all subjects. We have multiple teachers for every subjects. Learn from the one whom you understand better.</font></b><br/><br/>
</div></div></div></div>
<div class="container-fluid" style="background-color:rgb(255,69,0,0.7)">
<div class="container">
<div class="row" style="padding-top:30px;padding-bottom:40px;">
<div class="col-sm-6"><font color="white" size="80px">Practical Demo</font><h6><div class="hr1"><hr/></div></h6><font color="white" id="large_text">We cover three main practical courses; namely Physics, Chemistry and Computer Science. <br/>
We help our students to understand the mechanics behind a practical activity and the essence of it's observation. <br/>Sit with us in the lab and follow up then participate in a short discussion session conducted afterwards.</font><br/><br/></div>
<div class="col-sm-6" style="padding-top:60px;"><img src="pract.png" class="img-responsive" width="300px">
</div></div></div></div>
<div class="container-fluid" >
<div class="container">
<div class="row" style="padding-top:30px;padding-bottom:40px;">
<div class="col-sm-6"><img src="future1.png" width="220px" class="img-responsive"></div>
<div class="col-sm-6"><font color="#454545" size="80px">Future Scope</font><h6><div class="hr2"><hr/></div></h6><b><font color="#404040" id="large_text">We provide a stimulating and challenging study<br/> 
environment for our students, who get the<br/> opportunity to work with fit 'n fine appratuses and<br> the current technologies to enrich their concepts<br> and enhance their grip over the topics.<br>This renders the maximum potential out of our<br> students and they perform superb in their higher<br> pursuit of knowledge.<br> In case of any trouble, we also vow to help our ex-students too, just drop a message!!</font></b><br/><br/>
</div></div></div></div>
<div class="container-fluid" style="background-color:rgb(107,107,71,0.7);" >
<div class="container">
<div class="row" style="padding-top:30px;padding-bottom:40px;">
<div class="col-sm-6"><font color="white" size="80px">Contact</font><h6><div class="hr1"><hr/></div></h6><font color="white" id="large_text">Whether you're an enrolled student or an enthusiast<br/>
feel free to contact us at: <br><a id="mail_link" href="mailto:humptyknockout@gmail.com" target="_top">humptyknockout@gmail.com</a></font><br/><br/></div>
<div class="col-sm-6" style="padding-top:60px;"><img src="contact.png" class="img-responsive">
</div></div></div></div>
<br><br><br><br>
<?php
include('footer.php');
?>