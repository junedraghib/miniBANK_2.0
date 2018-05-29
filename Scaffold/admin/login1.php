<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META SECTION -->
    <title>MiniBank</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css" />
    <!-- EOF CSS INCLUDE -->
    <?php
                $username=$_POST['username'];
                $password=$_POST['password'];
                $db=mysqli_connect("localhost","root","raghib@1998","juned");
                
                $query="SELECT * from user WHERE username='$username' AND password='$password'";
                $query1="SELECT * from allAcc where username='$username' ";
                $query2="SELECT * from allTransaction where username='$username' and type='DEBIT' order by date_of_transaction desc,time_of_transaction desc limit 1";
                $query3="SELECT * from allTransaction where username='$username' and type='CREDIT' order by date_of_transaction desc,time_of_transaction desc limit 1";
                $result=mysqli_query($db,$query) or die("login couldnt be completed!!");
                $result1=mysqli_query($db,$query1) or die("account no couldnt be found!!");
                $result2=mysqli_query($db,$query2) or die("account no couldnt be found!!");
                $result3=mysqli_query($db,$query3) or die("account no couldnt be found!!");   
                $row=mysqli_fetch_array($result);
                $row1=mysqli_fetch_array($result1);
                $row2=mysqli_fetch_array($result2);
                $row3=mysqli_fetch_array($result3);
                mysqli_close($db);
    ?>
        <script>
            function myFunction(contentId) {
                var arr = document.getElementsByClassName("sem");
                for (var i = 0; i < arr.length; i++) {
                    arr[i].style.display = "none";
                }
                var x = document.getElementById(contentId);
                console.log(contentId);

                contentId.style.display = "block";
            }

        </script>
        <style>
            .sem {
                display: none;
            }
            .table-responsive
            {
                height: 300px;
                overflow: auto;
            }
            
        </style>
</head>

