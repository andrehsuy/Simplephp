
<?php
        // Remember to copy files from the SDK's src/ directory to a
        // directory in your application on the server, such as php-sdk/
        require_once('facebook-php-sdk-master/src/facebook.php');
          
        $config = array(
                        'appId' => '161479254012995',
                        'secret' => '88962d7e6e8916648c372358c84068fe'
                        ); //adding in trustfowarding and sharedSession hide login part (good?)
     
    
        $facebook = new Facebook($config);
        $user_id = $facebook->getUser();
    ?>
<html>
<head></head>
<body>
<?php
    if($user_id) {
        
        // We have a user ID, so probably a logged in user.
        // If not, we'll get an exception, which we handle below.
        //$con=mysqli_connect("localhost","peter","abc123","my_db");
        //$db = pg_connect("host=ec2-23-21-85-233.compute-1.amazonaws.com port=5432 dbname=d3m7bds1jom9ml user=bwhsvkshzcmema password=1zleSvvgAStyG9Wv0sBri188qW sslmode=require options='--client_encoding=UTF8'") or die('Could not connect: ' . pg_last_error());
        
        try {
            $fql = 'SELECT name, sex FROM user WHERE uid = ' . $user_id;
            
             echo "checkpoint 1";
            $ret_obj = $facebook->api(array(
                                            'method' => 'fql.query',
                                            'query' => $fql,
                                            ));
            if($ret_obj[0]['sex']=="male")
            {
                $friends='SELECT uid, name, sex FROM user WHERE uid IN(SELECT uid2 FROM friend  WHERE uid1 = me()) and sex = "female"';
            }
            else
            {
                
                $friends='SELECT uid, name, sex FROM user WHERE uid IN(SELECT uid2 FROM friend WHERE uid1 = me()) and sex = "male"';
                
            }
          
            $potential_partners = $facebook->api(array(
                                            'method' => 'fql.query',
                                            'query' => $friends,
            ));
            
            
             echo "checkpoint 3";
            //$db=  mysql_connect('mysql.tedx.msjhs.net','tedxmsjhs','ws8sn#N8957HB!ok');
            $db=  mysql_connect('localhost:3306','root','');
            if (!$db) {
                die('Could not connect: ' . mysql_error());
            }
            
            $db_selected = mysql_select_db('newDatabase', $db);
            if (!$db_selected) {
                die ('Can\'t use foo : ' . mysql_error());
            }
            
            echo 'Connected successfully';
          
            
           
        //    mysql_close($db);
            
             
              // print_r($potential_partners);
            
    
            for($i=0;$i<80; $i++)
            {
            $imageLink="facebook.com";
            $query="INSERT INTO Hash_Dating(11111, 'andre', 'male','facebook.com')";
            //$query="'INSERT INTO Hash_Dating (P_ID, Name, gender,image) VALUES ($potential_partners[$i]['uid'], '$potential_partners[$i]['name']', '$potential_partners[$i]['sex']','$imageLink')'";
            mysql_query($query);
                if (!$result) {
                    $message  = 'Invalid query: ' . mysql_error() . "\n";
                    $message .= 'Whole query: ' . $query;
                    die($message);
                }
            echo "loop".$i;
        
            }
          
            
            
// FQL queries return the results in an array, so we have
            //  to get the user's name from the first element in the array.
           // echo '<pre>Name: ' . $ret_obj[0]['name'] . '</pre>';
           // echo '<pre>Female Friend ' . $females[10]['name'] . '</pre>';
         
        }
        catch(FacebookApiException $e)
        {
            // If the user is logged out, you can have a
            // user ID even though the access token is invalid.
            // In this case, we'll get an exception, so we'll
            // just ask the user to login again here.
            $login_url = $facebook->getLoginUrl();
            echo 'Please <a href="' . $login_url . '">login.</a>';
            error_log($e->getType());
            error_log($e->getMessage());
        }   
    }
    
    else {
        
        // No user, so print a link for the user to login
        $login_url = $facebook->getLoginUrl();
        echo 'Please <a href="' . $login_url . '">login.</a>';
        
    }
?>

</body>
</html>