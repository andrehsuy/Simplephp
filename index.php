<html>
<head></head>
<body>
<?php
        // Remember to copy files from the SDK's src/ directory to a
        // directory in your application on the server, such as php-sdk/
        require_once('facebook-php-sdk-master/src/facebook.php');
          
        $config = array(
                        'appId' => '568310513202986',
                        'secret' => 'e266cf63ed2acfdf6e009ba030accc77',
                        'sharedSession'=> true;
                        'trustFowarded'=>true;
                        );
     
    
        $facebook = new Facebook($config);
        $user_id = $facebook->getUser();
    ?>

<?php
    if($user_id) {
        
        // We have a user ID, so probably a logged in user.
        // If not, we'll get an exception, which we handle below.
        try {
            $fql = 'SELECT name, sex from user where uid = ' . $user_id;
            
            
            $ret_obj = $facebook->api(array(
                                            'method' => 'fql.query',
                                            'query' => $fql,
                                            ));
            if($ret_obj[0]['sex']=="male")
            {
                $friends='SELECT uid, name, sex from user where uid in(select uid2 from friend where uid1 = me()) and sex = "female"';
            }
            else
            {
                
                $friends='SELECT uid, name, sex from user where uid in(select uid2 from friend where uid1 = me()) and sex = "male"';
                
            }
          
            $potential_partners = $facebook->api(array(
                                            'method' => 'fql.query',
                                            'query' => $friends,
            ));
            
               print_r($potential_partners);
            /*
            global $db;
            $db=  mysql_connect('localhost','root','');
            mysql_select_db('newdatabase');
            
            if(mysqli_connect_errno())
            {
                echo 'Could not connect to database!';
                exit;
            }
            
            
            for($i=0;$i<80; i++)
            {
                $imageLink= "<img src=\"http://graph.facebook.com/".$potential_partners[%i]['uid']."/picture?type=square\" />"
               
                $query="INSERT INTO Dating_Participants VALUES ($potential_partners[%i]['uid'], $potential_partner[%i]['name'], $potential_partner[%i]['sex'], 'something', 'something', 'something',$imageLink )";
                
                 mysql_query("$query");
            }
            */
            
            
// FQL queries return the results in an array, so we have
            //  to get the user's name from the first element in the array.
           // echo '<pre>Name: ' . $ret_obj[0]['name'] . '</pre>';
           // echo '<pre>Female Friend ' . $females[10]['name'] . '</pre>';
         
        } catch(FacebookApiException $e) {
            // If the user is logged out, you can have a
            // user ID even though the access token is invalid.
            // In this case, we'll get an exception, so we'll
            // just ask the user to login again here.
            $login_url = $facebook->getLoginUrl();
            echo 'Please <a href="' . $login_url . '">login.</a>';
            error_log($e->getType());
            error_log($e->getMessage());
        }   
    } else {
        
        // No user, so print a link for the user to login
        $login_url = $facebook->getLoginUrl();
        echo 'Please <a href="' . $login_url . '">login.</a>';
        
    }
    
    ?>

</body>
</html>