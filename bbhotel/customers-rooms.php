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
    else if($_SESSION['user_type']==NULL)
    { // if already login
        header("location: index.php"); // send to home page   
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
        <script src="scripts/Slideshow.js"></script>
        
        <script type="text/javascript">
            function res_room(id)
            {
                window.location.href='reservation.php?res_room='+id;
            }
        </script>
        
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
                    <button class="dropbutton">DISCOVER THE HOTEL</button>
                    <div class="dropdown_contents">
                        <a href="customer/hotel-services.php">HOTEL SERVICES</a>
                    </div>
                </div>
                <div class="dropdown_content">
                    <button class="dropbutton">ROOMS & RESERVATIONS</button>
                    <div class="dropdown_contents">
                        <a href="customers-rooms.php">ROOMS</a>
                        <a href="reservation.php">RESERVATIONS</a>
                    </div>
                </div>
                <div class="dropdown_content">
                    <button class="dropbutton">NEWS & SPECIAL OFFERS</button>
                    <div class="dropdown_contents">
                        <a href="customer/special-offers.php">SPECIAL OFFERS</a>
                    </div>
                </div>
                <div class="dropdown_content">
                    <button class="dropbutton">PRACTICAL INFORMATION</button>
                    <div class="dropdown_contents">
                        <a href="customer/contact-us.php">CONTACT US</a>
                    </div>
                </div>
            </div>
            
            <div class="content_account_user">
                <button class="account_user" >MY ACCOUNT</button>
                <div class="contents_account_user">
                    <a href="customer/profile.php">PROFILE</a>
                    <a href="logout.php">LOG OUT</a>
                </div>
            </div>
        </div>
        
        <div id="content_con_login">
            <div class="welcome">
                Rooms
            </div>
            <a href="#portfolio">
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
                            <a href="javascript:res_room('1')">Reserve Now</a>
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
                            <a href="javascript:res_room('2')">Reserve Now</a>
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
                            <a href="javascript:res_room('5')">Reserve Now</a>
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
                            <a href="javascript:res_room('6')">Reserve Now</a>
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
                            <a href="javascript:res_room('7')">Reserve Now</a>
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
                            <a href="javascript:res_room('8')">Reserve Now</a>
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
                            <a href="javascript:res_room('3')">Reserve Now</a>
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
                            <a href="javascript:res_room('4')">Reserve Now</a>
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