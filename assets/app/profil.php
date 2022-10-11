<!-- deémarrage de la session User dans PHP -->
<?php session_start(); ?>

<!Doctype html>
<html>
    <!-- inclure l'app -->
    <?php include '../Views/layout/app.blade.php'; ?>

    <body>
        <div class="container-fluid">
            <!-- Nom d'utilisateur connecté -->
            <h2>Profil de : </h2>
            <div class="container-infos">
                <span></span>
            </div>
        <main class="form-signin">
            <form>
                <p class="ajouter text-info">Ajouter les informations supplémentaire</p>

                <div class="form-floating">
                    <input type="text" class="form-control" name="prenom" id="floatingInput" placeholder="Prénom" required="required">
                    <label for="floatingInput">Prénom</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="nom" id="floatingnom" placeholder="Nom" required="required">
                    <label for="floatingnom">Nom</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="nom" id="floatipost" placeholder="Postnom" required="required">
                    <label for="floatingpost">Postnom</label>
                </div>
                <div class="form-floating">
                    <select class="form-select form-select-lg mb-3" name="genre" aria-label=".form-select-lg example">
                        <option selected value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                        <option value="Autre">Autre</option>
                    </select>
                    <label for="">Genre</label>
                </div>
                <div class="form-floating">
                    <input type="Date" class="form-control" name="daten" id="floatidate" placeholder="Date de naissance">
                    <label for="floatingdate">Date de naissance</label>
                </div>
                <div class="form-floating">
                    <select class="form-select form-select-lg mb-3" name="cat" aria-label=".form-select-lg example">
                        <option selected value="Homme">Etudiant</option>
                        <option value="Femme">Chercheur</option>
                    </select>
                    <label for="">Catégorie</label>
                </div>
                <div class="box">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="numparc" id="floatinum" placeholder="N° Parcelle">
                        <label for="floatingnum">N° Parcelle</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="avenue" id="floatiave" placeholder="Avenue">
                        <label for="floatingave">Avenue</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="quartier" id="floatiquart" placeholder="Quartier">
                        <label for="floatingquart">Quartier</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="commune" id="floaticom" placeholder="Commune">
                        <label for="floatingcom">Commune</label>
                    </div>
                </div>
                <button class="w-100 btn btn-lg btn-success" type="submit">Sign in</button>
            </form>
        </main>
    

    <?php include '../Views/layout/appJs.blade.php'; ?>
    </body>
</html>