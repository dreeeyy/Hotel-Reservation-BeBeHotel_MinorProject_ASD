<?php
	if(empty($_SESSION)) // if the session not yet started     
        session_start(); 
    if(!isset($_POST['submit']))
    { // if the form not yet submitted    
        header("Location: index.php");    
        exit;  
    } 

	$l=mysqli_connect("localhost","root","",'bbhotel');

	$uname=$_POST['uname'];
	$pword=$_POST['pword'];
    $user_type=$_POST['user_type'];
	$q="select * from users where user_type='$user_type' and uname='$uname' and pword='$pword'";
	$res=mysqli_query($l, $q);
	if(mysqli_num_rows($res)>0)
	{
        $_SESSION['uname']=$uname;
        if($user_type=='Super Admin'){
            echo "<script>window.location='superadmin/';</script>";
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