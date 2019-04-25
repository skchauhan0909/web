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