<?php

session_start();
$_SESSION = array();
session_destroy();

$dbh = NULL;

header("Location: login.php");

?>