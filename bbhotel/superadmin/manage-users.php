<!DOCTYPE html>

<?php
    include '../connection.php'; //connect the connection page
    if(empty($_SESSION)) // if the session not yet started     
        session_start(); 
    if(!isset($_SESSION['uname'])) 
    { //if not yet logged in    
        header("location: ../index.php");// send to login page    
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
            function edt_id(id)
            {
                if(confirm('Sure to edit ?'))
                {
                    window.location.href='modify-users.php?edit_id='+id;
                }
            }
            function delete_id(id)
            {
                if(confirm('Sure to Delete ?'))
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
                <div id="managetext">Manage Users</div>
                <table align="center">
                    <tr height="50px">
                        <th align="center">ID</th>
                        <th align="center">User Type</th>
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
                                <td align="center"><?php echo $row[2];?></td>
                                <td align="center"><?php echo $row[3];?></td>
                                <td align="center"><?php echo $row[4];?></td>
                                <td align="center"><?php echo $row[5];?></td>
                                <td align="center"><?php echo $row[6];?></td>
                                <td align="center"><?php echo $row[7];?></td>
                                <td align="center"><?php echo $row[8];?></td>
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
                            <td colspan="11" align="center">No Data Found !</td>
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