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
    <title>Profil</title>
</head>
<body>

<?php include'parts/menu.php'?>  

<?php 

// Change les dates de fr
setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
// Convertion de la date en datetime (chiffres)
$dateInTimestamp = strtotime($_SESSION['user']['register_date']);

?>

<?php
    if(!isset($_SESSION['user'])){
        echo 'Vous devez vous connecter pour etre ici !';
    }
    else{
      ?>          

<div class="container">

    <div class="row">
        <h1 class="text-center col-12 mt-5">Mon Profil</h1>
    </div>

    <div class ="row">
        <div class="col-6 offset-3">
            <ul class="list-group">
                <li class="list-group-item"><strong>E-mail :</strong> <?php echo htmlspecialchars($_SESSION['user']['email']); ?></li>
                <li class="list-group-item"><strong>Prénom :</strong> <?php echo htmlspecialchars($_SESSION['user']['firstname']); ?></li>
                <li class="list-group-item"><strong>Nom :</strong> <?php echo htmlspecialchars($_SESSION['user']['lastname']); ?></li>
                <li class="list-group-item"><strong>Status :</strong> <?php
                if($_SESSION['user']['admin'] == 0){
                    echo 'Utilisateur';
                } elseif($_SESSION['user']['admin'] == 1){
                    echo 'Administrateur';
                }
                ?> </li>
                <li class="list-group-item"><strong>Date d'inscription :</strong> <?php echo strftime('%A %d %B %Y, %Hh %Mmn %Ss', $dateInTimestamp); ?></li> 
            </ul>
        </div>    
    </div>
</div>
<?php
 }
 ?>



    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>