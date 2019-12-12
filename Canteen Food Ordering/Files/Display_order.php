<html lang="en">
<head>
    <meta charset="UTF-8" http-equiv="refresh" content="10">
    <title>Title</title>
</head>
 <?php
include 'transfer.php';
         if(!isset($_SESSION['username']))
                    {
                        header("Location:Login.php?first=LoginFirst");
                    }
         
 if(isset($_GET['order']))
 {
     echo "<center>Select Order To Submited</center>";
 }
  if(isset($_GET['orderno']))
 {
     echo "<center><h1>Order_No ".$_GET['orderno']." Submited Successfully</h1></center>";
 }
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PhpProject";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "SELECT * FROM Ordering where Ch = '0'";
    
    $query=$conn->query($sql);
    $c=$query->rowCount();
    
    echo "<center><h1><hr>No of Orders: ".$c."</h1></center>";
    if( $c > 0)
    {    
        echo "<hr>";
        ?>
        <center>
        <form action="Submitted.php" method="POST"> 
        <table border="2" width="500">
        <tr>
            <td>
                Order_NO
            </td>
            <td>
                Food price*quantity
            </td>
            <td>
                Dessert
            </td>
            <td>
                Total_Price
            </td>
            <td>
                Delivered?
            </td>
        </tr>

<?php
        while($r=$query->fetch())
        {
        
            echo "<tr>";
            echo '<td>'.$r["OrderNo"].'</td><td>';
            
            $fo_st=$r['Food'];
            for($i = 0; $i <= strlen($fo_st) - 1; $i++)
            {
                echo $fo_st[$i];
                if($fo_st[$i] == '.')
                {
                    echo '<br>';
                }
            }
            echo "</td><td>";
            
            $de_st=$r['Dessert'];
            for($i = 0; $i <= strlen($de_st) - 1; $i++)
            {
                echo $de_st[$i];
                if($de_st[$i] == '.')
                {
                    echo '<br>';
                }
            }
            echo "</td><td>".$r['Total_Price'].'</td>';
            echo '<td>  <input type="checkbox" name="orderlist[]" value="'.$r["OrderNo"].'"/>  </td>';
            echo "</tr>";
        
            
        }
        echo '</table> <input type="submit" value="Update" name="Placed"/> </form></center>';
    }
    else
    {
        ?>
        <hr><center>
            <h1>No Orders left</h1></center>
        <?php
    }
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?> 

        </html>