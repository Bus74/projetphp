<?php
session_start();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <title>Accueil</title>
</head>

<body>
<?php include'parts/menu.php'?>


    <div class="container-fluid">   
        <div class="row">
            <h1 class="text-center col-12 mt-5">Accueil</h1>
            <h2 class="text-center col-12">Bienvenue sur Lesswheels, le premier site qui parle de voitures sans roues !</h2>
        </div>

        <div class="row">
            <h2 class="col-12 text-center">Les deux derniers articles parus sur le site</h2>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card border-primary mb-3 col-10 offset-1">
                    <div class="card-header">Header</div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">Primary card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card border-success mb-3 col-10 offset-1">
                <div class="card-header bg-transparent border-success">Sortie de la nouvelle Peugeot sans roues</div>
                <div class="card-body text-success">
                    <p class="card-text">La nouvelle Peugeot sans roues est enfin sortie !</p>
                </div>
                <div class="card-footer bg-transparent border-success">Le <strong>lundi 20 avril 2020 à 19h16</strong> par <strong>Alice</strong></div>
                </div>
            </div>
        </div>


    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


</body>
</html>