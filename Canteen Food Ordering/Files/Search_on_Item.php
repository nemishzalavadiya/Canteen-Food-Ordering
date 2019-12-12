<?php
include 'transfer.php';
                    
                    if(!isset($_SESSION['username']))
                    {
                        header("Location:Login.php?first=LoginFirst");
                    }
$flag = 0;
if(isset($_POST['Search_Key']))
{
    $flag = 1;
}

?>
<html>
    <head>
        <title>Search_On Item</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <div class="ce">
    <center>
        <form action="" method="POST">
            <input type="text" name="Search_Key" placeholder="Enter item name " required >
            <br>
            <input type="submit"/>
        </form>
        
    </center>

<?php
if($flag == 1)
{
    
    $tc=0;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "PhpProject";
    $Key = $_POST['Search_Key'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select * from Menu where ItemName='".$Key."'";
        $query= $conn->query($sql);
        $c = $query->rowCount();
       
        if($c > 0)
        {
             echo '<center><table border="2" width="500">';
        echo '<thead>
            <td>
                Type
            </td>
            <td>
                Item
            </td>
            <td>
                Price
            </td>
            
        </thead>';
            echo "<h2><strong>Searched Key Word Is found<br></strong></h2>";
            while($r = $query->fetch())
            {
                echo "<tr><td>".$r['Category']."</td><td>".$r['ItemName']."</td><td>".$r['Price']."</td></tr>";
            }
            echo '</table>';
        }
        else {
            echo "<center><h2><strong>Searched Key Word Is Not Found<br></strong></h2>";
        }
                

        echo "<h2> <strong> ItemName Starting With ".$Key."</strong></h2>";
        $regex= "/^".$Key.".+$/";
        $sql = "select * from Menu" ;
        $query= $conn->query($sql);
        echo '<center><table border="2" width="500">';
        echo '<thead>
            <td>
                Type
            </td>
            <td>
                Item
            </td>
            <td>
                Price
            </td>
            
        </thead>';
        while($r = $query->fetch())
        {
            if(preg_match($regex, $r['ItemName']))
            {
                echo "<tr><td>".$r['Category']."</td><td>".$r['ItemName']."</td><td>".$r['Price']."</td></tr>";
            }
        }
        echo "</table><center>";

    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
    }
    echo '<div>';
?>
    </body>
</html>
