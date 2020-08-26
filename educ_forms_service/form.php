<?php
require 'config.php';
echo '<p>This is a PHP script</p>';
echo getenv("DB_TABLE")
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_POST;
    if (empty($name)) {
      echo "Post is empty";
    } else {
      print_r($name);
    }
}
?>