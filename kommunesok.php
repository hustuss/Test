<?php

<<<<<<< HEAD
//this file is for testing only
=======

>>>>>>> fb25b7a3e190b17f4d2b5beeebf75ca608912af0
$kommuner = json_decode(file_get_contents('komno.json'));

$search_txt = strtolower(utf8_decode($_GET['term']));

$results = array();

foreach($kommuner as $kommune){
    if(strpos(strtolower(utf8_decode($kommune->kom_name)), $search_txt) === 0){        
       $results[] = array("name"=>$kommune->kom_name, "value" => $kommune->kom_nr);
    }        
}

echo json_encode(array('results' => $results));
<<<<<<< HEAD
=======



>>>>>>> fb25b7a3e190b17f4d2b5beeebf75ca608912af0
?>
