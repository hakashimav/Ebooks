<?php 
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
                  <img src="../../img/blog/blog-1.jpg" alt="" class="img-fluid">
                </div>

                <h2 class="entry-title">
                  <a href="blog-single.html">Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia</a>
                </h2>

                <div class="entry-meta">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.blade.php">John Doe</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.blade.php"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.blade.php">12 Comments</a></li>
                  </ul>
                </div>

                <div class="entry-content">
                  <p> <?php echo $tab[$i]["Nomouv"] ?></p>
                  <div class="read-more">
                    <a href="blog-single.blade.php">Read More</a>
                  </div>
                </div>

              </article><!-- End blog entry -->
              <?php } ?>
              
              <div class="blog-pagination">
                <ul class="justify-content-center">
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                </ul>
              </div>

            </div><!-- End blog entries list -->
            <?php } ?>
            <div class="col-lg-4">

              <div class="sidebar">

                <h3 class="sidebar-title">Search</h3>
                <div class="sidebar-item search-form">
                  <form action="" method="GET">
                    <input type="text" name="keywords" value="<?= $keywords?>" placeholder="Recherche">
                    <button type="submit" name="valider"><i class="bi bi-search"></i></button>
                  </form>
                </div><!-- End sidebar search formn-->

                <h3 class="sidebar-title">Categories</h3>
                <div class="sidebar-item categories">
                  <ul>
                    <li><a href="#">General <span>(25)</span></a></li>
                    <li><a href="#">Lifestyle <span>(12)</span></a></li>
                    <li><a href="#">Travel <span>(5)</span></a></li>
                    <li><a href="#">Design <span>(22)</span></a></li>
                    <li><a href="#">Creative <span>(8)</span></a></li>
                    <li><a href="#">Educaion <span>(14)</span></a></li>
                  </ul>
                </div><!-- End sidebar categories-->

                <h3 class="sidebar-title">Recent Posts</h3>
                <div class="sidebar-item recent-posts">
                  <div class="post-item clearfix">
                    <img src="../../img/blog/blog-recent-1.jpg" alt="">
                    <h4><a href="blog-single.blade.php">Nihil blanditiis at in nihil autem</a></h4>
                    <time datetime="2020-01-01">Jan 1, 2020</time>
                  </div>

                  <div class="post-item clearfix">
                    <img src="../../img/blog/blog-recent-2.jpg" alt="">
                    <h4><a href="blog-single.blade.php">Quidem autem et impedit</a></h4>
                    <time datetime="2020-01-01">Jan 1, 2020</time>
                  </div>

                  <div class="post-item clearfix">
                    <img src="../../img/blog/blog-recent-3.jpg" alt="">
                    <h4><a href="blog-single.blade.php">Id quia et et ut maxime similique occaecati ut</a></h4>
                    <time datetime="2020-01-01">Jan 1, 2020</time>
                  </div>

                  <div class="post-item clearfix">
                    <img src="../../img/blog/blog-recent-4.jpg" alt="">
                    <h4><a href="blog-single.blade.php">Laborum corporis quo dara net para</a></h4>
                    <time datetime="2020-01-01">Jan 1, 2020</time>
                  </div>

                  <div class="post-item clearfix">
                    <img src="../../img/blog/blog-recent-5.jpg" alt="">
                    <h4><a href="blog-single.blade.php">Et dolores corrupti quae illo quod dolor</a></h4>
                    <time datetime="2020-01-01">Jan 1, 2020</time>
                  </div>

                </div><!-- End sidebar recent posts-->

                <h3 class="sidebar-title">Tags</h3>
                <div class="sidebar-item tags">
                  <ul>
                    <li><a href="#">App</a></li>
                    <li><a href="#">IT</a></li>
                    <li><a href="#">Business</a></li>
                    <li><a href="#">Mac</a></li>
                    <li><a href="#">Design</a></li>
                    <li><a href="#">Office</a></li>
                    <li><a href="#">Creative</a></li>
                    <li><a href="#">Studio</a></li>
                    <li><a href="#">Smart</a></li>
                    <li><a href="#">Tips</a></li>
                    <li><a href="#">Marketing</a></li>
                  </ul>
                </div><!-- End sidebar tags-->

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