<body>

    <!-- START PAGE CONTAINER -->

    <div class="page-container">

        <!-- START PAGE SIDEBAR -->
        <div class="page-sidebar" style="position : fixed;">
            <!-- START X-NAVIGATION -->
            <ul class="x-navigation">
                <li class="xn-logo">
                    <img src="assets/images/logo.png" alt="MiniBank" />
                    <a class="x-navigation-control"></a>
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
                            <a href="pages-profile.html" class="profile-control-left">
                                <span class="fa fa-info"></span>
                            </a>
                            <a href="pages-messages.html" class="profile-control-right">
                                <span class="fa fa-envelope"></span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="xn-title">DASHBOARD</li>
                <li class="">
                    <a onclick="myFunction(detail)">
                        <span class="fa fa-desktop"></span>
                        <span class="xn-text">Account Details</span>
                    </a>
                </li>
                <li class="">
                    <a onclick="myFunction(transiction)">
                        <span class="fa fa-desktop"></span>
                        <span class="xn-text">My Transactions</span>
                    </a>
                </li>
                <li class="">
                    <a onclick="myFunction(moneytransfer)">
                        <span class="fa fa-desktop"></span>
                        <span class="xn-text">Money Transfer</span>
                    </a>
                </li>
                <li class="">
                    <a onclick="myFunction(withdraw)">
                        <span class="fa fa-desktop"></span>
                        <span class="xn-text">Withdraw Amount</span>
                    </a>
                </li>
                <li class="">
                    <a onclick="myFunction(deposit)">
                        <span class="fa fa-desktop"></span>
                        <span class="xn-text">Deposit Amount</span>
                    </a>
                </li>
                <li class="">
                    <a onclick="myFunction(loan)">
                        <span class="fa fa-desktop"></span>
                        <span class="xn-text">Loan</span>
                    </a>
                </li>

            </ul>
            <!-- END X-NAVIGATION -->
        </div>
        <!-- END PAGE SIDEBAR -->

        <!-- PAGE CONTENT -->
        <div class="page-content">

            <!-- START X-NAVIGATION VERTICAL -->
            <ul class="x-navigation x-navigation-horizontal x-navigation-panel" style="position : fixed;">
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
                    <div class="informer informer-danger">4</div>
                    <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <span class="fa fa-comments"></span> Messages</h3>
                            <div class="pull-right">
                                <span class="label label-danger">4 new</span>
                            </div>
                        </div>
                        <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                            <a href="#" class="list-group-item">
                                <div class="list-group-status status-online"></div>
                                <img src="assets/images/users/user2.jpg" class="pull-left" alt="Mohd Sadique" />
                                <span class="contacts-title">Mohd Sadique</span>
                                <p>Hey, What are you doing, send me my cash</p>
                            </a>
                            <a href="#" class="list-group-item">
                                <div class="list-group-status status-away"></div>
                                <img src="assets/images/users/user.jpg" class="pull-left" alt="Juned Raghib" />
                                <span class="contacts-title">Juned Raghib </span>
                                <p>Bhai tum log front end dekh lo, mai backend krta hu</p>
                            </a>
                            <a href="#" class="list-group-item">
                                <div class="list-group-status status-away"></div>
                                <img src="assets/images/users/user3.jpg" class="pull-left" alt="Zaki" />
                                <span class="contacts-title">Zakiuddin</span>
                                <p>Abe hme kuch nhi krna, hmare sath Juned hai</p>
                            </a>
                            <a href="#" class="list-group-item">
                                <div class="list-group-status status-offline"></div>
                                <img src="assets/images/users/user6.jpg" class="pull-left" alt="DBMS" />
                                <span class="contacts-title">DBMS chotu</span>
                                <p>Working site chahiye next lab me</p>
                            </a>
                        </div>
                        <div class="panel-footer text-center">
                            <a href="pages-messages.html">Show all messages</a>
                        </div>
                    </div>
                </li>
                <!-- END MESSAGES -->
                <!-- TASKS -->
                <li class="xn-icon-button pull-right" style="position : fixed; right : 9em;">
                    <a href="#">
                        <span class="fa fa-tasks"></span>
                    </a>
                    <div class="informer informer-warning">3</div>
                    <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <span class="fa fa-tasks"></span> Tasks</h3>
                            <div class="pull-right">
                                <span class="label label-warning">3 active</span>
                            </div>
                        </div>
                        <div class="panel-body list-group scroll" style="height: 200px;">
                            <a class="list-group-item" href="#">
                                <strong>Send money to Juned</strong>
                                <div class="progress progress-small progress-striped active">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                                        style="width: 50%;">50%</div>
                                </div>
                                <small class="text-muted">Juned, 29 Mar 2018 / 50%</small>
                            </a>
                            <a class="list-group-item" href="#">
                                <strong>Link aadhar card</strong>
                                <div class="progress progress-small progress-striped active">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                        style="width: 80%;">80%</div>
                                </div>
                                <small class="text-muted">Zakiuddin, 30 Mar 2018 / 80%</small>
                            </a>
                            <a class="list-group-item" href="#">
                                <strong>Lab</strong>
                                <div class="progress progress-small progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"
                                        style="width: 95%;">95%</div>
                                </div>
                                <small class="text-muted">DBMS, working site submit / 95%</small>
                            </a>
                            <a class="list-group-item" href="#">
                                <strong>Holiday, fun.</strong>
                                <div class="progress progress-small">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                                </div>
                                <small class="text-muted">Mohd Sadique, 31 Mar 2018 /</small>
                                <small class="text-success"> Done</small>
                            </a>
                        </div>
                        <div class="panel-footer text-center">
                            <a href="pages-tasks.html">Show all tasks</a>
                        </div>
                    </div>
                </li>
                <!-- END TASKS -->
            </ul>
            <!-- END X-NAVIGATION VERTICAL -->

            <!-- START BREADCRUMB -->
            <ul class="breadcrumb">
                <li>
                    <a href="#">Home</a>
                </li>
                <li class="active">Dashboard</li>
            </ul>
            <!-- END BREADCRUMB -->

            <!-- PAGE CONTENT WRAPPER -->
            <div class="page-content-wrap">

                <!-- START WIDGETS -->

                <!-- END WIDGETS -->
                <div class="row">
                    <div class="col-md-8" style="padding-top : 35px; padding-left : 20px;">

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

                                    <div class="table-responsive" >
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


                        <div id="moneytransfer" class="panel panel-default sem">
                            <div class="panel-heading">
                                <div class="panel-title-box">
                                    <h3>Money Transfer</h3>
                                    <span>Transfer Money to Account</span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-6" style="padding-top : 50px; padding-bottom : 50px;">
                                    <form action="">
                                        <?php
                                            $payer=$_POST['payer_acc_no'];
                                            $payee=$_POST['payee_acc_no'];
                                            $amount=$_POST['amt'];
                                            if (isset($_POST['submit']))
                                            {
                                                if (!empty($payer) && !empty($amount))
                                                {
                                                    $username=$_POST['username'];
                                                    $password=$_POST['password'];
                                                    $db2=mysqli_connect("localhost","root","raghib@1998","juned");
                                                    $query5="SELECT * from user where username=(select username from allAcc where account_no=$payee) ";
                                                    $result5=mysqli_query($db2,$query5) or die("account no couldnt be found!!");
                                                    $row5=mysqli_fetch_array($result5);
                                                    echo "<span class='fa fa-user'>".$row5['name']."</span>
                                                        ";
                                                    mysqli_close($db1);
                                                }
                                            }
                                            else
                                            {
                                                $output_form=true;    
                                            }
                                        ?>
                                        <input type="text" class="block" name="payer_acc_no" value="<?php echo $row1['account_no']?>" placeholder="Payer Account Number">
                                        <input type="text" class="block" name="payee_acc_no" placeholder="Payee Account Number">
                                        <input type="text" class="block" name="amt" placeholder="Amount">
                                        <input type="submit" name="submit" value="Proceed">
                                    </form>
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

                                </div>
                                <div class="col-md-6" style="padding-top : 50px; padding-bottom : 50px;">
                                    <form action="">
                                        <select class="block">
                                            <option value="volvo" disabled selected>Account Number 1</option>
                                            <option value="saab">Account Number 2</option>
                                            <option value="mercedes">Account Number 3</option>
                                            <option value="audi">Account Number 4</option>
                                        </select>

                                        <input type="text" class="block" placeholder="Amount">
                                        <input type="submit" value="Proceed">
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

                                </div>
                                <div class="col-md-6" style="padding-top : 50px; padding-bottom : 50px;">
                                    <form action="">
                                        <select class="block">
                                            <option value="volvo" disabled selected>Account Number 1</option>
                                            <option value="saab">Account Number 2</option>
                                            <option value="mercedes">Account Number 3</option>
                                            <option value="audi">Account Number 4</option>
                                        </select>

                                        <input type="text" class="block" placeholder="Amount">
                                        <input type="submit" value="Proceed">
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" style="position : fixed; bottom : 0em; right : 2em;">
                        <div class="">
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
                                <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
                                    <div class="widget-item-left">
                                        <span class="fa fa-user"></span>
                                    </div>
                                    <div class="widget-data">
                                       <div class="widget-title">Account Number</div>
                                        <div class="widget-title"><strong><?php echo $row1['account_no']?></strong></div>
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
                                            <div class="widget-int" style="font-size : 40sp; padding-top : 30px"><?php echo $row1['balance']?></div>
                                        </div>
                                        <div>
                                            <div class="widget-title">Last Amount Debited</div>
                                            <div class="widget-subtitle"><?php echo $row2['date_of_transaction']?></div>
                                            <div class="widget-int"><?php echo $row2['ammount']?></div>
                                        </div>
                                        <div>
                                            <div class="widget-title">Last Amount Credited</div>
                                            <div class="widget-subtitle"><?php echo $row3['date_of_transaction']?></div>
                                            <div class="widget-int"><?php echo $row3['ammount']?></div>
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

                                <div class="widget widget-default widget-item-icon" onclick="location.href='pages-messages.html';">
                                    <div class="widget-item-left">
                                        <span class="fa fa-envelope"></span>
                                    </div>
                                    <div class="widget-data">
                                        <div class="widget-int num-count">48</div>
                                        <div class="widget-title">New messages</div>
                                        <div class="widget-subtitle">In your mailbox</div>
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
                    </div>
                </div>



                <div id="transiction" class="col-md-8 sem">

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
                        <div class="panel-body">

                            
                                <table  id="customers2" class="table datatable">
                                    <thead>

                                            <tr>
                                            <th width="20%" >TransactionID</th>
                                            <th width="15%">Amount</th>
                                            <th width="15%">Time</th>
                                            <th width="15%">Date</th>
                                            <th width="10%">Type</th>                                            
                                    
                                    </thead>
                                    <tbody>
                                        <?php
                                            $username=$_POST['username'];
                                            $password=$_POST['password'];
                                            $db1=mysqli_connect("localhost","root","raghib@1998","juned");
                                            $query4="SELECT * from allTransaction where username='$username' order by time_of_transaction desc,date_of_transaction ";
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
                    <!-- END PROJECTS BLOCK -->

                </div>
                <div class="col-md-7" style="position : fixed; bottom : 0em; height : auto; padding-right:40px; padding-left:20px;">

                    <!-- START WIDGET SLIDER -->
                    <div class="widget widget-default widget-carousel" >
                        <div class="owl-carousel" id="owl-example" >
                            <div style="height : 140px;">
                                <p style="font-weight: bold;color: #000000;">
                                    <b>The standard Lorem Ipsum passage</b>
                                    </br>, used since the 1500s "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                    do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                                    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                    mollit anim id est laborum."


                                </p>
                            </div>
                            <div>
                                <p style="font-weight: bold;color: #000000;">
                                    The standard Lorem Ipsum passage, used since the 1500s "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                                    anim id est laborum."

                                </p>
                            </div>
                            <div>
                                <div class="widget-title">Last Amount Credited</div>
                                <div class="widget-subtitle">20/03/2018</div>
                                <div class="widget-int">1,977</div>
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

            </div>



            <!-- START DASHBOARD CHART -->
            <div class="chart-holder" id="dashboard-area-1" style="height: 200px;"></div>
            <div class="block-full-width">

            </div>
            <!-- END DASHBOARD CHART -->

        </div>
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
                        <a href="/home/mdsadiq/Downloads/Scaffold/login.html" class="btn btn-success btn-lg">Yes</a>
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


    <script type="text/javascript" src="js/plugins.js"></script>
    <script type="text/javascript" src="js/actions.js"></script>

    <script type="text/javascript" src="js/demo_dashboard.js"></script>

    <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->
</body>

</html>