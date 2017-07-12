<?php

require_once("inc/conn.php");


if(isset($_GET['modsub'])){
    $query = "SELECT count(1) FROM bilant WHERE cnp = :cnp";
    $stmt = $dbh -> prepare($query);
    $stmt -> bindValue(":cnp", $_GET['cnp']);
    $count = $stmt -> execute();
    $res = $stmt -> fetch($count);
    $count = $res["count(1)"];
    if(!$count){
        echo "<script>alert('CNP inexistent!');</script>";
    } else {
        $query = "UPDATE sanatate SET asigurat = :asigurat WHERE cnp = :cnp";
        $stmt = $dbh -> prepare($query);
        $stmt -> bindValue(":cnp", $_GET['cnp']);
        $stmt -> bindValue(":asigurat", $_GET['asigurat']);
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
    <select name="asigurat">
        <option value="1">Asigurat</option>
        <option value="0">Neasigurat</option>
    </select><br>
    <input type="submit" name="modsub" value="Modifica">
</form>