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
$to_acc= $_GET['to_acc'];
$depositamt = $_GET['depositamt'];
if (isset($_GET['depositbutton']))
{  
    $mysqli = new mysqli("localhost", "root", "raghib@1998", "juned");
    if ($mysqli->connect_errno)
    {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    if (!$mysqli->query("call depositmoney('$to_acc',$depositamt)"))
    {
        echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    else
    {
        echo "<h3>Congratulation!!</h3>";  
        echo "<h4>Rs ".$depositamt." has been deposited successfully to your Account ".$to_acc.".</h4>";    
    }
    $mysqli->close();
}

?>
</body>
</html>