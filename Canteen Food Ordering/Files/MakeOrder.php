 <?php
 
include 'transfer.php';
         if(!isset($_SESSION['username']))
                    {
                        header("Location:Login.php?first=LoginFirst");
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
    $sql = "SELECT * FROM Menu";

    $query=$conn->query($sql);
  //  echo "Query successfully executed.";
    echo "<center><h1>FOOD</h1></center>";
    ?>
<center>
    <form action="PrintBill.php" method="POST"> 
<table border="2" width="500">
    <tr>
        <td>
            ch
        </td>
        <td>
            Categories
        </td>
        <td>
            Item Name
        </td>
        <td>
            Price
        </td>
        <td>
            Quantity
        </td>
    </tr>
    
<?php
    while($r=$query->fetch())
    {
        if($r['Category'] != "dessert")
        {
            echo "<tr>";
            echo '<td>  <input type="checkbox" name="foodlist[]" value="'.$r["ItemName"].'"/>  </td>';
         
            $name=$r['ItemName']."Price";
           // echo '<td>'.$name.'<td>';
            echo "<input type='hidden' name='".$name."' value='".$r['Price']."'/>";
            echo "<td>".$r['Category']." </td>  <td>  ". $r['ItemName'] ."  </td>   <td> ".$r['Price']."   </td> ";
            echo '<td><select name="'.$r["ItemName"].'">';
            for($i = 1; $i <= 15; $i++)
            {
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
            echo "</td>";
            echo "</tr>";
        }
    }
    ?>
</table>
    <h1>DESSERT</h1>
    <table border="2" width="500">
        <tr>
            <td>
                ch
            </td>
            <td>
                Categories
            </td>
            <td>
                Item Name
            </td>
            <td>
                Price
            </td>
            <td>
                Quantity
            </td>
        </tr>
            
    <?php
        $query=$conn->query($sql);

    while($r=$query->fetch())
    {
        if($r['Category'] == "dessert")
        {
            echo "<tr>";
            echo '<td>   <input type="checkbox" name="dessertlist[]" value="'.$r["ItemName"].'"/>  </td>';
         
            $name=$r['ItemName']."Price";
            echo "<input type='hidden' name='".$name."' value='".$r['Price']."'/>";
            echo "<td>  ".$r['Category']." </td>  <td>  ". $r['ItemName'] ."  </td>   <td> ".$r['Price']."   </td> ";
            echo '<td><select name="'.$r["ItemName"].'">';
            for($i = 1; $i <= 15; $i++)
            {
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
            echo "</td>";
            echo "</tr>";
        }
    }
    echo '</table>';
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?> 
        <input type="submit" value="MakeOrder" name="Placed"/>
    </form>
</center>
