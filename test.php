<?php
    
    $dbconn = pg_connect("host=ec2-23-21-85-233.compute-1.amazonaws.com port=5432 dbname=d3m7bds1jom9ml user=bwhsvkshzcmema password=1zleSvvgAStyG9Wv0sBri188qW sslmode=require options='--client_encoding=UTF8'");
    
    if (!$dbconn)
    {
        die('Could not connect: ' . pg_last_error());
        
    }

    $createTable="CREATE TABLE Temp_Users (Username varchar(255), LastName varchar(255), FirstName varchar(255), Password varchar(255), Birthday date, Userkey varchar(255))";
    
    $create= pg_query($dbconn, $createTable);
    
    if (!$create)
    {
        echo "something wrong here too" . pg_last_error();
    }

    
    ?>