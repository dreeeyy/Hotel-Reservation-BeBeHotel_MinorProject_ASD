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

    if(isset($_GET['edit_id']))
    {
        $sql_query="SELECT id,user_type,uname,pword,fname,lname,mnumber,address,gender FROM users WHERE id=".$_GET['edit_id'];
        $result_set=mysqli_query($con,$sql_query);
        $fetched_row=mysqli_fetch_array($result_set);
    }

    if(isset($_POST['updatebtn']))
    {
        // variables for input data
        $user_type = $_POST['user_type'];
        $uname = $_POST['uname'];
        $pword = $_POST['pword'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mnumber = $_POST['mnumber'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        // variables for input data

        // sql query for update data into database
        $sql_query = "UPDATE users SET user_type='$user_type',uname='$uname',pword='$pword',fname='$fname',lname='$lname',mnumber='$mnumber',address='$address',gender='$gender' WHERE id=".$_GET['edit_id'];
        // sql query for update data into database

        // sql query execution function
        if(mysqli_query($con,$sql_query))
        {
            ?>
            <script type="text/javascript">
            alert('Data Are Updated Successfully');
            window.location.href='manage-users.php';
            </script>
            <?php
        }
        else
        {
            ?>
            <script type="text/javascript">
            alert('error occured while updating data');
            </script>
            <?php
        }
        // sql query execution function
    }
    if(isset($_POST['cancelbtn']))
    {
        header("Location: manage-users.php");
    }
	// sql query execution function
?>

<html>
    <head>
        <link rel="stylesheet" href="../css/superadmin-modify-users.css">
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
                <div class="signup_text">User</div>
                    <div class="signup_con">
                        <span class="uname">
                            <b>Username</b>
                            <input type="text" placeholder="Enter Username" name="uname" value="<?php echo $fetched_row['uname']; ?>" required>
                        </span>
                        <span class="pword">
                            <b>Password</b>
                            <input type="password" placeholder="Enter Password" name="pword" value="<?php echo $fetched_row['pword']; ?>" required>
                        </span>
                        <span class="cpword">
                            <b>Confirm Password</b>
                            <input type="password" placeholder="Enter Confirm Password" name="pword" value="<?php echo $fetched_row['pword']; ?>" required>
                        </span>
                        <span class="fname">
                            <b>First Name</b>
                            <input type="text" placeholder="Enter First Name" name="fname" value="<?php echo $fetched_row['fname']; ?>" required>
                        </span>
                        <span class="lname">
                            <b>Last Name</b>
                            <input type="text" placeholder="Enter Last Name" name="lname" value="<?php echo $fetched_row['lname']; ?>" required>
                        </span>
                        <span class="mobile">
                            <b>Mobile Number</b>
                            <input type="text" placeholder="Enter Mobile" name="mnumber" value="<?php echo $fetched_row['mnumber']; ?>" required>
                        </span>
                        <span class="address">
                            <b>Address</b>
                            <input type="text" placeholder="Enter Address" name="address" value="<?php echo $fetched_row['address']; ?>" required>
                        </span>
                        <span class="gender">
                            <b>Gender</b> <br>
                            <?php
                                if ($fetched_row['gender'] == 'Female')
                                {
                                    echo "<input type='radio' name='gender' value='Female' checked>Female <br>";
                                    echo "<input type='radio' name='gender' value='Male'>Male <br><br>";
                                }
                                else
                                {
                                    echo "<input type='radio' name='gender' value='Female'>Female <br>";
                                    echo "<input type='radio' name='gender' value='Male' checked>Male <br><br>";
                                }
                            ?>
                        </span>
                        <span class="usertype">
                            <b>Gender</b> <br>
                            <?php
                                if ($fetched_row['user_type'] == 'Super Admin')
                                {
                                    echo "<input type='radio' name='user_type' value='Super Admin' checked>Super Admin <br>";
                                    echo "<input type='radio' name='user_type' value='Admin'>Admin <br>";
                                    echo "<input type='radio' name='user_type' value='Customer'>Customer <br><br>";
                                }
                                if ($fetched_row['user_type'] == 'Admin')
                                {
                                    echo "<input type='radio' name='user_type' value='Super Admin'>Super Admin <br>";
                                    echo "<input type='radio' name='user_type' value='Admin' checked>Admin <br>";
                                    echo "<input type='radio' name='user_type' value='Customer'>Customer <br><br>";
                                }
                                else
                                {
                                    echo "<input type='radio' name='user_type' value='Super Admin'>Super Admin <br>";
                                    echo "<input type='radio' name='user_type' value='Admin'>Admin <br>";
                                    echo "<input type='radio' name='user_type' value='Customer' checked>Customer <br><br>";
                                }
                            ?>
                        </span>
                        <button class="signup_button" type="submit" name="updatebtn">Update</button>
                        <button class="signup_button2" type="submit" name="cancelbtn">Cancel</button>
                    </div>
                </form>
            </div>
            <div id="footer">
                BBhotel &copy 2017
            </div>
	   </div>
    </body>
</html>