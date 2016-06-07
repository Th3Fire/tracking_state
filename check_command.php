<?php
	session_start();
	require_once("connect_db.php");
	
	$strUsername = mysqli_real_escape_string($con,$_POST['us']);
	$strPassword = mysqli_real_escape_string($con,$_POST['ps']);
	$logout = mysqli_real_escape_string($con,$_POST['data']);
	if($logout == 1){
		session_destroy();
		header("location:index.php");
	}
	if($strUsername == null && $strPassword == null){
		header("location:login.php");
	}else 

	$strSQL = "SELECT * FROM user WHERE Username = '".$strUsername."' 
	and Password = '".$strPassword."'";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
		echo "Username and Password Incorrect!";
		exit();
	}
	else
	{
			$_SESSION["UserID"] = $objResult["UserID"];
			session_write_close();
			echo "'".$_SESSION["UserID"]."'";
			//*** Go to Main page
			header("location:admin.php");
	}


	






	mysqli_close($con);

?>