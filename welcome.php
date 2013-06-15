<?php

    echo 'Welcome'
    
    $dbconn = pg_connect("host=ec2-23-21-85-233.compute-1.amazonaws.com port=5432 dbname=d3m7bds1jom9ml user=bwhsvkshzcmema password=1zleSvvgAStyG9Wv0sBri188qW sslmode=require options='--client_encoding=UTF8'") 
    
    if (!$db) {
        die('Could not connect: ' . pg_last_error());
    }
    
    echo 'Connected successfully';

?>