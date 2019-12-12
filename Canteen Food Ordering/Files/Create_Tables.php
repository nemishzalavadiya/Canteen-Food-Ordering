 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PhpProject";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   
     $sql = "CREATE TABLE Login  (
    Username VARCHAR(30) PRIMARY KEY NOT NULL,
    Password VARCHAR(30) NOT NULL ,
    Designation VARCHAR(10) NOT NULL,
    Email VARCHAR(50) NOT NULL,
    Salary VARCHAR(10) NOT NULL
    )";

    $query=$conn->query($sql);
    echo "Table Login created successfully<br>";
    
   
   
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?> 