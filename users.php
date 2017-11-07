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
        <link rel="stylesheet" href="css/users.css">
        <link rel="shortcut icon" href="images/head_logo.png" />
    </head>
    <title>BBhotel</title>
    
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
                        <a href="#virtual-tour">VIRTUAL TOUR</a>
                        <a href="#hotel-services">HOTEL SERVICES</a>
                        <a href="#awards">AWARDS</a>
                    </div>
                </div>
                <div class="dropdown_content">
                    <button class="dropbutton">ROOMS & SUITES</button>
                    <div class="dropdown_contents">
                        <a href="#rooms">ROOMS</a>
                        <a href="#junior-suites">JUNIOR SUITES</a>
                        <a href="#suites">SUITES</a>
                        <a href="#diamond-suites">DIAMOND SUITES</a>
                    </div>
                </div>
                <div class="dropdown_content">
                    <button class="dropbutton">NEWS & SPECIAL OFFERS</button>
                    <div class="dropdown_contents">
                        <a href="#news">NEWS</a>
                        <a href="#special-offers">SPECIAL OFFERS</a>
                    </div>
                </div>
                <div class="dropdown_content">
                    <button class="dropbutton">PRACTICAL INFORMATION</button>
                    <div class="dropdown_contents">
                        <a href="#practical-details">PRACTICAL DETAILS</a>
                        <a href="#contact-us">CONTACT US</a>
                        <a href="#gift-ideas">GIFT IDEAS</a>
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