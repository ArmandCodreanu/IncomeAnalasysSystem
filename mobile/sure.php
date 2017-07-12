<?php

require_once("inc/conn.php");

if(!isset($_GET['cnp']))
  header("Location: index.php");

echo $_GET['nr_auto']." este atribuit altui CNP. <br>Esti sigur ca vrei sa atribui lui ".$_GET['cnp']." vehiculul ".$_GET['nr_auto']." ?";

if(isset($_GET['sure'])){
    $query = "UPDATE mobile SET cnp = :cnp, castiguri = :castiguri WHERE nr_auto = :auto";
    $stmt = $dbh -> prepare($query);
    $stmt -> bindValue(":cnp", $_GET['cnp']);
    $stmt -> bindValue(":castiguri", $_GET['castiguri']);
    $stmt -> bindValue(":auto", $_GET['nr_auto']);
    $success = $stmt -> execute();
    if($success){
        echo "Update succesfully!";
        $cnp = $_GET['cnp'];
        require_once("../includes/check.php");     
    } else echo "Error!<br>";
}
?>
<form>
    <input type="hidden" name="cnp" value="<?php echo $_GET['cnp']; ?>">
    <input type="hidden" name="nr_auto" value="<?php echo $_GET['nr_auto']; ?>">
    <input type="hidden" name="castiguri" value="<?php echo $_GET['castiguri']; ?>">
    <input type="submit" name="sure" value="DA">
</form>

<a href="index.php"> GO BACK <<</a>
