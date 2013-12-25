<html>
<head>
<?php
    
    session_start();
    
    if(isset($_SESSION['valid_user']))
    {
        echo '
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        
        
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