<?php

if (!empty($_POST['data'])) {

    $data = $_POST['data'];
    
    //$xml = simplexml_load_file("../saved_projects/".$data.".xml");
    //$xml= readfile("../saved_projects/".$data.".xml");
    
    $xml = new DOMDocument;
    $xml->load("../saved_projects/".$data.".xml");

    $xsl = new DOMDocument;
    $xsl->load('scratch2txt.xsl');

// Configuration du transformateur
$proc = new XSLTProcessor;
$proc->importStyleSheet($xsl); // attachement des règles xsl
$entree=$proc->transformToXML($xml);
echo $entree;
            
            

// Ecrit le contenu dans le fichier, en utilisant le drapeau
// FILE_APPEND pour rajouter à la suite du fichier et
// LOCK_EX pour empêcher quiconque d'autre d'écrire dans le fichier
// en même temps
file_put_contents('corpusApp.txt', $entree, FILE_APPEND | LOCK_EX);


    
    //echo $xml;
}
?>