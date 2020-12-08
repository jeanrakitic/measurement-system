<head>
<meta http-equiv="refresh" content="10" />
<title>Jean-Noel  Nyirisheja</title>

</head>

<body>
<?php



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
$result = mysqli_query($connection, "SELECT * FROM hosts") or die ("DB error: $dbname");
print "<TABLE CELLPADDING=5 BORDER=1>";
print "<TR><TD>id</TD><TD>Address</TD><TD>Port</TD><TD>Status</TD> </TR>\n";
while ($row = mysqli_fetch_array ($result)) {
$id = $row[0];
$address = $row[1];
$port = $row[2];
$status;    
print "<TR><TD>$id</TD><TD>$address</TD> <TD>$port</TD><TD>$status</TD> </TR>\n";

$fp = @fsockopen($host, $port, $errno, $errstr, 30);
if ($fp) 
{ 
    $status="ok"; 
    echo $status;
} else 
{ 
    
        $status="$errstr ($errno)"; 
    echo $status;
}

}


mysqli_close($connection);

    
?>

</body>
