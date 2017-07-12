<?php

require_once("inc/conn.php");

if(isset($_GET['chsub'])){
    $query = "SELECT count(1) FROM bilant WHERE cnp = :cnp";
    $stmt = $dbh -> prepare($query);
    $stmt -> bindValue(":cnp", $_GET['cnp']);
    $count = $stmt -> execute();
    $res = $stmt -> fetch($count);
    $count = $res["count(1)"];
    if(!$count){
        echo "<script>alert('CNP inexistent!');</script>";
    } else {
        $query = "UPDATE sanatate SET cheltuieli = cheltuieli + :cheltuieli WHERE cnp = :cnp";
        $stmt = $dbh -> prepare($query);
        $stmt -> bindValue(":cnp", $_GET['cnp']);
        $stmt -> bindValue(":cheltuieli", $_GET['cheltuieli']);
        $res = $stmt -> execute();
        if($res)
            echo "<script>alert('Succes!');</script>";
        else 
            echo "<script>alert('Failed!');</script>";
    }
}

?>
<form>
    <input type="text" name="cnp" placeholder="CNP" onkeypress='return event.charCode >= 48 && event.charCode <= 57'><br>
    <input type="text" name="cheltuieli" placeholder="Cheltuiel RON"><br>
    <input type="submit" name="chsub" value="Adauga">
</form>