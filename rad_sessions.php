<link href="style.css" rel=stylesheet type="text/css">
<h1>Zoznam poslednych 100 uzivatelskych sedeni</h1>
<?php

include("db.php");

$sql = 'SELECT `username`,round(`acctsessiontime`/60,1) as `acctsessiontime_min`,`callingstationid`,`framedipaddress`,`acctstarttime`,`acctstoptime`,`acctterminatecause` FROM `radacct` ORDER BY `acctsessiontime` DESC LIMIT 100';
$raw = mysql_query($sql);

if (!$raw) {
	echo mysql_error();
}

while ($row = mysql_fetch_assoc($raw)) {
	$data[] = $row;
}

echo '<table>';
#list all fields
foreach ($data as $row) {
	echo "<tr><td></td>";
	foreach ($row as $key=>$val) {
		echo "<td><b>$key</b></td>";
	}
	echo "</tr>";
	break;
}
#list data
$i = 0;
foreach ($data as $row) {
	echo "<tr><td>".++$i."</td>";
	foreach ($row as $key=>$val) {
		echo "<td>$val</td>";
	}
	echo "</tr>";
}
echo '</table>';

?>
