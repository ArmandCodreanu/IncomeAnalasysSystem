<?php
require_once("conn.php");

$active_cnp = "";
$show_update_form = false;
if(isset($_GET['mobsub'])){
    $query = "SELECT count(1) FROM bilant WHERE cnp = :cnp";
    $stmt = $dbh -> prepare($query);
    $stmt -> bindValue(":cnp", $_GET['cnp']);
    $count = $stmt -> execute();
    $res = $stmt -> fetch($count);
    $count = $res["count(1)"];
    if($count){
    $query = "SELECT count(1) FROM mobile WHERE nr_auto = :auto";
    $stmt = $dbh -> prepare($query);
    $stmt -> bindValue(":auto", $_GET['nr_auto']);
    $count = $stmt -> execute();
    $res = $stmt -> fetch($count);
    $count = $res["count(1)"];
        
    if(!$count){
        $query = "INSERT INTO mobile (nr_auto, valoare, castiguri, cnp) VALUES (
            :auto,
            :valoare,
            :castiguri,
            :cnp
        )";
        $stmt = $dbh -> prepare($query);
        $stmt -> bindValue(":auto", $_GET['nr_auto']);
        $stmt -> bindValue(":valoare", $_GET['valoare']);
        $stmt -> bindValue(":castiguri", $_GET['castiguri']);
        $stmt -> bindValue(":cnp", $_GET['cnp']);
        $a = $stmt -> execute();
        if($a) echo "<script>alert('Update successfuly!');</script>";
        else echo "<script>alert('Error!');</script>";
    } else {
    
        
        $query = "SELECT cnp FROM mobile WHERE nr_auto= :auto";
        $stmt = $dbh -> prepare($query);
        $stmt -> bindValue(":auto", $_GET['nr_auto']);
        $stmt -> execute();
        $cnp = $stmt -> fetch(PDO::FETCH_OBJ);
    
        if($cnp -> cnp === $_GET['cnp'])
            echo "<script>alert('Mobilul deja ii apartine lui ".$_GET['cnp']."!')</script>";
        else if($cnp -> cnp !== $_GET['cnp']){
            // are you sure ?
            header("Location: sure.php?nr_auto={$_GET['nr_auto']}&valoare={$_GET['valoare']}&castiguri={$_GET['castiguri']}&cnp={$_GET['cnp']}");
        } 
    }
    } else echo "<script>alert('CNP Inexistent!');</script>";
}
