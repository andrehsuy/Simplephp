
<html>
<body>

<?php
    session_start();

    if(isset($_SESSION['valid_user']))
    {
        echo 'You are logged in as: '.$_SESSION['valid_user'].'<br/>';
        
        echo '<a href="logout.php"> Log out </a> <br/>';
        
    }
    else
    {
    
        header("Location: login.php");
    }

?>


</body>
</html>