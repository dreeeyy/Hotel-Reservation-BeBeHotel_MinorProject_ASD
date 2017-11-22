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
        <link rel="stylesheet" href="../css/hotel-services.css">
        <link rel="shortcut icon" href="../images/head_logo.png" />
        <script src="scripts/Slideshow.js"></script>
    </head>
    <title>Hotel Services</title>
    
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
            
            <div class="Bebe">
                
            </div>
            
            </a>
            <div id="content_login">
                <div class="vslider">
                    <figure>
                        <div class="slide">
                            <div class="virtual">
                                 <br>You want a Hotel where you can enjoy your stay? <br>
                                 Bebe Hotel is perfect for you. It has different amenities for you to enjoy anf relax.
                            </div>
                            <img src="../images/slides/1.jpg">
                        </div>

                        <div class="slide">
                            <div class="gym">
                                <h2>Fitness Center</h2>
                                <p>Bebe Hotel has it's own Gym for those who like to exercise. It has all gym equipments that you need </p>
                            </div>
                            <img src="../images/advbooking/8.jpg">
                        </div>

                        <div class="slide">
                            <div class="spa">
                                <h2>Spa</h2>
                                <p>Bebe Hotel also offers massaging services where good massage therapist are hired. Our spa is perfect for you if you need to relax.</p>
                            </div>
                            <img src="../images/advbooking/9.jpg">
                        </div>

                        <div class="slide">
                            <div class="bar">
                                <h2>Bar</h2>
                                <p>Love to party? Bebe Hotel has also it's own bar for you to party all night. Don't let your night to be bored and dull.</p>
                            </div>
                            <img src="../images/advbooking/11a.jpg">
                        </div>

                        <div class="slide">
                            ,
                            <img src="../images/advbooking/10a.jpg">
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