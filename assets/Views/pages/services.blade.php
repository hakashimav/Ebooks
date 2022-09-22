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
            <h2>Services</h2>
            <ol>
              <li><a href="../index.blade.php">Home</a></li>
              <li>Services</li>
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs -->

      <!-- ======= Services Section ======= -->
      <section id="services" class="services">
        <div class="container">

          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="icon-box" data-aos="fade-up">
                <div class="icon"><i class="bi bi-briefcase"></i></div>
                <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                <div class="icon"><i class="bi bi-card-checklist"></i></div>
                <h4 class="title"><a href="">Dolor Sitema</a></h4>
                <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                <div class="icon"><i class="bi bi-bar-chart"></i></div>
                <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                <div class="icon"><i class="bi bi-binoculars"></i></div>
                <h4 class="title"><a href="">Magni Dolores</a></h4>
                <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                <div class="icon"><i class="bi bi-brightness-high"></i></div>
                <h4 class="title"><a href="">Nemo Enim</a></h4>
                <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                <div class="icon"><i class="bi bi-calendar4-week"></i></div>
                <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
                <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
              </div>
            </div>
          </div>

        </div>
      </section><!-- End Services Section -->

      <!-- ======= Features Section ======= -->
      <section id="features" class="features">
        <div class="container">

          <div class="section-title" data-aos="fade-up">
            <h2>Le <strong>CEDESURK</strong> met</h2>
            <p>a votre disposition une série des formations </p>
          </div>

          <div class="row">
            <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-right">
              <ul class="nav nav-tabs flex-column">
                <li class="nav-item">
                  <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">
                    <h4>Service</h4>
                    <p>Formation à la création de blog (Création et gestion des contenus en ligne).</p>
                  </a>
                </li>
                <li class="nav-item mt-2">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-2">
                    <h4>Service</h4>
                    <p>Formations sur les techniques de lecture</p>
                  </a>
                </li>
                <li class="nav-item mt-2">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-3">
                    <h4>Service</h4>
                    <p>Formation à la recherche documentaire</p>
                  </a>
                </li>
                <li class="nav-item mt-2">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-4">
                    <h4>Serrvice</h4>
                    <p>Formation à la bureautique</p>
                  </a>
                </li>
              </ul>
            </div>
            <div class="col-lg-7 ml-auto" data-aos="fade-left" data-aos-delay="100">
              <div class="tab-content">
                <div class="tab-pane active show" id="tab-1">
                  <figure>
                    <img src="../../img/features-1.png" alt="" class="img-fluid">
                  </figure>
                </div>
                <div class="tab-pane" id="tab-2">
                  <figure>
                    <img src="../../img/features-2.png" alt="" class="img-fluid">
                  </figure>
                </div>
                <div class="tab-pane" id="tab-3">
                  <figure>
                    <img src="../../img/features-3.png" alt="" class="img-fluid">
                  </figure>
                </div>
                <div class="tab-pane" id="tab-4">
                  <figure>
                    <img src="../../img/features-4.png" alt="" class="img-fluid">
                  </figure>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section><!-- End Features Section -->

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