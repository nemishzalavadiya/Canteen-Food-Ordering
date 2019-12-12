<?php 
     
           include 'transfer.php';
         
                    if(!isset($_SESSION['username']))
                    {
                        header("Location:Login.php?first=LoginFirst");
                    }
                    ?>
<!DOCTYPE html>
<html>
<head>
	<title>Show Data</title>
</head>
<style>
  @media(min-width:760px){
   
    .posional{
        margin-top: -1%;
        margin-left:20% ;
    }
    .container{
        display: flex;
    }
    .container > div{
        margin-right: 20px;
    }
    
  }
  td{
        margin:1%;
        padding:1%;
        font-size: 80%;
        width: 15%;
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
  .check1{
      margin-bottom: 0px;
      padding-bottom: 0px;
      margin-left: -5%;
      font-family: sans-serif;
      background-color: #ccc;
  }
</style>
<body>
	<?php 
     
           
         
             try{
            $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=PhpProject','root','');
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
            //$type=$_GET['type'];
            //$itemname=$_GET['item_name'];
            //$price=$_GET['price']; 
            echo "<center><h1 class='check1'>Staff</h1></center><br><br>";
            $sql="select * from Login";
            $query=$dbhandler->query($sql);
            echo "<div class='posional'>";
                    echo "<div class='container'>";
                           
                           
                            echo "<table border='1'><thead><td>Name</td><td>Desidnation</td><td>Email</td><td>Salary</td></thead>";

                            while($r=$query->fetch())
                            {
                                if($r['Designation']!='admin'){
                                echo "<tr><td>".$r['Username'].'</td><td>'.$r['Designation'].'</td><td>'.$r['Email'].'</td><td>'.$r['Salary'].'</td></tr>';
                                }
                            }
                            echo "</table>";
                            
                           
                                    
                    echo '</div>';
           echo "</div>";
             }
             catch(PDOException $e){
                    echo $e->getMessage()."<br><br>";
            
            } 
         
 
	?>
</body>
</html>