<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
        <title>Bibliothèque en ligne - numérique</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
    
        <!-- Favicons -->
        <link href="../assets/img/favicon.ico" rel="icon">
        <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
        <!-- Vendor CSS Files -->
        <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- Font-awesome File -->
        <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
        
        <!-- Template Main CSS File -->
        <link href="../assets/css/style.css" rel="stylesheet">
        
        <!-- the style customers -->
        <link rel="stylesheet" href="../assets/scss/main.css">
    
        <!-- =======================================================
        * Template Name: Flattern - v4.8.0
        * Template URL: https://bootstrapmade.com/flattern-multipurpose-bootstrap-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
    </head>

    <body>
        <header>
            <div class="header">
                <a href="../assets/Views/index.blade.php" class="back-link">
                    <i class="fa fa-arrow-left"></i>
                </a>
            </div>
        </header>
        <div class="grid-container-fluid">
            <div class="container">
                <label class="label" for="" data-aos="fade-in" >S'inscrire</label>
                <form action="" data-aos="fade-up">
                    <div class="form-group">
                        <label for="">
                            <input type="text" class="name form-control is-valid" name="" id="inputName" aria-describedby="helpId" placeholder="Nom">
                            <div class="invalid-feedback">
                                Validation message
                            </div>
                        </label>
                        <label for="">
                            <input type="text" class="name form-control is-valid" name="" id="inputName" aria-describedby="helpId" placeholder="Post-nom">
                            <div class="invalid-feedback">
                                Validation message
                            </div>
                            
                        </label>
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <textarea class="adr form-control is-valid" name="" id="inputName" rows="3" aria-describedby="helpId" placeholder="Adresse"></textarea>
                    </div>
                    <div class="invalid-feedback">
                        Validation message
                    </div><br>
                    <div class="form-group">
                        <label for="">
                            <input type="text" class="name form-control is-valid" name="" id="inputName" aria-describedby="helpId" placeholder="Prénom">
                            <div class="invalid-feedback">
                                Validation message
                            </div>
                        </label>
                        <label for="">
                            <select class="name form-control" name="" id="">
                                <option>Homme</option>
                                <option>Femme</option>
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <input type="date" class="date form-control is-valid" name="" id="inputName" aria-describedby="helpId" placeholder="Date de naissance">
                        <div class="invalid-feedback">
                            Validation message
                        </div>
                    </div>
                    <div class="form-group"><br><br>
                        <button type="submit" class="btn  btn-success ">Envoyer</button>
                        <button type="reset" class="btn  btn-danger ">Annuler</button>
                    </div>
                </form>

            </div>
            <div class="other" data-aos="fade-in">
                <label for="" class="Vous">Vous Pouvez vous connectez</label><br>
                <a href="#" class="badge badge-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                 <i class="fa fa-google icon"></i> avec votre compter Google
                </a>
            </div>
            
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Se Connecter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">E-mail</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              <div id="emailHelp" class="form-text">Nous ne partegerons jamais votre e-mail avec quelqu'un d'autre.</div>
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                              <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3 form-check">
                              <input type="checkbox" class="form-check-input" id="exampleCheck1">
                              <label class="form-check-label" for="exampleCheck1">Se rappeler de moi</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Connecter</button>
                          </form>
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>

        <footer id="footer" class="footer">
            <div class="me-md-auto text-center text-md-start">  
                <div class="copyright">
                  &copy; Copyright <strong><span>Bibliothèque en ligne</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                  Designed by <a href="https://bootstrapmade.com/">MichMav</a>
                </div>
              </div>
              <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>

        </footer>

        <!-- Vendor JS Files -->
        <script src="../assets/vendor/aos/aos.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
        <script src="../assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="../assets/js/main.js"></script>
    </body>
</html>