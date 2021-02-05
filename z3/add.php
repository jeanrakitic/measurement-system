<?php
include 'Index.php';
$dbhost="localhost";
$dbuser="id15599358_sanjar95"; 
$dbpassword="Narzikulov95%"; 
$dbname="id15599358_sanjar";

$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
if (!$connection) {
echo " MySQL Connection error." . PHP_EOL;
echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
echo "Error: " . mysqli_connect_error() . PHP_EOL;
exit;
}


$time = date('H:i:s', time());

if (ISSET($_POST['post'])) {
    
   $user  = $_POST['user'];
$post  = $_POST['post'];
    
   $text = '<table  border=”1” width="90%">
   
<tr><td>'.$post.'</td><td width="100">' . $user . '</td><td width="100" bgcolor="yellow">'. $time.'</td></tr></table><br>';



mysqli_query($connection, "INSERT INTO conversation (Nick,Message) VALUES('$user','$post')") or die ("DB dfdf: $dbname");

$result = mysqli_query($connection, "SELECT * FROM conversation ORDER BY id DESC LIMIT 5") or die ("DB error: $dbname");
print "<TABLE CELLPADDING=5 BORDER=1 ' >";
while ($row = mysqli_fetch_array ($result)) {
$id = $row[0];
$nick = $row[1];
$time = $row[2];
$msg = $row[3];

print "<TR><TD>$id</TD><TD>$nick</TD><TD>$msg</TD><TD>$time</TD></TR>\n";

$file = fopen ("conversation.txt", "a+");
fwrite ($file, $text);
}
print "</TABLE>";

}
//Post:
 //  include ("conversation.txt");
?>

