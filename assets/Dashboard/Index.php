<?php 
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
$query->execute();
$Ouvrage = $query3->rowCount();

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Favicons -->
        <link href="../img/favicon.ico" rel="icon">
        <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">
        <link rel="stylesheet" href="Css/style.Css">
        <title>Brand menu</title>
    </head>
    <body>
        <div class="container">
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
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="#">
                            <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
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
                        <a href="#">
                            <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                            <span class="title">Auteur</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="#">
                            <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                            <span class="title">Sign out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- main -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <!-- search -->
                <div class="search">
                    <label for="">
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
                <!-- userImg -->
                <div class="user">
                    <img src="user.jpg" alt="">
                </div>
            </div>

            <!-- cards -->
            <div class="cardBox">
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
                        <ion-icon name="cart-outline"></ion-icon>                    
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $CatChercheur; ?></div>
                        <div class="cardName">Chercheur</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>                   
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $Ouvrage; ?></div>
                        <div class="cardName">Ouvrage</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>                   
                    </div>
                </div>
            </div>

            <div class="details">
                <!-- order details list -->
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="" class="btn">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Price</td>
                                <td>Payment</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Star Refrigerator</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td><span class="status delivered">Delivered</span></td>
                            </tr>
                            <tr>
                                <td>Window Coolers</td>
                                <td>$110</td>
                                <td>Due</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>Speakers</td>
                                <td>$620</td>
                                <td>Paid</td>
                                <td><span class="status return">Return</span></td>
                            </tr>
                            <tr>
                                <td>Hp Laptop</td>
                                <td>$110</td>
                                <td>Due</td>
                                <td><span class="status inprogress">In progrres</span></td>
                            </tr>
                            <tr>
                                <td>Apple Watch</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td><span class="status delivered">Delivered</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- New customers -->
                <div class="recentCustomers">
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

        <script>
            // menu toggle
            var toggle = document.querySelector('.toggle');
            var navigation = document.querySelector('.navigation');
            var main = document.querySelector('.main');

            toggle.onclick = function(){
                navigation.classList.toggle('active')
                main.classList.toggle('active')
            }
            // add hovered class in selected list item
            var list = document.querySelectorAll('.navigation li');
            function activelink(){
                list.forEach((item)=>
                item.classList.remove('hovered'));
                this.classList.add('hovered')
            }
            list.forEach((item) =>
            item.addEventListener('mouseover',activelink))
        </script>
    </body>
</html>