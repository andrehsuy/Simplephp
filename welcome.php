<html>
    <head>

    <title>Sign up form</title>


    </head>
    <body>



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

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="text" name="firstname" placeholder="First Name"><br>
            <input type="text" name="lastname" placeholder="Last Name"><br>
            <input type="text" name="email" placeholder="Email"><br>
            <input type="text" name="password1" placeholder="New Password"><br>
            <input type="text" name="password2" placeholder="Re-enter"><br>
            <input type="time" name="birthday" placeholder="Birthday"><br>
            <input type="submit" name="submit">
            </form>


    </body>
</html>

<?php

/*
 $createTable="CREATE TABLE Users (Username varchar(255), LastName varchar(255), FirstName varchar(255), Password varchar(255), Birthday date)";
 
 $create= pg_query($dbconn, $createTable);
 
 if (!$create)
 {
 echo "something wrong here too" . pg_last_error();
 }
 
 
 $insert= pg_query($dbconn, "INSERT INTO Users VALUES('andrehsugod@ucla.edu', 'Hsu', 'Andre', 'justgoogleit','1992-09-15')");
 
 if(!$insert)
 {
 echo "Something is wrong with insert" . pg_last_error();
 }
 
 
 
 $result= pg_query($dbconn, "SELECT * FROM Users");
 
 if(!$result)
 {
 echo "weird" . pg_last_error();
 }
 
 while ($row = pg_fetch_row($result)) {
 echo "Username: $row[0]  LastName: $row[1]";
 echo "<br />\n";
 }
 
 $qu= pg_query($dbconn, "SELECT * FROM Users");
 
 $data = pg_fetch_object($qu);
 
 
 
 echo $data->username;
 echo $data->lastname;
 echo $data->firstname;
 
 */
?>