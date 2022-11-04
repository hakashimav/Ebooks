<?php 
  session_start();

  if(!isset($_SESSION["Admi"])) {
    header("Location: ../app/errors/404.php");
    exit;
  }
include_once '../app/connexion.php';

$sql = "SELECT * FROM lecteur";
$query = $con->prepare($sql);
$query->execute();

$Nlecteur = $query->rowCount();

$Etudiant = "Etudiant";

//selectioné le lecteur de la catégorie Etudiant
$sql1 = "SELECT * FROM categorielecteur WHERE Libelcateg = '$Etudiant'";
$query1 = $con->prepare($sql1);
$query1->execute();
$CatEtudiant = $query1->rowCount();
//selectioné le lecteur de la catégorie Chercheur

$Chercheur = "Chercheur";

$sql2 = "SELECT * FROM categorielecteur WHERE Libelcateg = '$Chercheur'";
$query2 = $con->prepare($sql2);
$query2->execute();
$CatChercheur = $query2->rowCount();

//total des ouvrages
$sql3 = "SELECT * FROM ouvrage";
$query3 = $con->prepare($sql3);
$query3->execute();
$Ouvrage = $query3->rowCount();

$lecteur =  $con->query("SELECT * FROM Lecteur")->fetchAll();

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php require '../Views/layout/app_dash.blade.php'; ?>
    </head>

    <body>
        <div class="containerd">
            <div class="navigation">
                <ul>
                    <li>
                        <a href="#">
                            <span class="icon"><ion-icon name="logo-apple"></ion-icon></span>
                            <span class="title">Brand Name</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="#">
                            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                            <span class="title" >Dashboard</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="ouvrage.php">
                            <span class="icon"><ion-icon name="book-outline"></ion-icon></span>
                            <span class="title">Ouvrage</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="#">
                            <span class="icon"><ion-icon name="help-outline"></ion-icon></span>
                            <span class="title">Help</span>
                        </a>
                    </li> 
                    
                    <li>
                        <a href="auteur.php">
                            <span class="icon"><ion-icon name="reader-outline"></ion-icon></span>
                            <span class="title">Auteur</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="../app/out.php">
                            <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                            <span class="title">Sign out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- main -->
        <div class="main ">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <!-- search -->
                <div class="search" data-aos="fade-down">
                    <label for="">
                        <input type="text" placeholder="Search here">
                    </label>
                </div>
                <!-- userImg -->
                <div class="user">
                    <img src="user.jpg" alt="">
                </div>
            </div>

            <!-- cards -->
            <div class="cardBox" data-aos="zoom-in">
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $Nlecteur; ?></div>
                        <div class="cardName">Lecteur</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>  
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $CatEtudiant; ?></div>
                        <div class="cardName">Etudiant</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="school-outline"></ion-icon>                   
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $CatChercheur; ?></div>
                        <div class="cardName">Chercheur</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="search-outline"></ion-icon>                   
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $Ouvrage; ?></div>
                        <div class="cardName">Ouvrage</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="book-outline">                   
                    </div>
                </div>
            </div>

            <div class="details">
                <!-- order details list -->
                <div class="recentOrders" data-aos="fade-right">
                    <div class="cardHeader">
                        <h2>Liste générale des lecteurs</h2>
                        <a href="" class="btn">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Nom</td>
                                <td>Postnom</td>
                                <td>Genre</td>
                                <td>Catégorie</td>
                                <td>Abonnement</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($lecteur as $donnees) : ?>
                                <tr>
                                    <td><?= $donnees["Nom"];?></td>
                                    <td><?= $donnees["Postnom"];?></td>
                                    <td><?= $donnees["Sexe"];?></td>
                                
                                    <?php $Numlecteur = $donnees["Numlecteur"]; ?>
                                    <?php $abon = $con->query("SELECT * FROM abonnement WHERE Numlecteur = '$Numlecteur'")->fetchAll(); ?>
                                    <?php foreach($abon as $abons) : ?>
                                    <?php endforeach; ?>
                                    <?php $code = $abons["Codetypeab"];?>
                                    <?php $cat = $con->query("SELECT * FROM categorielecteur WHERE Numlecteur = '$Numlecteur'")->fetchAll();?>
                                    <?php foreach($cat as $cats) :?>
                                        <td><span class="status return"><?= $cats["Libelcateg"]; ?></span></td>
                                    <?php endforeach;?>
                                    <?php $type = $con->query("SELECT * FROM typeabonnement WHERE Codetypeab = '$code'")->fetchAll();?>
                                    <?php foreach($type as $types) :?>
                                        <td><span class="status delivered"><?= $types["Libeltypeab"]; ?></span></td>
                                    <?php endforeach;?>
                                </tr>
                            <?php endforeach;?>    
                        </tbody>
                    </table>
                </div>

                <!-- New customers -->
                <div class="recentCustomers" data-aos="slide-left">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                    </div>
                    <table>
                        <tr>
                            <td width="60px"><div class="imgBx"><img src="user.jpg" alt=""></div></td>
                            <td><h4>Mohamed<br><span>Italy</span></h4></td>
                        </tr>
                        <tr>
                            <td width="60px"><div class="imgBx"><img src="user.jpg" alt=""></div></td>
                            <td><h4>Clark<br><span>France</span></h4></td>
                        </tr>
                        <tr>
                            <td width="60px"><div class="imgBx"><img src="user.jpg" alt=""></div></td>
                            <td><h4>Mark<br><span>Span</span></h4></td>
                        </tr>
                        <tr>
                            <td width="60px"><div class="imgBx"><img src="user.jpg" alt=""></div></td>
                            <td><h4>Joshep<br><span>USA</span></h4></td>
                        </tr>
                        <tr>
                            <td width="60px"><div class="imgBx"><img src="user.jpg" alt=""></div></td>
                            <td><h4>Ben<br><span>Egypte</span></h4></td>
                        </tr>
                        <tr>
                            <td width="60px"><div class="imgBx"><img src="user.jpg" alt=""></div></td>
                            <td><h4>Alex<br><span>Syrie</span></h4></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="js/main.Js"></script>
        <?php require '../Views/layout/appjs_dash.blade.php'; ?>
    </body>
</html>