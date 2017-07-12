<?php require_once("inc/index1.php"); ?>
<link rel="stylesheet" href="../includes/css/style.css">
<script src="../includes/js/jquery-3.2.1.min.js"></script>
<script src="../includes/js/script.js"></script>
<form class="float formular">
    <input type="text" name="cnp" placeholder="CNP" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
    <input type="submit" name="sub" value="Cauta">
</form>
<br>
<?php 
if($show_update_form){
?>
<form method="get" class="formular shown">CNP<br>
    <input type="text" value="<?php echo $person -> cnp; ?>" disabled><br><br>Salariu
    <input type="hidden" name="cnp" value="<?php echo $person -> cnp; ?>"><br>
    <input type="text" name="salariu" value="<?php echo $person -> salariu; ?>">
    <input type="hidden" name="old_salariu" value="<?php echo $person -> salariu; ?>"><br>Alte surse<br>
    <input type="text" name="alte_surse" value="<?php echo $person -> alte_surse; ?>">
    <input type="hidden" name="old_alte_surse" value="<?php echo $person -> alte_surse; ?>"><br>
    <input type="password" name="aps" style="display:none;" placeholder="Admin Password" disabled required><br>
    <input type="submit" value="Update" name="update">
</form>
<?php
}
?>
<div class="header">
    <img src="../includes/img/logo.png" alt="">
    <div class="titlu">
        ANAF
    </div>
    <a href="logout.php">Log out</a>
</div>
<div class="descriere">
   <span class="instructiuni">Instructiuni</span><br>
    Sunteti logat ca utilizator al ANAF in reteaua <strong>Income Analasys System</strong>.
    <ol style="margin-top:20px;padding-left:20px;">
       <li>Incepeti prin a cauta CNP-ul dorit</li> 
       <li>Adaugati veniturile <strong>ANUALE</strong> ale fiecaruia</li>    
    </ol>
</div>