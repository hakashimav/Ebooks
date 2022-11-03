<?php 

  require '../../app/connexion.php';

  $dir = "../../Dashboard/doc/";
  $route = "../../Dashboard/icon/";
  // for first ouvrage 
  $Numouv = 29;
  $sql = "SELECT * FROM ouvrage WHERE Codeouv = '$Numouv'";
  $query = $con->prepare($sql);
  $query->execute();
  $ouv = $query->fetch();
  $dir_file = $ouv["Files"];
  $dir_img = $ouv["Photo"];
  // for second ouvrage
  $Numouv1 = 30;
  $sql1 = "SELECT * FROM ouvrage WHERE Codeouv = '$Numouv1'";
  $query1 = $con->prepare($sql1);
  $query1->execute();
  $ouv1 = $query1->fetch();
  $dir_file1 = $ouv1["Files"];
  $dir_img1 = $ouv1["Photo"];
  // for three ouvrage
  $Numouv2 = 31;
  $sql2 = "SELECT * FROM ouvrage WHERE Codeouv = '$Numouv2'";
  $query2 = $con->prepare($sql2);
  $query2->execute();
  $ouv2 = $query2->fetch();
  $dir_file2 = $ouv2["Files"];
  $dir_img2 = $ouv2["Photo"];


?>

<!DOCTYPE html>
<html lang="fr">

  <?php 
    include '../layout/app1.blade.php';
  ?>
  <body>
    <section id="topbar" class="d-flex align-items-center">

    </section>

    <!-- ======= Header ======= -->
    <?php 
      include '../partials/navbar.blade.php';
    ?>

    <main id="main">

      <!-- ======= Breadcrumbs ======= -->
      <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

          <div class="d-flex justify-content-between align-items-center">
            <h2>Ouvrages</h2>
            <ol>
              <?php if(!isset($_SESSION["User"])) :?>
              <li><a href="../index.blade.php">Home</a></li>
              <?php else : ?>
              <li><a href="../../app/index.php">Home</a></li>
              <?php endif; ?>
              <li>Ouvrages</li>
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs -->

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
              <img src="../../img/portfolio/html.jfif" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 1</h4>
                <p>App</p>
                <a href="../../img/portfolio/html.jfif" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.blade.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <a href="<?= $dir . $dir_file?>">
              <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <img src="<?= $route . $dir_img?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <p>View</p>
                  <a href="<?= $dir . $dir_file?>"  title="View"><i class="fa fa-eye"></i></a>
                  <a href="portfolio-details.blade.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </a>

            <a href="<?= $dir . $dir_file1?>">
              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <img src="<?= $route . $dir_img1?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <p>View</p>
                  <a href="<?= $dir . $dir_file1?>" title="View" ><i class="fa fa-eye"></i></a>
                  <a href="portfolio-details.blade.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </a>
           
            <a href="<?= $dir . $dir_file2?>">
            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <img src="<?= $route . $dir_img2?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <p>View</p>
                <a href="<?= $dir . $dir_file2;?>" title="View"><i class="fa fa-eye"></i></a>
                <a href="portfolio-details.blade.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
            </a>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <img src="../../img/portfolio/Entreprendre.jfif" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 3</h4>
                <p>Card</p>
                <a href="../../img/portfolio/Entreprendre.jfif" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.blade.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <img src="../../img/portfolio/Projet.jfif" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <a href="../../img/portfolio/Projet.jfif" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.blade.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

          </div>

        </div>
      </section><!-- End Portfolio Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php 
      include '../partials/footer.blade.php';
    ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php
      include '../layout/appjs1.blade.php';
    ?>

  </body>

</html>