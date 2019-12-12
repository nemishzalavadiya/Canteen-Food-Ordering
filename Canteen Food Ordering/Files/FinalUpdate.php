<html>
    <style>
               @media(min-width:760px){
        .ce{
            margin-top: -17%;
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
    echo "<div class='ce'>";
    if( isset($_POST['food']))
    {
        $sql="select * from Menu where ItemName='".$_POST['food']."'";    
        $query=$conn->query($sql);
        $r=$query->fetch();
        
        echo '<form action="Update.php" method="post">';
              echo '<div style="display: flex">
                  <div style="margin-left: 30%">
                      <h2>Old Values</h2>';
                      echo '<h3>Type:<input type="text" value="'.$r["Category"].'" name="o_type" readonly/></h3>';
                      echo '<h3>Name:<input type="text" value="'.$r["ItemName"].'" name="o_name" readonly/></h3>';
                      echo '<h3>Price:<input type="text" value="'.$r["Price"].'" name="o_price" readonly/></h3>';

                  echo '</div>
                  <div style="margin-left: 150px">
                      <h2>Enter new values</h2>';
                      echo '<input type="text" value="'.$r["Category"].'" name="n_type" required/><br><br>';
                      echo '<input type="text" value="'.$r["ItemName"].'" name="n_name" required/><br><br>';
                      echo '<input type="text" value="'.$r["Price"].'" name="n_price" required/>';
                  echo '</div>
              </div>

             
              <center><input type="submit" value="Make Changes"/></center>
          </form>';
           echo '</div>';       


    }
 else {
    
       header("Location:Update.php");
    }
    
    
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?> 
                </div>
</body>
</html>     