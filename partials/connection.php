<?php
/**
 * Script Name: COnnection file for DB
 * User: Ashfaq H Ahmed
 * Twitter: https://twitter.com/ashfaq8495
 */


$dsn = 'mysql:host=localhost;dbname=autoLogout';
$username = 'root';
$password = '';

try {
    $connection = new PDO($dsn, $username, $password);
    //Set the error reporting mode.
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Set fetch mode
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Connection Failed" . $e->getMessage();
}