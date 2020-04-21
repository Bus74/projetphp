<?php
// Fonction qui retourne true su l'utilisateur est bien connecté, sinon false
function isConnected(){
     return isset($_SESSION['user']);
}

// Il n'est pas necessaire de fermer la balise php. C'est uniquement en cas de code html à la suite