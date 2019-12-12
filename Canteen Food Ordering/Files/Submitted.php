

<?php
include 'transfer.php';
if(!isset($_SESSION['username']))
{
    header("Location:Login.php?first=LoginFirst");
}
if(isset($_POST['orderlist'])){
        echo '<center>';
               

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "PhpProject";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // sql to create table


            if( !empty($_POST['orderlist']) )
            {
                foreach ($_POST['orderlist'] as $order_no)
                {
                    $sql = "UPDATE Ordering SET Ch='1' where OrderNo='".$order_no."'";

                    $query=$conn->query($sql);

                    header('Location:Display_order.php?orderno='.$order_no);
                }
            }
            else 
            {
                echo " no order to submmit";

            }

           echo '</center>'; 


        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
}
else{
    header('Location:Display_order.php?order=none');
}
?> 
    