<!DOCTYPE html>

<?php
    include ('../connection.php'); //connect the connection page
    if(empty($_SESSION)) // if the session not yet started     
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
    

    if(isset($_POST['addbtn']))
    {
        // variables for input data
        $uname = $_POST['uname'];
        $pword = $_POST['pword'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mnumber = $_POST['mnumber'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $user_type = $_POST['user_type'];
        // variables for input data

        // sql query for inserting data into database
        $sql_query = "INSERT INTO users (uname,pword,fname,lname,mnumber,address,gender,user_type) VALUES ('$uname','$pword','$fname','$lname','$mnumber','$address','$gender','$user_type')";
        // sql query for inserting data into database

        // sql query execution function
        if(mysqli_query($con,$sql_query))
        {
            ?>
            <script type="text/javascript">
            alert('Data Are Inserted Successfully ');
            window.location.href='manage-users.php';
            </script>
            <?php
        }
        else
        {
            ?>
            <script type="text/javascript">
            alert('error occured while inserting your data');
            </script>
            <?php
        }
	// sql query execution function
    }
?>

<html>
    <head>
        <link rel="stylesheet" href="../css/superadmin-new-users.css">
        <link rel="shortcut icon" href="../images/head_logo.png" />
    </head>
    <title>Add Users</title>
    
    <style>
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
            <form method="post">
                <div class="signup_text">Add New Users</div>
                    <div class="signup_con">
                        <span class="uname">
                            <b>Username</b>
                            <input type="text" placeholder="Enter Username" name="uname" required>
                        </span>
                        <span class="pword">
                            <b>Password</b>
                            <input type="password" placeholder="Enter Password" name="pword" required>
                        </span>
                        <span class="cpword">
                            <b>Confirm Password</b>
                            <input type="password" placeholder="Enter Confirm Password" name="pword" required>
                        </span>
                        <span class="fname">
                            <b>First Name</b>
                            <input type="text" placeholder="Enter First Name" name="fname" required>
                        </span>
                        <span class="lname">
                            <b>Last Name</b>
                            <input type="text" placeholder="Enter Last Name" name="lname" required>
                        </span>
                        <span class="mobile">
                            <b>Mobile Number</b>
                            <input type="text" placeholder="Enter Mobile" name="mnumber" required>
                        </span>
                        <span class="address">
                            <b>Address</b>
                            <input type="text" placeholder="Enter Address" name="address" required>
                        </span>
                        <span class="gender">
                            <b>Gender</b> <br>
                            <input type="radio" name="gender" value="Female">Female <br>
                            <input type="radio" name="gender" value="Male">Male <br><br>
                        </span>
                        <span class="usertype">
                            <b>User Type</b> <br>
                            <input type="radio" name="user_type" value="Super Admin" required>Super Admin <br>
                            <input type="radio" name="user_type" value="Customer" required>Customer <br><br>
                        </span>
                        <button class="add_button" type="submit" name="addbtn">Add</button>
                        <a class="cancel_button" href="manage-users.php">
                            <div class="cancel_con">Cancel</div>
                        </a>
                    </div>
                </form>
            </div>
            <div id="footer">
                BBhotel &copy 2017
            </div>
	   </div>
    </body>
</html>