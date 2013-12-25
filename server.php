
<html>
<head>
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

</head>
<body>
Helloworld
<?php
    echo "successful login";
    session_start();

    if(isset($_SESSION['valid_user']))
    {
        echo 'You are logged in as: '.$_SESSION['valid_user'].'<br/>';
        
        
        <div id="canvas" style="width:750; height:750; background-color:grey; display:block; position:absolute; left:50%; top:50%; margin-left:-375; margin-top:-375">
        
        <img id="prada" src="prada.jpg" width="350" height="300" style="position:absolute; left:200; top:225">
        
        </div>
        
        
        <div id= "number"> 1 </div>
        
        
        <script>
        
        $(function()
          {
          $( "#prada" ).draggable({ containment: "parent", drag: function(){ setOpacity($( this ), 200, 250); }, stop: function(){ $(this).animate({left: 200, top: 225, opacity: 1}, 400); }});
          }
          );
        
        
        </script>
        
        
        echo '<a href="logout.php"> Log out </a> <br/>';
        
    }
    else
    {
    
        header("Location: login.php");
    }

?>


</body>
</html>