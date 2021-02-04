
<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
</head>
  
<body>
<?php
require_once 'phplot.php';
$plot = new PHPlot();
$data = array(array('14:30',0,5), array('14:35',1,2), array('14:40',2,7), array('14:45',3,3), array('14:50',4,1));
$plot->SetDataValues($data);
$plot->SetDataType('data-data');
$plot->SetTitle('The example of the graph');       // optional title of the graph
$plot->DrawGraph();
?>
</body>
</html>

