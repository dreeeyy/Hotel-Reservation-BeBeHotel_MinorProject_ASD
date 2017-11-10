<!DOCTYPE html>

<?php
    include 'connection.php'; //connect the connection page 
    if(empty($_SESSION)) // if the session not yet started     
        session_start(); 
    if(isset($_SESSION['uname']))
    { // if already login
        header("location: users.php"); // send to home page   
        exit;
    } 
?>

<html>
    <head>
        <meta charset = "UTF-8">
        <meta name="viewport" content="width=device-width, initial scale=1">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/rooms.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="shortcut icon" href="images/head_logo.png" />
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
                <div class="slider">
                    <figure>
                        <div class="slide">
                            <img src="images/slides_rooms/slides-modal/junior1.jpg">
                        </div>

                        <div class="slide"> 
                            <img src="images/slides_rooms/slides-modal/junior2.jpg">
                        </div>

                        <div class="slide">
                            <img src="images/slides_rooms/slides-modal/junior3.jpg">
                        </div>

                        <div class="slide">
                            <img src="images/slides_rooms/slides-modal/junior4.jpg">
                        </div>

                        <div class="slide">
                            <img src="images/slides_rooms/slides-modal/diamond1.jpg">
                        </div>
                    </figure>
                </div>
            </div>

             <p class="scrolldown">
                <a class="smoothscroll" href="#portfolio"><i class="icon-down-circle"></i></a>
            </p>


            <!-- Portfolio Section================================================== -->
   <section id="portfolio">

      <div class="row">

         <div class="twelve columns collapsed">

            <h1>Rooms and Suites</h1>

            <!-- portfolio-wrapper -->
            <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-thirds cf">

               <div class="columns portfolio-item">
                  <div class="item-wrap">

                     <a href="#modal-01" title="">
                        <img alt="" src="images/slides_rooms/diamond1-thumb.png">
                        <div class="overlay">
                           <div class="portfolio-item-meta">
                                  <h5>Diamond Suite</h5>
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
                        <img alt="" src="images/slides_rooms/junior1-thumb.png">
                        <div class="overlay">
                           <div class="portfolio-item-meta">
                                  <h5>Suite</h5>
                              <p>bebe</p>
                               </div>
                        </div>
                        <div class="link-icon"><i class="icon-plus"></i></div>
                     </a>

                  </div>
                </div> <!-- item end -->

               <div class="columns portfolio-item">
                  <div class="item-wrap">

                     <a href="#modal-03" title="">
                        <img alt="" src="images/slides_rooms/junior2-thumb.png">
                        <div class="overlay">
                           <div class="portfolio-item-meta">
                                  <h5>Suite</h5>
                              <p>bebe</p>
                               </div>
                        </div>
                        <div class="link-icon"><i class="icon-plus"></i></div>
                     </a>

                  </div>
                </div> <!-- item end -->

               <div class="columns portfolio-item">
                  <div class="item-wrap">

                     <a href="#modal-04" title="">
                        <img alt="" src="images/slides_rooms/junior3-thumb.png">
                        <div class="overlay">
                           <div class="portfolio-item-meta">
                                  <h5>Junior Suite</h5>
                              <p>bebe</p>
                               </div>
                        </div>
                        <div class="link-icon"><i class="icon-plus"></i></div>
                     </a>

                  </div>
                </div> <!-- item end -->

                 <div class="columns portfolio-item">
                  <div class="item-wrap">

                     <a href="#modal-03" title="">
                        <img alt="" src="images/slides_rooms/junior4-thumb.png">
                        <div class="overlay">
                           <div class="portfolio-item-meta">
                                  <h5>Junior Suite</h5>
                              <p>bebe</p>
                               </div>
                        </div>
                        <div class="link-icon"><i class="icon-plus"></i></div>
                     </a>

                  </div>
                </div> <!-- item end -->

              
            </div> <!-- portfolio-wrapper end -->

         </div> <!-- twelve columns end -->


         <!-- Modal Popup
          --------------------------------------------------------------- -->

         <div id="modal-01" class="popup-modal mfp-hide">

              <img class="scale-with-grid" src="images/slides_rooms/slides-modal/diamond1.jpg" alt="" />

              <div class="description-box">
                  <h4>The Diamnd Suite</h4>
                  <p>At Bebe Hotel the stunning Diamond Suites are spacious and well-appointed with an open-plan layout and living area, allowing guests to enjoy city.  The décor includes elegant furniture, soothing shades giving a residential feel.  All Diamond Suite are all airy, thanks to their high ceilings and tall windows. Modern luxuries include master controlled lighting and climate control, Wi-Fi, Bang & Olufsen televisions and sound systems with Bluetooth connectivity.<br>
                  <br>
                  Amenities<br>
                City views<br>
                King-size available<br>
                One bedroom with sitting area<br>
                Complimentary Wi Fi<br>
                Connecting room available<br>
                Maximum occupancy 3 people, complimentary additional bed or cot<br>
                48" Bang and Olufsen HD TV<br>
                Master controlled lighting and climate control<br>
                <br></p>
                <h2>Price: Php 5,000.00 per night</h2>
              </div>
              <div class="link-box">
               <a href="#Details">Book Now</a>
                 <a class="popup-modal-dismiss">Close</a>
            </div>

          </div><!-- modal-01 End -->

         <div id="modal-02" class="popup-modal mfp-hide">

              <img class="scale-with-grid" src="images/slides_rooms/slides-modal/junior1.jpg" alt="" />

              <div class="description-box">
                  <h4>The Suite</h4>
                  <p>The Suites at Bebe Hotel are sophisticated and elegant. They are bright and airy.  Their exquisite design incorporates fine fabrics and beautiful artwork. Modern luxuries include master controlled lighting and climate control, Wi-Fi, televisions and sound systems with Bluetooth connectivity. <br>
                  <br>
                  Amenities<br>
                  Good for 2 persons bed available<br>
                  Garden view<br>
                  Maximum occupancy 2 people<br>
                Complimentary Wi Fi<br>
                48" HD TV<br>
                Master controlled lighting and climate control<br>
                In room IPad with room service ordering capacity<br>
                <br></p>
                <h2>Price: Php 3,500.00 per night</h2>
              </div>
              <div class="link-box">
               <a href="#Details">Book Now</a>
                 <a class="popup-modal-dismiss">Close</a>
            </div>
          </div><!-- modal-02 End -->

         <div id="modal-03" class="popup-modal mfp-hide">

              <img class="scale-with-grid" src="images/slides_rooms/slides-modal/junior2.jpg" alt="" />

              <div class="description-box">
                  <h4>The Suite</h4>
                   <p>The Suites at Bebe Hotel are sophisticated and elegant. They are bright and airy.  Their exquisite design incorporates fine fabrics and beautiful artwork. Modern luxuries include master controlled lighting and climate control, Wi-Fi, televisions and sound systems with Bluetooth connectivity. <br>
                  <br>
                  Amenities<br>
                  Good for 2 persons bed available<br>
                  Garden view<br>
                  Maximum occupancy 2 people<br>
                Complimentary Wi Fi<br>
                48" HD TV<br>
                Master controlled lighting and climate control<br>
                In room IPad with room service ordering capacity<br>
                <br></p>
                <h2>Price: Php 3,500.00 per night</h2>
                  </div>
              <div class="link-box">
               <a href="#Details">Book Now</a>
                 <a class="popup-modal-dismiss">Close</a>
            </div>
          </div><!-- modal-03 End -->

         <div id="modal-04" class="popup-modal mfp-hide">

              <img class="scale-with-grid" src="images/slides_rooms/slides-modal/junior3.jpg" alt="" />

              <div class="description-box">
                  <h4>The Junior Suite</h4>
                  <p>These sophisticated and elegant Junior suites at Bebe Hotel are decorated with sophistication and elegance. They are bright with soaring ceilings and tall windows, which have been designed to make the most of the natural daylight. Enjoy fine fabrics, beautiful artwork and exquisite design. Modern luxuries include master controlled lighting and climate control, Wi-Fi, televisions and sound systems with Bluetooth connectivity. Delight in the stylish light and dark themed rooms.<br>
                <br>
                Amenities<br>
                Queensize beds available<br>
                Spacious marble bathroom<br>
                Bottega Veneta toiletries<br>
                Complimentary Wi Fi<br>
                Connecting room available<br>
                Maximum occupancy 2 people<br>
                48" HD TV<br>
                Master controlled lighting and climate control<br></p>
                <h2>Price: Php 4,000.00 per night</h2>
              </div>
              <div class="link-box">
               <a href="#Details">Book Now</a>
                 <a class="popup-modal-dismiss">Close</a>
            </div>
          </div><!-- modal-04 End -->

         <div id="modal-05" class="popup-modal mfp-hide">

              <img class="scale-with-grid" src="images/slides_rooms/slides-modal/junior4.jpg" alt="" />

              <div class="description-box">
                  <h4>The Junior Suite</h4>
                  <p>These sophisticated and elegant Junior suites at Bebe Hotel are decorated with sophistication and elegance. They are bright with soaring ceilings and tall windows, which have been designed to make the most of the natural daylight. Enjoy fine fabrics, beautiful artwork and exquisite design. Modern luxuries include master controlled lighting and climate control, Wi-Fi, televisions and sound systems with Bluetooth connectivity. Delight in the stylish light and dark themed rooms.<br>
                <br>
                Amenities<br>
                Queensize beds available<br>
                Spacious marble bathroom<br>
                Bottega Veneta toiletries<br>
                Complimentary Wi Fi<br>
                Connecting room available<br>
                Maximum occupancy 2 people<br>
                48" HD TV<br>
                Master controlled lighting and climate control<br></p>
                <h2>Price: Php 4,000.00 per night</h2>
                  </div>
               <div class="link-box">
               <a href="#Details">Book Now</a>
                 <a class="popup-modal-dismiss">Close</a>
            </div>
          </div><!-- modal-05 End -->

         

      </div> <!-- row End -->

   </section> <!-- Portfolio Section End-->



            <div id="footer">
                BBhotel &copy 2017
            </div>
	   </div>

       <!-- Java Script
   ================================================== -->
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