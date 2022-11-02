<?php 
include_once '../app/connexion.php';

$sql = "SELECT * FROM lecteur";
$query = $con->prepare($sql);
$query->execute();

$Nlecteur = $query->rowCount();

$Etudiant = "Etudiant";

//selectioné le lecteur de la catégorie Etudiant
$sql1 = "SELECT * FROM categorielecteur WHERE Libelcateg = '$Etudiant'";
$query1 = $con->prepare($sql1);
$query1->execute();
$CatEtudiant = $query1->rowCount();
//selectioné le lecteur de la catégorie Chercheur

$Chercheur = "Chercheur";

$sql2 = "SELECT * FROM categorielecteur WHERE Libelcateg = '$Chercheur'";
$query2 = $con->prepare($sql2);
$query2->execute();
$CatChercheur = $query2->rowCount();

//total des ouvrages
$sql3 = "SELECT * FROM ouvrage";
$query3 = $con->prepare($sql3);
$query->execute();
$Ouvrage = $query3->rowCount();

 if(!empty($_POST)) { 

        if(isset($_POST["titre"], $_POST["maison"], $_POST["annee"], $_POST["auteur"], $_POST["files"])
        && !empty($_POST["titre"]) && !empty($_POST["annee"]) && !empty($_POST["maison"]) && !empty($_POST["auteur"])
        && !empty($_POST["files"])) { }

        $titre = strip_tags($_POST['titre']);
        $maison = strip_tags($_POST['maison']);
        $annee = strip_tags($_POST['annee']);
        $auteur = strip_tags($_POST['auteur']);

        $insert = "INSERT INTO ouvrage (Nomouv, Maisonedit, Anneedit, Files, Auteur, Photo)
        VALUES(:Nomouv, :Maison, :Annee, :Files, :Auteur, :Photo)";

        $req = $con->prepare($insert);

        $req->bindValue(":Nomouv", $titre, PDO::PARAM_STR);
        $req->bindValue(":Maison", $maison, PDO::PARAM_STR);
        $req->bindValue(":Annee", $annee, PDO::PARAM_STR);
        $req->bindValue(":Files", $_POST["files"], PDO::PARAM_STR);
        $req->bindValue(":Auteur", $auteur, PDO::PARAM_STR);
        $req->bindValue(":Photo", $_POST["Photos"], PDO::PARAM_STR);

        $req->execute();
    
       
    }


?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php require '../Views/layout/app_dash.blade.php'; ?>
        <link rel="stylesheet" href="Css/main.css">
    </head>

    <body>
        <div class="containerd">
            <div class="navigation">
                <ul>
                    <li>
                        <a href="#">
                            <span class="icon"><ion-icon name="logo-apple"></ion-icon></span>
                            <span class="title">Brand Name</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="Index.php">
                            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                            <span class="title" >Dashboard</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="#">
                            <span class="icon"><ion-icon name="book-outline"></ion-icon></span>
                            <span class="title">Ouvrage</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="#">
                            <span class="icon"><ion-icon name="help-outline"></ion-icon></span>
                            <span class="title">Help</span>
                        </a>
                    </li> 
                    
                    <li>
                        <a href="auteur.php">
                            <span class="icon"><ion-icon name="reader-outline"></ion-icon></span>
                            <span class="title">Auteur</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="#">
                            <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                            <span class="title">Sign out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- main -->
        <div class="main ">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <!-- search -->
                <div class="search" data-aos="slide-left">
                    <label for="">
                        <input type="text" placeholder="Search here">
                    </label>
                </div>
                <!-- userImg -->
                <div class="user">
                    <img src="user.jpg" alt="">
                </div>
            </div>

            <!-- cards -->
            <div class="cardBox" data-aos="slide-left">
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $Nlecteur; ?></div>
                        <div class="cardName">Lecteur</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>  
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $CatEtudiant; ?></div>
                        <div class="cardName">Etudiant</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="school-outline"></ion-icon>                   
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $CatChercheur; ?></div>
                        <div class="cardName">Chercheur</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="search-outline"></ion-icon>                   
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $Ouvrage; ?></div>
                        <div class="cardName">Ouvrage</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="book-outline">                   
                    </div>
                </div>
            </div>

            <div class="details">
                <!-- order details list -->
                <div class="recentOrders" data-aos="slide-left">
                    <div class="cardHeader">
                        <h2>Ajouter un ouvrage</h2>
                    </div>
                    <div class="formBox">
                        <form method="POST" class="form">
                            <div class="formControl">
                                <label for="Titre" class="InputLabel"></label>
                                <textarea name="titre" id="Titre" cols="30" rows="10" placeholder="Titre Ouvrage" class="TextTitre"></textarea>
                            </div>
                            <div class="formControl">
                                <label for="Maison" class="InputLabel"></label>
                                <input type="text" name="maison" id="Maison" class="InputControl" placeholder="Maison d'édition">
                            </div>
                            <div class="formControl">
                                <label for="Annee" class="InputLabel"></label>
                                <input type="Date" name="annee" id="Annee" class="InputControl" placeholder="Année d'édition">
                            </div>
                            <div class="formControl">
                                <label for="Auteur" class="InputLabel"></label>
                                <input type="text" name="auteur" id="Auteur" class="InputControl" placeholder="Nom de l'auteur">
                            </div>
                            <div class="formControl">
                                <label for="files" class="InputLabel">Fichier</label>
                                <input type="File" name="files" id="files" class="InputControl" placeholder="Fichier">
                            </div>
                            <div class="formControl">
                                <label for="files" class="InputLabel">Image Couverture</label>
                                <input type="File" name="Photos" id="files" class="InputControl" placeholder="Photo">
                            </div>
                            <button type="submit" class="btn-submit">Enregistré</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="js/main.Js"></script>
        <?php require '../Views/layout/appjs_dash.blade.php'; ?>
    </body>
</html>