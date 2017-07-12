<?php

require_once("inc/conn.php");

if(isset($_GET['analist'])){
    
        $query = "INSERT INTO analists (email) VALUES (:email)";
        $stmt = $dbh -> prepare($query);
        $stmt -> bindValue(":email", $_GET['email']);
        $res = $stmt -> execute();
        if($res)
            echo "Succes!";
        else 
            echo "Failed!";
    
}

?>
<form>
    <input type="text" name="email" placeholder="Email Analist Nou"><br>
    <input type="submit" name="analist" value="Adauga">
</form>