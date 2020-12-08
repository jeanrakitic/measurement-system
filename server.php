<?php

$dbname ="phzp2UddPb";
$dbname = "phzp2UddPb";
$link = mysqli_connect("remotemysql.com", "phzp2UddPb", "HQjL16d2AX","phzp2UddPb" );
 
// Check connection
if($link === faSlse){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Print host information
echo "Connect Successfully. Host info: " . mysqli_get_host_info($link);

?>
