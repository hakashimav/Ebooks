
<?php
//Les données sur le lecteur vers la table lecteur

require 'connexion.php';

$Nom = $_POST['Nom'];
$PostNom = $_POST['PostNom'];
$PreNom = $_POST['PreNom'];
$Sexe = $_POST['Sexe'];

// //l'envois des données vers la table lecteur
try {
    $query = $con->prepare("INSERT INTO lecteur (Numlecteur, Nom, Postnom, Prenom, Sexe)
    VALUES (Null, '$Nom', '$PostNom', '$PreNom', '$Sexe')");

    $query->execute();

} catch (PDOException $e) {
    echo "Erreur : " .$e->getMessage();
}

include_once '../../forms/registre1.blade.php';