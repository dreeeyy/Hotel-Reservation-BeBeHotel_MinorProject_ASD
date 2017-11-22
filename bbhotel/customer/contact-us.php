<!DOCTYPE html>

<?php
    include '../connection.php'; //connect the connection page 
    if(empty($_SESSION)) // if the session not yet started     
        session_start(); 

    if(isset($_SESSION['uname'])&&$_SESSION['user_type']=='Super Admin')
    { // if already login
        header("location: superadmin/"); // send to home page   
        exit;
    }
    else if(isset($_SESSION['uname'])&&$_SESSION['user_type']=='Super Admin')
    { // if already login
        header("location: admin/"); // send to home page   
        exit;
    }
    else if($_SESSION['user_type']==NULL){
        header("location: ../"); // send to home page   
        exit;
    }
?>

<html>
    <head>
        <link rel="stylesheet" href="../css/contact-us.css">
        <link rel="shortcut icon" href="../images/head_logo.png" />
        <script src="../scripts/Slideshow.js"></script>
    </head>
    <title>Contact Us</title>
    
    <script language="javascript" type="text/javascript">
        function fun_val()
        {
            var l=document.loginsell.username.value;
            if(l=="")
            {
                alert("Please Enter User name");
                document.loginsell.username.focus;
                return false;
            }

            var p=document.loginsell.password.value;
            if(p=="")
            {
                alert("Please Enter Password");
                document.loginsell.password.focus;
                return false;
            }
        }
    </script>
    
    <style>
        /* Full-width input fields */
        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
    </style>
    
    <body>
        <div class="navbar">
            <div class="logo">
                <a href="index.php">
                    <img src="../images/logo.png" width="75px;">
                </a>
            </div>
            
            <div class="menu">
                <div class="dropdown_content">
                    <button class="dropbutton">DISCOVER THE HOTEL</button>
                    <div class="dropdown_contents">
                        <a href="hotel-services.php">HOTEL SERVICES</a>
                    </div>
                </div>
                <div class="dropdown_content">
                    <button class="dropbutton">ROOMS & RESERVATIONS</button>
                    <div class="dropdown_contents">
                        <a href="../customers-rooms.php">ROOMS</a>
                        <a href="../reservations">RESERVATIONS</a>
                    </div>
                </div>
                <div class="dropdown_content">
                    <button class="dropbutton">NEWS & SPECIAL OFFERS</button>
                    <div class="dropdown_contents">
                        <a href="special-offers.php">SPECIAL OFFERS</a>
                    </div>
                </div>
                <div class="dropdown_content">
                    <button class="dropbutton">PRACTICAL INFORMATION</button>
                    <div class="dropdown_contents">
                        <a href="contact-us.php">CONTACT US</a>
                    </div>
                </div>
            </div>
            
            <div class="content_account_user">
                <button class="account_user" >MY ACCOUNT</button>
                    
                <div class="contents_account_user">
                    <a href="profile.php">PROFILE</a>
                    <a href="transactions.php">TRANSACTIONS</a>
                    <a href="../logout.php">LOG OUT</a>
                </div>
            </div>
        </div>
        <div id="content_con_login">
            <div id="content_login">
                <div class="image"> <img src="../images/slides/1a.jpg" alt="" class="img"></div>
                
            </div>
            <div class="welcome">
                <br>Contact Us
            </div>
            <div class="contact">
                For more details and concern please contact us:
            </div>
            <div class="costaleona">
                Costa Leona branch:
                <ul>Call: +63 954 895 4957/8-7000</ul>
                <ul>Email: bebehotelcostaleana@gmail.com</ul>
            </div>
            <div class="alegria">
                Alegria branch:
                <ul>Call: +63 945 598 7594/7-6000</ul>
                <ul>Email: bebehotelalegria@gmail.com</ul>
            </div>
            <div class="like-us">
                <ul>Like us on Facebook: www.facebook.com/bebehotel</ul>
                <ul>Follow us on Instagram: www.instagram.com/bebehotel</ul>
            </div>
            </div>
            <div id="footer">
                BBhotel &copy 2017
            </div>
       </div>
    </body>
</html>