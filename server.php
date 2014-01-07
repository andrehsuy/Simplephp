xw<?php
    
    session_start();
    
    if(!isset($_SESSION['valid_user']))
    {
        
        
        header("Location: login.php");
        
        
    }
    
    ?>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script>

function setOpacity(target, left, boundary)
{
    var diff;
    var r;
    var g;
    var b;
    var percentage;
    if(target.position().left >= left)
	{
		diff= target.position().left - left;
		percentage = 1- diff/boundary;
		r= Math.round( 192*percentage );
		b= r;
		g= 192;
		
	}
	else
	{
		diff= left - target.position().left;
		percentage = 1- diff/boundary;
		g= Math.round( 192*percentage );
		b= g;
		r= 192;
	}
    
	target.fadeTo(0, percentage);
	
	target.parent().animate({ backgroundColor: "rgb("+ r + "," + g + "," + b + ")" },0);
    
}

function restore(target,left,boundary)
{
	var diff;
	if(target.position().left >= left)
	{
		diff= target.position().left -left;
		percentage = diff/boundary;
	}
	else
	{
		diff= left - target.position().left;
		percentage = diff/boundary;
	}
    var parent= target.parent();
    $( " #number " ).text( percentage );
	if(percentage >= .85)
	{
		target.remove();
		spawnItem(parent);
		
	}
	target.animate({left: 200, top: 100, opacity: 1 }, { duration: 350, queue: false });
	parent.animate({backgroundColor: "rgb(192,192,192)" }, { duration: 350, queue: false });
    
}

function spawnItem(parent)
{
	
	var child= parent.append("<img id='armani' src='armani.jpg' width='0' height='0' style='position:absolute; left:200; top:100'>");
	$( "#armani" ).animate({width: 350, height: 300 }, { duration: 350, queue: false });
    
	
    
}



</script>




</head>

<body>
<?php
    
    echo "You are logged in as $hello" . $_SESSION['valid_user'];
    
    ?>
<a href="logout.php"> logout </a>
<div id="canvas" style="width:750; height:500; background-color:rgb(192,192,192); display:block; position:absolute; left:50%; top:50%; margin-left:-375; margin-top:-250">

<img id="prada" src="prada.jpg" width="350" height="300" style="position:absolute; left:200; top:100">

</div>


<div id= "number"> 1 </div>


<script>

$(function()
  {
  $( "#prada" ).draggable({ containment: "parent", drag: function(){ setOpacity($( this ), 200, 250); }, stop: function(){ restore($(this),200,200); } });
  }
  );


</script>



</body>
</html>