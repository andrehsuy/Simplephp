<html>
<head>
<?php
    
    session_start();
    
    if(isset($_SESSION['valid_user']))
    {
        echo '
        hey
        ';
        
        echo 'here';
        
        
       
        
    }
    else
    {
        
        header("Location: login.php");
    }
?>




</head>

<body>
 <a href="logout.php"> logout </a>
</body>
</html>