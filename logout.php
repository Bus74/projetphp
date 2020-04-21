<?php

// Inclusion de la fonction is Connected 
require 'parts/function.php';

// Necessaire  pour pouvoir utiliser les variables de session
session_start();

// Si l'utilisateur est bien connecté, on détruit le tableau user dans la session, ce qui déconnecte l'utilisateur
if(isConnected()){
    unset($_SESSION['user']);
    $succes= true;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <title>logout</title>
</head>
<body>
<?php include'parts/menu.php'?>    

    <?php 

  //si l'utilisateur est connecté, on affiche un message confirmant la déconnexion, sinon message d'erreur
    if(isset($succes)){
        echo '<p style="color:green;">Vous avez été bien déconnecté !</p>';
    }else {
        echo '<p style="color:red;">Vous êtes déjà déconnecté !</p>';
    }
    ?>
 

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>








