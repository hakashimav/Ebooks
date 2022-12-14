<?php
//on demare la session PHP
session_start();
if(isset($_SESSION["User"])) {
    header("Location: ../assets/app/index.php");
    exit;
}
if(@$_POST["Username"] == "root" AND @$_POST["Pass"] == "root") {
      header("Location: ../assets/Dashboard/index.php");
      $_SESSION["Admi"] = [
        "Name" => $_POST["Username"]
      ];
    }
//On verifie si le formulaire à été envoyé
if(!empty($_POST)) {
    //le formulaire à été envoyé
    //on verifie que tous les champs requis son remplis
  if(isset($_POST["Username"], $_POST["Pass"])
    && !empty($_POST["Username"] && !empty($_POST["Pass"]))
  ){

    //on se connecte a la bdd

    include_once "../assets/app/connexion.php";

    $sql = "SELECT * FROM user WHERE username = :Username";

    $query = $con->prepare($sql);

    $query->bindValue(":Username", $_POST['Username']);

    $query->execute();

    $user = $query->fetch();

    if(!$user) {
    die("L'utilisateur et/ ou le mot de passe est incorrecte");
    $error = "L'utilisateur et/ ou le mot de passe est incorrecte";
    }
    
    //ici on a un user existant, on peut verifier le mot de passe

    if(!password_verify($_POST["Pass"], $user["pass"])){
      die ("L'utilisateur et/ ou le mot de passe est incorrecte");
    }

    //ici l'utilisateur et le mot de passe son corrects

    //connecter l'username

    //on stocke dans $_SESSION les infos d'utilisateur
    $_SESSION["User"] = [
      "id" => $user["iduser"],
      "name" => $user["username"],
      "email" => $user["email"]
    ];

    //on redirige vers une pages par exemple
    header("Location: ../assets/app/index.php");


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
    <link href="../assets/img/favicon.ico" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Font-awesome File -->
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">

    <!-- the style customers -->
    <link rel="stylesheet" href="../assets/css/style1.css">
    <style>
      .erorrs {
      position: absolute;
      top: 100px;
      background: #28292d;
      border: 1px solid red;
      border-radius:8px;
      }
      .erorrs  p {
      color:red;
      margin: 10px;
      }
    </style>

  </head>

  <body>
    <?php if(isset($error)) :?>
    <div class="erorrs">
      <p>L'utilisateur et/ ou le mot de passe est incorrecte</p>
    </div>
    <?php endif; ?>
    <div class="box" data-aos="fade-up">
      <a href="../assets/Views/index.blade.php" class="links-home" title="Accueil">
        <img src="../assets/img/home.png" alt="home" class="img-home">
      </a>
      <div class="form">
        <h2>Se connecter</h2>
        <form method="POST">
          <div class="inputBox">
            <input type="text" name="Username" id="" required="required">
            <span>Nom d'utilisateur</span>
            <i></i>
          </div>
          <div class="inputBox">
            <input type="password" name="Pass" id="" required="required" maxlength="8">
            <span>Mot de passe</span>
            <i></i>
          </div>
          <div class="links">
            <a href="#" title="Mot de passe oublié">Mot de passe oublié</a>
            <a href="../assets/app/user.php" title="S'inscrire">S'inscrire</a>
          </div>
          <input type="submit" value="Connexion" class="submit">
        </form>
      </div>
    </div>

    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.js"></script>
  </body>
</html>