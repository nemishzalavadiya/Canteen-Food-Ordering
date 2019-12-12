
<!DOCTYPE html>
<?php
    session_start();
     if(!isset($_SESSION['username']))
                    {
                        header("Location:Login.php?first=LoginFirst");
                    }
     if(isset($_GET['username']) && isset($_GET['adminpassword']))
    {
        $username=$_GET['username'];
        $password=$_GET['adminpassword'];
       try{
            $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=PhpProject','root','');
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql="select * from Login where Designation='admin'";
            $query=$dbhandler->query($sql);
            if($query->rowCount()>0){
                if($r=$query->fetch())
                {
                   if($r['Password']==$password)
                   {
                     $sql = 'DELETE FROM Login WHERE Username=?';
                
                        $query=$dbhandler->prepare($sql);
                        $query=$query->execute(array($username));
                        header("Location:Login.php?delete=".$username);  
                    }
                    else{
                        echo 'Invalide admin password<br>';
                    }
                
                }
            }
            else{
                echo 'No admin found';
            }
            
       }
       catch(PDOException $e)
            {
                echo $e->getMessage();
            }
            
    }
?>


<html>
    <head>
        <title>Delete user</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/Login.css">    
    </head>
    <style>
        .animation{
            margin-left: 39%;
        }
        #logo{
            margin-top: 5%;
        }
    </style>
    <body>


    
        <img src="../IMAGES/images.png" id="logo">
        <strong><h1 class="animation">Delete User</h1></strong><br>
    <div class="login">
        <form action="user.php" >
            <div id="block">
              <h2>Delete User</h2>
              <input type="text" name="username" placeholder="Enter username to delete" required><br><br>
              <input type="password" name="adminpassword" placeholder="Enter admin password"><br><br>
              <input type="submit" value="Delete User">
            
             </div>
         </form>
         <br><br><br>
     </div>    
   
    <h4 style="align-content: bottom">Web Site copy right &copy</h4>
    </body>
</html>
