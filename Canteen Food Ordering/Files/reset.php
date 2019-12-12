
<!DOCTYPE html>
<?php

   
    session_start();
    if(isset($_GET['in'])){
        echo '<h1>Invalide Username</h1><br>';
    }
    if(isset($_GET['inemail'])){
        echo '<h1>Invalide Email Address</h1><br>';
    }
    try{
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=PhpProject','root','');
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            if(isset($_GET['username']) && isset($_GET['email']) && isset($_GET['captcha']))
            {
                    $username=$_GET['username'];
                    $email=$_GET['email'];
                    $captcha=$_GET['captcha'];
                        
                    $query=$dbhandler->prepare("select * from Login where Username=?");
                    $query->execute(array($username));
                    $count = $query->rowcount();
                    if($count>0)
                    {}
                    else
                    {
                        header("Location:reset.php?in=invalide");
                    }
                    $r=$query->fetch();
                    
                   
                    
                    if($_SESSION["vercode"]==$captcha && strcmp($r['Email'],$email)==0)
                            {
                            $query=$dbhandler->prepare("select Username from Login where Username=?");
                            $query->execute(array($username));
                            $count = $query->rowcount();
                                    if($count > 0)
                                        {
                                        
                                        
                                        header("Location:../PHPMailer-master/src/index.php?email=$email&username=$username");
                                       

                                        }
                                    else
                                        {
                                                echo "<h1>Invaliude credentials</h1>";
                                        }	
                            }
                            else {
                                if($_SESSION["vercode"]!=$captcha){
                                echo "<h1>Captcha Mismatch</h1>";}
                                else{
                                     header("Location:reset.php?inemail=invalide");
                                }
                            }                            
                            
            }
        }
    catch(PDOException $e){
            echo $e->getMessage();
    }   
    if(isset($_GET['first']))
       {
           echo '<h1>Unauthorized Access</h1>';
       }
?>
<html>
    <head>
        <title>Canteen Food Order</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/Login.css">
    </head>
    <style>
        .animation{
            margin-left: 33%;
        }
    </style>
    <body>
  
        <img src="../IMAGES/images.png" id="logo">
        <h1 class="animation"><strong>Create New Password</strong></h1><br>
    <div class="login">
         <form action="reset.php" >
            <div id="block">
              <h2>New Password</h2><br>
              <input type="text" name="username" placeholder="Enter username here" required><br><br>
                <input type="email" name="email" placeholder="enter email here" required>
 
               <div class="contain"><div class="cap"> captcha </div><div class="captcha" ><img src="captcha.php"></div></div><br>
               <input type="text" name="captcha" placeholder="Enter captcha here" required><br>
            <input type="submit" value="Send Email"  >
		      
            <!-- For New User Registration <a href="registration.html">click here</a>-->
             </div>
         </form>
         
         
     </div>    
        <h4>Web Site copy right &copy</h4>
    </body>
</html>
