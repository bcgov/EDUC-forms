<?php
require 'config.php';
function jsonToCSV($jfilename, $cfilename)
{
    if (($json = file_get_contents($jfilename)) == false)
        die('Error reading json file...');
    $data = json_decode($json, true);
    $fp = fopen($cfilename, 'w');
    $header = false;
    foreach ($data as $row)
    {
        if (empty($header))
        {
            $header = array_keys($row);
            fputcsv($fp, $header);
            $header = array_flip($header);
        }
        fputcsv($fp, array_merge($header, $row));
    }
    fclose($fp);
    return;
}

 

//print getenv("DB_TABLE");
//print file_get_contents('php://input');
print $_SERVER["REQUEST_METHOD"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // collect value of input field
    $request_body = file_get_contents('php://input');
    //$data = json_decode($request_body);
    //$file = fopen("submission.json","w");
    $submission_data = str_replace("POST","", $request_body);
    $form_name = "community-link";
    $sql = "INSERT INTO submissions (form_name, submission_data)
    VALUES ('" . $form_name . "', '" .$submission_data ."')";
    $stmt = $conn->query($sql); 


   $sql2 = "SELECT * FROM submissions";
   $stmt2 = $conn->query($sql2); 
   while ($row = $stmt2->fetch()) {
     print_r($row);
   }


    //fclose($file);
}

 


//jsonToCSV('submission.json','submission.csv');
?>