<?php  
  session_start();
  @$Jour = $_POST["Cate_Jour"];
  @$Anne = $_POST["Cate_Annuel"];
  @$Men = $_POST["Cate_Mensuel"];
      
  $Id = $_SESSION["User"]["id"];
  
  include_once '../../app/connexion.php';
  
  $req = "SELECT * FROM lecteur WHERE 	Iduser = '$Id'";
  $quer = $con->prepare($req);
  $quer->execute();
  
  $lect = $quer->fetch();
  $num = $lect["Numlecteur"];
  
  $sql = "SELECT * FROM categorielecteur WHERE Numlecteur	='$num'";
  $query = $con->prepare($sql);
  $query->execute();
  $fetch = $query->fetch();

  $Categorie = $fetch["Libelcateg"];
  
  $find = "SELECT * FROM typeabonnement WHERE Categorie = '$Categorie'";
  $res = $con->prepare($find);
  $res->setFetchMode(PDO::FETCH_ASSOC);
  $res->execute();
  $tab = $res->fetchAll();
  for ($i=0;$i<count($tab);$i++) {
    if($tab[$i]["Libeltypeab"] == $Jour AND $tab[$i]["Categorie"] == $Categorie) {
      $code = $tab[$i]["Codetypeab"];
      $val = $tab[$i]["Validite"];
    }
    if($tab[$i]["Libeltypeab"] == $Anne AND $tab[$i]["Categorie"] == $Categorie) {
      $code = $tab[$i]["Codetypeab"];
      $val = $tab[$i]["Validite"];
    }
    if($tab[$i]["Libeltypeab"] == $Men AND $tab[$i]["Categorie"] == $Categorie) {
      $code = $tab[$i]["Codetypeab"];
      $val = $tab[$i]["Validite"];
    }
  }
  
  $date = date('j/m/Y');
  $sel = "SELECT * FROM abonnement WHERE Numlecteur = '$num'";
  $rl = $con->prepare($sel);
  $rl->execute();
  $show = $rl->fetch();
  @$Numlect = $show["Numlecteur"];      
  if(!empty($_POST)) {
    if($Numlect == $num) {
      echo "L'abonnement est à jour! ";
    
    }else {
      $insert = "INSERT INTO abonnement ( Codetypeab, Datej, Numlecteur) 
      VALUES(:code, :datej,:num)";
      $queryi = $con->prepare($insert);
      $queryi->bindValue(":code", $code, PDO::PARAM_STR);
      $queryi->bindValue(":datej", $date, PDO::PARAM_STR);
      $queryi->bindValue(":num", $num, PDO::PARAM_STR);
      $queryi->execute();
      // insertion de données dans la table abonnement brut
      $insert1 = "INSERT INTO abonnementbrut ( Codetypeab, Datej, Numlecteur) 
      VALUES(:code, :datej,:num)";
      $queryi1 = $con->prepare($insert1);
      $queryi1->bindValue(":code", $code, PDO::PARAM_STR);
      $queryi1->bindValue(":datej", $date, PDO::PARAM_STR);
      $queryi1->bindValue(":num", $num, PDO::PARAM_STR);
      $queryi1->execute();

      $go = "INSERT INTO compteur ( Validite, Numlecteur)
      VALUES(:val, :lect)";
      $bign = $con->prepare($go);
      $bign->bindValue(":val", $val, PDO::PARAM_STR);
      $bign->bindValue(":lect", $num, PDO::PARAM_STR);
      $bign->execute();

      echo "L'abonnement est mise à jour!";
    }
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
            <h2>Abonnement</h2>
            <ol>
              <?php if(!isset($_SESSION["User"])) :?>
              <li><a href="../index.blade.php">Home</a></li>
              <?php else : ?>
              <li><a href="../../app/index.php">Home</a></li>
              <?php endif; ?>
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
                <form method="POST" class="form-princing">
                  <select name="Cate_Jour" id="">
                    <option selected value="Journalier"><h3>Journalier</h3></option>
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
                <form method="POST" class="form-princing">
                  <select name="Cate_Annuel" id="">
                    <option value="Annuel"><h3>Annuel</h3></option>
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
                <form method="POST" class="form-princing">
                  <select name="Cate_Mensuel" id="">
                    <option value="Mensuel"><h3>Mensuel</h3></option>
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