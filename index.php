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


<!--Barre de navigation-->
<nav class="navbar navbar-expand-md navbar-dark bg-dark">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="#">LessWheels</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="articles-list.php">Articles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Connexion</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="register.php">Inscription</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Chercher un article" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
        </nav>
        </form>
    </div>
        </nav>
</nav>


<!--Input en Bootstrap-->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1 class="text-center mt-5">Inscription</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-5 offset-md-3 mt-5">
                <form action="" method="GET">
                    

                    <div class="form-group">
                        <label for="exampleInputEmail1">E-mail </label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="alice@exemplecom">
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mot de passe</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="confirm">Confirmation mot de passe</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="form-firstname">Prénom :</label>
                        <input id="form-firstname" class="form-control" type="text" placeholder="Alice" >
                    </div>
                    <div class="form-group">
                        <label for="form-lastname">Nom :</label>
                        <input id="form-lastname" class="form-control" type="text" placeholder="Smith" >
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

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>