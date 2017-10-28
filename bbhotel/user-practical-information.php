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
    <title>Practical Information</title>
    
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
                        <a href="user-discover-hotel.php#virtual-tour">VIRTUAL TOUR</a>
                        <a href="user-discover-hotel.php#hotel-services">HOTEL SERVICES</a>
                        <a href="user-discover-hotel.php#awards">AWARDS</a>
                    </div>
                </div>
                <div class="dropdown_content">
                    <button class="dropbutton">ROOMS & SUITES</button>
                    <div class="dropdown_contents">
                        <a href="user-rooms-suites.php#rooms">ROOMS</a>
                        <a href="user-rooms-suites.php#junior-suites">JUNIOR SUITES</a>
                        <a href="user-rooms-suites.php#suites">SUITES</a>
                        <a href="user-rooms-suites.php#diamond-suites">DIAMOND SUITES</a>
                    </div>
                </div>
                <div class="dropdown_content">
                    <button class="dropbutton">NEWS & SPECIAL OFFERS</button>
                    <div class="dropdown_contents">
                        <a href="user-news-special-offers.php#news">NEWS</a>
                        <a href="user-news-special-offers.php#special-offers">SPECIAL OFFERS</a>
                    </div>
                </div>
                <div class="dropdown_content">
                    <button class="dropbutton">PRACTICAL INFORMATION</button>
                    <div class="dropdown_contents">
                        <a href="user-practical-information.php#practical-details">PRACTICAL DETAILS</a>
                        <a href="user-practical-information.php#contact-us">CONTACT US</a>
                        <a href="user-practical-information.php#gift-ideas">GIFT IDEAS</a>
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
                    <a href="profile.php">PROFILE</a>
                    <a href="settings.php">SETTINGS</a>
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