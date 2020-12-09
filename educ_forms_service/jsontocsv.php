<?php

require 'config.php';
$columns = "";
$data = ""; 
$form = $_GET['form_name'];
$filetype = $_GET['file_type'];



 function flatten_columns($items,$parent, &$columns) {
    foreach($items as $key => $value) {
        if(is_array($value)){
            //print $item . "\n\t||CHILDREN||\n" ;
            $columns .= $parent . flatten_columns($value, $key, $columns) ;
        }else{
            if($parent != ""){
                //not the parent
                $columns .= $parent. "-" . $key . ",";
            }else{
                //is the parent
                $columns .= $key . ",";
            }
        }
    }
}
function flatten_data($items,$parent, &$data) {
    foreach($items as $key => $value) {
        if(is_array($value)){
            $data .= flatten_data($value, $key, $data) ;
        }else{
            $data .= $value . ",";
        }
    }
}
$form= $_GET['form_name'];
if(isset($form)){
$sql = "SELECT * FROM submissions WHERE FORM_NAME='". $form. "'";
}else{
$sql = "SELECT * FROM submissions";
}

if($_GET['file_type'] == "json"){
    try{


        $statement = $conn->query($sql); 
        $header = "";
        $json = "";
        while($row = $statement->fetch()) {
            $json .= $row['SUBMISSION_DATA'] . ",";
        }
        header('Content-Type: application/json');
        $json = rtrim($json, ",");
        $json = "[" . $json .  "]";
        print $json;
        /* Delete all rows */
        //  $sql3 = "DELETE FROM submissions";
        //  $statement = $conn->query($sql3); 


    }catch(Exception $e){
        print "Error\n";
        print $e;
    }   
}




if($_GET['file_type'] == "csv"){
//populate with columns and data

    
    $statement = $conn->query($sql); 
    
    $has_csv_header = "";
    while($row = $statement->fetch()) {
        $json = $row['SUBMISSION_DATA'];
        if(!$has_csv_header){
            flatten_columns(json_decode($json,true),"", $columns);
            $has_csv_header = "yes";
        }
        flatten_data(json_decode($json,true),"", $data);
        $data .= "\n";
    }
    header('Content-Type: application/csv');
    print $columns . "\n";
    print trim($data);


}







/*
$myfile = fopen("submission.csv", "w") or die("Unable to open file!");
$txt = $columns ."\n". $data;
fwrite($myfile, $txt);
fclose($myfile);
*/




?>
