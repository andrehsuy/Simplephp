<?php
    
    session_start();
    
    if(isset($_POST['userid']) && isset($_POST['password']))
    {
        $userid= $_POST['userid'];
        $password= $_POST['password'];
        
        
        $dbconn = pg_connect("host=ec2-23-21-85-233.compute-1.amazonaws.com port=5432 dbname=d3m7bds1jom9ml user=bwhsvkshzcmema password=1zleSvvgAStyG9Wv0sBri188qW sslmode=require options='--client_encoding=UTF8'");
        
        if (!$dbconn)
        {
            die('Could not connect: ' . pg_last_error());
            
        }
        
        $query= "SELECT * FROM Users WHERE Username='$userid' AND Password='$password'";
        
        $result= pg_query($dbconn, $query);
        
        if(!$result)
        {
            die('Could not select: ' . pg_last_error());
        }
        
        if(pg_num_rows($result) != 0)
        {
            $_SESSION['valid_user']=$userid;
        }
        
        
        
        header("Location: server.php");
        
    }
    
?>
<html>
    <head>
    </head>

    <body>

    <?php
        
        class user
        {
            function __construct($id)
            {
                $user_id= $id;
                echo $user_id;
            }
            
            private $user_id;
        }
        
        $a= new user("Andre");
   
    
    
    ?>
    </body>
</html>