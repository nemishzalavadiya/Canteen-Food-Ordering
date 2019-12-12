<html>
    <style>
        .form{
            background-color: #ccc;
            margin-left: 15%;
            margin-right: 20%;
            padding-left: 0%;
            border-radius: 5% 5% 10% 5%;
            
        }
        
    </style>
</html>
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
    echo "<div class='ce'>";
    if( isset($_POST['Staff']))
    {
        $sql="select * from Login where Username='".$_POST['Staff']."'";    
        $query=$conn->query($sql);
        $r=$query->fetch();
        echo "<div class='form'>";
        echo '<form action="Update_Staff.php" method="post">';
              echo '<div style="display: flex">
                  <div style="margin-left: 10%">
                      <h2>Old Values</h2>';
                      echo '<h3>Type   <input type="text" value="'.$r["Username"].'" name="o_user" readonly/></h3>';
                      echo '<h3>Name <input type="text" value="'.$r["Designation"].'" name="o_designation" readonly/></h3>';
                      echo '<h3>Email  <input type="email" value="'.$r["Email"].'" name="o_email" readonly/></h3>';
                      echo '<h3>Price  <input type="text" value="'.$r["Salary"].'" name="o_salary" readonly/></h3>';
                      
                  echo '</div>
                  <div style="margin-left: 150px">
                      <h2>Enter new values</h2>';
                      echo '<input type="text" value="'.$r["Username"].'" name="n_user" readonly/><br><br>';
                      echo '<input type="text" value="'.$r["Designation"].'" name="n_designation" readonly/><br><br>';
                      echo '<input type="email" value="'.$r["Email"].'" name="n_email" required/><br><br>';
                      echo '<input type="text" value="'.$r["Salary"].'" name="n_salary" required/>';
                  echo '</div>
              </div>

             
              <center><input type="submit" value="Make Changes"/></center>
          </form>';
           echo '</div>';       
           echo '</div>';

    }
 else {
    
       header("Location:Update_Staff.php?empty=nothing");
    }
    
    
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?> 
