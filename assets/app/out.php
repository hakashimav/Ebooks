<?php
session_start();

if(!isset($_SESSION["Admi"])){
    header("Location: errors/404.php");
    exit;
}

//supprimer une variable
unset($_SESSION["Admi"]);

header("Location: ../views/index.blade.php");