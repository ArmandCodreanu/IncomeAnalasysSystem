<?php


try {
    $dbh = new PDO('mysql:host=localhost;dbname=anaf', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    file_put_contents("../log.txt","[Error] " . $e->getMessage() . "\r\n", FILE_APPEND);
    die("Failed to connect to db!");
}
?>