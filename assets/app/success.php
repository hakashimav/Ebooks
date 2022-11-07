<?php
session_start(); 
if(!isset($_SESSION["User"])) {
    header("Location: errors/404.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    
    <title>Succes</title>
 
    <style>
        .bloc-succes {
            position: fixed;
            margin: 25vw;
            top: -10vw;
            left: 10vw;
            border: 1px solid gray;
            background: white;
            width: 30vw;
            box-shadow: 1px 1px 5px black;
        }
        .bloc-succes .btn-ferme {
            position:relative;
            top: -200px;
            left: 180px;
        
        }
        .btn-ferme{
            font-family: Calibri light;
            text-decoration: none;
            font-size: 20px;
            color: black;
            border: none;
           
            
        }
        .btn-ferme:hover {
            color: red;
            
        
        }
        .bloc-succes img {
            position: relative;
            left: 100px;
        }

    </style>

</head>
<body>
    <div class="bloc-succes">
        <img src="../img/succes.png" alt="" class="img-succes">
        <a href="profil_user.php" class="btn-ferme" title="Fermé">X</a>
    </div>
</body>
</html>