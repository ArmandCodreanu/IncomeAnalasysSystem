<?php

require_once("inc/conn.php");

if(isset($_GET['archivesub'])){
    $query = "SELECT count(1) FROM bilant WHERE cnp = :cnp";
    $stmt = $dbh -> prepare($query);
    $stmt -> bindValue(":cnp", $_GET['cnp']);
    $count = $stmt -> execute();
    $res = $stmt -> fetch($count);
    $count = $res["count(1)"];
    if(!$count){
        echo "<script>alert('CNP inexistent!');</script><br>";
    } else {
        $query = "UPDATE bilant SET traieste = :traieste WHERE cnp = :cnp";
        $stmt = $dbh -> prepare($query);
        $stmt -> bindValue(":cnp", $_GET['cnp']);
        $stmt -> bindValue(":traieste", $_GET['alive']);
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
    <select name="alive">
        <option value="1">Traieste</option>
        <option value="0">Decedat</option>
    </select><br>
    <input type="submit" name="archivesub" value="Adauga">
</form>