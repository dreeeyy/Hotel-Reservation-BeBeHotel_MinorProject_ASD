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

    else if($_SESSION['reserved']==NULL){
        header("location: index.php"); // send to home page   
        exit;
    }
    $_SESSION['reserved']=NULL;
?>

<html>
    <head>
        <link rel="stylesheet" href="css/summary.css">
        <link rel="shortcut icon" href="images/head_logo.png" />
    </head>
    <title>Summary</title>
    
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
                    </div>
                </div>
                <div class="dropdown_content">
                    <button class="dropbutton">ROOMS & RESERVATIONS</button>
                    <div class="dropdown_contents">
                        <a href="rooms.php">ROOMS</a>
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
                    <a href="customer/profile.php">PROFILE</a>
                    <a href="logout.php">LOG OUT</a>
                </div>
            </div>
        </div>
            
        <div id="content_con_login">
            <div id="content_login">
                <div class="signup_con">
                    <div class="signup_text">Summary</div>
                    <table class="summary" align="center">
                        <?php 
                            $sql_query="SELECT id,room_type,price,availability FROM rooms WHERE id=".$_SESSION['room_id'];
                            $result_set=mysqli_query($con,$sql_query);
                            if(mysqli_num_rows($result_set)>0)
                            {
                                while($row=mysqli_fetch_row($result_set))
                                {?> 
                                <tr>
                                    <th>Room Type</th>
                                    <td><?php echo $row[1];?></td>
                                </tr>
                                <tr>
                                    <th>Room</th>
                                    <td><?php echo $_SESSION['room'];?></td>
                                </tr>
                                <tr>
                                    <th>Check In</th>
                                    <td><?php echo $_SESSION['check_in']?></td>
                                </tr>
                                <tr>
                                    <th>Check Out</th>
                                    <td><?php echo $_SESSION['check_out']?></td>
                                </tr>
                                <tr>
                                    <th>Payment</th>
                                    <td><?php echo $_SESSION['payment_method']?></td>
                                </tr>
                                <tr>
                                    <th>Calculation</th>
                                    <td><?php echo "PHP ".$row[2].".00 x ".$_SESSION['chinout']?></td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td><?php echo "PHP ".$_SESSION['bill'].".00"?></td>
                                </tr>
                                <?php
                                }
                            }
                        ?>
                    </table>
                    <a class="okbut" href="index.php">
                        <div class="okbutcon"><b>OK</b></div>
                    </a>
                </div>
            </div>
            <div id="footer">
                BBhotel &copy 2017
            </div>
        </div>
    </body>
</html>