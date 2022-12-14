
<nav id="navbar" class="navbar">
    <ul>
        <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
        <li><a class="nav-link scrollto" href="../Views/pages/about.blade.php">About</a></li>
        <li><a class="nav-link scrollto" href="../Views/pages/services.blade.php">Services</a></li>
        <li><a class="nav-link scrollto" href="../Views/pages/ouvrage.blade.php">Ouvrages</a></li>
        <li><a class="nav-link scrollto" href="../Views/pages/magasin.blade.php">Magasin</a></li>
        <li><a class="nav-link scrollto" href="../Views/pages/pricing.blade.php">Abonnement</a></li>
        <li><a class="nav-link scrollto" href="../Views/pages/contact.blade.php">Contact</a></li>
        <?php if(!isset($_SESSION["User"])) :?>
            <li><a class="getstarted scrollto" href="../../forms/connect.blade.php">Rejoigne-nous</a></li>
        <?php endif;?>
        <li><a class="nav-link scrollto" href="profil.php" title="Profil"><img class="img-log" src="../img/person-circle-outline.svg" alt="" title="<?= $_SESSION["User"]["name"]?>"><?= $_SESSION["User"]["name"]?></a></li>
        <li><a href="deconnexion.php"><img class="img-log" src="../img/log-out-outline.svg" alt="" title="Déconnexion"></a></li>

    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->