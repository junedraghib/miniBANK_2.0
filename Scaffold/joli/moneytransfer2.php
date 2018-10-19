<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        td,
        th {
            border: 2px solid black;
            padding: 10px;
            font-weight: bold;
        }

        input {
            margin-top: 10px;
            float: right;
        }

        th {
            text-align: left;
        }
    </style>

</head>

<body>
<?php
    $payer = $_GET['payer'];
    $payee = $_GET['payee'];
    $amt = $_GET['amt'];
    $con = mysqli_connect('localhost','root','raghib@1998','juned');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con,"ajax_demo");
    if (isset($_GET['submit12']))
    {
        $sql="SELECT * from usrAcc where account_no=(select getAcc($payee))";
        $result = mysqli_query($con,$sql);
        $result1 = mysqli_query($con,$sql);
        $row1 = mysqli_fetch_array($result1);
        echo "<div id='payer_acc' style='display : none;'>".$payer."</div>";
        echo "<div id='payee_acc' style='display : none;'>".$payee."</div>";
        echo "<div id='amt' style='display : none;'>".$amt."</div>";
        echo "<table>";
        while($row = mysqli_fetch_array($result))
        {
        
        echo "<tr>";
        echo "<td>Payee Name </td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Payee Account</td>";
        echo "<td>" . $row['account_no'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Payee CIN </td>";
        echo "<td>" . $row['cin'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Amount</td>";
        echo "<td>" . $amt . "</td>";
        echo "</tr>";
        }
        echo "</table>";
        echo "<input type='submit' name='pay' id='pay' value='Pay Now' onclick='payNow()'>";
    }
    mysqli_close($con);
    if (isset($_GET['pay']))
    {  
       
        $mysqli = new mysqli("localhost", "root", "raghib@1998", "juned");
        if ($mysqli->connect_errno)
        {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        if (!$mysqli->query("call transfermoney('$payer','$payee',$amt)"))
        {
            echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }
        else
        {
            echo "<h3>Congratulation!!</h3>";  
            echo "<h4>Your Transaction has been completed successfully.</h4>";    
        }
        $mysqli->close();
    }

?>
</body>

</html>
