<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META SECTION -->
    <title>Joli Admin - Responsive Bootstrap Admin Template</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css" />
    <!-- EOF CSS INCLUDE -->
    <?php 
        $db=mysqli_connect("localhost","root","raghib@1998","juned");
        $q="select * from admin where username='$username' and password='$password'";
        $query="select * from user inner join allAcc on user.username=allAcc.username where account_type='CD'";
        $result=mysqli_query($db,$query) or die("login couldnt be completed!!");
        $r=mysqli_query($db,$q);
        $query1="select count(user.username) as total from user inner join allAcc on user.username=allAcc.username where account_type='CD'";
        $result1=mysqli_query($db,$query1) or die("login couldnt be completed!!");
        $row1=mysqli_fetch_array($result1);
        $r=mysqli_fetch_array($r);
        mysqli_close($db); 
    ?>

</head>

<body>
    <!-- START PAGE CONTAINER -->
    <div class="page-container">

        <!-- START PAGE SIDEBAR -->
        <div class="page-sidebar" style="background-color : white;">
            <!-- START X-NAVIGATION -->
            <ul class="x-navigation">
                <li class="xn-logo">
                    <a href="index.html" style="background-color : #1f61db;">
                        <span class="fa fa-university" style="font-size: 24px; color : white;"></span> miniBANK</a>
                    <a href="#" class="x-navigation-control"></a>
                </li>
                <li class="xn-profile">
                    <a href="#" class="profile-mini">
                        <img src="assets/images/users/avatar.jpg" alt="John Doe"  />
                    </a>
                    <div class="profile">
                        <div class="admin profile-image" >
                            <img src="assets/images/users/avatar.jpg" alt="John Doe" />
                        </div>
                        <div class="profile-data">
                            <div class="profile-data-name"><?php echo $r['name']?></div>
                            <div class="profile-data-title"><?php echo $r['username']?><</div>
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
                
                <li class="active">
                    <a href="index.php">
                        <span class="fa fa-desktop"></span>
                        <span class="xn-text">Dashboard</span>
                    </a>
                </li>
                <li class="xn-openable">
                    <a href="">
                        <span class="fa fa-users"></span>
                        <span class="xn-text"> Users</span>
                    </a>
                    <ul>
                
                        <li>
                            <a href="users-saving-deposit.php">
                                <span class="fa fa-archive"></span> Saving Deposit</a>
                        </li>
                        <li>
                            <a href="users-fixed-deposit.php">
                                <span class="fa fa-flash"></span> Fixed Deposit</a>
                        </li>
                        <li>
                            <a href="users-current-deposit.php">
                                <span class="fa fa-credit-card"></span> Current Deposit</a>
                        </li>
                        <li>
                            <a href="users-recurring-deposit.php">
                                <span class="fa fa-sort-amount-desc"></span> Recurring Deposit</a>
                        </li>
                    </ul>
                </li>
            
                
                <li>
                    <a href="">
                        <span class="fa fa-download"></span> Deposit</a>
                </li>
                <li>
                    <a href="">
                        <span class="fa fa-briefcase"></span> Withdrawal</a>
                </li>
                <li>
                    <a href="">
                        <span class="fa fa-share-square-o"></span> Money Transfer</a>
                </li>
                <li>
                    <a href="user-detail.php">
                        <span class="fa fa-table"></span> User Table</a>
                </li>
                <li>
                    <a href="account-table.php">
                        <span class="fa fa-building-o"></span> Account Table</a>
                </li>
                
                <li>
                    <a href="txn-all.php">
                        <span class="fa fa-inr"></span> Transaction Tables</a>
                </li>
               
                <li>
                    <a href="messages.php">
                        <span class="fa fa-comments"></span>
                        <span class="xn-text">Messages</span>
                    </a>
                </li>
                <li>
                	<a href="notification.php">
                		<span class="fa fa-comments"></span>
                        <span class="xn-text">Notifications</span>

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
                <li class="xn-icon-button pull-right">
                    <a href="#" class="mb-control" data-box="#mb-signout">
                        <span class="fa fa-sign-out"></span>
                    </a>
                </li>
                <!-- END SIGN OUT -->
                <!-- MESSAGES -->
                <li class="xn-icon-button pull-right">
                    <a href="#">
                        <span class="fa fa-comments"></span>
                    </a>
                    <div class="informer informer-danger"><?php echo $getmessagerow['message']?></div>
                    <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <span class="fa fa-comments"></span> Messages</h3>
                            <div class="pull-right">
                                <span class="label label-danger"><?php echo $getmessagerow['message']?> new</span>
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
                            <a href="messages.php">Show all messages</a>
                        </div>
                    </div>
                </li>
                <!-- END MESSAGES -->
                <!-- TASKS -->
                <li class="xn-icon-button pull-right">
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
                                <strong>Phasellus augue arcu, elementum</strong>
                                <div class="progress progress-small progress-striped active">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                                        style="width: 50%;">50%</div>
                                </div>
                                <small class="text-muted">John Doe, 25 Sep 2014 / 50%</small>
                            </a>
                            <a class="list-group-item" href="#">
                                <strong>Aenean ac cursus</strong>
                                <div class="progress progress-small progress-striped active">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                        style="width: 80%;">80%</div>
                                </div>
                                <small class="text-muted">Dmitry Ivaniuk, 24 Sep 2014 / 80%</small>
                            </a>
                            <a class="list-group-item" href="#">
                                <strong>Lorem ipsum dolor</strong>
                                <div class="progress progress-small progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"
                                        style="width: 95%;">95%</div>
                                </div>
                                <small class="text-muted">John Doe, 23 Sep 2014 / 95%</small>
                            </a>
                            <a class="list-group-item" href="#">
                                <strong>Cras suscipit ac quam at tincidunt.</strong>
                                <div class="progress progress-small">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                                </div>
                                <small class="text-muted">John Doe, 21 Sep 2014 /</small>
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

            <!-- END BREADCRUMB -->

            <!-- PAGE CONTENT WRAPPER -->


            <!-- PAGE CONTENT WRAPPER -->
            <!-- START CONTENT FRAME -->
            <div class="content-frame">

                <!-- START CONTENT FRAME TOP -->
                <div class="content-frame-top">
                    <div class="page-title" style="margin-top:27px;">
                        <h2 style="color:#1f61db;">
                            <span class="fa fa-users"></span> Users having Saving Deposit Account
                            <small>
                                <?php echo $row1['total'];?> users</small>
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
                        <div class="widget widget-info widget-padding-sm" style="margin :3px;">
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
                    </div>
                    <div class="col" style="margin :0px;">

                        <!-- START WIDGET SLIDER -->
                        <div class="widget widget-default widget-carousel" style="margin :3px;">
                            <div class="owl-carousel" id="owl-example">
                                <div>
                                    <div class="widget-title">Total Visitors</div>
                                    <div class="widget-subtitle">27/08/2014 15:23</div>
                                    <div class="widget-int">1,548</div>
                                </div>
                                <div>
                                    <div class="widget-title">Returned</div>
                                    <div class="widget-subtitle">Visitors</div>
                                    <div class="widget-int">1,695</div>
                                </div>
                                <div>
                                    <div class="widget-title">New</div>
                                    <div class="widget-subtitle">Visitors</div>
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
                    <div class="col">

                        <!-- START WIDGET MESSAGES -->
                        <div class="widget widget-default widget-item-icon" onclick="location.href='pages-messages.html';" style="margin :3px;">
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
                    <div class="col">

                        <!-- START WIDGET REGISTRED -->
                        <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';" style="margin :3px;">
                            <div class="widget-item-left">
                                <span class="fa fa-user"></span>
                            </div>
                            <div class="widget-data">
                                <div class="widget-int num-count">375</div>
                                <div class="widget-title">Registred users</div>
                                <div class="widget-subtitle">On your website</div>
                            </div>
                            <div class="widget-controls">
                                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget">
                                    <span class="fa fa-times"></span>
                                </a>
                            </div>
                        </div>
                        <!-- END WIDGET REGISTRED -->

                    </div>

                </div>
                <!-- END CONTENT FRAME LEFT -->
                <style>
                    .input-group {
                        display: none;
                    }
                </style>
                <!-- START CONTENT FRAME BODY -->
                <div class="content-frame-body content-frame-body-left" style="padding-right : 1px;padding-left : 1px;">
                    <div class="page-content-wrap" style="padding-right : 1px;padding-left : 1px;">

                        <div class="row" style="padding-right : 1px;padding-left : 1px;">
                            <?php 
                                
                                while($row=mysqli_fetch_array($result)){
                                    $i=0;
                            ?>
                            <div class="col-md-3">
                                <!-- CONTACT ITEM -->

                                <div class="panel panel-default">
                                    <div class="panel-body profile">
                                        <div class="profile-image">
                                            <img src="assets/images/users/no-image.jpg" alt="Samuel Leroy Jackson" />
                                        </div>
                                        <div class="profile-data">
                                            <div class="profile-data-name">
                                                <div class="view">
                                                    <?php echo $row['name']?>
                                                </div>

                                            </div>

                                            <div class="profile-data-title" id="username<?php echo $i?>">
                                                <?php echo $row['username']?>
                                            </div>
                                            <div class="profile-data-title ">
                                                <div class="view">
                                                    <?php echo $row['dob']?>
                                                </div>

                                            </div>
                                            <div id="display<?php echo $i?>"></div>
                                        </div>
                                        <div class="profile-controls">
                                            <a href="" class="profile-control-left">
                                                <span class="fa fa-info"></span>
                                            </a>
                                            <script>
                                                function editData() {
                                                    var view = document.getElementsByClassName("view");
                                                    for (var i = 0; i < view.length; i++) {
                                                        view[i].style.display = "none";
                                                    }
                                                    var edit = document.getElementsByClassName("edit");
                                                    for (var i = 0; i < edit.length; i++) {
                                                        edit[i].style.display = "block";
                                                    }
                                                }


                                            </script>
                                            

                                            <a href="" class="profile-control-right">
                                                <span class="fa fa-edit"></span>
                                            </a>
                                            
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="contact-info">
                                            <p>
                                                <small>CIN :</small>
                                                <?php echo $row['cin']?>
                                            </p>
                                            <p>
                                                <small>Account Number</small>
                                                <br/>
                                                <?php echo $row['account_no']?>
                                            </p>
                                            <p>
                                                <small>Current Balance</small>
                                                <br/>
                                                <?php echo $row['balance']?>
                                            </p>
                                            <p>
                                                <small>Email Address</small>
                                                <br/>
                                                <span class="view">
                                                    <?php echo $row['email']?>
                                                </span>
                                            </p>

                                            <p>
                                                <small>Address</small>
                                                <br/>
                                                <span class="view">
                                                    <?php echo $row['city']?>,
                                                    <?php echo $row['state']?>,
                                                    <?php echo $row['pincode']?>
                                                </span>


                                            </p>
                                            <button class=".btn-rounded edit" style="color:#1f16db; margin-top:20px; display:none;" id="save<?php echo $i?>" onclick="saveData()">save</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- END CONTACT ITEM -->
                            </div>
                            <?php $i++; } ?>
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
                        <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
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