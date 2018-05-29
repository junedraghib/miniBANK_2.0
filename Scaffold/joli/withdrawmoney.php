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
$from_acc= $_GET['from_acc'];
$withdrawamt = $_GET['withdrawamt'];
if (isset($_GET['withdrawbutton']))
{  
    $mysqli = new mysqli("localhost", "root", "raghib@1998", "juned");
    if ($mysqli->connect_errno)
    {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    if (!$mysqli->query("call withdrawmoney('$from_acc',$withdrawamt)"))
    {
        echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    else
    {
        echo "<h3>Transaction Completed!!</h3>";  
        echo "<h4>Rs ".$withdrawamt." has been withdrawn successfully from your Account ".$from_acc.".</h4>";    
    }
    $mysqli->close();
}

?>
</body>
</html>