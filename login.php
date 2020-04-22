<?php

// nécessaire pour pouvoir utiliser les variables de session
session_start();
//Appel des variables
if(
    isset($_POST['email'])&&
    isset($_POST['password'])   
){
    // Bloc des verif
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors[]='Email Invalide !';
    }
    if(!preg_match('/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[ !"#$%&\'()*+,\-\.\/:;<=>?\\\\@[\]\^_`{|}~]).{8,1000}$/', $_POST['password'])){
        $errors[]='Le mot de passe doit contenir au minimum 1 maj, 1 min, 1 chiffre et un caractère spécial !';
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
        // Requete préparée
        $response = $bdd->prepare('SELECT * FROM users WHERE email = ?');

        $response->execute([
            $_POST{'email'}
        ]);

        $user = $response->fetch(PDO::FETCH_ASSOC);

      

        // Verification que le compte existe
        if(empty($user)){
            $errors[] = 'Ce compte n\'exite pas !';
        } else {
            if(password_verify($_POST['password'], $user['password'] )){ 
                $succesMessage = 'Vous etes bien connecté !';
                // On créer un sous tableau 'user' dans la session. Dans ce tableau on y met le nom et le prenom envoyé par le formulaire
                    $_SESSION['user'] = $user;
            /*if*/ 
            }else {
                $errors[] = 'mot de passe incorrect';
            }
            
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
    <title>Connexion</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

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

// Si le message existe, on l'affiche, sinon on affiche le formuliare
if(isset($succesMessage)){
    echo '<p style="color:green;">' . ($succesMessage) . '</p>';
}else{
    ?>


<?php
    if(isset($_SESSION['user'])){
        echo 'Vous etes déjà connecté !';
    }
    else{
?>
      


<!--Input en Bootstrap-->
<div class="container-fluid">

<div class="row">
    <div class="col-12">
        <h1 class="text-center mt-5">Connexion</h1>
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
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php
}
}
?>



    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
</body>
</html>