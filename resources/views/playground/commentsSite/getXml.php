<?php

if (!empty($_POST['data'])) {

    $data = $_POST['data'];
    
    //$xml = simplexml_load_file("../saved_projects/".$data.".xml");
    echo readfile("../saved_projects/".$data.".xml");
    //echo $xml;
}
?>