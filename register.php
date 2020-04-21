<?php
//Inclusion de la fonction permettant de vérifier si un captcha est correct ou pas
require 'recaptchavalid.php';
// Appel des variables
if(
    isset($_POST['email'])&&
    isset($_POST['password'])&&
    isset($_POST['confirm-password'])&&
    isset($_POST['firstname']) &&
    isset($_POST['lastname']) &&
    isset($_POST['g-recaptcha-response'])
){
// Bloc des verif
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors[]='Email Invalide !';
    }
    if(!preg_match('/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[ !"#$%&\'()*+,\-\.\/:;<=>?\\\\@[\]\^_`{|}~]).{8,1000}$/', $_POST['password'])){
        $errors[]='Le mot de passe doit contenir au minimum 1 maj, 1 min, 1 chiffre et un caractère spécial !';
    }
    if($_POST['confirm-password'] != $_POST['password']){
        $errors[]='Confirmation differente !';
    }
    if(!preg_match('/^.{2,50}$/', $_POST['firstname'])){
        $errors[]='Le prénom doit contenir entre 2 et 50 caractères !';
    }
    if(!preg_match('/^.{2,50}$/', $_POST['lastname'])){
        $errors[]='Le nom doit contenir entre 2 et 50 caractères !';
    }
    if(!recaptcha_valid($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR'])){
        $errors[] = 'captcha invalide';
    }
    // Si pas d'erreurs
    if(!isset($errors)){
        //Connexion à la bdd
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=lesswheels;charset=utf8', 'root', '');

    //ligne permettant d'afficher les erreurs SQL à l'ecran. A enlever quand le site est en ligne
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(Exception $e){
    // Stoppe le code car si on rentre dans le catch, c'est qu'on a pas réussit a se connecter à la bdd
    die('Il y a un problème avec la bdd : '.$e->getMessage());
    }

    // Insertion d'un nouveau compte en bdd avec une requete préparée
    $response= $bdd->prepare('INSERT INTO users(email, password,  firstname, lastname, register_date, admin, activated, register_token) VALUES(?,?,?,?,?,?,?,?)'); 

    $response->execute([
        $_POST['email'],
        password_hash($_POST['password'], PASSWORD_BCRYPT),
        $_POST['firstname'],
        $_POST['lastname'],
        date('Y-m-d H:i:s'),
        0,
        0,
        0
    ]);
    
    //Verfication que l'insertion à correctement fonctionné
    if($response->rowCount() >0){
        $succesMessage= 'Votre compte a bien été créer !';
    } else{
        $errors[]= 'probleme avec la bdd';
    }

    // Fermeture de la requete
    $response->closeCursor();
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire responsive vérifié avec jQuery</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>

<?php include'parts/menu.php'?>


<?php

// Si il y a des erreurs on les affiche
if (isset($errors)){
    foreach($errors as $error){
        echo '<p style=color:red;">' . $error . '</p>';
    }
}

// Si le message existe, on l'affiche, sinon on affichje le formuliare
if(isset($succesMessage)){
    echo '<p style="color:green;">' . ($succesMessage) . '</p>';
}else{
    ?>


<!--Input en Bootstrap-->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1 class="text-center mt-5">Inscription</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-5 offset-md-3 mt-5">
                <form action="" method="POST">
                    

                    <div class="form-group">
                        <label for="exampleInputEmail1">E-mail </label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name= "email" placeholder="alice@exemplecom">
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mot de passe</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name= "password">
                    </div>
                    <div class="form-group">
                        <label for="confirm">Confirmation mot de passe</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name= "confirm-password">
                    </div>
                    <div class="form-group">
                        <label for="form-firstname">Prénom :</label>
                        <input id="form-firstname" class="form-control" type="text" name= "firstname" placeholder="Alice" >
                    </div>
                    <div class="form-group">
                        <label for="form-lastname">Nom :</label>
                        <input id="form-lastname" class="form-control" type="text" name= "lastname" placeholder="Smith" >
                        <!-- <div class="invalid-feedback">Message d'erreur</div> -->
                    </div>
                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="6LdawusUAAAAAE6q3dJvj06qPZBro2kx5Xz0JWeP"></div>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
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