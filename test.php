<?php
	session_start();
	$name = $_POST['us'];
	$city = $_POST['ps'];
	if($name != null){
	$_SESSION['UserID'] = "UOO";
}
?>