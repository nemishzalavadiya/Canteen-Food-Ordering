
<!DOCTYPE html>

<?php

    session_start();
        try{
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=PhpProject','root','');
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            if(isset($_GET['username']) && isset($_GET['oldpassword']))
            {
                    $username=$_GET['username'];
                    $oldpassword=$_GET['oldpassword'];
                    $newpassword=$_GET['newpassword'];
                    $repassword=$_GET['reenterpassword'];
                    $captcha=$_GET['captcha'];
                    if($_SESSION["vercode"]==$captcha && $newpassword==$repassword)
                    {
                            $query=$dbhandler->prepare("select * from Login where Username=? and Password=? ");
                            $query->execute(array($username,$oldpassword));
                            $count = $query->rowcount();
                                    if($count > 0)
                                        {
                                        $sql = "UPDATE Login SET Password=? WHERE Username=? and Password=?";
                                      
                                        $stmt = $dbhandler->prepare($sql);
                                        $stmt->execute(array($newpassword,$username,$oldpassword));
                                        echo "done";
                                            if($stmt->rowCount()>0){
                                                header("Location:Login.php?reset=done");
                                            //echo data in associative format
                                            }
                                            else {
                                                echo "Invalide Username";
                                            }
                                        }
                                    else
                                        {
                                                echo "<h1>Invaliude credentials</h1>";
                                        }	
                    }
                    else
                    {
                        echo "<h1>Password or Captcha Mismatch</h1>";
                        echo $_SESSION["vercode"]." ".$captcha." ".$newpassword." ".$repassword;
                    }
            }
        }
    catch(PDOException $e){
            echo $e->getMessage();
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
            margin-left: 35%;
        }
        </style>
    <body>
    
        <img src="../IMAGES/images.png" id="logo">
        <strong><h1 class="animation">Reset Password</h1></strong><br>
    <div class="login">
        <form action="passreset.php" >
            <div id="block">
              <h2>Reset Password </h2><br>
             <input type="text" name="username" placeholder="Enter Username" required><br><br>		
		      <input type="password" name="oldpassword" placeholder="Enter old Password" required><br><br>
          <input type="password" name="newpassword" placeholder="Enter New Password" required ><br><br>
          <input type="password" name="reenterpassword" placeholder="reEnter New Password" required><br><br>
            <div class="contain"><div class="cap"> captcha </div><div class="captcha" ><img src="captcha.php"></div></div><br>
                       <input type="text" name="captcha" placeholder="Enter captcha here"><br>
            <input type="submit" value="Reset"  >
		      
            <!-- For New User Registration <a href="registration.html">click here</a>-->
             </div>
         </form>
        

         <br><br><br>
     </div>    
   
    <h4 style="align-content: bottom">Web Site copy right &copy</h4>
    </body>
</html>
