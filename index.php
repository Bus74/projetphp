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
                <div class="card border-primary mb-3">
                    <div class="card-header bg-primary text-white">Les voitures sans roues sont très apréciées des écolos</div>
                    <div class="card-body ">
                    <p class="card-text">C'est pas très étonnant ! Lorem ipsum dolor... </p>
                    </div>
                <div class="card-footer text-muted">Le <strong>lundi 20 avril 2020 à 19h17</strong> par <strong>Alice</strong></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card border-primary mb-3">
                <div class="card-header bg-primary text-white">Sortie de la nouvelle Peugeot sans roues</div>
                <div class="card-body ">
                    <p class="card-text">La nouvelle Peugeot sans roues est enfin sortie !</p>
                </div>
                <div class="card-footer text-muted">Le <strong>lundi 20 avril 2020 à 19h16</strong> par <strong>Alice</strong></div>
                </div>
            </div>
        </div>


    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


</body>
</html>