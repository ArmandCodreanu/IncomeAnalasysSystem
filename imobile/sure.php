<?php

require_once("inc/conn.php");

if(!isset($_GET['cnp']))
  header("Location: index.php");

echo $_GET['nr_cadastral']." este atribuit altui CNP. <br>Esti sigur ca vrei sa atribui lui ".$_GET['cnp']." casa ".$_GET['nr_cadastral']." ?";

if(isset($_GET['sure'])){
    $query = "UPDATE imobile SET cnp = :cnp, adresa = :adresa, castiguri = :castiguri WHERE nr_cadastral = :cad";
    $stmt = $dbh -> prepare($query);
    $stmt -> bindValue(":cnp", $_GET['cnp']);
    $stmt -> bindValue(":adresa", $_GET['adresa']);
    $stmt -> bindValue(":castiguri", $_GET['castiguri']);
    $stmt -> bindValue(":cad", $_GET['nr_cadastral']);
    $success = $stmt -> execute();
    if($success){
        echo "<script>alert('Succes!')</script>";
        $cnp = $_GET['cnp'];
        require_once("../includes/check.php");     
    } else echo "<script>alert('Eroare!')</script>";
}
?>
<form>
    <input type="hidden" name="cnp" value="<?php echo $_GET['cnp']; ?>">
    <input type="hidden" name="nr_cadastral" value="<?php echo $_GET['nr_cadastral']; ?>">
    <input type="hidden" name="castiguri" value="<?php echo $_GET['castiguri']; ?>">
    <input type="hidden" name="adresa" value="<?php echo $_GET['adresa']; ?>">
    <input type="submit" name="sure" value="DA">
</form>

<a href="index.php"> GO BACK << </a>
