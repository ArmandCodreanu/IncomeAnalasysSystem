<?php require_once("inc/index1.php"); ?>
<a name="anaf"></a>
<form>
    <input type="text" name="cnp" placeholder="CNP" onkeypress='return event.charCode >= 48 && event.charCode <= 57'><br>
    <input type="submit" name="anafsub" value="Cauta">
</form>
<?php 
if($show_update_form){
?>
<br>
<form method="get">
    <input type="text" value="<?php echo $person -> cnp; ?>" disabled><br><br>Salariu
    <input type="hidden" name="cnp" value="<?php echo $person -> cnp; ?>"><br>
    <input type="text" name="salariu" value="<?php echo $person -> salariu; ?>">
    <input type="hidden" name="old_salariu" value="<?php echo $person -> salariu; ?>"><br>Alte surse<br>
    <input type="text" name="alte_surse" value="<?php echo $person -> alte_surse; ?>">
    <input type="hidden" name="old_alte_surse" value="<?php echo $person -> alte_surse; ?>"><br>
    <input type="submit" value="Update" name="update">
</form>
<?php
}
?>
<script src="../includes/js/jquery-3.2.1.min.js"></script>