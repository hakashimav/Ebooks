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
          <h2>Abonnement</h2>
          <ol>
            <li><a href="../index.blade.php">Home</a></li>
            <li>Abonnement</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="box" data-aos="fade-right">
              <form action="" method="" class="form-princing">
                <select name="" id="">
                  <option value=""><h3>Journalier</h3></option>
                </select>
                <ul>
                  <li>Etudiants
                    <h4><sup>Fc</sup>1.500<span> / jour</span></h4>
                  </li>
                  <li>Chercheurs
                    <h4><sup>Fc</sup>3.000<span> / Jour</span></h4>
                  </li>
                </ul>
                <div class="btn-wrap">
                  <button type="submit" class="btn-buy"> Buy Now</button>
                </div>
              </form>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
            <div class="box featured" data-aos="fade-up">
              <form action="" method="" class="form-princing">
                <select name="" id="">
                  <option value=""><h3>Annuel</h3></option>
                </select>
                <ul>
                  <li>Etudiants
                    <h4><sup>Fc</sup>15.000<span> / ans</span></h4>
                  </li>
                  <li>Chercheurs
                    <h4><sup>Fc</sup>30.000<span> / ans</span></h4>
                  </li>
                </ul>
                <div class="btn-wrap">
                  <button type="submit" class="btn-buys"> Buy Now</button>
                </div>
              </form>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
            <div class="box" data-aos="fade-left">
              <form action="" method="" class="form-princing">
                <select name="" id="">
                  <option value=""><h3>Mensuel</h3></option>
                </select>
                <ul>
                  <li>Etudiants
                    <h4><sup>Fc</sup>5.000<span> / mois</span></h4>
                  </li>
                  <li>Chercheurs
                    <h4><sup>Fc</sup>10.000<span> / mois</span></h4>
                  </li>
                </ul>
                <div class="btn-wrap">
                  <button type="submit" class="btn-buy"> Buy Now</button>
                </div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Cta Pricing Section ======= -->
    <section id="cta-pricing" class="cta-pricing">
      <div class="container">

        <div class="text-center">
          <h3>Contactez-nous</h3>
          <p> Le CEDESURK est un centre d'information, 
            de formation et de la diffusion de la documentation scientifique et techniques, 
            un personnel qualifié pour vous servir et répondre à vos attentes.
          </p>
          <a class="cta-btn" href="contact.blade.php">Contactez-nous</a>
        </div>

      </div>
    </section><!-- End Cta Pricing Section -->

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