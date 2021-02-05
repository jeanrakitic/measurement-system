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
$time = date('H:i:s', time());

if (ISSET($_POST['button'])) {
    
    $one = $_POST["one"];
$two = $_POST['two'];
$three = $_POST['three'];
$four = $_POST['four'];
$five = $_POST['five'];
//mysqli_query($connection, "UPDATE measurements SET  x1='$one', x2 ='$two', x3='$three', x4='$four', x5= '$five' WHERE 
//id = 1") or die ("DB dfdf: $dbname"); 

mysqli_query($connection, "INSERT INTO measurement (x1,x2,x3,x4,x5) VALUES('$one','$two','$three','$four','$five')") or die ("DB dfdf: $dbname"); 


    $result = mysqli_query($connection, "SELECT * FROM measurement ") or die ("DB error: $dbname");
     $row = mysqli_fetch_array ($result);
$id = $row[0];
$x1 = $row[1];
$x2 = $row[2];
$x3 = $row[3];
$x4 = $row[4];
$x5 = $row[5];




}
?>
  

 <!DOCTYPE html>
<html> 
<head> 
</head>
<body> 
    <p> <h2>enter the values </h2> </p>
<form method="POST">
<br>
x1:<input type="text" name="one" maxlength="10" size="10"><br>
x2:<input type="text" name="two" maxlength="10" size="10"><br>
x3:<input type="text" name="three" maxlength="10" size="10"><br>
x4:<input type="text" name="four" maxlength="10" size="10"><br>
x5:<input type="text" name="five" maxlength="10" size="10"><br>
<input type="submit" name="button" value="Send"/>
</form>

<p> check graph<a href="graph.php"> here </a> </p>
</body>
</html> 


