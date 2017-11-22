<?php
    include ('connection.php');
	if(empty($_SESSION)) // if the session not yet started     
        session_start(); 
    if(!isset($_POST['submit']))
    { // if the form not yet submitted    
        header("Location: index.php");    
        exit;  
    } 

	$uname=$_POST['uname'];
	$pword=$_POST['pword'];
	$q="select * from users where uname='$uname' and pword='$pword'";
	$res=mysqli_query($con, $q);

	if(mysqli_num_rows($res)>0)
	{
        while($row=mysqli_fetch_row($res)){
            $_SESSION['id']=$row[0];
            $_SESSION['fname']=$row[3];
            $_SESSION['lname']=$row[4];
            $_SESSION['user_type']=$row[8];
        }
        $_SESSION['uname']=$uname;
        if($_SESSION['user_type']=='Super Admin'){
            echo "<script>window.location='superadmin/';</script>";
        }else if($_SESSION['user_type']=='Admin'){
            echo "<script>window.location='admin/';</script>";
        }else{
            echo "<script>window.location='customer';</script>";
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