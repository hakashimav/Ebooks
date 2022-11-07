<?php

$waiting_day = 1637210196;
$time_left = time() - $waiting_day ;

$days = floor($time_left / (60*60*24));
$time_left %= (60 * 60 * 24);

$hours = floor($time_left / (60 * 60));
$time_left %= (60 * 60);

$min = floor($time_left / 60);
$time_left %= 60;

$sec = $time_left;

include 'connexion.php';

$Id = $_SESSION["User"]["id"];
if ( $_SESSION["User"]) {
    $reqS = "SELECT * FROM lecteur WHERE 	Iduser = '$Id'";
    $querS = $con->prepare($reqS);
    $querS->execute();

    $lect = $querS->fetch();

    if ($lect == true) {
        $num = $lect["Numlecteur"];
    
        $sqlS = "SELECT * FROM compteur WHERE Numlecteur = '$num'";
        $queryS = $con->prepare($sqlS);
        $queryS->execute();
        $fetch = $queryS->fetch();
    
        if($fetch == true) {
            $comp = $fetch["Idcompt"];
            $Val = $fetch["Validite"];

            $res = $Val - $hours;

            if($res > 0) {
            $insertS = "UPDATE compteur SET Validite = '$res' WHERE Idcompt = '$comp'";
            $quer1S = $con->prepare($insertS);
            $quer1S->execute();
            }

            $sql1S = "SELECT * FROM compteur WHERE Numlecteur = '$num'";
            $query1S = $con->prepare($sql1S);
            $query1S->execute();
            $fetch1 = $query1S->fetch();
            if($fetch1 == true){
            $Val1 = $fetch1["Validite"];
            }

            if ($Val1 == 0) {

                $del = " DELETE FROM abonnement WHERE Numlecteur ='$num'";
                $ok = $con->prepare($del);
                $ok->execute();
                $sup = "DELETE FROM compteur WHERE Numlecteur = '$num'" ;
                $va= $con->prepare($sup);
                $va->execute();
            }
        }
    }
}

