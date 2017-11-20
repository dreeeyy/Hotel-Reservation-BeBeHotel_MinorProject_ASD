<!DOCTYPE html>

<?php
    include '../connection.php'; //connect the connection page
    if(empty($_SESSION))    
         session_start();

    if(isset($_SESSION['uname'])&&$_SESSION['user_type']=='Admin')
    { // if already login
        header("location: ../admin/"); // send to home page   
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
        <link rel="stylesheet" href="../css/superadmin-index.css">
        <link rel="shortcut icon" href="../images/head_logo.png" />
    </head>
    <title>Manage Customers</title>
    
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
                <div id="managetext">Recent Activity</div>    
                <table class="dashmenu" align="center">
                    <tr height="50px">
                        <th>ID</th>
                        <th>Fullname</th>
                        <th>User Type</th>
                        <th>Operations</th>
                        <th>Date</th>
                    </tr>

                <?php
                 
                 $sql_query="SELECT * FROM logs ORDER BY changedon DESC";
                
                    $result_set=mysqli_query($con,$sql_query);

                    if(mysqli_num_rows($result_set)>0){

                    while($row=mysqli_fetch_assoc($result_set))
                    {
                    ?>  

                    <tr height="50px"> 
                        <td align="center"><?php echo $row['id'];?></td>
                        <td align="center"><?php echo $row['fname'] . " ". $row['lname'];?></td>
                        <td align="center"><?php echo $row['user_type'];?></td>
                        <td align="center"><?php echo $row['action'];?></td>
                        <td align="center"><?php echo $row['changedon'];?></td>
                    </tr>
                        <?php
                    }    
                    }
                ?>
                </table>
            </div>
            <div id="footer">
                BBhotel &copy 2017
            </div>
	   </div>
    </body>
</html>