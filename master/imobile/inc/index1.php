<?php
require_once("conn.php");

$active_cnp = "";
$show_update_form = false;
if(isset($_GET['imobsub'])){
    $query = "SELECT count(1) FROM bilant WHERE cnp = :cnp";
    $stmt = $dbh -> prepare($query);
    $stmt -> bindValue(":cnp", $_GET['cnp']);
    $count = $stmt -> execute();
    $res = $stmt -> fetch($count);
    $count = $res["count(1)"];
    if($count){
    $query = "SELECT count(1) FROM imobile WHERE nr_cadastral = :cad";
    $stmt = $dbh -> prepare($query);
    $stmt -> bindValue(":cad", $_GET['nr_cadastral']);
    $count = $stmt -> execute();
    $res = $stmt -> fetch($count);
    $count = $res["count(1)"];
    if(!$count){
        $query = "INSERT INTO imobile (nr_cadastral, valoare, adresa, castiguri, cnp) VALUES (
            :cad,
            :valoare,
            :adresa,
            :castiguri,
            :cnp
        )";
        $stmt = $dbh -> prepare($query);
        $stmt -> bindValue(":cad", $_GET['nr_cadastral']);
        $stmt -> bindValue(":valoare", $_GET['valoare']);
        $stmt -> bindValue(":adresa", $_GET['adresa']);
        $stmt -> bindValue(":castiguri", $_GET['castiguri']);
        $stmt -> bindValue(":cnp", $_GET['cnp']);
        $a = $stmt -> execute();
        if($a) echo "<script>alert('Update succesfully!');</script>";
        else echo "<script>alert('Error!');</script>";
    } else {
    
        
        $query = "SELECT cnp FROM imobile WHERE nr_cadastral= :cad";
        $stmt = $dbh -> prepare($query);
        $stmt -> bindValue(":cad", $_GET['nr_cadastral']);
        $stmt -> execute();
        $cnp = $stmt -> fetch(PDO::FETCH_OBJ);
    
        if($cnp -> cnp === $_GET['cnp'])
            echo "<script>alert('Imobilul deja ii apartine lui ".$_GET['cnp']."!')</script>";
        else if($cnp -> cnp !== $_GET['cnp']){
            // are you sure ?
            header("Location: sure.php?nr_cadastral={$_GET['nr_cadastral']}&valoare={$_GET['valoare']}&adresa={$_GET['adresa']}&castiguri={$_GET['castiguri']}&cnp={$_GET['cnp']}");
        } 
    }
    } else echo "<script>alert('CNP Inexistent!');</script>";
}
