<?php
                $payer_acc=$_POST['payer_acc_no'];
                $acc_no=$_POST['acc_no'];
                $amt=$_POST['amt'];
                $db=mysqli_connect("localhost","root","raghib@1998","juned");
                
                $query="call transfermoney($payer_acc,$acc_no,$amt)";
                $result=mysqli_query($db,$query) or die("transfer couldnt be completed!!");
                mysqli_close($db);
                
?>