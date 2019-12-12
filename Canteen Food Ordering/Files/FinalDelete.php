<html>
    <style>
               @media(min-width:760px){
        .ce{
            margin-top: -15%;
        }
        }
    </style>
<body>

<?php
include 'main_1.php';
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
     
    echo '<center>';  
     echo '<div class="ce">'; 
    if(!empty($_POST['foodlist']) or !empty($_POST['dessertlist']))
    {
        echo "<h1>Deleted Item[s]:<br></h1>";
        if(!empty($_POST['foodlist']))
        {
            echo "<h2> Food:</h2>";
            echo "[ ";
            foreach ($_POST['foodlist'] as $food)
            {
                $sql = "DELETE FROM Menu where ItemName='".$food."'";
                echo "<strong>".$food."</strong>,";
                $query=$conn->query($sql);

            }
            echo " ]";
            
        }
        
        
        if(!empty($_POST['dessertlist']))
        {
            echo "<h2> Dessert:</h2><br>";
            echo "[ ";
            foreach ($_POST['dessertlist'] as $dessert)
            {
                $sql = "DELETE FROM Menu where ItemName='".$dessert."'";
                echo "<strong>".$dessert."</strong>,";
    
                $query=$conn->query($sql);

            }
            echo " ]";
        }
    }
    else {
    ?>
<h3> No item selected to Delete.</h3>
<?php
    }
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?> 
        
</center>
                </div>
</body>
</html>   