<html>
    <head>
       
    </head>
    <style>
        @media(min-width:760px){
        .ce{
            margin-top: -15%;
        }
       
        }
        
    </style>
<body><?php
	include 'main_1.php';
         if(!isset($_SESSION['username']))
                    {
                        header("Location:Login.php?first=LoginFirst");
                    }
         if(isset($_GET['type']) || isset($_GET['item_name']) || isset($_GET['price'] )){
             try{
            $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=PhpProject','root','');
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
            $type=$_GET['type'];
            $itemname=$_GET['item_name'];
            $price=$_GET['price']; 
            $sql="insert into Menu (Category,ItemName,Price) values ('$type','$itemname','$price')";
            $query=$dbhandler->query($sql);

            
             }
             catch(PDOException $e){
                    echo $e->getMessage()."<br><br>";
            
            } 
         }
      echo '<div class="ce">';  
      if(isset($_GET['item_name'])){
          $itemname=$_GET['item_name'];
      echo "<center><h1 >$itemname added to menu</h1></center>";
      }
        ?>
    
	<center>
            <form action="Create.php" >
	<strong>Add New Food Item</strong><br><br>
        <input type="text" name="type" placeholder="Enter type of item here" required><br>		
        <input type="text" name="item_name" placeholder="Enter new item here" required><br>
        <input type="text" name="price" placeholder="Price" required><br>
		<input type="submit" value="Add to Menu">
	</form>
	</center>
    </div>
</body>
</html>
