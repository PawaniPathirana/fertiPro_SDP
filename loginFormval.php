<?php

include"dbConn.php";

session_start();
if($con===false)
{
	die("connection error");
}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$username=$_POST["uname"];
	$password=$_POST["password"];


	$sql="select * from user where username='".$username."' AND password='".$password."' ";

	$result=mysqli_query($con,$sql);

	$row=mysqli_fetch_array($result);

	if($row["userType"]=="farmer")
	{	

		$_SESSION["username"]=$username;

		header("location:farmerHome.php");
	}

	elseif($row["userType"]=="admin")
	{

		$_SESSION["username"]=$username;
		
		header("location:adminHome.php");
	}
	elseif($row["userType"]=="devOfficer")
	{

		$_SESSION["username"]=$username;
		
		header("location:devOfficerHome.php");
	}
	
	elseif($row["userType"]=="AR_Officer")
	{

		$_SESSION["username"]=$username;
		
		header("location:AR_OfficerHome.php");
	}
	
	else
	{
		echo "username or password incorrect";
	}

}




?>


