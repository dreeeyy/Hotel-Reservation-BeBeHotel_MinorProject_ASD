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

    if(isset($_POST['reservebtn']))
    {
        // variables for input data
        $_SESSION['promo_code'] = $promo_code = $_POST['promo_code'];
        $_SESSION['payment_method'] = $payment_method = $_POST['payment_method'];
        $_SESSION['room_id'] = $room_id = $_POST['room_id'];
        $customer = $_SESSION['id'];
        $_SESSION['check_in'] = $check_in = $_POST['check_in'];
        $_SESSION['check_out'] = $check_out = $_POST['check_out'];
        $_SESSION['reserved']=TRUE;
        // variables for input data

        // sql query for inserting data into database
        $sql_query = "INSERT INTO reservations (room_id,customer,check_in,check_out,promo_code,payment_method) VALUES ('$room_id','$customer','$check_in','$check_out','$promo_code','$payment_method')";
        // sql query for inserting data into database

        // sql query execution function
        if(mysqli_query($con,$sql_query))
        {
            ?>
            <script type="text/javascript">
            alert('You have successfully reserved a room');
            window.location.href='summary.php';
            </script>
            <?php
        }
        else
        {
            ?>
            <script type="text/javascript">
            alert('Error occured while inserting your data');
            </script>
            <?php
        }
    }
?>

<html>
    <head>
        <link rel="stylesheet" href="css/reservation.css">
        <link rel="shortcut icon" href="images/head_logo.png" />
    </head>
    <title>Reservation</title>
    
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
                    <img src="images/logo.png" width="75px;">
                </a>
            </div>
            <div class="menu">
                <div class="dropdown_content">
                    <button class="dropbutton">DISCOVER THE HOTEL</button>
                    <div class="dropdown_contents">
                        <a href="hotel-services.php">HOTEL SERVICES</a>
                        <a href="#awards">AWARDS</a>
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
                        <a href="news.php">NEWS</a>
                        <a href="special-offers.php">SPECIAL OFFERS</a>
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
                    <a href="customer/profile.php">PROFILE</a>
                    <a href="#">TRANSACTIONS</a>
                    <a href="logout.php">LOG OUT</a>
                </div>
            </div>
        </div>
            
        <div id="content_con_login">
            <div id="content_login">
                <form method="post">
                    <div class="signup_text">BBhotel | Reservation</div>
                    <div class="signup_con">
                        <div class="checkin">
                            <b>Check In</b><br>
                            <input type="date" name="check_in" required>
                        </div>
                        <div class="checkout">
                            <b>Check Out</b><br>
                            <input type="date" name="check_out" required>
                        </div>
                        <div class="roomtype">
                            <b>Room Type</b><br>
                            <?php
                                $sql_query="SELECT id,room_type,price,availability FROM rooms group by id";
                                $result_set=mysqli_query($con,$sql_query);
                                if(mysqli_num_rows($result_set)>0)
                                {
                                    while($row=mysqli_fetch_row($result_set))
                                    {   
                                        echo "<input type='radio' name='room_id' value='$row[0]' required>".$row[1]." <b>[".$row[3]." rooms left]</b>";
                                        echo "<br>";
                                    ?>
                                    <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                        No Rooms Available
                                    <?php
                                }
                            ?>
                        </div>
                        <div class="payment">
                            <b>Payment Method</b><br>
                            <input type="radio" name="payment_method" value="Payment Card" required>Payment Card<br>
                            <input type="radio" name="payment_method" value="Cash Payment" required>Cash Payment<br>
                            <input type="radio" name="payment_method" value="Personal Check" required>Personal Check<br>
                            <input type="radio" name="payment_method" value="Direct Billing" required>Direct Billing
                        </div>
                        <div class="promocode">
                            <b>Promo Code</b><br>
                            <input type="text" name="promo_code" placeholder="Enter Promo Code">
                        </div>
                        <div class="reserve_button_con"><button class="reserve_button" type="submit" name="reservebtn">Reserve Now</button></div>
                    </div>
                </form>
            </div>
            <div id="footer">
                BBhotel &copy 2017
            </div>
        </div>
    </body>
</html>