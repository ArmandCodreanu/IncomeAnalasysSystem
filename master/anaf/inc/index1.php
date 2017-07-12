<?php
require_once("conn.php");

$show_update_form = false;
if(isset($_GET['anafsub'])){
    $query = "SELECT count(1) FROM bilant WHERE cnp = :cnp";
    $stmt = $dbh -> prepare($query);
    $stmt -> bindValue(":cnp", $_GET['cnp']);
    $count = $stmt -> execute();
    $res = $stmt -> fetch($count);
    $count = $res["count(1)"];
    if($count){
            $query = "SELECT * FROM venituri WHERE cnp = :cnp";
            $stmt = $dbh -> prepare($query);
            $stmt -> bindValue(":cnp", $_GET['cnp']);
            $stmt -> execute();
            $person = $stmt -> fetch(PDO::FETCH_OBJ);
            if($person)
                $show_update_form = true;
            if($_GET['ok']) echo "<script>alert('Succes!');</script>";
            
        }   else echo "<script>alert('CNP Inexistent!');</script>";
}
    if(isset($_GET['update'])){
        
            $query = "UPDATE venituri SET salariu = :salariu, alte_surse = :alte_surse WHERE cnp = :cnp";
            $stmt = $dbh -> prepare($query);
            $stmt -> bindValue(":salariu", $_GET['salariu']);
            $stmt -> bindValue(":alte_surse", $_GET['alte_surse']);
            $stmt -> bindValue(":cnp", $_GET['cnp']);
            $stmt -> execute();
            header("Location: index.php?cnp={$_GET['cnp']}&anafsub=Cauta&ok=ok");
        
}
