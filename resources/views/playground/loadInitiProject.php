<?php 
if(!empty($_POST['data'])){
$data = $_POST['data'];
$fname = mktime() . ".xml";//generates random name

$file = fopen("upload/" .$fname, 'w');//creates new file
fwrite($file, $data);
fclose($file);
}
 ?>