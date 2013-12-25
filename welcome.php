<html>
    <head>

    <title>Sign up form</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript">

var monthtext=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec'];

function populatedropdown(dayfield, monthfield, yearfield){
    var today=new Date()
    var dayfield=document.getElementById(dayfield)
    var monthfield=document.getElementById(monthfield)
    var yearfield=document.getElementById(yearfield)
    for (var i=0; i<31; i++)
        dayfield.options[i]=new Option(i+1, i+1)
        for (var m=0; m<12; m++)
            monthfield.options[m]=new Option(monthtext[m], m+1)
            
            var thisyear=today.getFullYear()
            for (var y=0; y<50; y++){
                yearfield.options[y]=new Option(thisyear-50, thisyear-50)
                thisyear+=1
            }
    
}

</script>

<script type="text/javascript">
    function validate(event)
    {
        
        var temp1= document.getElementById("alertEmptyFields");
        var temp2= document.getElementById("alertPasswordMismatch");
        var temp3= document.getElementById("alertPasswordInvalid");
        if(temp1)
        {
            temp1.parentNode.removeChild(temp1);
            
        }
        if(temp2)
        {
            temp2.parentNode.removeChild(temp2);
        }
        if(temp3)
        {
            temp3.parentNode.removeChild(temp3);
        }
        
        if(event.target.firstname.value=="" || event.target.lastname.value=="" || event.target.email.value=="" || event.target.password1.value=="" || event.target.password2.value=="")
        {
            var newel=document.createElement("p");
            var t=document.createTextNode("*You must fill in all of the fields.");
            newel.appendChild(t);
            newel.id="alertEmptyFields";
            document.body.appendChild(newel);
            return false;
        }
        else if( event.target.password1.value != event.target.password2.value)
        {
            var newel=document.createElement("p");
            var t=document.createTextNode("*Your passwords do not match.");
            newel.appendChild(t);
            newel.id="alertPasswordMismatch";
            document.body.appendChild(newel);
            return false;
        }
        else if( event.target.password1.value.length < 6)
        {
            var newel=document.createElement("p");
            var t=document.createTextNode("*Your passwords must be at least 6 characters long.");
            newel.appendChild(t);
            newel.id="alertPasswordInvalid";
            document.body.appendChild(newel);
            return false;
        }
        
        
    }
    </script>

<?php
    
    if(isset($_POST['submit']))
    {
        $dbconn = pg_connect("host=ec2-23-21-85-233.compute-1.amazonaws.com port=5432 dbname=d3m7bds1jom9ml user=bwhsvkshzcmema password=1zleSvvgAStyG9Wv0sBri188qW sslmode=require options='--client_encoding=UTF8'");
        
        if (!$dbconn)
        {
            die('Could not connect: ' . pg_last_error());
            
        }
        
        $key= hash ( 'md5' , $_POST['email']);
        
        
        $birthday= $_POST['monthdropdown'].'/'.$_POST['daydropdown'].'/'.$_POST['yeardropdown'];
        
        
        $sql='INSERT INTO Temp_Users(Username, LastName, FirstName, Password, Birthday, Userkey) VALUES (\''.$_POST['email'].'\',\''.$_POST['lastname'].'\',\''.$_POST['firstname'].'\',\''.$_POST['password1'].'\',\''.$birthday.'\',\''.$key.'\')';
        
        $insert= pg_query($dbconn, $sql);
        
        if(!$insert)
        {
            die('Could not insert: ' . pg_last_error());
        }
        else
        {
            require_once "Mail.php";
            
            $from = "phresh <andrehsugod@gmail.com>";
            $to = "${_POST['firstname']} ${_POST['lastname']} <${_POST['email']}>";
            $subject = "Welcome! Here is your confirmation";
            $body = 'Please follow the link below to verify your email address! http://andrehsu.herokuapp.com/confirmation.php?userkey='.$key;
            
            $host = "smtp.gmail.com";
            $port = 587;
            $username = "andrehsugod@gmail.com";
            $password = "Aa1992915";
            
            $headers = array ('From' => $from,
                              'To' => $to,
                              'Subject' => $subject);
            $smtp = Mail::factory('smtp',
                                  array ('host' => $host,
                                         'port' => $port,
                                         'auth' => true,
                                         'username' => $username,
                                         'password' => $password));
            
            $mail = $smtp->send($to, $headers, $body);
            
            if (PEAR::isError($mail)) {
                echo("<p>" . $mail->getMessage() . "</p>");
            } else {
                echo("<p>Message successfully sent!</p>");
            }
            
            
        }
        
        /*   $result= pg_query($dbconn, "SELECT * FROM Temp_Users");
         
         if(!$result)
         {
         die('Could not select: ' . pg_last_error());
         }
         
         echo "You have signed up successfully! Please check your email for verification.";
         
         
         while ($row = pg_fetch_row($result))
         {
         echo "Username: $row[0]  LastName: $row[1] FirstName: $row[2] birthday:$row[4] Userkey: $row[5]";
         echo "<br />\n";
         
         }
         
         */
        
    }
    
    ?>




    </head>
    <body>

<div id="fb-root"></div>
<fb:login-button id="fb-login-button" scope="publish_actions" show-faces="true" width="200"></fb:login-button><br>
<script>
var name;
var appId = 206013596249981;
function userConnected() {
    FB.api('/me',  function(response) {
           
           name = response.name;
           
           
          
           });
}
</script>
<script src="fb.js"></script>

<script>
document.getElementById("firstname").setAttribute("value", "Andre");
</script>

<form id="sign_up_form" action="<?php echo $_SERVER['PHP_SELF'] ?>" onsubmit="return validate(event)" method="post" style="visibility: <?php if(isset($_POST['submit'])) echo "hidden"; else echo "none"; ?>">

<input id="firstname" type="text" name="firstname" placeholder="First Name">
<br>
<input type="text" name="lastname" placeholder="Last Name">
<br>
<input type="text" name="email" placeholder="Email">
<br>
<input type="password" name="password1" placeholder="New Password">
<br>
<input type="password" name="password2" placeholder="Re-enter">
<br>

Birthday
<br>
<select id="daydropdown" name="daydropdown"> </select>
<select id="monthdropdown" name="monthdropdown"> </select>
<select id="yeardropdown" name="yeardropdown"></select><br>

<script type="text/javascript">
window.onload=function()
{
    populatedropdown("daydropdown", "monthdropdown", "yeardropdown")
}
</script>

<input type="submit" name="submit">

</form>

</body>
</html>