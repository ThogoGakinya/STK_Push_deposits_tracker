<?php 
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','cybrexsy_payments');
define('DB_PASS','MPESAPayments');
define('DB_NAME','cybrexsy_payments');

// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

    echo "Connection was successful";
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>