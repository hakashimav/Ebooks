<?php 
//deémarrage de la session User dans PHP
session_start(); 
//quand l'utilisateur n'est pas connecté alors renvois
if(!isset($_SESSION["User"])) {
    header("Location: ../../forms/connect.blade.php");
    exit;
}
?>

<?php
$isset = isset($_POST["prenom"], $_POST["nom"], $_POST["postnom"], $_POST["daten"], $_POST["numparc"], $_POST["avenue"],
$_POST["quartier"], $_POST["commune"]);
//verification des entres dans le formulaire
if(!empty($_POST)){
    //le formulaire est envoyé
    //verification si les champs sont remplis
    if($isset && !empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["postnom"])
    && !empty($_POST["daten"]) && !empty($_POST["numparc"]) && !empty($_POST["avenue"]) && !empty($_POST["quartier"])
    && !empty($_POST["commune"])) {
        //le formulaire est complet
        //recuperation des données et protection
        $prenom = strip_tags($_POST['prenom']);
        $nom = strip_tags($_POST['nom']);
        $postnom = strip_tags($_POST['postnom']);
        $numparc = strip_tags($_POST['numparc']);
        $avenue = strip_tags($_POST['avenue']);
        $quartier = strip_tags($_POST['quartier']);
        $commune = strip_tags($_POST['commune']);

        //la connexion avec la bdd
        include_once "connexion.php";

        //on stock l'id de l'utilisateur en cour...
        $Id = $_SESSION["User"]["id"];

        //nous lançon une requette pour recupere les données dans la table user grace a l'id en cour...
        $sql = "SELECT * FROM user where iduser = $Id";

        $query = $con->prepare($sql);
        //execution 
        $query->execute();
        //nous gardons les données recupere dans un text
        $user = $query->fetch();
        //on stock l'id recupere
        $iduser = $user["iduser"];
        //on insert maintenant un lecteur avec l'iduser en cour...
        $sql1 = "INSERT INTO lecteur (Nom, Postnom, Prenom, Sexe ,Iduser)
        VALUES (:Nom, :Postnom, :Prenom, :Sexe, '$iduser' )";

        $query1 = $con->prepare($sql1);

        $query1->bindValue(":Nom", $nom, PDO::PARAM_STR);
        $query1->bindValue(":Postnom", $postnom, PDO::PARAM_STR);
        $query1->bindValue(":Prenom", $prenom, PDO::PARAM_STR);
        $query1->bindValue(":Sexe", $_POST["genre"], PDO::PARAM_STR);

        //execution
        $query1->execute();
        //on recupere l'id du nouveau lecteur
        $Idlect = $con->lastInsertId();
        //on créee la session pour l lecteur
        $_SESSION["Lecteur"] = [
            "Num" => $Idlect,
            "Name" => $nom
        ];
        //une fois finis on peut maintenant stocké les infos dans les tables restants
        if(isset($_POST["daten"]) && !empty($_POST["daten"])) {
            //une fois tout est ok!
            //on stock le numlecteur qui est en cour dans la session lecteur
            $num = $_SESSION["Lecteur"]["Num"];
            //alors on insert
            //on envois les données dans la table daten
            $sql2 = "INSERT INTO daten (daten, Numlecteur)
            VALUES (:Daten, '$num')";

            $query2 = $con->prepare($sql2);

            $query2->bindValue(":Daten", $_POST["daten"], PDO::PARAM_STR);

            $query2->execute();
        }
        // on envois les données dans la table catégorie
        $num1 = $_SESSION["Lecteur"]["Num"];

        $sql3 = "INSERT INTO categorielecteur (Libelcateg, Numlecteur)
        VALUES (:Cate, '$num1')";

        $query3 = $con->prepare($sql3);

        $query3->bindValue(":Cate", $_POST["cat"], PDO::PARAM_STR);

        $query3->execute();

        //on insert dans la table adresse
        $sql4 = "INSERT INTO adresse (Numparc, Avenue, Quartier, Commune, Numlecteur)
        VALUES (:Numparc, :Avenue, :Quartier, :Commune, '$num1')";
        
        $query4 = $con->prepare($sql4);

        $query4->bindValue(":Numparc", $numparc, PDO::PARAM_STR);
        $query4->bindValue(":Avenue", $avenue, PDO::PARAM_STR);
        $query4->bindValue(":Quartier", $quartier, PDO::PARAM_STR);
        $query4->bindValue(":Commune", $commune, PDO::PARAM_STR);

        $query4->execute();

        //une fois tout est bon alors il redirige vers la page success
        header("Location: success.php");

    }else {
        die("formulaire incomplet");
    }

}

?>

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
            <h2>Profil de : <?= $_SESSION["User"]["name"]?></h2>
            <div class="container-infos">
                <span></span>
            </div>
        <main class="form-signin">
            <form method="POST">
                <p class="ajouter text-info">Ajouter les informations supplémentaire</p>

                <div class="form-floating">
                    <input type="text" class="form-control" name="prenom" id="floatingInput" placeholder="Prénom" required="required">
                    <label for="floatingInput">Prénom</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="nom" id="floatingnom" placeholder="Nom" required="required">
                    <label for="floatingnom">Nom</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="postnom" id="floatipost" placeholder="Postnom" required="required">
                    <label for="floatingpost">Postnom</label>
                </div>
                <div class="form-floating">
                    <select class="form-select form-select-lg mb-3" name="genre" aria-label=".form-select-lg example">
                        <option selected value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                        <option value="Autre">Autre</option>
                    </select>
                    <label for="">Genre</label>
                </div>
                <div class="form-floating">
                    <input type="Date" class="form-control" name="daten" id="floatidate" placeholder="Date de naissance">
                    <label for="floatingdate">Date de naissance</label>
                </div>
                <div class="form-floating">
                    <select class="form-select form-select-lg mb-3" name="cat" aria-label=".form-select-lg example">
                        <option selected value="Etudiant">Etudiant</option>
                        <option value="Chercheur">Chercheur</option>
                    </select>
                    <label for="">Catégorie</label>
                </div>
                <div class="box">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="numparc" id="floatinum" placeholder="N° Parcelle">
                        <label for="floatingnum">N° Parcelle</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="avenue" id="floatiave" placeholder="Avenue">
                        <label for="floatingave">Avenue</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="quartier" id="floatiquart" placeholder="Quartier">
                        <label for="floatingquart">Quartier</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="commune" id="floaticom" placeholder="Commune">
                        <label for="floatingcom">Commune</label>
                    </div>
                </div>
                <button class="w-100 btn btn-lg btn-success" type="submit">Enregistré</button>
            </form>
        </main>
    

    <?php include '../Views/layout/appJs.blade.php'; ?>
    </body>
</html>