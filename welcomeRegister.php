<?php
session_start();
$_SESSION['username']=$_POST['reg_username'];
$_SESSION['password']=$_POST['reg_password'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="welcomeRegister.css">
    <?php
        $username=$_SESSION['username'];
        $password=$_SESSION['password'];
        echo $username;
        echo $password;
        $password_confirm=$_POST['reg_password_confirm'];
        $email=$_POST['reg_email'];
        $name=$_POST['reg_fullname'];
        $gender=$_POST['reg_gender'];
        $dob=$_POST['reg_dob'];
        $city=$_POST['reg_city'];
        $state=$_POST['reg_state'];
        $pincode=$_POST['reg_pincode'];
        $cust_type=$_POST['reg_cust_type'];
        $account_type=$_POST['account_type'];
        $reg_agree=$_POST['reg_agree'];
        $dc=mysqli_connect("localhost","root","raghib@1998", "juned")or die('Error connecting to MySQL server.');
        $query="INSERT INTO user(username,password,email,name,gender,dob,city,state,pincode,cust_type,account_type)VALUES('$username','$password','$email','$name','$gender','$dob','$city','$state',$pincode,'$cust_type','$account_type')";
        $result=mysqli_query($dc,$query) or die("registration couldnt be completed!!");
        mysqli_close($dc);
        
        header("Location:Scaffold/joli/login1.php"); 
        //exit;
    ?>


    <title>Document</title>
</head>

<body>
    
</body>

</html>