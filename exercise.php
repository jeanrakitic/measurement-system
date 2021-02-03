<DOCTYPE htlm>
 <html>

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
print "<TR><TD>id</TD><TD>Address</TD><TD>Port</TD><TD>Status</TD><TD> NO failed times</TD><TD>Failed time</TD><TD>total time</TD> </TR>\n";
while ($row = mysqli_fetch_array ($result)) {
$id = $row[0];
$address = $row[1];
$port = $row[2];
$failedCon = $row[3];
$ftime = $row[4];
$totTime = $row[5];
   

$fp = @fsockopen($host, $port, $errno, $errstr, 30);
  $T = date('Y-m-d')."       ".date('h:i:sa');
   
    $fp = @fsockopen($address, $port, $errno, $errstr, 30);
 if ($fp) { $status = "ok";
  mysqli_query($connection, "update hosts set failedCon = 0");
 mysqli_query($connection, "update hosts set FailedTime = '---' where Id = $id");
   
 } else {
     $status= "out-of-order";
     
      $h = mysqli_query($connection, "update hosts set failedCon = $failedCon + 1 where Id = $id");
     
     
         if($failedCon==1){
             mysqli_query($connection, "update hosts set FailedTime =DATE_FORMAT(NOW(),'%Y-%m-%d %T') where Id = $id");
            // mysqli_query($connection, "insert into hostname (Id,Address,port,failedCon,Totaltime) values($id,$address,$port,$failedCon,DATE_FORMAT(NOW(),'%Y-%m-%d %T'),$totTime");
         }
         else{
           //mysqli_query($connection, "update hostname set FailedTime = '---' where Id = $id");
         }
      //mysqli_query($connection, "insert into failee (Id,timeT,Idhost) values(1,DATE_FORMAT(NOW(),'%Y-%m-%d %T'),$id)");
 
    //mysqli_query($connection, "update hostname set FailedTime =DATE_FORMAT(NOW(),'%Y-%m-%d %T') where Id = $id");
     }
   
     
if (!$fp) { $status = "$errstr ($errno)"; }
print "<TR><TD>$id</TD><TD>$address</TD><TD>$port</TD><TD>$status</TD><TD>$failedCon</TD><TD>$ftime</TD><TD>$totTime</TD></TR>\n";
}
print "</TABLE>";
mysqli_close($connection);   
?>

</body>
 </html>
