
        
    <?php
    include 'transfer.php';
                    
                    if(!isset($_SESSION['username']))
                    {
                        header("Location:Login.php?first=LoginFirst");
                    }
$tc=0;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PhpProject";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM Ordering where Date_of_Order='".$_POST['Order_Date']."'";
    echo "<center>";
    $query = $conn->query($sql);
    $c=$query->rowCount();
    if($c > 0)
    {
            echo "<h2>There are ".$c." Orders On Date : ".$_POST['Order_Date']."</h2>"
        ?>
        <table border="2" width="500">
        <tr>
            <td>
                Order_NO
            </td>
            <td>
                Food
            </td>
            <td>
                Dessert
            </td>
            <td>
                Total_Price
            </td>
            <td>
                Is Done ?
            </td>
        </tr>
            
    <?php
        while($r = $query->fetch() )
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
            echo "</td><td>".$r['Total_Price'].'</td><td>';
            if($r['Ch'] == 1)
            {
                echo 'Yes</td>';
            }else {
                echo 'No</td>';
            }
            
            
            echo "</tr>";
        }
        echo "</table>";
    }else {
        echo "<h3> No Order is found on date ".$_POST['Order_Date']."</h3>";
    }




 
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?> 
   
</center>    