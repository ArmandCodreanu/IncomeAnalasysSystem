<?php

require_once("inc/conn.php");
if($_SESSION['joystick'] !== "karate"){
    header("Location: login.php");
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
        background: #3a93dd;
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
<div class="content shown">
    
<a href="new.php">Adauga CNP</a><br>
<a href="archive.php">Modifica CNP</a>
</div>
<div class="header">
    <img src="../includes/img/logo.png" alt="">
    <div class="titlu">
        PRIMARIE
    </div>
    <a href="logout.php">Log out</a>
</div>
<div class="descriere">
   <span class="instructiuni">Instructiuni</span><br>
    Sunteti logat ca utilizator al PRIMARIE in reteaua <strong>Income Analasys System</strong>.
    <ol style="margin-top:20px;padding-left:20px;">
       <li>Selectati actiunea dorita</li>
    </ol>
</div>
<script src="../includes/js/jquery-3.2.1.min.js"></script>
<script src="../includes/js/script.js"></script>