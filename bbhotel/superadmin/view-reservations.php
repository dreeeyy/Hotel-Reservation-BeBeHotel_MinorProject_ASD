<!DOCTYPE html>

<?php
    include '../connection.php'; //connect the connection page
    if(empty($_SESSION))    
         session_start();

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
        <link rel="stylesheet" href="../css/profile.css">
        <link rel="shortcut icon" href="../images/head_logo.png"/>
        <script src="../scripts/Slideshow.js"></script>
    </head>
    <title>PROFILE</title>
    
    <body>
        <div class="navbar">
            <div class="logo">
                <a href="index.php">
                    <img src="../images/logo.png" width="75px;">
                </a>
            </div>
            <div class="menu">
                <div class="dropdown_content">
                    <button class="dropbutton">DASHBOARD</button>
                    <div class="dropdown_contents">
                        <a href="index.php">RECENT ACTIVITY</a>
                    </div>
                </div>
                <div class="dropdown_content">
                    <button class="dropbutton">MANAGEMENT</button>
                    <div class="dropdown_contents">
                        <a href="manage-rooms.php">ROOMS</a>
                        <a href="manage-users.php">USERS</a>
                        <a href="manage-customers.php">CUSTOMERS</a>
                        <a href="manage-reservations.php">RESERVATIONS</a>
                    </div>
                </div>
            </div>
            
            <div class="content_account_user">
                <button class="account_user" >MY ACCOUNT</button> 
                <div class="contents_account_user">
                    <a href="superadmin-profile.php">PROFILE</a>
                    <a href="../logout.php">LOG OUT</a>
                </div>
            </div>
        </div>
        <div id="content_con_login">
            <div id="content_login">
                <div class="content_profile">
                <div class="profPic"> 
                    <img src="../images/profile/profile.jpg" class="pic" width="195px" height="180px">
                     <div class = "prof_table"> 
                        <div class="basicInfo">
                            <table>
                            <?php
                                $sql_query="SELECT a.fname,a.lname,b.room_type,c.room,c.check_in,c.check_out,c.id,c.bill from users a inner join reservations c on a.id=c.customer inner join rooms b on b.id=c.room_id";

                                $result_set=mysqli_query($con,$sql_query);
                                if(mysqli_num_rows($result_set)>0)
                                {
                                    while($row=mysqli_fetch_row($result_set))
                                    {
                                        ?>
                                            <th><c>RESERVATION</c></th>
                                            <tr height="40px">
                                                <td><b>Name: </b><?php echo $row[0]." ".$row[1];?></td>
                                            </tr>
                                            <tr height="40px">
                                                <td><b>Room Type: </b><?php echo $row[2];?></td>
                                            </tr>
                                            <tr height="40px">
                                                <td><b>Room Number: </b><?php echo $row[3];?></td>
                                            </tr>
                                            <tr height="40px">
                                                <td><b>Check In: </b><?php echo $row[4]; ?></td>
                                            </tr>
                                            <tr height="40px">
                                                <td><b>Check Out: </b><?php echo $row[5]; ?></td>
                                            </tr>
                                            <tr height="40px">
                                                <td><b>Bill: </b><?php echo $row[7]; ?></td>
                                            </tr>
                                        <?php
                                    }
                                }
                            ?>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
            <div id="footer">
                BBhotel &copy 2017
            </div>
       </div>
    </body>
</html>