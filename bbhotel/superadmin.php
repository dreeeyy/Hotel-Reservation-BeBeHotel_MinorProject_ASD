<!DOCTYPE html>

<?php
    include 'connection.php'; //connect the connection page
    if(empty($_SESSION)) // if the session not yet started     
        session_start(); 
    if(!isset($_SESSION['username'])) 
    { //if not yet logged in    
        header("location: indexsa.php");// send to login page    
        exit; 
    }  
?> 

<html>
    <head>
        <link rel="stylesheet" href="css/superadmin-manage-users.css">
        <link rel="shortcut icon" href="images/head_logo.png" />
    </head>
    <title>BBhotel</title>
    
    <body>
        <div class="navbar">
            <div class="logo">
                <a href="indexsa.php">
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
                <button class="account_user" >
                    <?php
                        echo $_SESSION['username'];
                    ?>
                </button>
                    
                <div class="contents_account_user">
                    <a href="#">PROFILE</a>
                    <a href="#">SETTINGS</a>
                    <a href="#">MANAGE</a>
                    <a href="logout.php">LOG OUT</a>
                </div>
            </div>
        </div>
        
        <div id="content_con_login">
            <div id="content_login">
                <div id="managetext">Manage Users</div>
                <table align="center">
                    <tr height="50px">
                        <th align="center">ID</th>
                        <th align="center">Type</th>
                        <th align="center">Username</th>
                        <th align="center">Password</th>
                        <th align="center">First Name</th>
                        <th align="center">Last Name</th>
                        <th align="center">Mobile</th>
                        <th align="center">Address</th>
                        <th align="center">Gender</th>
                        <th colspan="2" align="center">Operations</th>
                    </tr>
                    <?php
                    // Create connection
                    $conn = new mysqli($server, $unm, $pwd, $db);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM users";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        ?>
                        <tr height="50px">
                            <td align="center"><?php echo $row["id"];?></td>
                            <td align="center"><?php echo $row["type"];?></td>
                            <td align="center"><?php echo $row["username"];?></td>
                            <td align="center"><?php echo $row["password"];?></td>
                            <td align="center"><?php echo $row["fname"];?></td>
                            <td align="center"><?php echo $row["lname"];?></td>
                            <td align="center"><?php echo $row["mobile"];?></td>
                            <td align="center"><?php echo $row["address"];?></td>
                            <td align="center"><?php echo $row["gender"];?></td>
                            <td align="center" width="50px"><a href="#">modify</a></td>
                            <td align="center" width="50px"><a href="#">delete</a></td>
                        </tr>
                        <?php 
                        }
                    } else {
                        ?>
                        <tr>
                             <td colspan="9" align="center"><?php echo "0 results";?></td>
                        </tr>
                        <?php
                    }

                    $conn->close();
                    ?>
                </table>
                <div id="addrecord">
                    <a href="#">new</a>
                </div>
                
            </div>
            <div id="footer">
                BBhotel &copy 2017
            </div>
	   </div>
    </body>
</html>