<?php
function getHeadersFromSubmission($submissions){
    print_r($submissions);
}
session_start();

// Set the damn timezone! Yes, this *should* be set in `php.ini` but it doesn't appear to be.
ini_set('date.timezone', 'America/Los_Angeles');

// Require Composer - super handy, super helpful.
require __DIR__ . '/vendor/autoload.php';

// Dotenv config
// Allows us to use configuration variables throughout the code and store them in a single file. Useful for passwords, etc.
$dotenv = new Dotenv\Dotenv(__DIR__.'/config');
$dotenv->load();

// Database classes
use Doctrine\Common\ClassLoader;
use Doctrine\DBAL\DriverManager;

// Database config
$config = new Doctrine\DBAL\Configuration();
$table_name = getenv('DB_TABLE'); // We only use one table per eBoard.

// Database connection credentials (stored in `.env`) and supplied via `getenv()`
$connectionParams = array(
  'dbname' => getenv('DB_NAME'),
  'user' => getenv('DB_USER'),
  'password' => getenv('DB_PASSWORD'),
  'host' => getenv('DB_HOST'),
  'port' => 1521, 
  'driver' => 'oci8', // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/configuration.html 
  'service' => true
);

try{
  $conn = DriverManager::getConnection($connectionParams, $config);
  // Database query builder
  $qb = $conn->createQueryBuilder(); 
  

  //CREATE A TABLE

/*
  $sql ="DROP TABLE submissions";
  if ($conn->query($sql) === TRUE) {
    echo "Table dropped";
  } else {
    echo "Error dropping table: " . $conn->error;
  }
  */
/*
  $sql = "CREATE TABLE submissions(
    form_name VARCHAR(255) NOT NULL,
    submission_data CLOB
    )";
  if ($conn->query($sql) === TRUE) {
    echo "Table employees created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }
*/
  //INSERT IN TO TABLE
/*
  $sql = "INSERT INTO submissions (form_name, submission_data)
  VALUES ('community-link', '{hello: world}')";
  $stmt = $conn->query($sql); 
*/

  /* DISPLAY ALL SUBMISSIONS */
  $form= $_GET['form_name'];
  if(isset($form)){
   $sql2 = "SELECT * FROM submissions WHERE FORM_NAME='". $form. "'";
  }else{
     $sql2 = "SELECT * FROM submissions";
  }
  $stmt2 = $conn->query($sql2); 
  $header = "";
  print "<table border=1>";
  while($row = $stmt2->fetch()) {

    $submission_data = json_decode($row[SUBMISSION_DATA],true);
    
    if($header == ""){
      print "<tr>";
      foreach($submission_data as $key => $value) {
        print "<td>" . $key . "</td>";
      }
      print "</tr>";
    }
    
    print "<tr>";
    foreach($submission_data as $key => $value) {
      echo "<td style='background:#ccc;'>" .  $key . "</td>";
    }
    print "</tr>";
    print "<tr>";
    foreach($submission_data as $key => $value) {
      if($key =="Files"){
        $files = $value;
        print "<td>";
        foreach($files as $file){
          print '<a href="' . $file['content'] . '">' . $file['name'] .'</a>' ;
        }
        print '</td>';
      }else{
        if(is_array($value)){
          echo "<td>";
          foreach($value as $val){
            print $val;
          }
          echo "</td>";
        }else{
          echo "<td>" .  $value . "</td>";
        }
        
      }
    }
    print "</tr>";
    $header = "exists";
     $base64_str = 'data:image/' . $type . ';base64,' . $base64_code;

   }
   /* Delete all rows */
    //  $sql3 = "DELETE FROM submissions";
    //  $stmt2 = $conn->query($sql3); 

   print "</table>";

}catch(Exception $e){
  print "Error\n";
  print $e;
}