<html>
<head>
</head>
<body>


helloworld
<?php

    session_start();
    if(isset($_SESSION['valid_user']))
    {
    
    echo "you are valid";
    
    
    
    <a ref="logout.php"> logout </a>
    }
    else
    {
        
        header("Location: login.php");
        
        
    }
    
    
    
    
    
    
    
?>


</body>
</html>