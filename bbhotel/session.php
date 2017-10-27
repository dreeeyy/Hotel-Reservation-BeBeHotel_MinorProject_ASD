<?php
	if(empty($_SESSION)) // if the session not yet started     
        session_start(); 
    if(!isset($_POST['submit']))
    { // if the form not yet submitted    
        header("Location: index.php");    
        exit;  
    } 

	$l=mysqli_connect("localhost","root","",'bbhotel');

	$username=$_POST['username'];
	$password=$_POST['password'];
	$q="select * from user where username='$username' and password='$password'";
	$res=mysqli_query($l, $q);
	if(mysqli_num_rows($res)>0)
	{
	  $_SESSION['username']=$username;
		echo "<script>window.location='home.php';</script>";
	}
	else
	{
		$message="Incorrect Username/Password";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<script>window.location='index.php';</script>";
		echo "<script>close()</script>";
	}
?>