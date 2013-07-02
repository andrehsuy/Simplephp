<?php

    if(isset($_GET['userkey']))
    {
        
        
        
        $dbconn = pg_connect("host=ec2-23-21-85-233.compute-1.amazonaws.com port=5432 dbname=d3m7bds1jom9ml user=bwhsvkshzcmema password=1zleSvvgAStyG9Wv0sBri188qW sslmode=require options='--client_encoding=UTF8'");
        
        if (!$dbconn)
        {
            die('Could not connect: ' . pg_last_error());
            
        }
        
        
        
        $select= pg_query($dbconn, "SELECT * FROM Temp_Users where Userkey='${_GET['userkey']}'");
        
        if(!$select)
        {
            die('Could not select: ' . pg_last_error());
        }
        
        $selectRow = pg_fetch_row($select);
        $date = new DateTime($selectRow[4]);
        $formattedDate=  $date->format('m/d/Y');
        
        $sql='INSERT INTO Users(Username, LastName, FirstName, Password, Birthday, Userkey) VALUES (\''.$selectRow[0].'\',\''.$selectRow[1].'\',\''.$selectRow[2].'\',\''.$selectRow[3].'\',\''.$formattedDate.'\',\''.$selectRow[5].'\')';
        
        $insert= pg_query($dbconn, $sql);
        
        if(!$insert)
        {
            die('Could not insert: ' . pg_last_error());
        }
        else
        {
            echo "Congratulations! You can now get started!";
            /*
            $result= pg_query($dbconn, "SELECT * FROM Users");
            
            if(!$result)
            {
                die('Could not select: ' . pg_last_error());
            }
            
            
            while ($row = pg_fetch_row($result)) {
                echo "Username: $row[0]  LastName: $row[1] FirstName: $row[2] birthday:$row[4] Userkey: $row[5]";
                echo "<br />\n";
            }
            */
            
            
         }
     
    }

?>