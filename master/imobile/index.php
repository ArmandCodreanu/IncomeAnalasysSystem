<?php require_once("inc/index1.php"); ?>
<form>
    <input type="text" name="cnp" placeholder="CNP" onkeypress='return event.charCode >= 48 && event.charCode <= 57'><br>
    <input type="text" name="valoare" placeholder="Valoare estimata"><br>
    <input type="text" name="nr_cadastral" placeholder="Nr. cadastral"><br>
    <textarea name="adresa" placeholder="Adresa"></textarea><br>
    <input type="text" name="castiguri" placeholder="Venituri anuale (0)"><br>
    <input type="submit" name="imobsub" value="Atribuie">
</form>
<script src="../includes/js/jquery-3.2.1.min.js"></script>
<script src="../includes/js/script.js"></script>