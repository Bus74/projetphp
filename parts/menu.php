<nav class="navbar navbar-expand-md navbar-dark bg-dark">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="#">LessWheels</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="articles-list.php">Articles</a>
            </li>
            <?php
            
            //Boutons si l'utilisateur n'est pas connecté
            if(!isset($_SESSION['user'])){
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Connexion</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="register.php">Inscription</a>
                </li>
                <?php
            } else {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Déconnexion</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="profil.php">Profil</a>
                </li>
                <?php
                // Boutons pour admins
                if($_SESSION['user']['admin'] == 1){
                    ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="insert.php">Ajouter Article</a>
                    </li>
                    <?php
                }


            }
            /*Bouton si admin est connecté
            if(isset($_SESSION['admin']))
                */ 
            ?>
            
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



