<?php
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');
$servers = array("127.0.0.1:9160");
$pool = new ConnectionPool("testApp"/*, $servers*/ );
$User_column_family = new ColumnFamily($pool, 'Users');

$result = $User_column_family->remove($_GET['key']);



?>

<script> window.location.replace('index.php');</script>