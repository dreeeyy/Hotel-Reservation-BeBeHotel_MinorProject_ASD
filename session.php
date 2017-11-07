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
    $type=$_POST['type'];
	$q="select * from users where type='$type' and username='$username' and password='$password'";
	$res=mysqli_query($l, $q);
	if(mysqli_num_rows($res)>0)
	{
        $_SESSION['username']=$username;
        if($type=='Super Admin'){
            echo "<script>window.location='superadmin.php';</script>";
        }else if($type=='Admin'){
            echo "<script>window.location='admin.php';</script>";
        }else{
            echo "<script>window.location='users.php';</script>";
        }
	}
	else
	{
		$message="Incorrect Username/Password";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<script>window.location='index.php';</script>";
		echo "<script>close()</script>";
	}
?>