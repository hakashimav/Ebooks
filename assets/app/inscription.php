<?php 
 require 'connexion.php';

 $sql = "SELECT * FROM lecteur";
 $query = $con->prepare($sql);
 $query->execute();

$lecteur =  $con->query("SELECT * FROM Lecteur")->fetchAll();

 ?>

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Postnom</th>
            <th>Genre</th>
            <th>Catégorie</th>
            <th>Abonnement</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($lecteur as $donnees) : ?>
        <tr>
            <td><?= $donnees["Postnom"];?></td>
            <td><?= $donnees["Postnom"];?></td>
            <td><?= $donnees["Sexe"];?></td>
        
        <?php $Numlecteur = $donnees["Numlecteur"]; ?>
        <?php $abon = $con->query("SELECT * FROM abonnement WHERE Numlecteur = '$Numlecteur'")->fetchAll(); ?>
        <?php foreach($abon as $abons) : ?>
        <?php endforeach; ?>
        <?php $code = $abons["Codetypeab"];?>
        <?php $cat = $con->query("SELECT * FROM categorielecteur WHERE Numlecteur = '$Numlecteur'")->fetchAll();?>
        <?php foreach($cat as $cats) :?>
            <td><?= $cats["Libelcateg"]; ?></td>
        <?php endforeach;?>
        <?php $type = $con->query("SELECT * FROM typeabonnement WHERE Codetypeab = '$code'")->fetchAll();?>
        <?php foreach($type as $types) :?>
            <td><?= $types["Libeltypeab"]; ?></td>
        <?php endforeach;?>
        </tr>
    <?php endforeach;?>    
    
    </tbody>
</table>