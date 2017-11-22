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
        <link rel="stylesheet" href="../css/lets-tour.css">
        <link rel="shortcut icon" href="../images/head_logo.png" />
        <script src="scripts/Slideshow.js"></script>
    </head>
    <title>Let's Tour</title>
    
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
                        <a href="reservation.php">RESERVATIONS</a>
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
            <div class = "about">
                Bebe Hotel
            </div>
            <div class="details">
                <p>Stay and enjoy at Bebe Hotel where you can have it all - a peaceful location, stylish guest rooms, and gorgeous view of the city. The hotel has recently renovated all superior and executive rooms and public spaces. We're Isla Fuego, Costa Lenona and we pair our modern look with today's amenities for a special stay. Our hotel has the dining options, event spaces and thoughtful service you're looking for while visiting Bebe Hotel.</p>
            </div>
            <div id="content_login">
                <div class="front">
                    <img src = "../images/slides/1a.jpg" height="660px", width="1300px">
                </div>
                <div class="slider">
                    <figure>
                        <div class="slide">
                            <div class="resto">
                                <h2>Resto</h2>
                                <p>Don't let your hunger eat you. Be energized at Bebe Hotel's Restaurant where serves you delicious foods from different varieties you like. From morning coffee to evening desserts, we have you covered. Visit our Lobby Resto for a salad, veggie soup or club sandwich. Bebe Resto serves International meals along with the overlooking view of the city. </p>
                            </div>
                            <img src="../images/slides/2.jpg">
                        </div>

                        <div class="slide">
                            <div class="bar">
                                <h2>Bar</h2>
                                <p>Love to party? Bebe Hotel has also it's own bar for you to party all night. It offers you different beverages you probably like. Visit the Bebe Bar and order a drink off the extensive spirits and cocktails menu. Don't let your night to be bored and dull. </p>
                            </div>
                            <img src="../images/slides/4.jpg">
                        </div>

                        <div class="slide">
                            <div class="gym">
                                <h2>Fitness Center</h2>
                                <p>Bebe Hotel has it's own Gym for those who like to exercise. It has all gym equipments that you need. With unparalleled views of the city, in a contemporary setting, the Bebe Fitness Center features a squash court and a complete range of cardiovascular machines and weight-training equipment. Certified trainers are available to help guests maximize their workouts.</p>
                            </div>
                            <img src="../images/advbooking/8.jpg">
                        </div>

                        <div class="slide">
                            <div class="spa">
                                <h2>Spa</h2>
                                <p>Achieve the restorative and relaxing benefits of Dead Sea mud treatments and salt scrubs imbued with indigenous regional minerals, like natural sea salts, herbal botanicals and aromatherapy oils at our Bebe Hotel spa. It offers massage, body treatments, facial and nail treatment services in Bebe Spa.</p>
                            </div>
                            <img src="../images/advbooking/9.jpg">
                        </div>

                        <div class="slide">
                            <div class="confe">
                            <h2>Convention</h2>
                            <p>Offering the most versatile hotel convention facilities in Costa Leona, Bebe Hotel provides a conference center and ballroom, 24 meeting and breakout rooms, numerous convertible suites and three open-air venues on the hotel grounds. A 350 sq. meter exhibition space with lobby and street access is also at your disposal. Professional planning, straightforward reservations, as well as specially created food and beverages and unrivalled accomodations will ensure the success of your event.</p>
                            </div>
                            <img src="../images/slides/3.jpg">
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