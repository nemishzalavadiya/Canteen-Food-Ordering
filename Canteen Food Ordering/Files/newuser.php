
<!DOCTYPE html>
<?php
    session_start(); 
    if(isset($_GET['username']) && isset($_GET['designation']) && isset($_GET['password']) && isset($_GET['repassword']) && isset($_GET['captcha'])
                && isset($_GET['adminpassword']))
    {
        $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=PhpProject','root','');
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM Login where Designation=?";
        $admin='admin';
        $query=$dbhandler->prepare($sql);
        $query->execute(array($admin)); 
        
       
           $r=$query->fetch();
     
        $username=$_GET['username'];
        $password=$_GET['password'];
        $repassword=$_GET['repassword'];
        $designation=$_GET['designation'];
        $captcha=$_GET['captcha'];
        $captcha1=$_SESSION['vercode'];
        $salary=$_GET['salary'];
        $email=$_GET['email'];
      
        if($password == $repassword && $captcha==$captcha1 && $_GET['adminpassword']==$r['Password'])
        {
            try{
            
            $sql="insert into Login (Username,Password,Designation,Email,Salary) values ('$username','$password','$designation','$email','$salary')";
            $query=$dbhandler->query($sql);
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
            header("Location:Login.php?designation=".$_GET['designation']);
        }
        else
        {
            echo "<h1>Mismatch password or captcha</h1>";
        }
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
        .contain{
            /*margin-top:;*/
        }
        #logo{
            margin-left: -1%;
        }
        .animation{
            margin-left: -1%
        }
        #block{
           
        }
    </style>
    <body>


    <center>
        <img src="../IMAGES/images.png" id="logo">
        <strong><h1 class="animation">Create New User</h1></strong><br>
    <div class="login">
        <form action="newuser.php" >
            <div id="block">
              <h2>New User</h2>
              
                <input type='password' name='adminpassword' placeholder='Admin Password' required><br>

             <input type="text" name="username" placeholder="Enter Username" required><br>	
             <input type="password" name="password" placeholder="Enter Password" required><br>
		       <input type="password" name="repassword" placeholder="reEnter Password" required><br>
               
                      Designation : <select name='designation' >
                           <option value="chef">Chef</option>
                           <option value="worker">Worker</option>
                       </select>
            <input type="email" name="email" placeholder="Enter Email Addre.." required><br> 
            <input type="number" name="salary" placeholder="Enter Salary here" required><br> 
            <div class="contain"><div class="cap"> captcha </div><div class="captcha" ><img src="captcha.php"></div></div><br>
            <input type="text" name="captcha" placeholder="Enter captcha here" required><br>
            <input type="submit" value="Create user"  >
		      
            <!-- For New User Registration <a href="registration.html">click here</a>-->
             </div>
         </form>
         <br><br><br>
     </div>    
    </center>
    <h4 style="align-content: bottom">Web Site copy right &copy</h4>
    </body>
</html>
