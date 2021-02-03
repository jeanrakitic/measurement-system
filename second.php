<?php
$ipaddress = $_SERVER["REMOTE_ADDR"];

 $dbhost="remotemysql.com"; 
    $dbuser="phzp2UddPb";
    $dbpassword="HQjL16d2AX";
    $dbname="phzp2UddPb";
$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
if (!$connection) {
echo " MySQL Connection error." . PHP_EOL;
echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
echo "Error: " . mysqli_connect_error() . PHP_EOL;
exit;
}
mysqli_query($connection, "INSERT INTO second (Address) VALUES('$ipaddress')") or die ("DB error: $dbname");

$result = mysqli_query($connection, "SELECT * FROM googLink") or die ("DB error: $dbname");
print "<TABLE CELLPADDING=5 BORDER=1 >";
print "<TR><TD>id</TD><TD>Address</TD><TD>Date/Time</TD><TD>Map Link</TD></TR>\n";
while ($row = mysqli_fetch_array ($result)) {
$id = $row[0];
$address = $row[1];
$datetime = $row[2];
$map ="<a href='https://www.google.pl/maps/place/'.$ipaddress> maps </a>";

print "<TR><TD>$id</TD><TD>$address</TD><TD>$datetime</TD><TD>$map</TD></TR>\n";
}
print "</TABLE>";

mysqli_close($connection);
?>
