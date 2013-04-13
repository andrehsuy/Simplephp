

<html>
<head></head>
<body>
<?php
echo 'hello';

global $db;
$db=  mysql_connect('localhost','root','');
mysql_select_db('newdatabase');

if(mysqli_connect_errno())
{
    echo 'Could not connect to database!';
    exit;
}

$query= "SELECT * FROM Dating_Participants";
$result= mysql_query($query);
print mysql_error();
print_r(mysql_fetch_array($result));

echo 'done';
?>
</body>
</html>