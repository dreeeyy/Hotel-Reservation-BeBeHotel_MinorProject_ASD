<!DOCTYPE html>

<?php
    include 'connection.php'; //connect the connection page 
    if(empty($_SESSION)) // if the session not yet started     
        session_start(); 
    if(isset($_SESSION['uname']))
    { // if already login
        header("location: index.php"); // send to home page   
        exit;
    } 
?>

<html>
    <head>
        <link rel="stylesheet" href="css/signup.css">
        <link rel="shortcut icon" href="images/head_logo.png" />
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
                <button class="account_user" >MY ACCOUNT</button>
                <div class="contents_account_user">
                    <a href="#" class="dropbutton_account" onclick="document.getElementById('login_pop').style.display='block'" style="width:auto;">LOG IN</a>
                    <a href="signup.php">SIGN UP</a>
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
                        <input type="radio" name="user_type" value="Admin" required>Admin &nbsp;
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
        <div id="content_login">
            <form>
                <div class="signup_text">BBhotel | Sign Up</div>
                <div class="signup_con">
                    <span class="uname">
                        <b>Username</b>
                        <input type="text" placeholder="Enter Username" name="uname" required>
                    </span>
                    <span class="pword">
                        <b>Password</b>
                        <input type="password" placeholder="Enter Password" name="pword" required>
                    </span>
                    <span class="cpword">
                        <b>Confirm Password</b>
                        <input type="password" placeholder="Enter Confirm Password" name="pword" required>
                    </span>
                    <span class="fname">
                        <b>First Name</b>
                        <input type="text" placeholder="Enter First Name" name="fname" required>
                    </span>
                    <span class="lname">
                        <b>Last Name</b>
                        <input type="text" placeholder="Enter Last Name" name="lname" required>
                    </span>
                    <span class="mobile">
                        <b>Mobile Number</b>
                        <input type="text" placeholder="Enter Mobile" name="mnumber" required>
                    </span>
                    <span class="address">
                        <b>Address</b>
                        <input type="text" placeholder="Enter Address" name="address" required>
                    </span>
                    <span class="gender">
                        <b>Gender:</b> <br>
                        <input type="radio" name="gender" value="Female">Female <br>
                        <input type="radio" name="gender" value="Male">Male <br><br>
                    </span>
                    <span class="usertype">
                        <b>User Type:</b> <br>
                        <input type="radio" name="user_type" value="Super Admin" disabled>Super Admin <br>
                        <input type="radio" name="user_type" value="Admin" disabled>Admin <br>
                        <input type="radio" name="user_type" value="Customer" required>Customer <br><br>
                    </span>
                    <button class="signup_button" type="submit" name="submit">Sign Up</button>
                </div>
            </form>
        </div>
        <div id="footer">
            BBhotel &copy 2017
        </div>
   </div>
    </body>
</html>