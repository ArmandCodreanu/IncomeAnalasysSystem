<?php

require_once("inc/conn.php");


if(isset($_GET['newsub'])){
    $query = "SELECT count(1) FROM bilant WHERE cnp = :cnp";
    $stmt = $dbh -> prepare($query);
    $stmt -> bindValue(":cnp", $_GET['newCNP']);
    $count = $stmt -> execute();
    $res = $stmt -> fetch($count);
    $count = $res["count(1)"];
    if($count){
        echo "<script>alert('CNP deja existent!');</script>";
    } else {
        $query = "
            INSERT INTO bilant (cnp, traieste) VALUES(:cnp, :traieste);
            INSERT INTO imobile (cnp) VALUES(:cnp);
            INSERT INTO mobile (cnp) VALUES(:cnp);
            INSERT INTO personale (cnp) VALUES(:cnp);
            INSERT INTO sanatate (cnp) VALUES(:cnp);
            INSERT INTO venituri (cnp) VALUES(:cnp);
        ";
        $stmt = $dbh -> prepare($query);
        $stmt -> bindValue(":cnp", $_GET['newCNP']);
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
    <input type="text" name="newCNP" placeholder="CNP Nou" onkeypress='return event.charCode >= 48 && event.charCode <= 57'><br>
    <input type="text" name="validCNP" placeholder="Repeta CNP" onkeypress='return event.charCode >= 48 && event.charCode <= 57'><span id="msj"></span><br>
    <select name="alive">
        <option value="1">Traieste</option>
        <option value="0">Decedat</option>
    </select><br>
    <input type="submit" name="newsub" value="Adauga">
</form>
<script src="../includes/js/jquery-3.2.1.min.js"></script>
<script>
$(document).ready(function(){
    $("input[name=validCNP]").keyup(function(){
        if($(this).val() != $("input[name=newCNP]").val()){
            $("#msj").html("Repetat gresit!");
        }else { 
            $("#msj").html("Corect!");
        }
    });
});
</script>