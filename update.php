<?php 
session_start();
$db = mysqli_connect("localhost","root","","knockout_humpty");
if(mysqli_connect_errno()){
	die("DB connect failed: ".mysqli_connect_error()." (".mysqli_connect_errno().")");
}
	$message=$notify=$username=$password=$query="";

	$query = "select * from users";
	$result = mysqli_query($db,$query);

	while($r = mysqli_fetch_assoc($result)){
		$password = md5($r['password']);
		$success = mysqli_query($db,"update users set password = '".$password."' where id = ".$r['id']);
		if($success) echo $r['username']."updated successfully!<br>";
		else echo $r['username']."failed to update!<br>";
	}
	
mysqli_free_result($result);
mysqli_close($db);
?>