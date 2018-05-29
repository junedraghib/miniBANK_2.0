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
    				$username= $_SESSION['username'];
                    $password= $_SESSION['password'];
                    $db=mysqli_connect("localhost","root","raghib@1998","juned");
                    $query="SELECT * from admin WHERE username='$username' AND password='$password'";
                    
                    $getmessage="SELECT count(message) as messages from notification ";
                    $message="SELECT * from notification order by date_of_notification desc,time_of_notification desc";
                    $messageall="SELECT * from notification order by date_of_notification desc,time_of_notification desc";
                    $result=mysqli_query($db,$query) or die("login couldnt be completed!!");
                    
                    $getmessageresult=mysqli_query($db,$getmessage) or die("account no couldnt be found!!");   
                    $messageresult=mysqli_query($db,$message) or die("account no couldnt be found!!"); 
                    $messageallresult=mysqli_query($db,$messageall) or die("account no couldnt be found!!");   
                    $row=mysqli_fetch_array($result);
                    
                    $getmessagerow=mysqli_fetch_array($getmessageresult); 
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
                            <div class="profile-data-name"><?php echo $row['name']?></div>
                            <div class="profile-data-title"><?php echo $row['username']?><</div>
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
                    <a href="#">
                        <span class="fa fa-users"></span>
                        <span class="xn-text"> Users</span>
                    </a>
                    <ul>
                
                        <li>
                            <a href="users-saving-deposit.html">
                                <span class="fa fa-archive"></span> Saving Deposit</a>
                        </li>
                        <li>
                            <a href="users-fixed-deposit.html">
                                <span class="fa fa-flash"></span> Fixed Deposit</a>
                        </li>
                        <li>
                            <a href="users-current-deposit.html">
                                <span class="fa fa-credit-card"></span> Current Deposit</a>
                        </li>
                        <li>
                            <a href="users-recurring-deposit.html">
                                <span class="fa fa-sort-amount-desc"></span> Recurring Deposit</a>
                        </li>
                    </ul>
                </li>
            
                
                <li>
                    <a href="pages-address-book.html">
                        <span class="fa fa-download"></span> Deposit</a>
                </li>
                <li>
                    <a href="pages-address-book.html">
                        <span class="fa fa-briefcase"></span> Withdrawal</a>
                </li>
                <li>
                    <a href="pages-address-book.html">
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
                    <a href="messages.html">
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
               
                <!-- END TASKS -->
            </ul>
            <!-- END X-NAVIGATION VERTICAL -->

            <!-- START BREADCRUMB -->
            <ul class="breadcrumb push-down-0">
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">Pages</a>
                </li>
                <li class="active">Messages</li>
            </ul>
            <!-- END BREADCRUMB -->

            <!-- START CONTENT FRAME -->
            <div class="content-frame">
                <!-- START CONTENT FRAME TOP -->
                <div class="content-frame-top">
                    <div class="page-title">
                        <h2>
                            <span class="fa fa-comments"></span> Messages From Users</h2>
                    </div>
                    <div class="pull-right">
                        <button class="btn btn-default content-frame-right-toggle">
                            <span class="fa fa-bars"></span>
                        </button>
                    </div>
                </div>
                <!-- END CONTENT FRAME TOP -->

                <!-- START CONTENT FRAME RIGHT -->
                <div class="content-frame-right">

                    <div class="col-md-12" style="height :100%; max-height: 430px; overflow-y: scroll; margin-bottom:1px;">
                        <div class="list-group list-group-contacts border-bottom push-down-10">
                            <a href="#" class="list-group-item">
                                <div class="list-group-status status-online"></div>
                                <img src="assets/images/users/user.jpg" class="pull-left" alt="Dmitry Ivaniuk">
                                <span class="contacts-title">Dmitry Ivaniuk</span>
                                <p>Hello my friend, how are...</p>
                            </a>
                            
                        </div>
                        
                    </div>
                    <div class="col-md-3" style=" width:100%; margin-top:1px;">
                        <div class="panel panel-default push-up-10">
                            <div class="panel-body panel-body-search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="search..." />
                                    <div class="input-group-btn">
                                        <button class="btn btn-default">
                                            <span class="fa fa-search"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                </div>
                <!-- END CONTENT FRAME RIGHT -->

                <!-- START CONTENT FRAME BODY -->
                <div class="content-frame-body content-frame-body-left">

                    
                    <div class="col-md-12" id="msg" style="height : 100%; max-height: 430px; overflow: auto; margin-bottom:1px;" >
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
                    <div class="col-md-7" style=" width:100%; margin-top:1px;">
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
                                    <input type="text" class="form-control" placeholder="Your message..." />
                                    <div class="input-group-btn">
                                        <button class="btn btn-default">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                </div>
                
                <!-- END CONTENT FRAME BODY -->
            </div>
            
            <!-- END PAGE CONTENT FRAME -->
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

    <!-- THIS PAGE PLUGINS -->
    <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
    <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
    <!-- END PAGE PLUGINS -->

    <!-- START TEMPLATE -->
    <script type="text/javascript" src="js/settings.js"></script>

    <script type="text/javascript" src="js/plugins.js"></script>
    <script type="text/javascript" src="js/actions.js"></script>
    <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->
</body>

</html>