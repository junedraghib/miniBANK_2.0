<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 3</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="user.css">
    <?php
        $username=$_POST['lg_username'];
        $password=$_POST['lg_password'];
        $db=mysqli_connect("localhost","root","raghib@1998","juned");
        
        $query="SELECT * from user WHERE username='$username' AND password='$password'";
        $result=mysqli_query($db,$query) 
        or die("login couldnt be completed!!");
        $row=mysqli_fetch_array($result);
        mysqli_close($db);
        
    ?>
</head>

<body>



    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header" style="align-content : center">
                <img src=" http://via.placeholder.com/200x200" alt="Avatar" style="border-radius : 50%; " align="middle">
                <h2><?php echo $row['name']?></h2>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="#">Account Detail</a>
                </li>
                <li>
                    <a href="#">Transactions</a>
                </li>
                <li>
                    <a href="#">Loan</a>
                </li>
                <li>
                    <a href="#">Fund Transfer</a>
                </li>
                <li>
                    <a href="#">Payment</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="index.html" class="download">Log Out</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content" class="container">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn" style="display : inline-block">
                        <i class="glyphicon glyphicon-align-justify"></i>
                    </button>
                    <div class="logo" style="display : inline-block;"> miniBANK </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Account Detail</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Account Type</td>
                                <td><?php echo $row['account_type']?></td>
                            </tr>
                            <tr>
                                <td>Customer Type</td>
                                <td><?php echo $row['cust_type']?></td>
                            </tr>
                            <tr>
                                <td>Account Holder</td>
                                <td><?php echo $row['name']?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $row['email']?></td>
                            </tr>
                            <tr>
                                <td>Date Of Birth</td>
                                <td><?php echo $row['dob']?></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><?php echo $row['gender']?></td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td><?php echo $row['city']?></td>
                            </tr>
                            <tr>
                                <td>State</td>
                                <td><?php echo $row['state']?></td>
                            </tr>
                            <tr>
                                <td>Pin Code</td>
                                <td><?php echo $row['pincode']?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>





    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>