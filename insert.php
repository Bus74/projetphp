<?php
session_start();

?>

<?php

//APPEL DES variables
if(
    isset($_POST['title'])&&
    isset($_POST['content'])
){
 //Bloc des verif
 if(!preg_match('/^.{2,150}$/i', $_POST['title'])){
    $errors[]= 'Titre invalide';
 }
 if(mb_strlen($_POST['content']) < 2 ||  mb_strlen($_POST['content']) > 20000){      
    $errors[] = 'L\'article doit avoir entre 2 et 20000 carateres'; 
}
 // Si pas d'erreurs
 if(!isset($errors)){
    //Connexion a la bdd
    try{
         $bdd = new PDO('mysql:host=localhost;dbname=lesswheels;charset=utf8', 'root', '');
        
 // Ligne permettant d'afficher les erreurs SQL à l’écran. A enlever quand le site est mis en ligne
         $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
     } catch(Exception $e){
        die('Il ya un problème avec la bdd: ' . $e->getMessage());
     }
 //Requête préparée pour insérer le nouvel article
 $response = $bdd->prepare('INSERT INTO articles(title, content,author, create_date) VALUES (?,?,?,?)'); 
// Liaison des valeurs des marqueurs et exécution de la requête
$response->execute([
    $_POST['title'],
    $_POST['content'],
    $_SESSION['user']['id'],
    date('Y-m-d H:i:s')
    
]);
// Si l'insertion a réussi (rowCount retournera donc 1), alors on créer un message de succès, sinon message d'erreur
    if($response->rowCount() >0){
         $succesMessage = 'l\'article a été publié ! ';
    } else{
         $errors[]= 'Problème avec la base de donnée, veuillez ré-essayer';
    }
 //Fermeture de la requête
 $response->closeCursor();
}
}
?>





<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <title>Insert</title>
</head>
<body>
<?php include'parts/menu.php'?>

<?php

    //Si il y a des erreurs on les affiche
    if(isset($errors )){
        foreach($errors as $error){
            echo '<p style=color:red;">' . $error . '</p>';
        }
    }
    if(isset($succesMessage)){   
        echo '<p style="color:green;">' . $succesMessage . '</p>';
    }else {
?>
<?php
    if(!isset($_SESSION['user'])){
        echo 'Vous devez vous connecter pour etre ici !';
    }
    else{
      ?>
    <div class="container">
        <div class="row">
            <h1 class="text-center col-12 mt-5">Administration : Ajout d'un nouvel Article</h1>
        </div>
        <div class="row">
                            <form action="insert.php" method="POST" class="col-12 col-md-6 offset-md-3 my-5">
                                                            <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" value="" class="form-control" name="title" id="title" placeholder="Ex : Bon c'est bien gentil, mais ça marche toujours pas">
                    </div>
                    <div class="form-group">
                        <label for="content">Contenu</label>
                        <textarea class="form-control" rows="10" name="content" id="content"></textarea>
                    </div>
                    <input type="hidden" name="csrf-token" value="960cb25ed38b8cd5a9efbd74176cdabb">
                    <input type="submit" value="Créer" class="btn btn-success col-12 my-2">
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