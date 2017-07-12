<?php
$user = "root";
$pass = "";
require_once("includes/conn.php");

$query = "UPDATE analists SET req_done = req_done + 1 WHERE email = :email";
$stmt = $dbh -> prepare($query);
$stmt -> bindValue(":email", $_GET['email_analist']);
$res = $stmt -> execute();

?>
<link rel="stylesheet" href="includes/css/style.css">
<style>
    .header {
        background: #1768AC;
    }
    
    .descriere {
        background: #3a93dd;
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
    
    .content {
        position: absolute;
        top: 160px;
    }
</style>
<div class="content">
    Multumim!
</div>
<div class="header">
    <img src="includes/img/logo.png" alt="">
    <div class="titlu">
        Income Analasys System
    </div>
</div>
<div class="descriere">
   <span class="instructiuni">Instructiuni</span><br>
    Lorem Ipsum este pur şi simplu o machetă pentru text a industriei tipografice. Lorem Ipsum a fost macheta standard a industriei încă din secolul al XVI-lea, când un tipograf anonim a luat o planşetă de litere şi le-a amestecat pentru a crea o carte demonstrativă pentru literele respective.
</div>
<script src="../includes/js/jquery-3.2.1.min.js"></script>
<script src="../includes/js/script.js"></script>