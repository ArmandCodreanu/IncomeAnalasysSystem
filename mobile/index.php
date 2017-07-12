<?php require_once("inc/index1.php"); ?>
<link rel="stylesheet" href="../includes/css/style.css">
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
</style>
<form class="formular shown">
Atribuie un vehicul<br>
    <input type="text" name="cnp" placeholder="CNP" onkeypress='return event.charCode >= 48 && event.charCode <= 57'><br>
    <input type="text" name="nr_auto" placeholder="Nr. auto (AA000AAA)"><br>
    <input type="text" name="valoare" placeholder="Valoare estimata"><br>
    <input type="text" name="castiguri" placeholder="Venituri anuale (0)"><br>
    <input type="submit" name="sub" value="Go">
</form>
<div class="header">
    <img src="../includes/img/logo.png" alt="">
    <div class="titlu">
        MOBILE
    </div>
    <a href="logout.php">Log out</a>
</div>
<div class="descriere">
   <span class="instructiuni">Instructiuni</span><br>
    Sunteti logat ca utilizator al MOBILE in reteaua <strong>Income Analasys System</strong>.
    <ol style="margin-top:20px;padding-left:20px;">
       <li>Completati formularul</li> 
       <li>Daca <strong>NU EXISTA</strong> venituri introduceti "0"</li>    
    </ol>
</div>
<script src="../includes/js/jquery-3.2.1.min.js"></script>
<script src="../includes/js/script.js"></script>