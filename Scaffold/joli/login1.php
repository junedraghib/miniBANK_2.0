<?php
session_start();
if (isset($_POST['submit']))
{
    $_SESSION['username']=$_POST['username'];
    $_SESSION['password']=$_POST['password'];
}
elseif (isset($_POST['admin']))
{
    $_SESSION['username']=$_POST['reg_username'];
    $_SESSION['password']=$_POST['reg_password'];
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- META SECTION -->
        <title>miniBANK</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css" />
        <!-- EOF CSS INCLUDE -->
        <?php
                        $username=$_SESSION['username'];
                        $password=$_SESSION['password'];
                        $db=mysqli_connect("localhost","root","raghib@1998","juned");
                        $query="SELECT * from user WHERE username='$username' AND password='$password'";
                        $query1="SELECT * from allAcc where username='$username' ";
                        $query2="SELECT * from allTransaction where username='$username' and type='DEBIT' order by date_of_transaction desc,time_of_transaction desc limit 1";
                        $query3="SELECT * from allTransaction where username='$username' and type='CREDIT' order by date_of_transaction desc,time_of_transaction desc limit 1";
                        $getmessage="SELECT count(message) as messages from notification where username='$username' and isReaded=0";
                        $message="SELECT * from notification where username='$username' and isReaded=0 order by date_of_notification desc,time_of_notification desc";
                        $messageall="SELECT * from notification where username='$username' order by date_of_notification desc,time_of_notification desc";
                        $result=mysqli_query($db,$query) or die("login couldnt be completed!!");
                        $result1=mysqli_query($db,$query1) or die("account no couldnt be found!!");
                        $result2=mysqli_query($db,$query2) or die("account no couldnt be found!!");
                        $result3=mysqli_query($db,$query3) or die("account no couldnt be found!!"); 
                        $getmessageresult=mysqli_query($db,$getmessage) or die("account no couldnt be found!!");   
                        $messageresult=mysqli_query($db,$message) or die("account no couldnt be found!!"); 
                        $messageallresult=mysqli_query($db,$messageall) or die("account no couldnt be found!!");   
                        $row=mysqli_fetch_array($result);
                        $row1=mysqli_fetch_array($result1);
                        $row2=mysqli_fetch_array($result2);
                        $row3=mysqli_fetch_array($result3);
                        $getmessagerow=mysqli_fetch_array($getmessageresult);
                        
                        mysqli_close($db);
            ?>
            <script>
                function myFunction(contentId) {
                    var arr = document.getElementsByClassName("sem");
                    for (var i = 0; i < arr.length; i++) {
                        arr[i].style.display = "none";
                    }
                    var x = document.getElementById(contentId);
                    

                    contentId.style.display = "block";
                    $(event.target).click(function () {
                        $(".x-navigation-control").click();
                        return false;
                    });
                }

            </script>

            <style>
                .sem {
                    display: none;
                }

                .table-responsive {
                    height: 500px;
                    overflow: auto;
                }
            </style>
    </head>

    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">

            <!-- START PAGE SIDEBAR -->
            <div id="menu" class="page-sidebar" style="background-color : white;">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="index.html" style="background-color : #1f61db;">
                            <span class="fa fa-university" style="font-size: 24px; color : white;"></span> miniBANK</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="assets/images/users/avatar.jpg" alt="Mohd Sadique" />
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="assets/images/users/avatar.jpg" alt="Mohd Sadique" />
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">
                                    <?php echo $row['name'];?>
                                </div>
                                <div class="profile-data-title">Welcome</div>
                            </div>
                            <div class="profile-controls">
                                <a href="" class="profile-control-left">
                                    <span class="fa fa-info"></span>
                                </a>
                                <a href="" class="profile-control-right">
                                    <span class="fa fa-envelope"></span>
                                </a>
                            </div>
                        </div>
                    </li>

                    <li class="">
                        <a onclick="myFunction(detail)">
                            <span class="fa fa-table"></span>
                            <span class="xn-text">Account Details</span>
                        </a>
                    </li>
                    <li class="">
                        <a onclick="myFunction(transaction)">
                            <span class="fa fa-inr"></span>
                            <span class="xn-text">My Transactions</span>
                        </a>
                    </li>
                    <li class="">
                        <a onclick="myFunction(moneytransfer)">
                            <span class="fa fa-share-square-o"></span>
                            <span class="xn-text">Money Transfer</span>
                        </a>
                    </li>
                    <li class="">
                        <a onclick="myFunction(withdraw)">
                            <span class="fa fa-briefcase"></span>
                            <span class="xn-text">Withdraw Amount</span>
                        </a>
                    </li>
                    <li class="">
                        <a onclick="myFunction(deposit)">
                            <span class="fa fa-download"></span>
                            <span class="xn-text">Deposit Amount</span>
                        </a>
                    </li>
                    <li class="">
                        <a onclick="myFunction(message)">
                            <span class="fa fa-comments"></span>
                            <span class="xn-text">Messages</span>
                        </a>
                    </li>

                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->

            <!-- PAGE CONTENT -->
            <div class="page-content">

                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize">
                            <span class="fa fa-dedent"></span>
                        </a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Search..." />
                        </form>
                    </li>
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right" style="position : fixed; right :1em;">
                        <a href="#" class="mb-control" data-box="#mb-signout">
                            <span class="fa fa-sign-out"></span>
                        </a>
                    </li>
                    <!-- END SIGN OUT -->
                    <!-- MESSAGES -->

                    <li class="xn-icon-button pull-right" style="position : fixed; right : 5em;">
                        <a href="#">
                            <span class="fa fa-comments"></span>
                        </a>
                        <div class="informer informer-danger">
                            <?php 
                                                echo $getmessagerow['messages'];
                                            ?>
                        </div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <span class="fa fa-comments" id="display"></span> Messages</h3>
                                <div class="pull-right">
                                    <span class="label label-danger">
                                        <?php echo $getmessagerow['messages']; ?> new</span>
                                </div>
                            </div>
                            <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                                <?php
                                                
                                                while ($messagerow=mysqli_fetch_array($messageresult))
                                                {
                                                ?>

                                    <a href="#" class="list-group-item">
                                        <div class="list-group-status status-online"></div>
                                        <span class="contacts-title">
                                            <?php echo $messagerow['time_of_notification']." ".$messagerow['date_of_notification']?>
                                        </span>
                                        <p>
                                            <?php echo $messagerow['message'] ?>
                                        </p>
                                    </a>
                                    <?php
                                                }
                                                ?>
                            </div>
                            <div class="panel-footer text-center">
                                <a onclick="myFunction(message)">Show all messages</a>
                            </div>
                        </div>
                    </li>

                    <!-- END MESSAGES -->
                    <!-- TASKS -->

                    <!-- END TASKS -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->

                <!-- START BREADCRUMB -->

                <!-- END BREADCRUMB -->

                <!-- PAGE CONTENT WRAPPER -->


                <!-- PAGE CONTENT WRAPPER -->
                <!-- START CONTENT FRAME -->
                <div class="content-frame">

                    <!-- START CONTENT FRAME TOP -->
                    <div class="content-frame-top">
                        <div class="page-title" style="margin-top:15px;">
                            <h2 style="color:#1f61db;">
                                <span class="fa fa-edit"> your activities goes here...</span> 
                                <small></small>
                            </h2>
                            <div class="pull-right">
                                <button class="btn btn-default content-frame-right-toggle">
                                    <span class="fa fa-bars"></span>
                                </button>
                            </div>
                        </div>

                    </div>
                    <!-- END CONTENT FRAME TOP -->

                    <!-- START CONTENT FRAME LEFT -->
                    <div class="content-frame-right">
                        <div class="col">

                            <!-- START WIDGET CLOCK -->
                            <div class="widget widget-info widget-padding-sm">
                                <div class="widget-big-int plugin-clock">00:00</div>
                                <div class="widget-subtitle plugin-date">Loading...</div>
                                <div class="widget-controls">
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget">
                                        <span class="fa fa-times"></span>
                                    </a>
                                </div>
                                <div class="widget-buttons widget-c3">
                                    <div class="col">
                                        <a href="#">
                                            <span class="fa fa-clock-o"></span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="#">
                                            <span class="fa fa-bell"></span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="#">
                                            <span class="fa fa-calendar"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET CLOCK -->

                        </div>
                        <div class="col">

                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon">
                                <div class="widget-item-left">
                                    <span class="fa fa-user"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-title" style="font-size:12px;">Account Number</div>
                                    <div class="widget-title" style="font-size:20px;">
                                        <strong>
                                            <?php echo $row1['account_no']?>
                                        </strong>
                                    </div>
                                    <div class="widget-title" style="font-size:12px;">Customer Idetificatin Number</div>
                                    <div class="widget-title" style="font-size:20px;">
                                        <strong>
                                            <?php echo $row1['cin']?>
                                        </strong>
                                    </div>
                                </div>
                                <div class="widget-controls">
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget">
                                        <span class="fa fa-times"></span>
                                    </a>
                                </div>
                            </div>
                            <!-- END WIDGET REGISTRED -->

                        </div>
                        <div class="col">

                            <!-- START WIDGET SLIDER -->
                            <div class="widget widget-default widget-carousel">
                                <div class="owl-carousel" id="owl-example">
                                    <div>
                                        <div class="widget-title">Total Amount</div>
                                        <div class="widget-subtitle">27/03/2018 15:23</div>
                                        <div class="widget-int" style="font-size : 40sp; padding-top : 30px">
                                            <?php echo $row1['balance']?>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="widget-title">Last Amount Debited</div>
                                        <div class="widget-subtitle">
                                            <?php echo $row2['date_of_transaction']?>
                                        </div>
                                        <div class="widget-int">
                                            <?php echo $row2['ammount']?>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="widget-title">Last Amount Credited</div>
                                        <div class="widget-subtitle">
                                            <?php echo $row3['date_of_transaction']?>
                                        </div>
                                        <div class="widget-int">
                                            <?php echo $row3['ammount']?>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-controls">
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget">
                                        <span class="fa fa-times"></span>
                                    </a>
                                </div>
                            </div>
                            <!-- END WIDGET SLIDER -->

                        </div>
                        <div class="col">

                            <!-- START WIDGET MESSAGES -->

                            <div class="widget widget-default widget-item-icon">
                                <div class="widget-item-left">
                                    <span class="fa fa-envelope"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count">
                                        <?php echo $getmessagerow['messages']; ?>
                                    </div>
                                    <div class="widget-title">New Notification</div>
                                    <div class="widget-subtitle">recived from miniBANK</div>
                                </div>
                                <div class="widget-controls">
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget">
                                        <span class="fa fa-times"></span>
                                    </a>
                                </div>
                            </div>
                            <!-- END WIDGET MESSAGES -->

                        </div>


                    </div>
                    <!-- END CONTENT FRAME LEFT -->

                    <!-- START CONTENT FRAME BODY -->
                    <div class="content-frame-body content-frame-body-left" style="padding-right : 1px;padding-left : 1px;">
                        <div class="page-content-wrap" style="padding-right : 1px;padding-left : 1px;">


                            <div class="col">
                                <div class="col sem" id="message">
                                    <div class="col" style="height: 100%; max-height: 500px; overflow-y: scroll;">
                                        <div class="content-frame-top">
                                            <div class="page-title">
                                                <h2>
                                                    <span class="fa fa-comments" id="display"></span> Messages</h2>
                                            </div>
                                        </div>
                                        <div class="content-frame-body content-frame-body-left">

                                            <div class="messages messages-img">
                                                <?php
                                                                        while ($messageallrow=mysqli_fetch_array($messageallresult))
                                                                        {
                                                                    ?>
                                                    <div class="item in">
                                                        <div class="image">
                                                            <img src="favicon.ico" alt="John Doe">
                                                        </div>
                                                        <div class="text">
                                                            <div class="heading">
                                                                <a href="#">
                                                                    <?php echo $messageallrow['time_of_notification']." ".$messageallrow['date_of_notification'];?>
                                                                </a>
                                                                <span class="date">
                                                                    <?php echo " Account No. ".$messageallrow['account_no'];?>
                                                                </span>
                                                            </div>
                                                            <?php echo $messageallrow['message'];?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                                        }
                                                                    ?>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="panel panel-default push-up-10">
                                        <div class="panel-body panel-body-search">
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-default">
                                                        <span class="fa fa-camera"></span>
                                                    </button>
                                                    <button class="btn btn-default">
                                                        <span class="fa fa-chain"></span>
                                                    </button>
                                                </div>
                                                <input type="text" class="form-control" id="msg" placeholder="Your message..." />
                                                <div class="input-group-btn">
                                                    <script type="text/javascript">
                                                        function sendMsg() {


                                                            if (window.XMLHttpRequest) {
                                                                // code for IE7+, Firefox, Chrome, Opera, Safari
                                                                xmlhttp = new XMLHttpRequest();
                                                            } else {
                                                                // code for IE6, IE5
                                                                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                                            }
                                                            xmlhttp.onreadystatechange = function () {
                                                                if (this.readyState == 4 && this.status == 200) {
                                                                    document.getElementById("display").innerHTML = this.responseText;
                                                                }
                                                            };

                                                            var msg = document.getElementById("msg").value;

                                                            var username = "adish123";

                                                            var sendbutton = document.getElementById("sendbutton").value;

                                                            var r = "sendMsg.php?msg=" + msg + "&username=" + username + "&sendbutton=" + sendbutton;

                                                            xmlhttp.open("GET", r, true);

                                                            xmlhttp.send();

                                                            console.log(username);
                                                        }


                                                    </script>
                                                    <button class="btn btn-default" id="sendbutton" type="button" value="send" onclick="sendMsg()">send</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">

                                    <!-- START PROJECTS BLOCK -->
                                    <div id="detail" class="panel panel-default sem">
                                        <div class="panel-heading">
                                            <div class="panel-title-box">
                                                <h3>Account Details</h3>
                                                <span>General Detail of Accounts</span>
                                            </div>
                                            <ul class="panel-controls" style="margin-top: 2px;">
                                                <li>
                                                    <a href="#" class="panel-fullscreen">
                                                        <span class="fa fa-expand"></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="panel-refresh">
                                                        <span class="fa fa-refresh"></span>
                                                    </a>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                        <span class="fa fa-cog"></span>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="#" class="panel-collapse">
                                                                <span class="fa fa-angle-down"></span> Collapse</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="panel-remove">
                                                                <span class="fa fa-times"></span> Remove</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="panel-body panel-body-table">

                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped">

                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <strong>Account Type</strong>
                                                            </td>
                                                            <td>
                                                                <span>
                                                                    <?php echo $row['account_type']?>
                                                                </span>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <strong>Customer Type</strong>
                                                            </td>
                                                            <td>
                                                                <span>
                                                                    <?php echo $row['cust_type']?>
                                                                </span>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <strong>Account Holder</strong>
                                                            </td>
                                                            <td>
                                                                <span>
                                                                    <?php echo $row['name']?>
                                                                </span>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <strong>Email</strong>
                                                            </td>
                                                            <td>
                                                                <span>
                                                                    <?php echo $row['email']?>
                                                                </span>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <strong>Date of Birth</strong>
                                                            </td>
                                                            <td>
                                                                <span>
                                                                    <?php echo $row['dob']?>
                                                                </span>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <strong>Gender</strong>
                                                            </td>
                                                            <td>
                                                                <span>
                                                                    <?php echo $row['gender']?>
                                                                </span>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <strong>city</strong>
                                                            </td>
                                                            <td>
                                                                <span>
                                                                    <?php echo $row['city']?>
                                                                </span>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <strong>State</strong>
                                                            </td>
                                                            <td>
                                                                <span>
                                                                    <?php echo $row['state']?>
                                                                </span>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <strong>Pincode</strong>
                                                            </td>
                                                            <td>
                                                                <span>
                                                                    <?php echo $row['pincode']?>
                                                                </span>
                                                            </td>

                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- END PROJECTS BLOCK -->

                                </div>
                                <div id="transaction" class="col sem">

                                    <!-- START PROJECTS BLOCK -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="panel-title-box">
                                                <h3>TRANSACTIONS</h3>
                                                <span>Last Transactions</span>
                                            </div>
                                            <ul class="panel-controls" style="margin-top: 2px;">
                                                <li>
                                                    <a href="#" class="panel-fullscreen">
                                                        <span class="fa fa-expand"></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="panel-refresh">
                                                        <span class="fa fa-refresh"></span>
                                                    </a>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                        <span class="fa fa-cog"></span>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="#" class="panel-collapse">
                                                                <span class="fa fa-angle-down"></span> Collapse</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="panel-remove">
                                                                <span class="fa fa-times"></span> Remove</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="panel-body panel-body-table">

                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                        <div style="position : fixed;">
                                                            <tr>
                                                                <th width="20%">TransactionID</th>
                                                                <th width="15%">Amount</th>
                                                                <th width="15%">Time</th>
                                                                <th width="15%">Date</th>
                                                                <th width="10%">Type</th>
                                                            </tr>
                                                        </div>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                                            $username=$_POST['username'];
                                                                            $password=$_POST['password'];
                                                                            $db1=mysqli_connect("localhost","root","raghib@1998","juned");
                                                                            $query4="SELECT * from allTransaction where username='$username' order by date_of_transaction desc,time_of_transaction desc";
                                                                            $result4=mysqli_query($db1,$query4) or die("account no couldnt be found!!");   
                                
                                                                            while ($row4=mysqli_fetch_array($result4))
                                                                            {
                                                                             echo "<tr>
                                                                            <td>
                                                                                <div class='widget-subtitle'>" .$row4['transaction_id']."</div>
                                                                            </td>
                                                                            <td>
                                                                                <div class='widget-subtitle'>".$row4['ammount']."</div>
                                                                            </td>
                                                                            <td>
                                                                                <div class='widget-subtitle'>".$row4['time_of_transaction']."</div>
                                                                            </td>
                                                                            <td>
                                                                                <div class='widget-subtitle'>".$row4['date_of_transaction']."</div>
                                                                            </td>
                                                                            <td>
                                                                                <div class='widget-subtitle'>".$row4['type']."</div>
                                                                            </td>
                                                                         </tr>";
                                                                            }
                                                                            mysqli_close($db1);
                                
                                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- END PROJECTS BLOCK -->

                                </div>

                                <div id="moneytransfer" class="panel panel-default sem">
                                    <div class="panel-heading">
                                        <div class="panel-title-box">
                                            <h3>Money Transfer</h3>
                                            <span>Transfer Money to Account</span>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-3">

                                            <script>
                                                function showUser() {


                                                    if (window.XMLHttpRequest) {
                                                        // code for IE7+, Firefox, Chrome, Opera, Safari
                                                        xmlhttp = new XMLHttpRequest();
                                                    } else {
                                                        // code for IE6, IE5
                                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                                    }
                                                    xmlhttp.onreadystatechange = function () {
                                                        if (this.readyState == 4 && this.status == 200) {
                                                            document.getElementById("update").innerHTML = this.responseText;
                                                        }
                                                    };
                                                    var payer = document.getElementById("payer_acc").value;
                                                    var payee = document.getElementById("payee_acc").value;
                                                    var amt = document.getElementById("amt").value;
                                                    var submit = document.getElementById("submit").value;
                                                    xmlhttp.open("GET", "moneytransfer.php?payer=" + payer + "&payee=" + payee + "&amt=" + amt + "&submit=" + submit, true);
                                                    xmlhttp.send();

                                                }
                                            </script>
                                            <script>
                                                function showUser2() {


                                                    if (window.XMLHttpRequest) {
                                                        // code for IE7+, Firefox, Chrome, Opera, Safari
                                                        xmlhttp = new XMLHttpRequest();
                                                    } else {
                                                        // code for IE6, IE5
                                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                                    }
                                                    xmlhttp.onreadystatechange = function () {
                                                        if (this.readyState == 4 && this.status == 200) {
                                                            document.getElementById("update").innerHTML = this.responseText;
                                                        }
                                                    };
                                                    var payer = document.getElementById("payer_acc").value;
                                                    var payee = document.getElementById("payee_acc").value;
                                                    var amt = document.getElementById("amt").value;
                                                    var submit = document.getElementById("submit").value;
                                                    xmlhttp.open("GET", "moneytransfer2.php?payer=" + payer + "&payee=" + payee + "&amt=" + amt + "&submit=" + submit, true);
                                                    xmlhttp.send();

                                                }
                                            </script>
                                            <script>
                                                function payNow() {


                                                    if (window.XMLHttpRequest) {
                                                        // code for IE7+, Firefox, Chrome, Opera, Safari
                                                        xmlhttp = new XMLHttpRequest();
                                                    } else {
                                                        // code for IE6, IE5
                                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                                    }
                                                    xmlhttp.onreadystatechange = function () {
                                                        if (this.readyState == 4 && this.status == 200) {
                                                            document.getElementById("update").innerHTML = this.responseText;
                                                        }
                                                    };

                                                    var payer1 = document.getElementById("payer_acc").innerHTML;

                                                    var payee1 = document.getElementById("payee_acc").innerHTML;
                                                    var amt1 = document.getElementById("amt").innerHTML;

                                                    var pay = document.getElementById("pay").value;

                                                    xmlhttp.open("GET", "paynow.php?payer1=" + payer1 + "&payee1=" + payee1 + "&amt1=" + amt1 + "&pay=" + pay, true);

                                                    xmlhttp.send();

                                                }
                                            </script>

                                        </div>
                                        <div class="col-md-6" style="padding-top : 50px; padding-bottom : 50px;" id="update">
                                            <div class="panel panel-default tabs">
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li class="active">
                                                        <a href="#tab-first" role="tab" data-toggle="tab">with account no</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab-second" role="tab" data-toggle="tab">with username</a>
                                                    </li>
                                                </ul>
                                                <div class="panel-body tab-content">
                                                    <div class="tab-pane active" id="tab-first">
                                                        <form action="">
                                                            <input type="text" class="block" id="payer_acc" name="payer_acc_no" value="<?php echo $row1['account_no']?>" placeholder="Payer Account Number">
                                                            <input type="text" class="block" id="payee_acc" name="payee_acc_no" placeholder="Payee Account Number">
                                                            <input type="text" class="block" id="amt" name="amt" placeholder="Amount">
                                                            <input type="button" name="submit" id="submit" value="Proceed" onclick="showUser()">
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane" id="tab-second">
                                                        <form action="">
                                                            <input type="text" class="block" id="payer_acc" name="payer_acc_no" value="<?php echo $row1['username']?>" placeholder="Payer Account Number">
                                                            <input type="text" class="block" id="payee_acc" name="payee_acc_no" placeholder="Payee username">
                                                            <input type="text" class="block" id="amt" name="amt" placeholder="Amount">
                                                            <input type="button" name="submit12" id="submit12" value="Proceed" onclick="showUser2()">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div id="withdraw" class="panel panel-default sem">
                                    <div class="panel-heading">
                                        <div class="panel-title-box">
                                            <h3>Withdraw Amount</h3>
                                            <span>Withdraw Money from Account</span>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-3">


                                            <script>
                                                function withdrawmoney() {


                                                    if (window.XMLHttpRequest) {
                                                        // code for IE7+, Firefox, Chrome, Opera, Safari
                                                        xmlhttp = new XMLHttpRequest();
                                                    } else {
                                                        // code for IE6, IE5
                                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                                    }
                                                    xmlhttp.onreadystatechange = function () {
                                                        if (this.readyState == 4 && this.status == 200) {
                                                            document.getElementById("withdrawdisplay").innerHTML = this.responseText;
                                                        }
                                                    };
                                                    var from_acc = document.getElementById("to_acc").value;
                                                    var withdrawamt = document.getElementById("withdrawamt").value;
                                                    var withdrawbutton = document.getElementById("withdrawbutton").value;
                                                    xmlhttp.open("GET", "withdrawmoney.php?from_acc=" + from_acc + "&withdrawamt=" + withdrawamt + "&withdrawbutton=" + withdrawbutton, true);

                                                    xmlhttp.send();

                                                }
                                            </script>
                                        </div>

                                        <div class="col-md-6" style="padding-top : 50px; padding-bottom : 50px" ; id="withdrawdisplay">
                                            <form action="">
                                                <select class="block">
                                                    <option value="volvo" disabled selected>Select Account</option>
                                                    <option id="from_acc" value="<?php echo $row1['account_no']?>">
                                                        <?php echo $row1['account_no']?>
                                                    </option>
                                                </select>

                                                <input type="text" class="block" id="withdrawamt" placeholder="Amount">
                                                <input type="button" id="withdrawbutton" value="Proceed" onclick="withdrawmoney()">
                                            </form>
                                        </div>

                                    </div>
                                </div>
                                <div id="deposit" class="panel panel-default sem" style="height : 80%;">
                                    <div class="panel-heading">
                                        <div class="panel-title-box">
                                            <h3>Deposit Amount</h3>
                                            <span>Deposit Money to Account</span>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-3">

                                            <script>
                                                function depositmoney() {


                                                    if (window.XMLHttpRequest) {
                                                        // code for IE7+, Firefox, Chrome, Opera, Safari
                                                        xmlhttp = new XMLHttpRequest();
                                                    } else {
                                                        // code for IE6, IE5
                                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                                    }
                                                    xmlhttp.onreadystatechange = function () {
                                                        if (this.readyState == 4 && this.status == 200) {
                                                            document.getElementById("depositdisplay").innerHTML = this.responseText;
                                                        }
                                                    };
                                                    var to_acc = document.getElementById("to_acc").value;
                                                    var depositamt = document.getElementById("depositamt").value;
                                                    var depositbutton = document.getElementById("depositbutton").value;
                                                    xmlhttp.open("GET", "depositmoney.php?to_acc=" + to_acc + "&depositamt=" + depositamt + "&depositbutton=" + depositbutton, true);
                                                    alert("url is set!!");
                                                    xmlhttp.send();

                                                }
                                            </script>

                                        </div>
                                        <div class="col-md-6" style="padding-top : 50px; padding-bottom : 50px;" id="depositdisplay">
                                            <form action="">
                                                <select class="block">
                                                    <option value="volvo" disabled selected>Select Account</option>
                                                    <option value="saab"></option>
                                                    <option id="to_acc" value="<?php echo $row1['account_no']?>">
                                                        <?php echo $row1['account_no']?>
                                                    </option>
                                                </select>

                                                <input id="depositamt" type="text" class="block" placeholder="Amount">
                                                <input id="depositbutton" type="button" value="Proceed" onclick="depositmoney()">
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- END CONTENT FRAME BODY -->
                </div>
                <!-- END CONTENT FRAME -->
                <!-- END PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title">
                        <span class="fa fa-sign-out"></span> Log
                        <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="logout.php" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->

        <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js"></script>

        <script type="text/javascript" src="js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="js/plugins/morris/morris.min.js"></script>
        <script type="text/javascript" src="js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
        <script type='text/javascript' src='js/plugins/bootstrap/bootstrap-datepicker.js'></script>
        <script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>

        <script type="text/javascript" src="js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>

        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/actions.js"></script>

        <script type="text/javascript" src="js/demo_dashboard.js"></script>
        <!-- END TEMPLATE -->
        <!-- END SCRIPTS -->

    </body>

    </html>
