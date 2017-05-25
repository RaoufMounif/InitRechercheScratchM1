<?php

if (!empty($_POST['data'])) {

    
    $data = "---->";
    $data .= $_POST['data'];
 
            
           
file_put_contents('corpusApp.txt', $data, FILE_APPEND | LOCK_EX);

 echo $data;   
    //echo $xml;
}
?>