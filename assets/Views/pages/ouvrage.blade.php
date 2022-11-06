<?php
session_start();
if(!isset($_SESSION["User"])) {
  header("Location: ../../app/errors/404.php");
  exit;
}
?>

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
  // for faur ouvrage
  $Numouv3 = 32;
  $sql3 = "SELECT * FROM ouvrage WHERE Codeouv = '$Numouv3'";
  $query3 = $con->prepare($sql3);
  $query3->execute();
  $ouv3 = $query3->fetch();
  $dir_file3 = $ouv3["Files"];
  $dir_img3 = $ouv3["Photo"];
  // for five ouvrage
  $Numouv4 = 33;
  $sql4 = "SELECT * FROM ouvrage WHERE Codeouv = '$Numouv4'";
  $query4 = $con->prepare($sql4);
  $query4->execute();
  $ouv4 = $query4->fetch();
  $dir_file4 = $ouv4["Files"];
  $dir_img4 = $ouv4["Photo"];


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
            <a href="<?= $dir . $dir_file3?>">           
              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <img src="<?= $route . $dir_img3?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <p>View</p>
                  <a href="<?= $dir . $dir_file3?>"  title="View"><i class="fa fa-eye"></i></a>
                  <a href="magasin.blade.php?keywords=PhP&valider=" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </a>


            <a href="<?= $dir . $dir_file?>">
              <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <img src="<?= $route . $dir_img?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <p>View</p>
                  <a href="<?= $dir . $dir_file?>"  title="View"><i class="fa fa-eye"></i></a>
                  <a href="magasin.blade.php?keywords=merise&valider=" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </a>

            <a href="<?= $dir . $dir_file1?>">
              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <img src="<?= $route . $dir_img1?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <p>View</p>
                  <a href="<?= $dir . $dir_file1?>" title="View" ><i class="fa fa-eye"></i></a>
                  <a href="magasin.blade.php?keywords=Algorithme&valider=" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </a>
           
            <a href="<?= $dir . $dir_file2?>">
            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <img src="<?= $route . $dir_img2?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <p>View</p>
                <a href="<?= $dir . $dir_file2;?>" title="View"><i class="fa fa-eye"></i></a>
                <a href="magasin.blade.php?keywords=SIG&valider=" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
            </a>
            <a href="<?= $dir . $dir_file4;?>"></a>
              <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <img src="<?= $route . $dir_img4;?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <p>View</p>
                  <a href="<?= $dir . $dir_file4;?>" title="View"><i class="fa fa-eye"></i></a>
                  <a href="magasin.blade.php?keywords=Système&valider=" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </a>
            
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