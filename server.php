<html>
<head>
<?php
    
    session_start();
    
    if(isset($_SESSION['valid_user']))
    {
        echo '
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        
        <script>
        
        function setOpacity(target, left, boundary)
        {
            var diff;
            if(target.position().left > left)
                diff= target.position().left - left;
            else
                diff= left - target.position().left;
            
            var percentage= 1- diff/boundary;
            $( " #number " ).text( percentage );
            target.fadeTo(0, percentage);
            
        }
        
        </script>
        
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