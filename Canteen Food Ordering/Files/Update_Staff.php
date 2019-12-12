<html>
    <style>
        .ce{
            margin-top: -19%;
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
        $message="";
        echo '<div class="ce"><center>'; 
        if(isset($_POST['empty'])){
            echo "Select any filed to Make changes";
        }
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            
            if(isset($_POST['n_salary']) and $_POST['n_salary'] > 0  )
            {
                $u = $_POST['n_user'];
                $e = $_POST['n_email'];
                $s = $_POST['n_salary'];
                
                $sql = $conn->prepare("UPDATE Login set Email=?,Salary =? where Username=?");
               
                $sql->execute(array($e,$s,$u));
               
                $message="Deatsils of ".$u." Changed  ";
                

            }
             
            // sql to create table
             if($message!="")
             {
                echo "<center><h1>".$message."</h1></center>"; 
             }
            $sql = "SELECT * FROM Login ";

            $query=$conn->query($sql);
            $c=$query->rowCount();
           
            echo "<h1>Staff Update</h1>No of Employees: ".$c."</h3>";
            echo '<form action="FinalUpdate_Staff.php" method="post">'; 

            if( $c > 0)
            {    

                ?>
                <center>
                <table border="2" width="500">
                <tr>
                    <td>
                        Username
                    </td>
                    <td>
                        Designation
                    </td>
                    <td>
                        Email
                    </td>
                    <td>
                        Salary
                    </td>
                    <td>
                        Update
                    </td>
                </tr>

        <?php
                while($r=$query->fetch())
                {

                    echo "<tr>";
                    echo '<td>'.$r["Username"].'</td><td>'.$r["Designation"].'</td><td>'.$r["Email"]."</td><td>".$r["Salary"]."</td>";

                    echo '<td>  <input type="radio" name="Staff" value="'.$r["Username"].' "/>  </td>';
                    echo "</tr>";


                }
                echo '</table> </center>';
            }
            else
            {
                ?>
                <center>
                    <h3>No staff !!!</h3></center>

                <?php
            }
            if( $c  > 0)
            {
                echo "<br><br><input type='submit' value='Update Staff Deatils' />";
            }

            echo "</form>";

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