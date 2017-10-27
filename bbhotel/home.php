<!DOCTYPE html>

<?php
    include 'connection.php'; //connect the connection page
    if(empty($_SESSION)) // if the session not yet started     
        session_start(); 
    if(!isset($_SESSION['username'])) 
    { //if not yet logged in    
        header("location: index.php");// send to login page    
        exit; 
    }  
?> 

<html>
    <head>
        <link rel="stylesheet" href="css/home.css">
        <link rel="shortcut icon" href="images/head_logo.png" />
    </head>
    <title>BBhotel | Home</title>
    
    <body>
        <div class="navbar">
            <div class="logo">
                <a href="index.php">
                    <img src="images/logo.png" width="75px;">
                </a>
            </div>
            <div class="menu">
                <div class="dropdown_content">
                    <button class="dropbutton">DICOVER THE HOTEL</button>
                    <div class="dropdown_contents">
                        <a href="#">VIRTUAL TOUR</a>
                        <a href="#">HOTEL SERVICES</a>
                        <a href="#">AWARDS</a>
                    </div>
                </div>
                <div class="dropdown_content">
                    <button class="dropbutton">ROOMS & SUITES</button>
                    <div class="dropdown_contents">
                        <a href="#">ROOMS</a>
                        <a href="#">JUNIOR SUITES</a>
                        <a href="#">SUITES</a>
                        <a href="#">DIAMOND SUITES</a>
                    </div>
                </div>
                <div class="dropdown_content">
                    <button class="dropbutton">NEWS & SPECIAL OFFERS</button>
                    <div class="dropdown_contents">
                        <a href="#">NEWS</a>
                        <a href="#">SPECIAL OFFERS</a>
                    </div>
                </div>
                <div class="dropdown_content">
                    <button class="dropbutton">PRACTICAL INFORMATION</button>
                    <div class="dropdown_contents">
                        <a href="#">PRACTICAL DETAILS</a>
                        <a href="#">CONTACT US</a>
                        <a href="#">GIFT IDEAS</a>
                    </div>
                </div>
            </div>
            
            <div class="content_account_user">
                <button class="account_user" >
                    <?php
                        echo $_SESSION['username'];
                    ?>
                </button>
                    
                <div class="contents_account_user">
                    <a href="#">PROFILE</a>
                    <a href="#">SETTINGS</a>
                    <a href="logout.php">LOG OUT</a>
                </div>
            </div>
        </div>
        
        <div id="content_con_login">
            <div id="content_login">
                
            </div>
            <div id="footer">
                BBhotel &copy 2017
            </div>
	   </div>
    </body>
</html>