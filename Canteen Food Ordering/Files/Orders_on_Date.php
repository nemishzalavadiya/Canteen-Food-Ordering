 <?php
include 'transfer.php';
         if(!isset($_SESSION['username']))
                    {
                        header("Location:Login.php?first=LoginFirst");
                    }
              
?>                  
<html>
    <head>
        <title> Orders on Date</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <center>
        <form action="Show_Orders_on_Date.php" method="POST">
            <h2>Select the Date of Order .</h2>
                
            <input type="date" name="Order_Date" required="" />
            <br>
            <input type="submit" value="Search"/>
        </form>
    </center>
    </body>
</html>
                 