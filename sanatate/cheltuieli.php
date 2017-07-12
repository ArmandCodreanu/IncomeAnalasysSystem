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
        echo "CNP inexistent!<br>";
    } else {
        $query = "UPDATE sanatate SET cheltuieli = cheltuieli + :cheltuieli WHERE cnp = :cnp";
        $stmt = $dbh -> prepare($query);
        $stmt -> bindValue(":cnp", $_GET['cnp']);
        $stmt -> bindValue(":cheltuieli", $_GET['cheltuieli']);
        $res = $stmt -> execute();
        if($res){
            echo "Succes!";
            
            $query = "SELECT asigurat FROM sanatate WHERE cnp = :cnp";
            $stmt = $dbh -> prepare($query);
            $stmt -> bindValue(":cnp", $_GET['cnp']);
            $stmt -> execute();
            $res = $stmt -> fetch(PDO::FETCH_OBJ);
            if($res -> asigurat != 1){
                $cnp = $_GET['cnp'];
                require_once("../includes/check.php");   
            }
        }
        else 
            echo "Failed!";
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
    <input type="text" name="cheltuieli" placeholder="Cheltuieli RON"><br>
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
       <li>Cautati CNP-ul dorit</li> 
       <li>Adaugati cheltuielile de sanatate <strong>o singura data</strong></li>    
    </ol>
</div>
<script src="../includes/js/jquery-3.2.1.min.js"></script>
<script src="../includes/js/script.js"></script>