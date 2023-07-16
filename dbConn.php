<?php


$host="localhost";
$username="root";
$password="";
$dbname="fertidb";

 $con=mysqli_connect($host,$username,$password,$dbname,3307);


if(!$con){
	
	die('Could not connect mysql sever:'.mysql_error());
}
?>