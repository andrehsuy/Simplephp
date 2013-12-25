<html>
<head>
</head>

<body>

<?php
    
    session_start();
    
    if(isset( $_SESSION['valid_user']))
    {
        echo "Valid Login";
        
        
    }
?>
</body>
</html>