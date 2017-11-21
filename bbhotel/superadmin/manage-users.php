<<<<<<< HEAD
 <!DOCTYPE html>
=======
<!DOCTYPE html>
>>>>>>> master

<?php
    include '../connection.php'; //connect the connection page
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

    if(isset($_GET['delete_id']))
    {
        $sql_query="DELETE FROM users WHERE id=".$_GET['delete_id'];
        mysqli_query($con,$sql_query);
        header("Location: manage-users.php");
    }
?> 

<html>
    <head>
        <link rel="stylesheet" href="../css/superadmin-manage-users.css">
        <link rel="shortcut icon" href="../images/head_logo.png" />
        
        <script type="text/javascript">
<<<<<<< HEAD
            function view_id(id)
            {
                window.location.href='viewUsers.php?view_id='+id;
            }
=======
>>>>>>> master
            function edt_id(id)
            {
                if(confirm('Are you sure you want to modify the data?'))
                {
                    window.location.href='modify-users.php?edit_id='+id;
                }
            }
            function delete_id(id)
            {
                if(confirm('Are you sure you want to delete the data?'))
                {
                    window.location.href='manage-users.php?delete_id='+id;
                }
            }
        </script>
    </head>
    <title>Manage Users</title>
    
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
<<<<<<< HEAD
                        <a href="manage-rooms.php">ROOMS</a>
                        <a href="manage-users.php">USERS</a>
                        <a href="manage-customers.php">CUSTOMERS</a>
                        <a href="manage-reservations.php">RESERVATIONS</a>
=======
                        <a href="#">ROOMS</a>
                        <a href="manage-users.php">USERS</a>
                        <a href="#">BOOKINGS</a>
                        <a href="manage-customers.php">CUSTOMERS</a>
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
>>>>>>> master
                    </div>
                </div>
            </div>
            
            <div class="content_account_user">
<<<<<<< HEAD
                <button class="account_user" >MY ACCOUNT</button>
                    
                <div class="contents_account_user">
                    <a href="superadmin-profile.php">PROFILE</a>
=======
                <button class="account_user" >
                    <?php
                        echo $_SESSION['uname'];
                    ?>
                </button>
                    
                <div class="contents_account_user">
                    <a href="#">PROFILE</a>
                    <a href="#">SETTINGS</a>
>>>>>>> master
                    <a href="../logout.php">LOG OUT</a>
                </div>
            </div>
        </div>
        
        <div id="content_con_login">
            <div id="content_login">
                <div id="managetext">Manage Users</div>
                <table align="center">
                    <tr height="50px">
                        <th>ID</th>
                        <th>User Type</th>
<<<<<<< HEAD
                        <th>Fullname</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th colspan="3">Operations</th>
=======
                        <th>Username</th>
                        <th>Password</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th colspan="2">Operations</th>
>>>>>>> master
                    </tr>
                    <?php
                        $sql_query="SELECT id,user_type,uname,pword,fname,lname,mnumber,address,gender FROM users WHERE user_type!='Super Admin'";
                        $result_set=mysqli_query($con,$sql_query);
                        if(mysqli_num_rows($result_set)>0)
                        {
                            while($row=mysqli_fetch_row($result_set))
                            {
                            ?>
                            <tr height="50px">
                                <td align="center"><?php echo $row[0];?></td>
                                <td align="center"><?php echo $row[1];?></td>
<<<<<<< HEAD
                                <td align="center"><?php echo $row[4];?>
                                    <?php echo $row[5];?>
                                </td>
                                <td align="center"><?php echo $row[6];?></td>
                                <td align="center"><?php echo $row[7];?></td>
                                <td align="center"><?php echo $row[8];?></td>
                                <td align="center" width="50px"><a href="javascript:view_id('<?php echo $row[0]; ?>')">view</a></td>
=======
                                <td align="center"><?php echo $row[2];?></td>
                                <td align="center"><?php echo $row[3];?></td>
                                <td align="center"><?php echo $row[4];?></td>
                                <td align="center"><?php echo $row[5];?></td>
                                <td align="center"><?php echo $row[6];?></td>
                                <td align="center"><?php echo $row[7];?></td>
                                <td align="center"><?php echo $row[8];?></td>
>>>>>>> master
                                <td align="center" width="50px"><a href="javascript:edt_id('<?php echo $row[0]; ?>')">modify</a></td>
                                <td align="center" width="50px"><a href="javascript:delete_id('<?php echo $row[0]; ?>')">delete</a></td>
                            </tr>
                            <?php
                            }
                        }
                        else
                        {
                            ?>
                            <tr height="50px">
                            <td colspan="11" align="center">No data found!</td>
                            </tr>
                            <?php
                        }
                    ?>
                </table>
                <div id="addrecord">
                    <a href="new-users.php">new</a>
                </div>
                
            </div>
            <div id="footer">
                BBhotel &copy 2017
            </div>
	   </div>
    </body>
</html>