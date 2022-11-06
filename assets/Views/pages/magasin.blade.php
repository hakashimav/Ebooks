<?php
session_start();
if(!isset($_SESSION["User"])) {
  header("Location: ../../app/errors/404.php");
  exit;
}
?>

<?php 
  $dir = "../../Dashboard/doc/";
  $route = "../../Dashboard/icon/";
  @$keywords = $_GET["keywords"];
  @$valider = $_GET["valider"];

  if(isset($valider) && !empty(trim($keywords))) {
    $words = explode(" ", trim($keywords));
    for($i=0;$i<count($words);$i++)
      $kw[$i] = "Nomouv like '%".$words[$i]."%'";
    include ("../../app/connexion.php");
    $res = $con->prepare("SELECT * FROM ouvrage WHERE ".implode(" or ",$kw));
    $res->setFetchMode(PDO::FETCH_ASSOC);
    $res->execute();
    $tab = $res->fetchAll();
    $afficher = "oui";
  }

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
            <h2>Magasin</h2>
            <ol>
              <?php if(!isset($_SESSION["User"])) :?>
              <li><a href="../index.blade.php">Home</a></li>
              <?php else : ?>
              <li><a href="../../app/index.php">Home</a></li>
              <?php endif; ?>
              <li>Magasin</li>
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs -->

      <!-- ======= Blog Section ======= -->
      <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

          <div class="row">
            <?php if (@$afficher == "oui") { ?>
            <div class="col-lg-8 entries">
              <h2 class="entry-title"><?= count($tab). " ".(count($tab)>1?"résultats trouvés":"résultat trouvé")?></h2>
              <?php for ($i=0;$i<count($tab);$i++) {?>
              <article class="entry">
                <div class="entry-img">
                  <img src="<?php  echo $route . $tab[$i]["Photo"] ?>" alt="" class="img-fluid">
                </div>

                <h2 class="entry-title"><?php echo $tab[$i]["Nomouv"] ?></h2>

                <div class="entry-meta">
                  <ul>
                    <li class="d-flex align-items-center" title="Auteur"><i class="fa fa-book"></i><?php echo $tab[$i]["Auteur"]?></li>
                    <li class="d-flex align-items-center" title="Année d'édition"><i class="fa fa-calendar"></i><?php echo $tab[$i]["Anneedit"]?></li>
                    <li class="d-flex align-items-center" title="Maison d'édition"><i class="fa fa-home"></i><?php echo $tab[$i]["Maisonedit"]?></li>
                  </ul>
                </div>

                <div class="entry-content">
                  <p> </p>
                  <div class="read-more">
                    <a href="<?php echo $dir . $tab[$i]["Files"] ?>">Lire Plus</a>
                  </div>
                </div>

              </article><!-- End blog entry -->
              <?php } ?>
              <?php if((count($tab)>1)) :?>
              <div class="blog-pagination">
                <ul class="justify-content-center">
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                </ul>
              </div>
              <?php endif; ?>

            </div><!-- End blog entries list -->
            <?php } ?>
            <div class="col-lg-4">

              <div class="sidebar">

                <h3 class="sidebar-title">Search</h3>
                <div class="sidebar-item search-form">
                  <form action="" method="GET">
                    <input type="text" name="keywords" value="<?= $keywords?>" placeholder="Rechercher un ouvrage ici...">
                    <button type="submit" name="valider"><i class="bi bi-search"></i></button>
                  </form>
                </div><!-- End sidebar search formn-->

              </div><!-- End sidebar -->

            </div><!-- End blog sidebar -->

          </div>

        </div>
      </section><!-- End Blog Section -->

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