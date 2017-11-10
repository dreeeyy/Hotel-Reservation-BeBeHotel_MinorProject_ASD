<!DOCTYPE html>

<?php
    include '../connection.php'; //connect the connection page
    if(empty($_SESSION))    
         session_start();

    if(isset($_SESSION['uname'])&&$_SESSION['user_type']=='Super Admin')
    { // if already login
        header("location: ../superadmin/"); // send to home page   
        exit;
    }
    else if(isset($_SESSION['uname'])&&$_SESSION['user_type']=='Customer')
    { // if already login
        header("location: ../customer/"); // send to home page   
        exit;
    }
    else if($_SESSION['user_type']==NULL){
        header("location: ../"); // send to home page   
        exit;
    }
?> 

<html>
    <head>
        <link rel="stylesheet" href="../css/admin-index.css">
        <link rel="shortcut icon" href="../images/head_logo.png" />
    </head>
    <title>Recent Activity</title>
    
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
                        <a href="#">RESERVATIONS</a>
                        <a href="#">CUSTOMERS</a>
                    </div>
                </div>
                <div class="dropdown_content">
                    <button class="dropbutton">HELP</button>
                    <div class="dropdown_contents">
                        <a href="#">HOW TO USE</a>
                    </div>
                </div>
                <div class="dropdown_content">
                    <button class="dropbutton">ABOUT</button>
                    <div class="dropdown_contents">
                        <a href="#">WEBSITE</a>
                        <a href="#">DEVELOPMENT</a>
                        <a href="#">CONTACT</a>
                    </div>
                </div>
            </div>
            
            <div class="content_account_user">
                <button class="account_user" >
                    <?php
                        echo $_SESSION['uname'];
                    ?>
                </button>
                    
                <div class="contents_account_user">
                    <a href="#">PROFILE</a>
                    <a href="#">SETTINGS</a>
                    <a href="../logout.php">LOG OUT</a>
                </div>
            </div>
        </div>
        
        <div id="content_con_login">
            <div id="content_login">
                <div id="managetext">Recent Activity</div>    
                <table class="dashmenu" align="center">
                    <tr height="50px">
                        <th>Date</th>
                        <th>Description</th>
                        <th>Customer Name</th>
                        <th>Operation</th>
                    </tr>
                </table>
            </div>
            <div id="footer">
                BBhotel &copy 2017
            </div>
	   </div>
    </body>
</html>