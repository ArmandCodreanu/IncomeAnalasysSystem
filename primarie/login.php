<?php

require_once("inc/conn.php");

if($_SESSION['joystick'] === "karate"){
    header("Location: index.php");
}

if(isset($_POST['sub'])){

    if($_POST['user'] == "primarie" && $_POST['pass'] == "primarie123"){
        $_SESSION['joystick'] = "karate";
        header("Location: index.php");
    } else {
        echo "<script>alert('Eroare! Date incorecte!')</script>";
    }
}

?>
<head>
<link rel="stylesheet" href="../includes/css/style.css">
<style>
    body{
        background: #FF99C9;
    }
    .login input:first-child, .login input:nth-child(2){
        background: #ccc;
    }
</style>
</head>
<body>

<div class="log-wrap">
<div class="logo"><img src="../includes/img/logo.png" alt=""></div>
<div class="institutie">
    PRIMARIE
</div>
<div class="form-div">
<form method="post" class="login">
    <input type="text" name="user" placeholder="Utilizator">
    <input type="password" name="pass" placeholder="Parola">
    <input type="submit" name="sub" value="Acceseaza reteaua">
</form>
</div>
</div>
</body>
<script src="../includes/js/jquery-3.2.1.min.js"></script>
<script src="../includes/js/script.js"></script>
