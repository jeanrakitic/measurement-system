<?php
    $dbhost="remotemysql.com"; 
    $dbuser="phzp2UddPb";
    $dbpassword="HQjL16d2AX";
    $dbname="phzp2UddPb";
$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
$result = mysqli_query($connection, "SELECT * FROM measurements ORDER BY id DESC LIMIT 5") or die ("DB error: $dbname");
    
require_once 'phplot.php';
$plot = new PHPlot(1000,1000);
$plot->SetDataColors(array('green','blue','red','salmon', 'navy'));

while ($row = mysqli_fetch_array ($result)){
    
 $id = $row[0];
$x1 = $row[1];
$x2 = $row[2];
$x3 = $row[3];
$x4 = $row[4];
$x5 = $row[5];
$data = array(
array('14:30',1,$x1,$x2,$x3,$x4,$x5),
array('14:35',2,$x2,$x3,$x4,$x5,$x1),
array('14:40',3,$x5,$x4,$x3,$x1,$x2),
array('14:45',4,$x4,$x5,$x1,$x2,$x3), 
array('14:50',5,$x5,$x2,$x2,$x3,$x4),);

$plot->SetDataValues($data);


 

};
$plot->SetTitle('sanjar');
$plot->SetDataType('data-data');// optional title of the graph
$plot->SetXTickLabelPos('none');
$plot->SetXTickPos('none');  
$plot->DrawGraph();

?>
