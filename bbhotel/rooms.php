<!DOCTYPE html>

<?php
    include 'connection.php'; //connect the connection page 
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
    else if(isset($_SESSION['uname'])&&$_SESSION['user_type']=='Customer')
    { // if already login
        header("location: customer/"); // send to home page   
        exit;
    }
?>

<html>
    <head>
        <meta charset = "UTF-8">
        <meta name="viewport" content="width=device-width, initial scale=1">
        <link rel="stylesheet" href="css/rooms.css">
        <link rel="shortcut icon" href="images/head_logo.png" />
        <link rel="stylesheet" href="css/magnific-popup.css">
        <script src="js/modernizr.js"></script>
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
            top: 50px;
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
                    <button class="dropbutton">DISCOVER THE HOTEL</button>
                    <div class="dropdown_contents">
                        <a href="hotel-services.php">HOTEL SERVICES</a>
                    </div>
                </div>
                <div class="dropdown_content">
                    <button class="dropbutton">ROOMS & RESERVATIONS</button>
                    <div class="dropdown_contents">
                        <a href="rooms.php">ROOMS</a>
                        <a href="#" onclick="document.getElementById('login_pop').style.display='block'" style="width:auto;">RESERVATIONS</a>
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
            <div class="welcome">
                Rooms
            </div>
            <a class ="smoothscroll" href="#portfolio">
                <div id="take-tour">
                    View Rooms
                </div>
            </a>
            <div id="content_login">
                <div class="slider">
                    <figure>
                        <div class="slide">
                            <img src="images/slides/1.jpg">
                        </div>

                        <div class="slide">
                            <img src="images/slides/2.jpg">
                        </div>

                        <div class="slide">
                            <img src="images/slides/3.jpg">
                        </div>

                        <div class="slide">
                            <img src="images/slides/4.jpg">
                        </div>

                        <div class="slide">
                            <img src="images/slides/5.jpg">
                        </div>
                    </figure>
                </div>
            </div>
            <div id="portfolio">
                <div class="row">
                    <div class="twelve columns collapsed">
                        <h1>Rooms & Suites</h1>
                        <!-- portfolio-wrapper -->
                        <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-thirds cf">
                            <div class="columns portfolio-item">
                                <div class="item-wrap">
                                    <a href="#modal-01" title="">
                                        <img alt="" src="images/photo/diamond suites/1/ds1.jpg">
                                        <div class="overlay">
                                            <div class="portfolio-item-meta">
                                                <h5>Diamond Suite (Premier)</h5>
                                                <p>Bebe</p>
                                            </div>
                                        </div>
                                        <div class="link-icon"><i class="icon-plus"></i></div>
                                    </a>
                                </div>
                            </div> <!-- item end -->
                            <div class="columns portfolio-item">
                                <div class="item-wrap">
                                    <a href="#modal-03" title="">
                                        <img alt="" src="images/photo/diamond suites/3/ds3.jpg">
                                        <div class="overlay">
                                            <div class="portfolio-item-meta">
                                                <h5>Diamond Suite (Deluxe)</h5>
                                                <p>Bebe</p>
                                            </div>
                                        </div>
                                        <div class="link-icon"><i class="icon-plus"></i></div>
                                    </a>
                                </div>
                            </div> <!-- item end -->
                            <div class="columns portfolio-item">
                                <div class="item-wrap">
                                    <a href="#modal-02" title="">
                                        <img alt="" src="images/photo/diamond suites/2/ds2.jpg">
                                        <div class="overlay">
                                            <div class="portfolio-item-meta">
                                                <h5>Junior Suite (Premier)</h5>
                                                <p>Bebe</p>
                                            </div>
                                        </div>
                                        <div class="link-icon"><i class="icon-plus"></i></div>
                                    </a>
                                </div>
                            </div> <!-- item end -->
                            <div class="columns portfolio-item">
                                <div class="item-wrap">
                                    <a href="#modal-04" title="">
                                        <img alt="" src="images/photo/junior suites/1/js1.jpg">
                                        <div class="overlay">
                                            <div class="portfolio-item-meta">
                                                <h5>Junior Suite (Deluxe)</h5>
                                                <p>Bebe</p>
                                            </div>
                                        </div>
                                        <div class="link-icon"><i class="icon-plus"></i></div>
                                    </a>
                                </div>
                            </div> <!-- item end -->
                            <div class="columns portfolio-item">
                                <div class="item-wrap">
                                    <a href="#modal-05" title="">
                                        <img alt="" src="images/photo/rooms/premier room/premier.jpg">
                                        <div class="overlay">
                                            <div class="portfolio-item-meta">
                                                <h5>Room (Premier)</h5>
                                                <p>Bebe</p>
                                            </div>
                                        </div>
                                        <div class="link-icon"><i class="icon-plus"></i></div>
                                    </a>
                                </div>
                            </div> <!-- item end -->
                            <div class="columns portfolio-item">
                                <div class="item-wrap">
                                    <a href="#modal-06" title="">
                                        <img alt="" src="images/photo/rooms/superior room/superior.jpg">
                                        <div class="overlay">
                                            <div class="portfolio-item-meta">
                                                <h5>Room (Deluxe)</h5>
                                                <p>Bebe</p>
                                            </div>
                                        </div>
                                        <div class="link-icon"><i class="icon-plus"></i></div>
                                    </a>
                                </div>
                            </div> <!-- item end -->
                            <div class="columns portfolio-item">
                                <div class="item-wrap">
                                    <a href="#modal-07" title="">
                                        <img alt="" src="images/photo/suites/1/s1.jpg">
                                        <div class="overlay">
                                            <div class="portfolio-item-meta">
                                                <h5>Suite (Premier)</h5>
                                                <p>Bebe</p>
                                            </div>
                                        </div>
                                        <div class="link-icon"><i class="icon-plus"></i></div>
                                    </a>
                                </div>
                            </div> <!-- item end -->
                            <div class="columns portfolio-item">
                                <div class="item-wrap">
                                    <a href="#modal-08" title="">
                                        <img alt="" src="images/photo/suites/2/s2.jpg">
                                        <div class="overlay">
                                            <div class="portfolio-item-meta">
                                                <h5>Suite (Deluxe)</h5>
                                                <p>Bebe</p>
                                            </div>
                                        </div>
                                        <div class="link-icon"><i class="icon-plus"></i></div>
                                    </a>
                                </div>
                            </div> <!-- item end -->
                        </div> <!-- portfolio-wrapper end -->
                    </div> <!-- twelve columns end -->
                    <!-- Modal Popup--------------------------------------------------------------- -->
                    <div id="modal-01" class="popup-modal mfp-hide">
                        <div class="slider">
                            <figure>
                                <div class="slide">
                                    <img src="images/photo/diamond suites/1/ds1a.jpg">
                                </div>
                                <div class="slide"> 
                                    <img src="images/photo/diamond suites/1/ds1b.jpg">
                                </div>
                                <div class="slide">
                                    <img src="images/photo/diamond suites/1/ds1c.jpg">
                                </div>
                                <div class="slide">
                                    <img src="images/photo/diamond suites/1/ds1d.jpg">
                                </div>
                                <div class="slide">
                                    <img src="images/photo/diamond suites/1/ds1e.jpg">
                                </div>
                            </figure>
                        </div>
                        <div class="description-box">
                            <h4>The Premier Diamond Suite</h4>
                            <p>
                                At Bebe Hotel the stunning Diamond Suites are spacious and well-appointed with an open-plan layout and living area, allowing guests to enjoy city.  The décor includes elegant furniture, soothing shades giving a residential feel.  All Diamond Suite are all airy, thanks to their high ceilings and tall windows. Modern luxuries include master controlled lighting and climate control, Wi-Fi, Bang & Olufsen televisions and sound systems with Bluetooth connectivity.
                            </p>
                            <h2>Price: Php 6,300.00 per night</h2>
                        </div>
                        <div class="link-box">
                            <a class="popup-modal-dismiss" href="#" onclick="document.getElementById('login_pop').style.display='block'" style="width:auto;">Reserve Now</a>
                            <a class="popup-modal-dismiss" style="margin-left: 338.4px;">Close</a>
                        </div>
                    </div><!-- modal-01 End -->
                    <div id="modal-03" class="popup-modal mfp-hide">
                        <div class="slider">
                            <figure>
                                <div class="slide">
                                    <img src="images/photo/diamond suites/3/ds3a.jpg">
                                </div>
                                <div class="slide"> 
                                    <img src="images/photo/diamond suites/3/ds3b.jpg">
                                </div>
                                <div class="slide">
                                    <img src="images/photo/diamond suites/3/ds3c.jpg">
                                </div>
                                <div class="slide">
                                    <img src="images/photo/diamond suites/3/ds3d.jpg">
                                </div>
                                <div class="slide">
                                    <img src="images/photo/diamond suites/3/ds3e.jpg">
                                </div>
                            </figure>
                        </div>
                        <div class="description-box">
                            <h4>The Deluxe Diamond Suite</h4>
                            <p>
                                At Bebe Hotel the stunning Diamond Suites are spacious and well-appointed with an open-plan layout and living area, allowing guests to enjoy city.  The décor includes elegant furniture, soothing shades giving a residential feel.  All Diamond Suite are all airy, thanks to their high ceilings and tall windows. Modern luxuries include master controlled lighting and climate control, Wi-Fi, Bang & Olufsen televisions and sound systems with Bluetooth connectivity.
                            </p>
                            <h2>Price: Php 6,600.00 per night</h2>
                        </div>
                        <div class="link-box">
                            <a class="popup-modal-dismiss" href="#" onclick="document.getElementById('login_pop').style.display='block'" style="width:auto;">Reserve Now</a>
                            <a class="popup-modal-dismiss" style="margin-left: 338.4px;">Close</a>
                        </div>
                    </div><!-- modal-03 End -->
                    <div id="modal-02" class="popup-modal mfp-hide">
                        <div class="slider">
                            <figure>
                                <div class="slide">
                                    <img src="images/photo/diamond suites/2/ds2a.jpg">
                                </div>
                                <div class="slide"> 
                                    <img src="images/photo/diamond suites/2/ds2b.jpg">
                                </div>
                                <div class="slide">
                                    <img src="images/photo/diamond suites/2/ds2c.jpg">
                                </div>
                                <div class="slide">
                                    <img src="images/photo/diamond suites/2/ds2d.jpg">
                                </div>
                                <div class="slide">
                                    <img src="images/photo/diamond suites/2/ds2a.jpg">
                                </div>
                            </figure>
                        </div>
                        <div class="description-box">
                            <h4>The Premier Junior Suite</h4>
                            <p>
                                These sophisticated and elegant Junior suites at Bebe Hotel are decorated with sophistication and elegance. They are bright with soaring ceilings and tall windows, which have been designed to make the most of the natural daylight. Enjoy fine fabrics, beautiful artwork and exquisite design. Modern luxuries include master controlled lighting and climate control, Wi-Fi, televisions and sound systems with Bluetooth connectivity. Delight in the stylish light and dark themed rooms.
                            </p>
                            <h2>Price: Php 4,200.00 per night</h2>
                        </div>
                        <div class="link-box">
                            <a class="popup-modal-dismiss" href="#" onclick="document.getElementById('login_pop').style.display='block'" style="width:auto;">Reserve Now</a>
                            <a class="popup-modal-dismiss" style="margin-left: 338.4px;">Close</a>
                        </div>
                    </div><!-- modal-02 End -->
                    <div id="modal-04" class="popup-modal mfp-hide">
                        <div class="slider">
                            <figure>
                                <div class="slide">
                                    <img src="images/photo/junior suites/1/js1a.jpg">
                                </div>
                                <div class="slide"> 
                                    <img src="images/photo/junior suites/1/js1b.jpg">
                                </div>
                                <div class="slide">
                                    <img src="images/photo/junior suites/1/js1c.jpg">
                                </div>
                                <div class="slide">
                                    <img src="images/photo/junior suites/1/js1d.jpg">
                                </div>
                                <div class="slide">
                                    <img src="images/photo/junior suites/1/js1a.jpg">
                                </div>
                            </figure>
                        </div>
                        <div class="description-box">
                            <h4>The Deluxe Junior Suite</h4>
                            <p>
                                These sophisticated and elegant Junior suites at Bebe Hotel are decorated with sophistication and elegance. They are bright with soaring ceilings and tall windows, which have been designed to make the most of the natural daylight. Enjoy fine fabrics, beautiful artwork and exquisite design. Modern luxuries include master controlled lighting and climate control, Wi-Fi, televisions and sound systems with Bluetooth connectivity. Delight in the stylish light and dark themed rooms.
                            </p>
                            <h2>Price: Php 4,400.00 per night</h2>
                        </div>
                        <div class="link-box">
                            <a class="popup-modal-dismiss" href="#" onclick="document.getElementById('login_pop').style.display='block'" style="width:auto;">Reserve Now</a>
                            <a class="popup-modal-dismiss" style="margin-left: 338.4px;">Close</a>
                        </div>
                    </div><!-- modal-04 End -->
                    <div id="modal-05" class="popup-modal mfp-hide">
                        <div class="slider">
                            <figure>
                                <div class="slide">
                                    <img src="images/photo/rooms/premier room/premier1.jpg">
                                </div>
                                <div class="slide"> 
                                    <img src="images/photo/rooms/premier room/premier2.jpg">
                                </div>
                                <div class="slide">
                                    <img src="images/photo/rooms/premier room/premier3.jpg">
                                </div>
                                <div class="slide">
                                    <img src="images/photo/rooms/premier room/premier2.jpg">
                                </div>
                                <div class="slide">
                                    <img src="images/photo/rooms/premier room/premier1.jpg">
                                </div>
                            </figure>
                        </div>
                        <div class="description-box">
                            <h4>The Premier Room</h4>
                            <p>
                                kembular skema.. asdfghjklafertdfsdgsga
                            </p>
                            <h2>Price: Php 2,100.00 per night</h2>
                        </div>
                        <div class="link-box">
                            <a class="popup-modal-dismiss" href="#" onclick="document.getElementById('login_pop').style.display='block'" style="width:auto;">Reserve Now</a>
                            <a class="popup-modal-dismiss" style="margin-left: 338.4px;">Close</a>
                        </div>
                    </div><!-- modal-07 End -->
                    <div id="modal-06" class="popup-modal mfp-hide">
                        <div class="slider">
                            <figure>
                                <div class="slide">
                                    <img src="images/photo/rooms/superior room/superior1.jpg">
                                </div>
                                <div class="slide"> 
                                    <img src="images/photo/rooms/superior room/superior2.jpg">
                                </div>
                                <div class="slide">
                                    <img src="images/photo/rooms/superior room/superior3.jpg">
                                </div>
                                <div class="slide">
                                    <img src="images/photo/rooms/superior room/superior2.jpg">
                                </div>
                                <div class="slide">
                                    <img src="images/photo/rooms/superior room/superior1.jpg">
                                </div>
                            </figure>
                        </div>
                        <div class="description-box">
                            <h4>The Deluxe Room</h4>
                            <p>
                                kembular skema.. asdfghjklafertdfsdgsga
                            </p>
                            <h2>Price: Php 2,500.00 per night</h2>
                        </div>
                        <div class="link-box">
                            <a class="popup-modal-dismiss" href="#" onclick="document.getElementById('login_pop').style.display='block'" style="width:auto;">Reserve Now</a>
                            <a class="popup-modal-dismiss" style="margin-left: 338.4px;">Close</a>
                        </div>
                    </div><!-- modal-06 End -->
                    <div id="modal-07" class="popup-modal mfp-hide">
                        <div class="slider">
                            <figure>
                                <div class="slide">
                                    <img src="images/photo/suites/1/s1a.jpg">
                                </div>
                                <div class="slide"> 
                                    <img src="images/photo/suites/1/s1b.jpg">
                                </div>
                                <div class="slide">
                                    <img src="images/photo/suites/1/s1c.jpg">
                                </div>
                                <div class="slide">
                                    <img src="images/photo/suites/1/s1d.jpg">
                                </div>
                                <div class="slide">
                                    <img src="images/photo/suites/1/s1a.jpg">
                                </div>
                            </figure>
                        </div>
                        <div class="description-box">
                            <h4>The Premier Suite</h4>
                            <p>
                                The Suites at Bebe Hotel are sophisticated and elegant. They are bright and airy.  Their exquisite design incorporates fine fabrics and beautiful artwork. Modern luxuries include master controlled lighting and climate control, Wi-Fi, televisions and sound systems with Bluetooth connectivity. 
                            </p>
                            <h2>Price: Php 5,500.00 per night</h2>
                        </div>
                        <div class="link-box">
                            <a class="popup-modal-dismiss" href="#" onclick="document.getElementById('login_pop').style.display='block'" style="width:auto;">Reserve Now</a>
                            <a class="popup-modal-dismiss" style="margin-left: 338.4px;">Close</a>
                        </div>
                    </div><!-- modal-07 End -->            
                    <div id="modal-08" class="popup-modal mfp-hide">
                        <div class="slider">
                            <figure>
                                <div class="slide">
                                    <img src="images/photo/suites/2/s2a.jpg">
                                </div>
                                <div class="slide"> 
                                    <img src="images/photo/suites/2/s2b.jpg">
                                </div>
                                <div class="slide">
                                    <img src="images/photo/suites/2/s2c.jpg">
                                </div>
                                <div class="slide">
                                    <img src="images/photo/suites/2/s2b.jpg">
                                </div>
                                <div class="slide">
                                    <img src="images/photo/suites/2/s2a.jpg">
                                </div>
                            </figure>
                        </div>
                        <div class="description-box">
                            <h4>The Deluxe Suite</h4>
                            <p>
                                The Suites at Bebe Hotel are sophisticated and elegant. They are bright and airy.  Their exquisite design incorporates fine fabrics and beautiful artwork. Modern luxuries include master controlled lighting and climate control, Wi-Fi, televisions and sound systems with Bluetooth connectivity.
                            </p>
                            <h2>Price: Php 5,900.00 per night</h2>
                        </div>
                        <div class="link-box">
                            <a class="popup-modal-dismiss" href="#" onclick="document.getElementById('login_pop').style.display='block'" style="width:auto;">Reserve Now</a>
                            <a class="popup-modal-dismiss" style="margin-left: 338.4px;">Close</a>
                        </div>
                    </div><!-- modal-05 End -->
                </div> <!-- row End -->
            </div> <!-- Portfolio Section End-->
            <div id="footer">
                BBhotel &copy 2017
            </div>
        </div>
        <!-- Java Script================================================== -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
        <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/jquery.flexslider.js"></script>
        <script src="js/waypoints.js"></script>
        <script src="js/jquery.fittext.js"></script>
        <script src="js/magnific-popup.js"></script>
        <script src="js/init.js"></script>
    </body>
</html>