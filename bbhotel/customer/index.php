<!DOCTYPE html>

<?php
    include '../connection.php'; //connect the connection page
    if(empty($_SESSION))    
         session_start();

    if(isset($_SESSION['uname'])&&$_SESSION['user_type']=='Super Admin')
    { // if already login
        header("location: ../superadmin/"); // send to home page   
        exit;
    }
    else if(isset($_SESSION['uname'])&&$_SESSION['user_type']=='Admin')
    { // if already login
        header("location: ../admin/"); // send to home page   
        exit;
    }
    else if($_SESSION['user_type']==NULL){
        header("location: ../"); // send to home page   
        exit;
    }
?> 

<html>
    <head>
        <link rel="stylesheet" href="../css/customer-index.css">
        <link rel="shortcut icon" href="../images/head_logo.png"/>
        <script src="../scripts/Slideshow.js"></script>
    </head>
    <title>BBhotel</title>
    
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
                        <a href="../reservation.php">RESERVATIONS</a>
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
            <div class="welcome">
                WELCOME TO
            </div>
            <div class="Bebe">
                Bebe Hotel
            </div>
            <a href="lets-tour.php">
                <div id="take-tour">
                    Let's Tour
                </div>
            </a>
            <div id="content_login">
                <div class="slider">
                    <figure>
                        <div class="slide">
                            <img src="../images/slides/1.jpg">
                        </div>

                        <div class="slide">
                            <img src="../images/slides/2.jpg">
                        </div>

                        <div class="slide">
                            <img src="../images/slides/3.jpg">
                        </div>

                        <div class="slide">
                            <img src="../images/slides/4.jpg">
                        </div>

                        <div class="slide">
                            <img src="../images/slides/5.jpg">
                        </div>
                    </figure>
                </div>
            </div>
            <div id="footer">
                BBhotel &copy 2017
            </div>
	   </div>
    </body>
</html>