<?php

    if(isset($_GET['userkey']))
    {
        
        echo "inside ";
        
        $dbconn = pg_connect("host=ec2-23-21-85-233.compute-1.amazonaws.com port=5432 dbname=d3m7bds1jom9ml user=bwhsvkshzcmema password=1zleSvvgAStyG9Wv0sBri188qW sslmode=require options='--client_encoding=UTF8'");
        
        if (!$dbconn)
        {
            die('Could not connect: ' . pg_last_error());
            
        }
        
        echo $_GET['userkey'];
        
        $select= pg_query($dbconn, "SELECT * FROM Temp_Users where Userkey='${_GET['userkey']}'");
        
        if(!$select)
        {
            echo "something is wrong with select";
        }
        
        $selectRow = pg_fetch_row($select);
        
        $sql='INSERT INTO Users(Username, LastName, FirstName, Password, Birthday, Userkey) VALUES (\''.$selectRow[0].'\',\''.$selectRow[1].'\',\''.$selectRow[2].'\',\''.$selectRow[3].'\',\''.'9/15/1992'.'\',\''.$selectRow[5].'\')';
        
        $insert= pg_query($dbconn, $sql);
        
        if(!$insert)
        {
            echo "Something is wrong with insert" . pg_last_error();
        }
        else
        {
            echo "successfully inserted";
            
            $result= pg_query($dbconn, "SELECT * FROM Users");
            
            if(!$result)
            {
                echo "Something is wrong with select" . pg_last_error();
            }
            
            while ($row = pg_fetch_row($result)) {
                echo "Username: $row[0]  LastName: $row[1] FirstName: $row[2] birthday:$row[4] Userkey: $row[5]";
                echo "<br />\n";
            }
            
            
        }
     
    }

?>