<html>
    <head>
        <title>
            Move to work
        </title>
        <link rel="stylesheet" type="text/css" href="css/transfer.css">
    </head>
    <body>
        <div class="head">
            <div class="front">
                <div class="title"><h1>FOOD CORNER</h1></div>
                <div class="link"><a href="Login.php?out=Logout"><button>LOGOUT</button></a></div>
            </div>
            
            <div class="image1" >
                <span id="list">
                        <ul>
                            <?php
                                session_start();
                                if(!isset($_SESSION['username']))
                                {
                                    header("Location:Login.php?first=Login First");
                                }

                                try{
                                        $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=PhpProject','root','');
                                        $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                                        $query=$dbhandler->prepare("select designation from Login where username=?");

                                        $query->execute(array($_SESSION['username']));
                                        $count = $query->rowcount();

                                        $r=$query->fetch(PDO::FETCH_ASSOC);
                                        $designation=$r['designation'];

                                        if($designation=="admin"){
                                            echo "<li><a href='main_1.php'><button>Change_Menu_Items</button></a></li>";
                                            echo "<li><a href='ShowMenu.php'><button>Menu</button></a></li>";
                                            echo "<li><a href='staff.php'><button>Staff</button></a></li>";
                                            //echo "<li><a href=''><button>Food_Sold</button></a></li>";
                                            
                                          
                                            echo "<li><a href='Orders_on_Date.php'><button>SearchOrderPerDay</button></a></li>";                            
                                            echo "<li><a href='Search_on_Item.php'><button>Search_Item</button></a></li>"; 
                                            echo "<li><a href='user.php'><button>Delete_User</button></a></li>";
                                            echo "<li><a href='newuser.php'><button>New_User</button></a></li>";
                                        } 
                                        if($designation == "chef"){   
                                            echo "<li><a href='Display_order.php'><button>Received_orders</button></a></li>";
                                        }    

                                        if($designation == "worker"){
                                                 echo "<li><a href='MakeOrder.php'><button>Place_Order</button></a></li>";
                                                 echo "<li><a href='ShowMenu.php'><button>Menu</button></a></li>";
                                                 echo "<li><a href='Search_on_Item.php'><button>Search_Item</button></a></li>";
                                        }


                                }
                                catch(PDOException $e){
                                    echo $e->getMessage()."<br><br>";

                                } 

                            ?>
                        </ul>
                </span>
            </div>
        </div>
    </body>
</html>
