<?php

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
use Doctrine\DBAL\ParameterType;

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
/*
   $sql2 = "SELECT * FROM submissions";
   $stmt2 = $conn->query($sql2); 
   while ($row = $stmt2->fetch()) {
     print_r($row);
   }
*/

}catch(Exception $e){
  print "Error\n";
  print $e;
}