<?php
require_once('phpcassa/connection.php');	//Include Connection Classes
require_once('phpcassa/columnfamily.php'); //Include column family Classes
$servers = array("127.0.0.1:9160");			//specify servers ip and port	
$pool = new ConnectionPool("testApp"/*, $servers*/ );//will connect to defult server i.e. localhost:9160
$User_column_family = new ColumnFamily($pool, 'Users');	//Will connect to Users Column Family
?>
<table style="border:1px outset grey; border-spacing:2px;">
<tr style="border:1px outset grey;">
<td style="border:1px outset grey;">Name</td>
<td style="border:1px outset grey;">Email</td>
<td style="border:1px outset grey;">Password</td>
<td style="border:1px outset grey;">Edit</td>
<td style="border:1px outset grey;">Delete</td>
</tr>

<?php
$rows = $User_column_family->get_range("", "", 1000000, array("Name", "Email", "Password"));
foreach($rows as $key => $columns) {
echo "<tr>";
    echo "<td style=\"border:1px outset grey;\">"
	.$columns["Name"]."</td>"."<td  style=\"border:1px outset grey;\">"
	.$columns["Email"]."</td>"."<td  style=\"border:1px outset grey;\"  >"
	.$columns["Password"]."</td>" . "<td style=\"border:1px outset grey;\"><button onclick=\"javascript:window.location.replace('Edit.php?key="
	.$columns["Name"]."');\">Edit</button></td>"  . "<td style=\"border:1px outset grey;\"><button onclick=\"javascript:window.location.replace('Delete.php?key="
	.$columns["Name"]."');\">Delete</button></td>";
	echo "</tr>";
}
?>
</table>
<button onclick="window.location.replace('Edit.php');"> Add New User</button>