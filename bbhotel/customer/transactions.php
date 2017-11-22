 <!DOCTYPE html>

<?php
    include '../connection.php'; //connect the connection page
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
    else if($_SESSION['user_type']==NULL){
        header("location: ../"); // send to home page   
        exit;
    }

    if(isset($_GET['delete_id']))
    { 
        $sql_query2="SELECT availability FROM rooms WHERE id=".$_SESSION['room_id'];
        $result_set=mysqli_query($con,$sql_query2);
        if(mysqli_num_rows($result_set)>0)
        {
            while($row=mysqli_fetch_row($result_set))
            {
                $row[0]+=1;
                $sql_query3 = "UPDATE rooms SET availability='$row[0]' WHERE id=".$_SESSION['room_id'];
                if(mysqli_query($con,$sql_query3))
                {
                    $sql_query="DELETE FROM reservations WHERE id=".$_GET['delete_id'];
                    if(mysqli_query($con,$sql_query)){                    
                    ?>
                        <script type="text/javascript">
                            alert('You have successfully canceled your reservation');
                            window.location.href='transactions.php';
                        </script>
                    <?php
                    }
                    else{
                    ?>
                        <script type="text/javascript">
                            alert('Error occured while canceling reservations');
                            window.location.href='transactions.php';
                        </script>
                    <?php
                    }
                }
                else
                {
                    ?>
                        <script type="text/javascript">
                            alert('Error occured while canceling reservations');
                        </script>
                    <?php
                }
            }
        }
        else
        {
            ?>
                <script type="text/javascript">
                    alert('Error occured while canceling reservations');
                </script>
            <?php
        }
        header("Location: transactions.php");
    }
?> 

<html>
    <head>
        <link rel="stylesheet" href="../css/superadmin-manage-users.css">
        <link rel="shortcut icon" href="../images/head_logo.png" />
        
        <script type="text/javascript">
            function delete_id(id)
            {
                if(confirm('Are you sure you want to cancel transaction?'))
                {
                    window.location.href='transactions.php?delete_id='+id;
                }
            }
        </script>
    </head>
    <title>Transactions</title>
    
    <body>
        <div class="navbar">
            <div class="logo">
                <a href="index.php">
                    <img src="../images/logo.png" width="75px;">
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
                        <a href="../customers-rooms.php">ROOMS</a>
                        <a href="../reservation.php">RESERVATIONS</a>
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
                    <a href="profile.php">PROFILE</a>
                    <a href="transactions.php">TRANSACTIONS</a>
                    <a href="../logout.php">LOG OUT</a>
                </div>
            </div>
        </div>
        
        <div id="content_con_login">
            <div id="content_login">
                <div id="managetext">Transactions</div>
                <table align="center">
                    <tr height="50px">
                        <th>Room Type</th>
                        <th>Room Number</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Bill</th>
                        <th>Operations</th>
                    </tr>
                    <?php
                        $sql_query="SELECT a.id,a.room,a.check_in,a.check_out,a.bill,b.room_type,a.room_id FROM reservations a INNER JOIN rooms b ON a.room_id=b.id WHERE a.customer=".$_SESSION['id'];
                        $result_set=mysqli_query($con,$sql_query);
                        if(mysqli_num_rows($result_set)>0)
                        {
                            while($row=mysqli_fetch_row($result_set))
                            {
                            ?>
                            <tr height="50px">
                                <td align="center"><?php echo $row[5];?></td>
                                <td align="center"><?php echo $row[1];?></td>
                                <td align="center"><?php echo $row[2];?></td>
                                <td align="center"><?php echo $row[3];?></td>
                                <td align="center"><?php echo $row[4];?></td>
                                <td align="center" width="50px"><a href="javascript:delete_id('<?php echo $row[0]; ?>')">cancel</a></td>
                            </tr>
                            <?php
                            $_SESSION['room_id']=$row[6];
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