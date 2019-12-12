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
    $dbhandler = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    	
    $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 
        if(!empty($_POST['foodlist']) or !empty($_POST['dessertlist'])){
            // Loop to store and display values of individual checked checkbox.
            $Order_food='';
            $Food_Price=0;
            echo '<center>Selected Itrems : </center>';
           echo '<br><center><h2>Food</h2></center>';
            echo '<center><table border="2" width="500">';
        echo '<thead>
           
            <td>
                Item
            </td>
            <td>
                Price
            </td>
            <td>
                Quantity
            </td>
        </thead>';
     
            foreach($_POST['foodlist'] as $selected){
                
                $name = $selected."Price";
                $temp = (int)$_POST[$selected]*(int)$_POST[$name];  
                $Order_food = $Order_food.$selected.' '.$_POST[$name].'*'.$_POST[$selected].'.';

                echo '<tr><td>'.$selected."</td >".'<td>'.$temp."</td ><td>".$_POST[$selected]."</td ></tr>";
                $Food_Price+=$temp;
                
            }
          
            echo '</table>';
            $Order_food ='Total Food Price='.$Food_Price;
            echo ''.$Order_food.'<br>';
            
           echo '<br><center><h2>Dessert</h2></center>';
            echo '<center><table border="2" width="500">';
        echo '<thead>
           
            <td>
                Item
            </td>
            <td>
                Price
            </td>
            <td>
                Quantity
            </td>
        </thead>';
            
            $Order_Dessert='';
            $Dessert_Price=0;
            if(!empty($_POST['dessertlist']))
            {
            foreach($_POST['dessertlist'] as $selected){
                
                $name = $selected."Price";
                $temp = (int)$_POST[$selected]*(int)$_POST[$name];  
                $Order_Dessert = $Order_Dessert.$selected.'    '.$_POST[$name].'*'.$temp.'.';

                echo '<tr><td>'.$selected."</td >".'<td>'.$temp."</td ><td>".$_POST[$selected]."</td ></tr>";
                $Dessert_Price+=$temp;
                
            }
            }
            echo '</table>';
            $Order_Dessert ='Total Dessert Price='.$Dessert_Price;
            echo $Order_Dessert.'<br>';
            $Total_price=(int)$Food_Price + (int)$Dessert_Price;
            
           // print_r($dbhandler);
            $sql="insert into Ordering (Food,Dessert,Total_Price,Date_of_Order,Ch) values ('$Order_food','$Order_Dessert','$Total_price',   now(),'0')";
            $query=$dbhandler->query($sql);
            echo '<br><h2>Total Price :'.$Total_price.'</h2>';
            echo "<a href='MakeOrder.php'><button>Paid</button></a>";
        }
        else {
            ?><center>
        <h2> You can not place an empty order </h2>
        <a href='MakeOrder.php'><button>Place_Order</button></a></center>
<?php
        }
    

}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?> 

       