<?php
//on demarre la session PHP
session_start();
if(isset($_SESSION["User"])) {
    header("Location: ../Views/index.blade.php");
    exit;
}
//On verifie si le formulaire à été envoyé
if(!empty($_POST)) {
    //le formulaire à été envoyé
    //on verifie que tous les champs requis son remplis

    if(isset($_POST['Username'], $_POST['Email'], $_POST['Pass'])
        && !empty($_POST['Username']) && !empty($_POST['Email']) && !empty($_POST['Pass'])
    ){
        //le formulaire est complet
        //on récuper les données en les protégeant
        $username = strip_tags($_POST['Username']);

        if(!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)){
            die("L'adresse email est incorrete");
        }

        // on va hasher le mot de passe
        $pass = password_hash($_POST['Pass'], PASSWORD_ARGON2ID);

        // ajuter ici tous les controles souhaites
        
        
        // on enregistre en bdd
        require_once "connexion.php";

        $sel = "SELECT * FROM user";
        $querysel = $con->prepare($sel);
        $querysel->execute();

        $find = $querysel->fetch();

        $Nameuser = $find["username"];

        if ($username === $Nameuser) {
          die("Le nom d'utilisateur existe déjà");
        }

        $sql = "INSERT INTO user (username, email, pass) 
        VALUES (:Username, :email, '$pass')";

        $query = $con->prepare($sql);

        $query->bindValue(":Username", $username, PDO::PARAM_STR);
        $query->bindValue(":email", $_POST['Email'], PDO::PARAM_STR);


        $query->execute();

        //on recupere l'id du nouvel username
        $id = $con->lastInsertId();

        //on stocke dans $_SESSION les infos d'utilisateur
        $_SESSION["User"] = [
          "id" => $id,
          "name" => $username,
          "email" => $_POST["Email"]
        ];

        //on redirige vers une pages par exemple
        header("Location: ../../forms/connect.blade.php");

    }else {
        die("Le formualire est incomplet");
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Bibliothèque en ligne - numérique</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../img/favicon.ico" rel="icon">
    <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../vendor/aos/aos.css" rel="stylesheet">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Font-awesome File -->
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    
    <!-- Template Main CSS File -->
    <link href="../css/style.css" rel="stylesheet">
    
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">

    <!-- the style customers -->
    <link rel="stylesheet" href="../css/style1.css">

  </head>
  <body>
    <div class="box" data-aos="fade-up">
      <a href="../Views/index.blade.php" class="links-home" title="Accueil">
        <img src="../img/home.png" alt="homr" class="img-home">
      </a>
      <div class="form">
        <h2>S'inscrire</h2>
        <form method="POST">
          <div class="inputBox">
                <input type="text" name="Username" id="" required="required">
                <span>Nom d'utilisateur</span>
                <i></i>
          </div>
          <div class="inputBox">
                <input type="email" name="Email" id="" required="required">
                <span>Email</span>
                <i></i>
            </div>
          <div class="inputBox">
                <input type="password" name="Pass" id="" required="required" maxlength="8">
                <span>Mot de passe</span>
                <i></i>
          </div>
          <div class="links">
                <a href="#" title="Mot de passe oublié">Mot de passe oublié</a>
                <a href="../../forms/connect.blade.php" title="S'inscrire">Se connecter</a>
          </div>
          <input type="submit" value="M'inscrire" class="submit">
        </form>
      </div>
    </div>

    <?php include '../Views/layout/appJs.blade.php'; ?>

  </body>
</html>