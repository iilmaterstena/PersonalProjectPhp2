<?php

include "config.php"; 

try {
    $connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
    die("Lidhja dështoi: " . $e->getMessage());
}
?>