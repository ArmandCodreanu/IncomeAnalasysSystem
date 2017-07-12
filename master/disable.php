<?php

session_start();
$server = "localhost";
$dbname = "anaf";
$user = "root";
$pass = "";

require_once("../includes/conn.php");

if(isset($_GET['disable'])){
    $query = "SELECT count(1) FROM bilant WHERE cnp = :cnp";
    $stmt = $dbh -> prepare($query);
    $stmt -> bindValue(":cnp", $_GET['cnp']);
    $count = $stmt -> execute();
    $res = $stmt -> fetch($count);
    $count = $res["count(1)"];
    if($count){
        $query = "INSERT INTO disabled (cnp) VALUES (:cnp)";
        $stmt = $dbh -> prepare($query);
        $stmt -> bindValue(":cnp", $_GET['cnp']);
        if($stmt -> execute()) echo "Success!";
        else echo "Failed!";
        
        
        $query = "
        DELETE FROM bilant WHERE cnp = :cnp";
        $stmt = $dbh -> prepare($query);
        $stmt -> bindValue(":cnp", $_GET['cnp']);
        if($stmt -> execute()) echo "Success!";
        else echo "Failed!";
    } else echo "CNP Inexistent!";
}

?>
<form>
    <input type="text" name="cnp" placeholder="CNP"><br>
    <input type="submit" name="disable" value="Dezactiveaza">
</form>