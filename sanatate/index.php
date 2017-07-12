<?php


require_once("inc/conn.php");

if($_SESSION['castel'] !== "nisip"){
    header("Location: login.php");
}

?>
<link rel="stylesheet" href="../includes/css/style.css">
<style>
    .header {
        background: #18FF6D;
    }
    
    .descriere {
        background: #18FF6D;
    }
    
    .formular {
        background: #18FF6D;
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
    
    .content {
        background: #18FF6D;
    }
</style>
<div class="content shown">
    

<a href="modify.php">Modifica CNP</a><br>
<a href="cheltuieli.php">Adauga cheltuieli</a>
</div>
<div class="header">
    <img src="../includes/img/logo.png" alt="">
    <div class="titlu">
        SANATATE
    </div>
    <a href="logout.php">Log out</a>
</div>
<div class="descriere">
   <span class="instructiuni">Instructiuni</span><br>
    Sunteti logat ca utilizator al SANATATE in reteaua <strong>Income Analasys System</strong>.
    <ol style="margin-top:20px;padding-left:20px;">
       <li>Selectati actiunea dorita</li>
    </ol>
</div>
<script src="../includes/js/jquery-3.2.1.min.js"></script>
<script src="../includes/js/script.js"></script>