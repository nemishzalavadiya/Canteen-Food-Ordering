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
        $message="";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if(isset($_POST['o_name']) and isset($_POST['n_name']))
            {
                $sql = "DELETE FROM Menu where ItemName='".$_POST['o_name']."'";
                $query=$conn->query($sql);
                $ty = $_POST['n_type'];
                $in = $_POST['n_name'];
                $p = $_POST['n_price'];
                $sql = "INSERT into Menu (Category,ItemName,Price) values('$ty','$in','$p')";
                $query=$conn->query($sql);
                $message=$_POST['o_name']." Changed to ".$in;
                

            }
             echo '<div class="ce"><center>'; 
            // sql to create table
             if($message!="")
             {
                echo "<center><h1>".$message."</h1></center>"; 
             }
            $sql = "SELECT * FROM Menu ";

            $query=$conn->query($sql);
            $c=$query->rowCount();
           
            echo "<h1> Menu</h1>No of Items: ".$c."</h3>";
            echo '<form action="FinalUpdate.php" method="POST">'; 

            if( $c > 0)
            {    

                ?>
                <center>
                <table border="2" width="500">
                <tr>
                    <td>
                        Category
                    </td>
                    <td>
                        Item Name
                    </td>
                    <td>
                        Price
                    </td>
                    <td>
                        Update
                    </td>
                </tr>

        <?php
                while($r=$query->fetch())
                {

                    echo "<tr>";
                    echo '<td>'.$r["Category"].'</td><td>'.$r["ItemName"].'</td><td>'.$r["Price"];

                    echo '<td>  <input type="radio" name="food" value="'.$r["ItemName"].' "/>  </td>';
                    echo "</tr>";


                }
                echo '</table> </center>';
            }
            else
            {
                ?>
                <center>
                    <h3>Menu is empty !!!</h3></center>

                <?php
            }
            if( $c  > 0)
            {
                echo "<br><br><input type='submit' value='Update Selected Item' />";
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