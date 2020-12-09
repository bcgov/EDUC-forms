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
print getenv('DB_NAME');

// Database connection
try{
  $conn = DriverManager::getConnection($connectionParams, $config);
  // Database query builder
  $qb = $conn->createQueryBuilder(); 
  /*

  //Create a TABLE
  $sql = "CREATE TABLE submissions(
    name VARCHAR(255) NOT NULL,
    email VARCHAR(50)
    )";
  if ($conn->query($sql) === TRUE) {
    echo "Table employees created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

    */

/*
    $sql = "INSERT INTO submissions (name, email)
    VALUES ('shaun', 'shaun.lum@gov.bc.ca')";
    $stmt = $conn->query($sql); 
*/



  $sql2 = "SELECT * FROM submissions";
  $stmt2 = $conn->query($sql2); 
  while ($row = $stmt2->fetch()) {
    print_r($row);
  }


  
  $conn->close();
}catch(Exception $e){
  print "Error\n";
  print $e;
}


