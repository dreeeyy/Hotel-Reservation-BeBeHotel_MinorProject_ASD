<!DOCTYPE html>

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
        $sql_query="DELETE FROM reservations WHERE id=".$_GET['delete_id'];
        mysqli_query($con,$sql_query);
        header("Location: manage-reservations.php");
    }
?> 

<html>
    <head>
        <link rel="stylesheet" href="../css/superadmin-manage-customers.css">
        <link rel="shortcut icon" href="../images/head_logo.png" />
        
        <script type="text/javascript">
            function view_id(id)
            {
                    window.location.href='view-reservations.php?view_id='+id;
            }
            function delete_id(id)
            {
                if(confirm('Are you sure you want to cancel reservation?'))
                {
                    window.location.href='manage-reservations.php?delete_id='+id;
                }
            }
        </script>
    </head>
    <title>Manage Reservations</title>
    
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
                <div id="managetext">Manage Reservations</div>
                <table align="center">
                    <tr height="50px">
                        <th>Fullname</th>
                        <th>Room Type</th>
                        <th>Room Number</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Bill</th>
                        <th colspan="2">Operations</th>
                    </tr>
                    <?php
                        $sql_query="SELECT a.fname,a.lname,b.room_type,c.room,c.check_in,c.check_out,c.id,c.bill from users a inner join reservations c on a.id=c.customer inner join rooms b on b.id=c.room_id";
                        $result_set=mysqli_query($con,$sql_query);
                        if(mysqli_num_rows($result_set)>0)
                        {
                            while($row=mysqli_fetch_row($result_set))
                            {
                            ?>
                            <tr height="50px">
                                <td align="center"><?php echo $row[0]." ".$row[1];?></td>
                                <td align="center"><?php echo $row[2];?></td>
                                <td align="center"><?php echo $row[3];?></td>
                                <td align="center"><?php echo $row[4];?></td>
                                <td align="center"><?php echo $row[5];?></td>
                                <td align="center"><?php echo $row[7];?></td>
                                <td align="center" width="50px"><a href="javascript:view_id('<?php echo $row[6]; ?>')"">view</a></td>
                                <td align="center" width="50px"><a href="javascript:delete_id('<?php echo $row[6]; ?>')"">cancel</a></td>
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
            </div>
            <div id="footer">
                BBhotel &copy 2017
            </div>
	   </div>
    </body>
</html>