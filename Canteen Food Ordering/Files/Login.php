<!DOCTYPE html>
<?php

   
    session_start();
    if(isset($_GET['mail']))
    {
        echo "<h1>Email sent</h1>";
    }
    if(isset($_GET['out']))
    {
        unset($_SESSION['username']);
    }
    if(isset($_GET['delete'])){
        echo "<h1>User ".$_GET['delete']." is deleted successfully</h1>";
    }
    if(isset($_GET['reset']))
    {
        echo "<h1>Password Updated Successfully</h1>";
    }
    
    if(isset($_GET['designation']))
    {
        echo "<h1>New User Created Successfully</h1>";
    }
    try{
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=PhpProject','root','');
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            if(isset($_GET['username']) && isset($_GET['password']))
            {
                    $username=$_GET['username'];
                    $password=$_GET['password'];
                    $captcha=$_GET['captcha'];
                   
                    if(!empty($username) && !empty($password) && $_SESSION["vercode"]==$captcha)
                            {
                            $query=$dbhandler->prepare("select Username from Login where Username=? and Password=?");
                            $query->execute(array($username,$password));
                            $count = $query->rowcount();
                                    if($count > 0)
                                        {
                                        $r=$query->fetch(PDO::FETCH_ASSOC);

                                        $_SESSION['username']=$username;
                                        
                                        header("Location:transfer.php?username=$username");
                                        //echo data in associative format

                                        }
                                    else
                                        {
                                                echo "<h1>Invaliude credentials</h1>";
                                        }	
                            }
                            else {
                                echo "<h1>Captcha Mismatch</h1>";
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
        .con{
            display: flex;
        }
        .forgot{
            margin-left: 5%;
        }
        .reset{
            margin-left: 40%;
        }
        a:hover{
            background-color: #22c600;
        }
    </style>
    <body>
  
        <img src="../IMAGES/images.png" id="logo">
        <h1 class="animation"><strong>Welcome to Food Center</strong></h1><br>
    <div class="login">
         <form action="Login.php" >
            <div id="block">
              <h2>Login Here</h2><br>
             <input type="text" name="username" placeholder="Enter Username" required><br><br>		
		      <input type="password" name="password" placeholder="Enter Password" required><br>
                      <div class="contain"><div class="cap"> captcha </div><div class="captcha" ><img src="captcha.php"></div></div><br>
                       <input type="text" name="captcha" placeholder="Enter captcha here"><br>
            <input type="submit" value="Login"  >
		      
            <!-- For New User Registration <a href="registration.html">click here</a>-->
            <div class="con">
            <div class="forgot"><a href="reset.php">Forgot Password</a></div>
            <div class="reset"> <a href="passreset.php">Reset Password</a></div> 
            </div>
            </div>
         </form>
         <div class="inpu">
         
         <div>
         
     </div>    
        <h4>Web Site copy right &copy</h4>
    </body>
</html>
