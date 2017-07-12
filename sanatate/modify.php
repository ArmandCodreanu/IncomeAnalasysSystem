<?php

require_once("inc/conn.php");

if($_SESSION['castel'] !== "nisip"){
    header("Location: login.php");
}

if(isset($_GET['sub'])){
    $query = "SELECT count(1) FROM bilant WHERE cnp = :cnp";
    $stmt = $dbh -> prepare($query);
    $stmt -> bindValue(":cnp", $_GET['cnp']);
    $count = $stmt -> execute();
    $res = $stmt -> fetch($count);
    $count = $res["count(1)"];
    if(!$count){
        echo "<script>alert('CNP Inexistent!');</script>";
    } else {
        $query = "UPDATE sanatate SET asigurat = :asigurat WHERE cnp = :cnp";
        $stmt = $dbh -> prepare($query);
        $stmt -> bindValue(":cnp", $_GET['cnp']);
        $stmt -> bindValue(":asigurat", $_GET['asigurat']);
        $res = $stmt -> execute();
        if($res)
            echo "<script>alert('Succes!');</script>";
        else 
            echo "<script>alert('Eroare!');</script>";
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
    <input type="text" name="cnp" placeholder="CNP" onkeypress='return event.charCode >= 48 && event.charCode <= 57'><br>
    <select name="asigurat">
        <option value="1">Asigurat</option>
        <option value="0">Neasigurat</option>
    </select><br>
    <input type="submit" name="sub" value="Modifica">
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
       <li>Cautati CNP-ul dorit</li> 
       <li>Schimbati starea CNP-ului</li>
    </ol>
</div>
<script src="../includes/js/jquery-3.2.1.min.js"></script>
<script src="../includes/js/script.js"></script>