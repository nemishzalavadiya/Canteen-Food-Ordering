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

            $tc=0;
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "PhpProject";


            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // sql to create table
                $sql = "SELECT * FROM Menu where Category != 'dessert'";

                $query=$conn->query($sql);
                $c=$query->rowCount();
                $tc+=$c;
                echo '<div class="ce">';   
                echo "<center><h1> Menu</h1>";
                echo "<h3> Food.<br>No of Items: ".$c."</h3>";
                echo '<form action="FinalDelete.php" method="POST">'; 

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
                            To be Deleted?
                        </td>
                    </tr>

                <?php
                    while($r=$query->fetch())
                    {

                        echo "<tr>";
                        echo '<td>'.$r["Category"].'</td><td>'.$r["ItemName"].'</td><td>'.$r["Price"];

                        echo '<td>  <input type="checkbox" name="foodlist[]" value="'.$r["ItemName"].'"/>  </td>';
                        echo "</tr>";


                    }
                    echo '</table> </center>';
                }
                else
                {
                    ?>
                   <center>
                        <h3>Food menu is empty !!!</h3></center>
                   
                    <?php
                }

                $sql = "SELECT * FROM Menu where Category = 'dessert'";

                $query=$conn->query($sql);
                $c=$query->rowCount();
                $tc += $c;
                echo "<center><h3>Dessert.<br>No of Items: ".$c."</h3>";
                if( $c > 0)
                {    
                   
                    ?>
                    <center>
                    <form action="" method="POST"> 
                    <table border="2" width="500">
                    <tr>
                        <td>
                            Item Name
                        </td>
                        <td>
                            Price
                        </td>
                        <td>
                            To be Deleted?
                        </td>
                    </tr>

            <?php
                    while($r=$query->fetch())
                    {

                        echo "<tr>";
                        echo '<td>'.$r["ItemName"].'</td><td>'.$r["Price"];

                        echo '<td>  <input type="checkbox" name="dessertlist[]" value="'.$r["ItemName"].'"/>  </td>';
                        echo "</tr>";


                    }
                    echo '</table> </center>';
                }
                else
                {
                    ?>
                   <center>
                        <h3>Dessert Menu Empty</h3></center>
                    <?php
                }
                //echo $tc;
                if( $tc  > 0)
                {
                    echo "<br><br><input type='submit' value='Delete Selected Values'/>";
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
        