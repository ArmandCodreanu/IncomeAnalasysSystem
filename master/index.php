<?php
session_start();

if($_SESSION['master'] !== "logat"){
    header("Location: login.php");
}

?>

<link rel="stylesheet" href="../includes/css/style.css">
<style>
    body {
        background: #aaa;
    }
    
    .header {
        background: #444;
        z-index: 10;
    }
    
    .descriere {
        background: #444;
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
    
    .main {
        position: absolute;
        top: 200px;
        left: 80px;
    }
    
    .section {
        margin-bottom: 30px;
        display: block;
        background-color: #444;
        border: 2px solid #753b49;
        padding: 18px;
        color: #fff;
    }
    
    .section input, .section textarea, .section select {
        width: 100%;
        font-size: 16px;
    }
</style>
<div class="main">
<div class="section">
Adauga CNP
<?php include_once("primarie/new.php"); ?>
</div>
<div class="section">
Arhiveaza CNP
<?php include_once("primarie/archive.php"); ?>
</div>
<div class="section">
Actualizeaza venituri CNP
<?php include_once("anaf/index.php"); ?>
</div>
<div class="section">
Atribuie imobil CNP
<?php include_once("imobile/index.php"); ?>
</div>
<div class="section">
Atribuie mobil CNP
<?php include_once("mobile/index.php"); ?>
</div>
<div class="section">
Modifica CNP - sanatate
<?php include_once("sanatate/modify.php"); ?>
</div>
<div class="section">
Adauga cheltuieli sanatate CNP
<?php include_once("sanatate/cheltuieli.php"); ?>
</div>
<div class="section">
Dezactiveaza CNP
<?php include_once("disable.php"); ?>
</div>
<div class="section">
Adauga Analist
<?php include_once("analisti/analisti.php"); ?>
</div>
</div>
<div class="header">
    <img src="../includes/img/logo.png" alt="">
    <div class="titlu">
        MASTER
    </div>
    <a href="logout.php">Log out</a>
</div>
<div class="descriere" style="color:#fff;">
   <span class="instructiuni">Instructiuni</span><br>
    Sunteti logat ca utilizator <strong>MASTER</strong> in reteaua <strong>Income Analasys System</strong>.
    <ol style="margin-top:20px;padding-left:20px;">
       <li>Gasiti formular dorit</li> 
       <li>Completati conform cerintelor din formular</li>    
    </ol>
</div>
<script src="../includes/js/jquery-3.2.1.min.js"></script>
<script src="../includes/js/script.js"></script>