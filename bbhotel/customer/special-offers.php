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
        <link rel="stylesheet" href="../css/index.css">
        <link rel="stylesheet" href="../css/special-offers.css">
        <link rel="shortcut icon" href="../images/head_logo.png" />
        <script src="scripts/Slideshow.js"></script>
    </head>
    <title>BBhotel</title>
    
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

        /* Set a style for all buttons */
        .login_button {
            background-color: darkgoldenrod;
            color: white;
            position: relative;
            top: 65px;
            padding: 14px 20px;
            margin: auto;
            border: none;
            cursor: pointer;
            font-family: Arial;
            font-size: 13px;
            width: 100%;
        }

        .login_button:hover {
            opacity: 0.8;   
        }

        .User {
            position: relative;
            top: 40px;
        }
        
        .Pass {
            position: relative;
            top: 35px;
        }
        
        .User input {
            text-align: center;
        }
        
        .Pass input {
            text-align: center;
        }
        
        .type {
            position: relative;
            top: 60px;
            left: 35px;
        }
        .login_text {
            position: absolute;
            text-align: center;
            width: 92%;
            font-family: Arial;
            font-size: 30px;
        }
        
        /* Extra styles for the cancel button */
        .cancel_button {
            width: auto;
            padding: 10px 18px;
            background-color: darkgoldenrod;
            color: white;
            margin: auto;
            border: none;
            cursor: pointer;
            font-family: Arial;
            font-size: 13px;
        }

        .cancel_button:hover {
            opacity: 0.8;
        }

        /* Center the image and position the close button */
        .login_container {
            position: relative;
            height: 260px;
            padding: 16px;
        }
        
        .login_container2 {
            position: relative;
            top: 20px;
            padding: 16px;
        }

        span.password {
            position: absolute;
            top: 145px;
            right: 0px;
            padding: 15px;
        }
        
        .password a {
            font-family: Arial;
            font-size: 13px;
        }
        
        span.noaccount {
            position: relative;
            top: 82px;
            left: 75px;
            padding-top: 16px;
            font-family: Arial;
            font-size: 13px;
        }
        
        .noaccount a {
            font-family: Arial;
            font-size: 13px;
        }

        /* The login_popup (background) */
        .login_popup {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            padding-top: 60px;
        }

        /* login_popup Content/Box */
        .login_popup_content {
            background-color: #fefefe;
            margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 400px; /* Could be more or less, depending on screen size */
        }

        /* Add Zoom Animation */
        .animate {
            -webkit-animation: animatezoom 0.2s;
            animation: animatezoom 0.2s
        }

        @-webkit-keyframes animatezoom {
            from {-webkit-transform: scale(0)} 
            to {-webkit-transform: scale(1)}
        }
    
        @keyframes animatezoom {
            from {transform: scale(0)} 
            to {transform: scale(1)}
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.password {
                display: block;
                float: none;
            }
            .cancel_button {
                width: 100%;
            }
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
                    <a href="../logout.php">LOG OUT</a>
                </div>
            </div>
        </div>
        
        <div id="login_pop" class="login_popup">
            <form class="login_popup_content animate" action="session.php" method="post">
                <div class="login_container">
                    <span class="login_text">BBhotel | Log In</span>
                    <span class="User">
                        <input type="text" placeholder="Enter Username" name="uname" required>
                    </span>
                    <span class="Pass">
                        <input type="password" placeholder="Enter Password" name="pword" required>
                    </span>
                    <span class="password"><a href="#">forgot your password?</a></span>
                    <span class="type">
                        <input type="radio" name="user_type" value="Super Admin" required>Super Admin &nbsp;
                        <input type="radio" name="user_type" value="Customer" required>Customer
                    </span>
                    <button class="login_button" type="submit" name="submit" onClick="return fun_val();">Login</button>
                    
                    <span class="noaccount">
						Don't have an account yet?
						<a href="signup.php"> Sign Up</a>
					</span>
                    
                </div>

                <div class="login_container2" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('login_pop').style.display='none'" class="cancel_button">Cancel</button>
                </div>
            </form>
        </div>

        <script>
            var login_popup = document.getElementById('login_pop');

            window.onclick = function(event) {
                if (event.target == login_popup) {
                    login_popup.style.display = "none";
                }
            }
        </script>
        
        <div id="content_con_login">
            <div class="specialoffers">
                Special Offers
            </div>
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

                    
                    <div class = "content"> 
                        <div class ="images">
                        <img src="../images/advbooking/3.jpg" alt="" class="advbooking">
                        <img src="../images/advbooking/6a.jpg" alt="" class="advbooking">
                        <img src="../images/advbooking/5.jpg" alt="" class="advbooking">
                        <img src="../images/advbooking/7a.jpg" alt="" class="advbooking">
                        </div>

                        <div class="advance">
                            <h4><br>Advance Purchase<br></h4>
                            <p>Plan ahead and save. Include Bebe Hotel in your plans and you can save up to 20% off our Best Available Rate* by booking with us in advance. With properties in some of the world's most desirable destinations, you can be sure to explore and see all the sights.<br><br>
                            Please make your reservation at least seven days prior to arrival.<br></p>
                        </div>

                        <div class="bed">
                            <h4><br>Bed and Breakfast<br></h4>
                            <p>Whether you're planning a special occasion or simply need to unwind after a hectic workweek, make the most of your weekend and book a Bed & Breakfast package at our Hoyel.<br>
                            With special rates and breakfasts for two - from healthy to decadent - our Bed & Breakfast packages are the perfect way for you to relax and recharge. Book your weekend escape today</p>
                        </div>

                        <div class="weekend">
                            <h4>Weekend Gateway<br></h4>
                            <p>Book the Weekend Getaway package and get:<br>
                            Daily Breakfast<br>
                            Late checkout at 2pm<br>
                            Premium Wi-Fi* to share photos faster or stream HD movies<br>
                            A weekend away with us, and you'll never see Saturday and Sunday the same way.</p>
                        </div>

                        <div class="instant">    
                            <h4><br>Instant Getaway</h4>
                            <p>What could be better than having a great time with your best friends or the love of your life? How about spending it at one of our Hotel?<br><br>
                            From complimentary sparkling wine* or cider when you arrive, to breakfast for two served in your room, you may never actually leave. But then, you’d be missing out on full use of the pool and Gym —also part of the package. You can arrange for early check-in or late checkout.<br>
                            So, no matter what the occasion—whether it’s just the two of you celebrating your love or a whole group of friends vacationing together—have the time of your life at Bebe Hotel.</p>
                        </div>    
                    </div>

                <div id="footer">
                BBhotel &copy 2017
            </div>
            </div>
	   </div>
    </body>
</html>