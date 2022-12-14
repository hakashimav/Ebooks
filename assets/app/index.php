<?php
  session_start();
  require 'compteur.php';
if(!isset($_SESSION["User"])) {
  header("Location: errors/404.php");
  exit;
}
$id = $_SESSION["User"]["id"];
include 'connexion.php';
$req = "SELECT * FROM lecteur WHERE Iduser = '$id'";
$quer = $con->prepare($req);
$quer->execute();
$array = $quer->fetch();

$numlec = $array["Numlecteur"];
$date = date('j/m/Y');
$heur = date('H:i:s');

$sql = "INSERT INTO consultation (heureconsul, Iddate, Numlecteur)
VALUES (:heur, :datej, :num)";
$query = $con->prepare($sql);
$query->bindValue(":heur", $heur, PDO::PARAM_STR);
$query->bindValue(":datej", $date, PDO::PARAM_STR);
$query->bindValue(":num", $numlec, PDO::PARAM_STR);
$query->execute();
?>

<!DOCTYPE html>
<html lang="fr">
  <?php include '../Views/layout/app.blade.php'; ?>
  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
      <div class="container">
        <div class="header-container d-flex align-items-center justify-content-between">
          <!-- logo bibliothèque -->
          <div class="logo">
            <h1 class="text-light"><a href="#"><span>Bibliothèque en ligne</span></a></h1>
          </div>
  
          <?php include "navbar.php"; ?>
          
        </div><!-- End Header Container -->
      </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
      <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
        <h1>Votre Nouvelle Bibliothèque en ligne</h1>
        <h2>Une bibliothèque, c'est le carrefour de tous les rêves de l'humanité</h2>
        <?php if(!isset($_SESSION["User"])) :?>
          <a href="../../forms/connect.blade.php" class="btn-get-started scrollto">Rejoignez-nous</a>
        <?php endif;?>
      </div>
    </section><!-- End Hero -->

    <main id="main">

      <!-- ======= Cta Section ======= -->
      <section id="cta" class="cta">
        <div class="container">

          <div class="row">
            <div class="col-lg-9 text-center text-lg-left">
              <h3>Plus de <span>16 000 volumes</span> dans le catalogue</h3>
              <p> Le <span class="cedesurk">CEDESURK</span>, cadre dédié à la recherche et à la formation de l'élite congolaise, permet d'accéder aux enseignants, etudiants et chercheurs;</p>
            </div>
            <div class="col-lg-3 cta-btn-container text-center">
              <a class="cta-btn align-middle" href="#">Request a quote</a>
            </div>
          </div>

        </div>
      </section><!-- End Cta Section -->

      <!-- ======= Services Section ======= -->
      <section id="services" class="services">
        <div class="container">

          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="icon-box" data-aos="fade-up">
                <div class="icon"><i class="bi bi-briefcase"></i></div>
                <h4 class="title"><a href="">Bibliothèque</a></h4>
                <p class="description">Une bibliothèque scientifique moderne avec un catalogue en line </p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                <div class="icon"><i class="bi bi-card-checklist"></i></div>
                <h4 class="title"><a href="">Formation</a></h4>
                <p class="description">Un pôle de formations et de certifications aux technologies numériques </p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                <div class="icon"><i class="bi bi-bar-chart"></i></div>
                <h4 class="title"><a href="">Réseau</a></h4>
                <p class="description">Un réseau d’interconnexion des universités et centres de recherche (projet Ebale) </p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                <div class="icon"><i class="bi bi-binoculars"></i></div>
                <h4 class="title"><a href="">Multimédia</a></h4>
                <p class="description">Un espace multimédia de séminaires et ateliers professionnels (le CEDESURK dispose d’une salle de formation équipée à cet effet) </p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                <div class="icon"><i class="bi bi-brightness-high"></i></div>
                <h4 class="title"><a href="">Diplôme</a></h4>
                <p class="description">Des diplômes universitaires à distance sur plusieurs disciplines (économie, droit, santé, éducation, TIC, sciences, etc.) </p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                <div class="icon"><i class="bi bi-calendar4-week"></i></div>
                <h4 class="title"><a href="">Production</a></h4>
                <p class="description">Un pôle des unités de production de supports pédagogiques et scientifiques en ligne ou sur papier (syllabus) </p>
              </div>
            </div>
          </div>

        </div>
      </section><!-- End Services Section -->

      <!-- ======= Portfolio Section ======= -->
      <section id="portfolio" class="portfolio">
        <div class="container">

          <div class="row" data-aos="fade-up">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>
                <li data-filter=".filter-app">App</li>
                <li data-filter=".filter-card">Card</li>
                <li data-filter=".filter-web">Web</li>
              </ul>
            </div>
          </div>

          <div class="row portfolio-container" data-aos="fade-up">

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <img src="../img/portfolio/html.jfif" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 1</h4>
                <p>App</p>
                <a href="../img/portfolio/html.jfif" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                <a href="pages/portfolio-details.blade.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <img src="../img/portfolio/merise.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <a href="../img/portfolio/merise.png" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                <a href="pages/portfolio-details.blade.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <img src="../img/portfolio/algo.jfif" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 2</h4>
                <p>App</p>
                <a href="../img/portfolio/algo.jfif data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
                <a href="pages/portfolio-details.blade.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <img src="../img/portfolio/php.jfif" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 2</h4>
                <p>Card</p>
                <a href="../img/portfolio/php.jfif" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
                <a href="pages/portfolio-details.blade.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <img src="../img/portfolio/bdd.jfif" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 2</h4>
                <p>Web</p>
                <a href="../img/portfolio/bdd.jfif" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
                <a href="pages/portfolio-details.blade.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <img src="../img/portfolio/Informatique.jfif" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 3</h4>
                <p>App</p>
                <a href="../img/portfolio/Informatique.jfif" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
                <a href="pages/portfolio-details.blade.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <img src="../img/portfolio/python.jfif" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 1</h4>
                <p>Card</p>
                <a href="../img/portfolio/python.jfif" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
                <a href="pages/portfolio-details.blade.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <img src="../img/portfolio/Entreprendre.jfif" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 3</h4>
                <p>Card</p>
                <a href="../img/portfolio/Entreprendre.jfif" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
                <a href="pages/portfolio-details.blade.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <img src="../img/portfolio/Projet.jfif" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <a href="../img/portfolio/Projet.jfif" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                <a href="pages/portfolio-details.blade.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

          </div>

        </div>
      </section><!-- End Portfolio Section -->

      <!-- ======= Our Clients Section ======= -->
      <section id="clients" class="clients">
        <div class="container">

          <div class="section-title" data-aos="fade-up">
            <h2>Our <strong>Clients</strong></h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>

          <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">

            <div class="col-lg-3 col-md-4 col-xs-6">
              <div class="client-logo">
                <img src="../img/clients/client-1.png" class="img-fluid" alt="">
              </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
              <div class="client-logo">
                <img src="../img/clients/client-2.png" class="img-fluid" alt="">
              </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
              <div class="client-logo">
                <img src="../img/clients/client-3.png" class="img-fluid" alt="">
              </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
              <div class="client-logo">
                <img src="../img/clients/client-4.png" class="img-fluid" alt="">
              </div>
            </div>
            
        </div>
      </section><!-- End Our Clients Section -->

    </main><!-- End #main -->

    <!-- inclure le footer -->
    <?php include '../Views/partials/footer.blade.php'; ?>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    
    <?php include '../Views/layout/appJs.blade.php'; ?>
  </body>

</html>