<?php
//file_put_contents("C:/Users/cod_a/Desktop/test.txt","$cnp | ", FILE_APPEND);

require_once("conn.php");

$query = "SELECT traieste FROM bilant WHERE cnp = :cnp";
$stmt = $dbh -> prepare($query);
$stmt -> bindValue(":cnp", $_GET['cnp']);
$stmt -> execute();
$person = $stmt -> fetch(PDO::FETCH_OBJ);

if($person -> traieste){
    $imobile = 0;
    $mobile = 0;
    $venit = 0;
    $sanatate = 0;

    $query = "SELECT salariu + alte_surse AS suma FROM venituri WHERE cnp = :cnp";
    $stmt = $dbh -> prepare($query);
    $stmt -> bindValue(":cnp", $_GET['cnp']);
    $stmt -> execute();
    $person = $stmt -> fetch(PDO::FETCH_OBJ);
    
    $venit = $person -> suma;
    
    $query = "SELECT cheltuieli FROM sanatate WHERE cnp = :cnp";
    $stmt = $dbh -> prepare($query);
    $stmt -> bindValue(":cnp", $_GET['cnp']);
    $stmt -> execute();
    $person = $stmt -> fetch(PDO::FETCH_OBJ);
    
    $sanatate = $person -> cheltuieli;
    
    $query = "SELECT valoare FROM imobile WHERE cnp = :cnp";
    $stmt = $dbh -> prepare($query);
    $stmt -> bindValue(":cnp", $_GET['cnp']);
    $stmt -> execute();
    while($person = $stmt -> fetch(PDO::FETCH_OBJ)){
        $imobile += $person -> valoare;
    }
    
    
    
    $query = "SELECT valoare FROM mobile WHERE cnp = :cnp";
    $stmt = $dbh -> prepare($query);
    $stmt -> bindValue(":cnp", $_GET['cnp']);
    $stmt -> execute();
    $person = $stmt -> fetch(PDO::FETCH_OBJ);
    while($person = $stmt -> fetch(PDO::FETCH_OBJ)){
        $mobile += $person -> valoare;
    }
    
    $cnp = $_GET['cnp'];
    if($venit <= ($sanatate + $imobile + $mobile) + 0.15 * ($sanatate + $imobile + $mobile)){
        
        $query = "SELECT email FROM analists ORDER BY RAND() LIMIT 1";
        $stmt = $dbh -> prepare($query);
        $stmt -> execute();
        $analist = $stmt -> fetch(PDO::FETCH_OBJ);
        
        $to      = $analist -> email;
        //$to      = "cod.armi@gmail.com";
        $subject = 'NOU CNP SUSPECT';
        $message = $cnp.' este suspect!<br> <a href="http://localhost/anaf/solved.php?cnp='.$cnp.'&email_analist='.$to.'">Am rezolvat problema!</a>';
        $headers = 'From: cod.armi@gmail.com' . "\r\n" .
                   'Reply-To: cod.armi@gmail.com' . "\r\n" .
                   'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        $q = mail($to, $subject, $message, $headers);
        
        if($q){
            $query = "UPDATE analists SET req_sent = req_sent + 1 WHERE email = '$to'";
            $stmt = $dbh -> prepare($query);
            $res = $stmt -> execute();
            file_put_contents("../mailLogs.txt",$message."\r\n", FILE_APPEND);
        }
        // mail catre un analist din lista de analists
        
    }
    
    
    
    
    
    /*
    $debug_export = var_export($person, true);
    file_put_contents("C:/Users/cod_a/Desktop/test.txt","$debug_export | ", FILE_APPEND);
    */
    
}