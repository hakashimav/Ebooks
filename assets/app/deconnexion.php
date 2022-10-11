<?php
session_start();

if(!isset($_SESSION["User"])){
    header("Location: ../../forms/connect.blade.php");
    exit;
}

//supprimer une variable
unset($_SESSION["User"]);
unset($_SESSION["Lecteur"]);

header("Location: ../views/index.blade.php");