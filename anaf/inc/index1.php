<?php
require_once("conn.php");

if($_SESSION['cucumber'] !== "cucurbitacee"){
   header("Location: login.php");
}

$show_update_form = false;
if(isset($_GET['sub'])){
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
            if($_GET['ok'] === "ok"){
                echo "<script>alert('Succes!')</script>";
                $cnp = $_GET['cnp'];
                require_once("../includes/check.php");
            }
            else if($_GET['ok'] === "nope"){
                echo "<script>alert('Un ADMIN trebuie sa aprobe inainte!')</script>";
            }
        }   else echo "<script>alert('CNP inexistent')</script>";
}
    if(isset($_GET['update'])){
        if($_GET['salariu'] >= $_GET['old_salariu'] && $_GET['alte_surse'] >= $_GET['old_alte_surse'] || $_GET['aps'] === "approve"){
            $query = "UPDATE venituri SET salariu = :salariu, alte_surse = :alte_surse WHERE cnp = :cnp";
            $stmt = $dbh -> prepare($query);
            $stmt -> bindValue(":salariu", $_GET['salariu']);
            $stmt -> bindValue(":alte_surse", $_GET['alte_surse']);
            $stmt -> bindValue(":cnp", $_GET['cnp']);
            $stmt -> execute();
            
            $cnp = $_GET['cnp'];
            require_once("../includes/check.php");
            
            header("Location: index.php?cnp={$_GET['cnp']}&sub=Cauta&ok=ok");
        } else {
            header("Location: index.php?cnp={$_GET['cnp']}&sub=Cauta&ok=nope");
        }
}
