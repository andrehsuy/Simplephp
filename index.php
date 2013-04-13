

<html>
<head></head>
<body>
<?php
echo 'hello';

    echo '<p>Welcome to Hash Dating</p>';
    global $db;
    $db=  mysql_connect('localhost','root','');
    mysql_select_db('newdatabase');
    echo 'done';

    $query="SELECT * FROM Dating_Participants";
    echo 'here';
    $result= mysql_query($query);
    echo 'problem';
    print mysql_error();
    print_r(mysql_fetch_array($result));
   
    echo $num_results;


?>
</body>
</html>