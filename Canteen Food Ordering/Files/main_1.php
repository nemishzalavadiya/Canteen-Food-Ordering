<html>
<style>
    button:hover{
        background-color:greenyellow;
    }
    .crud button{
        border-radius:15%;
        padding:1%;
        margin-bottom: 4px;
        background-color: #22c6f0;
    }
    .crud li{
        list-style: none;
    }
    .crud a{
        text-decoration: none;
        
    }
</style>

<body>
    <?php
     
      include 'transfer.php';
     
    if(!isset($_SESSION['username']))
                    {
                        header("Location:Login.php?first=LoginFirst");
                    }
           
        
                    
	 
         
	?>
    <ul class="crud">
        <h3>Choose Operation </h3>
                        <li><a href="Create.php"><button>Create</button></a></li>
                       <li><a href="Update.php"><button>Update</button></a></li>
                        <li><a href="Delete.php"><button>Delete</button></a></li>
                        <li><a href="Show.php"><button>Show</button></a></li>
	</ul>
</body>
</html> 
