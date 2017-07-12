<?php

require_once("inc/conn.php");

if($_SESSION['joystick'] !== "karate"){
    header("Location: login.php");
}

if(isset($_GET['sub'])){
    $query = "SELECT count(1) FROM bilant WHERE cnp = :cnp";
    $stmt = $dbh -> prepare($query);
    $stmt -> bindValue(":cnp", $_GET['newCNP']);
    $count = $stmt -> execute();
    $res = $stmt -> fetch($count);
    $count = $res["count(1)"];
    if($count){
        echo "<script>alert('CNP deja existent!')</script>";
    } else {
        $query = "
            INSERT INTO bilant (cnp, traieste) VALUES(:cnp, :traieste);
            INSERT INTO personale (cnp) VALUES(:cnp);
            INSERT INTO sanatate (cnp) VALUES(:cnp);
            INSERT INTO venituri (cnp) VALUES(:cnp);
        ";
        $stmt = $dbh -> prepare($query);
        $stmt -> bindParam(":cnp", $_GET['newCNP']);
        $stmt -> bindParam(":traieste", $_GET['alive']);
        $res = $stmt -> execute();
        if($res)
            echo "<script>alert('Succes!')</script>";
        else 
            echo "<script>alert('Failed!')</script>";
    }
}

?>
<link rel="stylesheet" href="../includes/css/style.css">
<style>
    .header {
        background: #FF99C9;
    }
    
    .descriere {
        background: #FF99C9;
    }
    
    .formular {
        background: #FF99C9;
        top: 150px;
    }
    
    .formular textarea {
        width: 100%;
        border: 0;
        margin-bottom: 2px;
        resize: vertical;
        padding: 8px;
        font-weight: bold;
        color: #0048ff;
    }
</style>
<form class="formular shown">
    <input type="text" name="newCNP" placeholder="CNP Nou" onkeypress='return event.charCode >= 48 && event.charCode <= 57'><br>
    <input type="text" name="validCNP" placeholder="Repeta CNP" onkeypress='return event.charCode >= 48 && event.charCode <= 57'><span id="msj"></span><br>
    <select name="alive">
        <option value="1">Traieste</option>
        <option value="0">Decedat</option>
    </select><br>
    <input type="submit" name="sub" value="Adauga">
</form>
<div class="header">
    <img src="../includes/img/logo.png" alt="">
    <div class="titlu">
        PRIMARIE
    </div>
    <a href="logout.php">Log out</a>
</div>
<div class="descriere">
   <span class="instructiuni">Instructiuni</span><br>
    Sunteti logat ca utilizator al IMOBILE in reteaua <strong>Income Analasys System</strong>.
    <ol style="margin-top:20px;padding-left:20px;">
       <li>Introduceti noul CNP</li>
    </ol>
</div>
<script src="../includes/js/jquery-3.2.1.min.js"></script>
<script src="../includes/js/script.js"></script>