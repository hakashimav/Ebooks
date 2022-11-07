<?php 
//deémarrage de la session User dans PHP
session_start(); 
//quand l'utilisateur n'est pas connecté alors renvois
if(!isset($_SESSION["User"])) {
    header("Location: errors/404.php");
    exit;
}
?>
<!-- script pour recupéré les données dans la bdd -->
<?php 
//on sauvegarde l'id d'user en cours pour la selection
$Iduser = $_SESSION["User"]["id"];

include_once 'connexion.php';

// requette
$sql = "SELECT * FROM lecteur WHERE Iduser = '$Iduser' ";

$query = $con->prepare($sql);

$query->execute();

$lecteur = $query->fetch(); 

$Numlecteur = $lecteur["Numlecteur"];

$Prenom = $lecteur["Prenom"];
$Nom = $lecteur["Nom"];
$Postnom = $lecteur["Postnom"];
$Genre = $lecteur["Sexe"];

//requette pour recupéré la date de naissance
$sql1 = "SELECT * FROM daten WHERE Numlecteur = '$Numlecteur' ";

$query1 = $con->prepare($sql1);

$query1->execute();

$Daten = $query1->fetch();

$Date = $Daten["daten"]; 

//requette pour recupéré la catégorie
$sql2 = "SELECT * FROM categorielecteur WHERE Numlecteur = '$Numlecteur' ";

$query2 = $con->prepare($sql2);

$query2->execute();

$Cat = $query2->fetch();

$Catlect = $Cat["Libelcateg"];

//requette pour recupéré l'adresse
$sql3 = "SELECT * FROM adresse WHERE Numlecteur = '$Numlecteur' ";

$query3 = $con->prepare($sql3);

$query3->execute();

$Ad = $query3->fetch();

$Numparc = $Ad["Numparc"];
$Avenue = $Ad["Avenue"];
$Quartier = $Ad["Quartier"];
$Commune = $Ad["Commune"];


?>

<!-- code html -->
<!Doctype html>
<html>
    <!-- inclure l'app -->
    <?php include '../Views/layout/app.blade.php'; ?>
    <head>
        <!-- style customers for page profil -->
        <link href="../css/style_profil.css" rel="stylesheet">
    </head>

    <body>
        <div class="container-fluid">
            <!-- Nom d'utilisateur connecté -->
            <h2>Profil de :<a href="index.php" title="Retour à l'accueil"> <?= $_SESSION["User"]["name"]?></a></h2>
            <div class="container-infos">
                <span></span>
            </div>
        <main class="form-signin">
            <form method="POST">
                <p class="ajouter text-info">Les informations sur le lecteur</p>

                <div class="form-floating">
                    <input type="text" class="form-control" name="prenom" id="floatingInput" placeholder="Prénom" value="<?php echo $Prenom; ?>">
                    <label for="floatingInput">Prénom</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="nom" id="floatingnom" placeholder="Nom" value="<?php echo $Nom; ?>">
                    <label for="floatingnom">Nom</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="postnom" id="floatipost" placeholder="Postnom" value="<?php echo $Postnom; ?>">
                    <label for="floatingpost">Postnom</label>
                </div>
                <div class="form-floating">
                    <select class="form-select form-select-lg mb-3" name="genre" aria-label=".form-select-lg example">
                        <option selected value="<?php echo $Genre; ?>"><?php echo $Genre; ?></option>
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                        <option value="Autre">Autre</option>
                    </select>
                    <label for="">Genre</label>
                </div>
                <div class="form-floating">
                    <input type="Date" class="form-control" name="daten" id="floatidate" placeholder="Date de naissance" value="<?php echo $Date; ?>">
                    <label for="floatingdate">Date de naissance</label>
                </div>
                <div class="form-floating">
                    <select class="form-select form-select-lg mb-3" name="cat" aria-label=".form-select-lg example">
                        <option selected value="<?php echo $Catlect; ?>"><?php echo $Catlect; ?></option>
                        <option value="Etudiant">Etudiant</option>
                        <option value="Chercheur">Chercheur</option>
                    </select>
                    <label for="">Catégorie</label>
                </div>
                <div class="box">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="numparc" id="floatinum" placeholder="N° Parcelle" value="<?php echo $Numparc; ?>">
                        <label for="floatingnum">N° Parcelle</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="avenue" id="floatiave" placeholder="Avenue" value="<?php echo $Avenue; ?>">
                        <label for="floatingave">Avenue</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="quartier" id="floatiquart" placeholder="Quartier" value="<?php echo $Quartier; ?>">
                        <label for="floatingquart">Quartier</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="commune" id="floaticom" placeholder="Commune" value="<?php echo $Commune; ?>">
                        <label for="floatingcom">Commune</label>
                    </div>
                </div>
                <button class="w-100 btn btn-lg btn-info" type="submit">Modifier</button>
            </form>
        </main>
    

    <?php include '../Views/layout/appJs.blade.php'; ?>
    </body>
</html>