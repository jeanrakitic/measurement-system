<?php
include('phplot.php');
$data = array(array('', 10), array('', 1));
$plot = new PHPlot();
$plot->SetDataValues($data);
$plot->SetTitle('First Test Plot');
$plot->DrawGraph();
?>
