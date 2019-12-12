<!DOCTYPE html>
<html>
<head>
	<title>Show Data</title>
</head>
<style>
  @media(min-width:760px){
   
   .posional{
        margin-top: -18%;
        margin-left:24% ;
    }
    .container{
        display: flex;
    }
    .container > div{
        margin-right: 20px;
    }
    
  }
  td{
        margin:5%;
        padding:5%;
        font-size: 80%;
        width: 20%;
    }
    .front{
        height: 27%;
    }
  @media(max-width:760px)
  {
      .posional{
       
        margin-left:15% ;
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
         
             try{
            $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=PhpProject','root','');
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
            //$type=$_GET['type'];
            //$itemname=$_GET['item_name'];
            //$price=$_GET['price']; 
            $sql="select * from Menu";
            $query=$dbhandler->query($sql);
            echo "<div class='posional'>";
                    echo "<div class='container'>";
                            echo "<div class='container1'>";
                            echo "<h1>Gujarati</h1>";
                            echo "<table border='1'><thead><td>Item</td><td>Price</td></thead>";

                            while($r=$query->fetch())
                            {
                                if($r['Category']=="gujarati"){
                                echo "<tr><td>".$r['ItemName'].'</td><td>'.$r['Price']."</td></tr>";
                                }
                            }
                            echo "</table>";
                             echo '</div>';
                                    echo "<div class='container2'>";
                                    echo "<h1>Punjabi</h1>";
                                    $query=$dbhandler->query($sql);
                                    echo "<table border='1'><thead><td>Item</td><td>Price</td></thead>";
                                    while($r=$query->fetch())
                                    {
                                        if($r['Category']=="punjabi"){
                                        echo "<tr><td>".$r['ItemName'].'</td><td>'.$r['Price']."</td></tr>";
                                        }
                                    }
                                    echo "</table>";
                                     echo '</div>';
                            echo "<div class='container3'>";
                            echo "<h1>Dessert</h1>";
                            $query=$dbhandler->query($sql);
                            echo "<table border='1'><thead><td>Item</td><td>Price</td></thead>";
                            while($r=$query->fetch())
                            {
                                if($r['Category']=="dessert"){
                                echo "<tr><td>".$r['ItemName'].'</td><td>'.$r['Price']."</td></tr>";
                                }
                            }
                            echo "</table>";
                             echo '</div>';
                                    echo "<div class='container3'>";
                                    echo "<h1>Others</h1>";
                                    $query=$dbhandler->query($sql);
                                    echo "<table border='1'><thead><td>Item</td><td>Price</td></thead>";
                                    while($r=$query->fetch())
                                    {
                                        if($r['Category']!="dessert" && $r['Category']!="punjabi" && $r['Category']!="gujarati"){
                                        echo "<tr><td>".$r['ItemName'].'</td><td>'.$r['Price']."</td></tr>";
                                        }
                                    }
                                    echo "</table>";
                                    echo '</div>';
                    echo '</div>';
           echo "</div>";
             }
             catch(PDOException $e){
                    echo $e->getMessage()."<br><br>";
            
            } 
         
 
	?>
</body>
</html>