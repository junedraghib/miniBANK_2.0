<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 2px solid black;
    padding: 10px;
    font-weight : bold;
}
input{
    margin-top:10px;
    float:right;
}

th {text-align: left;}
</style>
</head>
<body>
    <?php
$payer1 = $_GET['payer1'];
$payee1 = $_GET['payee1'];
$amt1 = $_GET['amt1'];
if (isset($_GET['pay']))
{  
    echo "<script>alert('i m in paynow!!')</script>";
    $mysqli = new mysqli("localhost", "root", "raghib@1998", "juned");
    if ($mysqli->connect_errno)
    {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    if (!$mysqli->query("call transfermoney('$payer1','$payee1',$amt1)"))
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

if (isset($_GET['pay12']))
{  
    echo "<script>alert('i m in paynow!!')</script>";
    $mysqli = new mysqli("localhost", "root", "raghib@1998", "juned");
    if ($mysqli->connect_errno)
    {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    if (!$mysqli->query("call transfermoney(getAcc($payer1),getAcc($payee1),$amt1)"))
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
