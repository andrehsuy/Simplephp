<html>
<body>
<?php

    echo 'Welcome';
    
    $dbconn = pg_connect("host=ec2-23-21-85-233.compute-1.amazonaws.com port=5432 dbname=d3m7bds1jom9ml user=bwhsvkshzcmema password=1zleSvvgAStyG9Wv0sBri188qW sslmode=require options='--client_encoding=UTF8'");
    
    if (!$dbconn)
    {
        die('Could not connect: ' . pg_last_error());
    }
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
     echo  $_SERVER['SERVER_NAME'];

?>


<form action="welcome.php" method="post">
First name: <input type="text" name="firstname"><br>
Last name: <input type="text" name="lastname"><br>
Password: <input type="password" name="password1"><br>
Password2: <input type="password" name="password2"><br>
Birthday: <input type="time" name="birthday"><br>
</form>

</body>
</html>