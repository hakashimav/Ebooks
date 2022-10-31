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
            <h2>Ouvrage Details</h2>
            <ol>
              <?php if(!isset($_SESSION["User"])) :?>
              <li><a href="../index.blade.php">Home</a></li>
              <?php else : ?>
              <li><a href="../../app/index.php">Home</a></li>
              <?php endif; ?>
              <li>Ouvrage Details</li>
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs -->

      <!-- ======= Portfolio Details Section ======= -->
      <section id="portfolio-details" class="portfolio-details">
        <div class="container">

          <div class="row gy-4">

            <div class="col-lg-8">
              <div class="portfolio-details-slider swiper">
                <div class="swiper-wrapper align-items-center">

                  <div class="swiper-slide">
                    <img src="../../img/portfolio/merise.png" alt="">
                  </div>

                  <div class="swiper-slide">
                    <img src="../../img/portfolio/Projet.jfif" alt="">
                  </div>

                  <div class="swiper-slide">
                    <img src="../../img/portfolio/bdd.jfif" alt="">
                  </div>

                </div>
                <div class="swiper-pagination"></div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="portfolio-info">
                <h3>Project informatique</h3>
                <ul>
                  <li><strong>Category</strong>: Web design</li>
                  <li><strong>Client</strong>: ASU Company</li>
                  <li><strong>Project date</strong>: 01 March, 2020</li>
                  <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
                </ul>
              </div>
              <div class="portfolio-description">
                <h2>Ceci est un exemple des ouvrages pour réalisé un projet en informatique</h2>
                <p>
                  La gestion d'un projet en informatique requis, des connaissance en matière de la gestion, bien encore sur les méthodes a
                  utilisé, pour en conclure; la base de données est essentiel pour conserver les informations. dans un support permanent.
                </p>
              </div>
            </div>

          </div>

        </div>
      </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->

    <?php 
      include '../partials/footer.blade.php';
    ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <?php
      include '../layout/appjs1.blade.php';
    ?>
  </body>

</html>