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
    //$submission_data = json_decode($submission_data);
    //print_r($submission_data);
   
    
    $form_name = json_decode($submission_data)->form_name;
    

    $conn->insert('submissions', array('form_name' => $form_name,'submission_data' => $submission_data));
    try{
      $stmt = $conn->query($sql); 
    }catch(Exception $e){
      print "error";  
      print $e;
        
    }
    /*
    $stmt2 = $conn->query($sql2); 

   $sql2 = "SELECT * FROM submissions";
   $stmt2 = $conn->query($sql2); 
   while ($row = $stmt2->fetch()) {
     print_r($row);
   }
*/

    //fclose($file);
}

 /*
try{
  print "Sending mail";
  $to      = 'shaun.lum@gov.bc.ca';
  $subject = 'New Submission to FORM';
  $from = 'apache@trinity.educ.gov.bc.ca';
  $message = 'A New submission has been submitted by USER';
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  
  // Create email headers
  $headers .= 'From: '.$from."\r\n".
      'Reply-To: '.$from."\r\n" .
      'X-Mailer: PHP/' . phpversion();
  
  mail($to, $subject, $message, $headers);
  print "compelted mail mail";
}catch(Exception $e){
  print "Error";
  print $e;
}
*/

//jsonToCSV('submission.json','submission.csv');
?>