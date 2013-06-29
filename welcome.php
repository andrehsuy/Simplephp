<html>
    <head>

    <title>Sign up form</title>

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
        
        if(event.target.firstname.value=="" || event.target.lastname.value=="" || event.target.email.value=="" || event.target.password1.value=="" || event.target.password2.value=="" || event.target.birthday.value=="")
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


    </head>
    <body>

    <?php
        require_once "Mail.php";
        
        $from = "<andrehsugod.gmail.com>";
        $to = "<andrehsugod.gmail.com>";
        $subject = "Hi!";
        $body = "Hi,\n\nHow are you?";
        
        $host = "smtp.gmail.com";
        $port = "465";
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
        }    ?>


    <?php
    
    $dbconn = pg_connect("host=ec2-23-21-85-233.compute-1.amazonaws.com port=5432 dbname=d3m7bds1jom9ml user=bwhsvkshzcmema password=1zleSvvgAStyG9Wv0sBri188qW sslmode=require options='--client_encoding=UTF8'");
    
    if (!$dbconn)
    {
        die('Could not connect: ' . pg_last_error());
        
    }
    
    if(isset($_POST['submit']))
    {
        
        $sql='INSERT INTO Users (Username, LastName, FirstName, Password, Birthday) VALUES (\''.$_POST['email'].'\',\''.$_POST['lastname'].'\',\''.$_POST['firstname'].'\',\''.$_POST['password1'].'\',\''.$_POST['birthday'].'\')';
        
        $insert= pg_query($dbconn, $sql);
        
        if(!$insert)
        {
            echo "Something is wrong with insert" . pg_last_error();
        }
        else
        {
            
            
    
        }
        
        $result= pg_query($dbconn, "SELECT * FROM Users");
        
        if(!$result)
        {
            echo "Something is wrong with select" . pg_last_error();
        }
        
        while ($row = pg_fetch_row($result)) {
            echo "Username: $row[0]  LastName: $row[1] FirstName: $row[2] birthday:$row[4]";
            echo "<br />\n";
        }
        
        
    }
    
    ?>


            <form id="sign_up_form" action="<?php echo $_SERVER['PHP_SELF'] ?>" onsubmit="return validate(event)" method="post">
            <input type="text" name="firstname" placeholder="First Name"><br>
            <input type="text" name="lastname" placeholder="Last Name"><br>
            <input type="text" name="email" placeholder="Email"><br>
            <input type="password" name="password1" placeholder="New Password"><br>
            <input type="password" name="password2" placeholder="Re-enter"><br>
            <input type="time" name="birthday" placeholder="Birthday"><br>
            <input type="submit" name="submit">
            </form>


    </body>
</html>