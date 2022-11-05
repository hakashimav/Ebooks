<?php
session_start();

$waiting_day = 1637210196;
$time_left = time() - $waiting_day ;

$days = floor($time_left / (60*60*24));
$time_left %= (60 * 60 * 24);

$hours = floor($time_left / (60 * 60));
$time_left %= (60 * 60);

$min = floor($time_left / 60);
$time_left %= 60;

$sec = $time_left;

include_once 'connexion.php';

$Id = $_SESSION["User"]["id"];
if ( $_SESSION["User"]) {
$req = "SELECT * FROM lecteur WHERE 	Iduser = '$Id'";
$quer = $con->prepare($req);
$quer->execute();

$lect = $quer->fetch();
$num = $lect["Numlecteur"];

$sql = "SELECT * FROM compteur WHERE Numlecteur = '$num'";
$query = $con->prepare($sql);
$query->execute();
$fetch = $query->fetch();

$comp = $fetch["Idcompt"];
$Val = $fetch["Validite"];

$res = $Val - $hours;
if($res == 0) {
$insert = "UPDATE compteur SET Validite = '$res' WHERE Idcompt = '$comp'";
$quer = $con->prepare($insert);
$quer->execute();
}
$sql1 = "SELECT * FROM compteur WHERE Numlecteur = '$num'";
$query1 = $con->prepare($sql);
$query1->execute();
$fetch1 = $query1->fetch();

$Val1 = $fetch1["Validite"];

if ($Val1 == 0) {

    $del = " DELETE FROM abonnement WHERE Numlecteur ='$num'";
    $ok = $con->prepare($del);
    $ok->execute(); 
}

}