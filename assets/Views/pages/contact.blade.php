<!DOCTYPE html>
<html lang="fr">

  <?php 
    session_start();
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
            <h2>Contact</h2>
            <ol>
              <?php if(!isset($_SESSION["User"])) :?>
              <li><a href="../index.blade.php">Home</a></li>
              <?php else : ?>
              <li><a href="../../app/index.php">Home</a></li>
              <?php endif; ?>
              <li>Contact</li>
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs -->

      <!-- ======= Contact Section ======= -->
      <div class="map-section">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div>

      <section id="contact" class="contact">
        <div class="container">

          <div class="row justify-content-center" data-aos="fade-up">

            <div class="col-lg-10">

              <div class="info-wrap">
                <div class="row">
                  <div class="col-lg-4 info">
                    <i class="bi bi-geo-alt"></i>
                    <h4>Location:</h4>
                    <p>44, avenue de la Démocratie (ex-huileries)<br> Kinshasa - Gombe</p>
                  </div>

                  <div class="col-lg-4 info mt-4 mt-lg-0">
                    <i class="bi bi-envelope"></i>
                    <h4>Email:</h4>
                    <p>info@cedesurk.org</p>
                  </div>

                  <div class="col-lg-4 info mt-4 mt-lg-0">
                    <i class="bi bi-phone"></i>
                    <h4>Call:</h4>
                    <p>+243 998 2754 89<br> +243 998 374 402</p>
                  </div>
                </div>
              </div>

            </div>

          </div>

          <div class="row mt-5 justify-content-center" data-aos="fade-up">
            <div class="col-lg-10">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Votre Nom" required>
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Objet" required>
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>

          </div>

        </div>
      </section><!-- End Contact Section -->

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