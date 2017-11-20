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
        $sql_query="SELECT id,room_type,price,availability FROM rooms WHERE id=".$_GET['edit_id'];
        $result_set=mysqli_query($con,$sql_query);
        $fetched_row=mysqli_fetch_array($result_set);
    }

    if(isset($_POST['updatebtn']))
    {
        // variables for input data
        $user_type = $_POST['room_type'];
        $uname = $_POST['price'];
        $pword = $_POST['availability'];
       
        // variables for input data

        // sql query for update data into database
        $sql_query = "UPDATE rooms SET user_type='$user_type',price='$price',availability='$availability' WHERE id=".$_GET['edit_id'];
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
        header("Location: manage-rooms.php");
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
                            <b>Room Type</b>
                            <input type="text" placeholder="Enter Room Type" name="room_type" value="<?php echo $fetched_row['room_type']; ?>" required>
                        </span>
                        <span class="pword">
                            <b>Price</b>
                            <input type="text" placeholder="Enter Price" name="pword" value="<?php echo $fetched_row['price']; ?>" required>
                        </span>
                        <span class="cpword">
                            <b>Availability</b>
                            <input type="text" placeholder="Enter Availabilty" name="pword" value="<?php echo $fetched_row['availability']; ?>" required>
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