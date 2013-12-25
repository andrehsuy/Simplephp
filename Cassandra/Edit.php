<?php
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');
$servers = array("127.0.0.1:9160");
$pool = new ConnectionPool("testApp"/*, $servers*/ );
$User_column_family = new ColumnFamily($pool, 'Users');
?>
<Form action = "Update.php" method = "GET">
<?php 
	try
	{
		$result = $User_column_family->get($_GET['key']);
	}
	catch(Exception $e)
	{	
		$result = null; //No Item Exist for Empty Key
	}
?>
Name:<input Id="Name" Name="Name" type="text" value="<?php echo $result['Name']; ?>" <?php if($result != null) echo "READONLY=\"true\"" ?> /><br/>
Email:<input Id="Email" Name="Email" type="text" value="<?php echo $result['Email']; ?>" /><br/>
Password:<input Id="Password" Name="Password" type="text" value="<?php echo $result['Password']; ?>" /><br/>
<input type = "submit" Value="<?php if($result != null) echo 'Update'; else echo 'Save'; ?>"> 
</Form>
<?php
if($_GET['value'] != "")
{
	echo "Name Can't be Empty";
}
?>