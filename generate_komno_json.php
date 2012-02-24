<?php
error_reporting(E_ALL);

$file = fopen("kommunenr.txt", "r") or exit("Unable to open file!");

$res_array = array();

while (!feof($file)) {
    $line = fgets($file);
    $line_arr = explode(";", $line);
    if (is_numeric($line_arr[0])) {
        $komno = $line_arr[0];
        $kom_name = trim($line_arr[1]);                
        $res_array[] = array('kom_nr' => $komno, 'kom_name' => utf8_encode($kom_name));
    }    
    
}

fclose($file);

$jsonified = json_encode($res_array);

if(file_put_contents('komno.json', $jsonified)){
    print "written to file komno.json";
}
?>
