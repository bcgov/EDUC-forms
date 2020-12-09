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

    // collect value of input field and put into database
    $request_body = file_get_contents('php://input');
    $submission_data = str_replace("POST","", $request_body);
    $form_name = json_decode($submission_data)->form_name;
    $form_label = json_decode($submission_data)->form_label;
    $program_area_email = json_decode($submission_data)->program_area_email;
    $submitter_email = json_decode($submission_data)->submitter_email;
    $conn->insert('submissions', array('form_name' => $form_name,'submission_data' => $submission_data));
    try{
      $stmt = $conn->query($sql); 
    }catch(Exception $e){
      print "error";  
      print $e;
        
    }
    $conn->close();
    /* SEND EMAIL TO PROGRAM AREA */
    try{
      print "Sending mail";
      $to      =  $program_area_email;
      $subject = 'New Submission to FORM';
      $from = 'apache@trinity.educ.gov.bc.ca';
      $message = 'A new submission has been submitted for ' . $form_label . '.<br><br>' . $submission_data;      
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
    /*  SEND CONFIRMATION EMAIL */
    try{
      print "Sending mail";
      $to      =  $submitter_email;
      $subject = 'New Submission to FORM';
      $from = 'apache@trinity.educ.gov.bc.ca';
      $message = 'Thank you for your completing the ' . $form_label . ' form. If you have any questions or concerns contact <a href="mailto:' . $program_area_email . '">' . $program_area_email . '</a>.';
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
}

 /*

*/

//jsonToCSV('submission.json','submission.csv');
?>