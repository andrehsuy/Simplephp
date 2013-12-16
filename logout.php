<?php
    session_start();
    $old_user= $_SESSION['valid_user'];
    unset($_SESSION['valid_user']);
    session_destroy();
    
    echo "Logged out";
    echo '<a href="login.php"> Back to login page</a>';
?>


