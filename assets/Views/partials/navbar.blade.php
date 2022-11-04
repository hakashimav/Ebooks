
 <!-- ======= Header ======= -->
 <header id="header" class="d-flex align-items-center">
    <div class="container  justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="../index.blade.php">Bibliothèque en ligne</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <?php if(!isset($_SESSION["User"])) :?>
            <li><a href="../index.blade.php">Home</a></li>
          <?php else : ?>
            <li><a href="../../app/index.php">Home</a></li>
          <?php endif; ?>
          <li><a href="about.blade.php">About</a></li>
          <li><a href="services.blade.php">Services</a></li>
          <?php if(isset($_SESSION["User"])) :?>
          <li><a href="magasin.blade.php">Magasin</a></li>
          <li><a href="ouvrage.blade.php">Ouvrages</a></li>    
          <?php endif; ?>
          <li><a href="pricing.blade.php">Abonnement</a></li>
          <li><a href="contact.blade.php">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->