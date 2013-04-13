
<?php
        // Remember to copy files from the SDK's src/ directory to a
        // directory in your application on the server, such as php-sdk/
        require_once('facebook-php-sdk-master/src/facebook.php');
        
        $config = array(
                        'appId' => '568310513202986',
                        'secret' => '47001347f1e9d46811687a6841bef2b0',
                        );
        
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
        try {
            $fql = 'SELECT name from user where uid = ' . $user_id;
            
            $gender="female";
            
            $friends='SELECT uid, name, sex from user where uid in(select uid2 from friend where uid1 = me()) and sex = ' . $gender;
            $ret_obj = $facebook->api(array(
                                            'method' => 'fql.query',
                                            'query' => $fql,
                                            ));
            
            $potential_partners = $facebook->api(array(
                                            'method' => 'fql.query',
                                            'query' => $friends,
                                            ));
            
            // FQL queries return the results in an array, so we have
            //  to get the user's name from the first element in the array.
            echo '<pre>Name: ' . $ret_obj[0]['name'] . '</pre>';
            echo '<pre>Female Friend ' . $females[10]['name'] . '</pre>';
            print_r($potential_partners);
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