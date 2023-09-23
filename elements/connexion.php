<?php
define("SERVEUR","localhost");
define("USER","nom_utilisateur");
define("MDP","mot_de_passe");
define("BD","base_de_donnees");
try {
    $connexion= new PDO('mysql:host='.SERVEUR.';dbname='.BD, USER, MDP);
    $connexion->exec("SET CHARACTER SET utf8");
    $connexion -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

}
catch(Exception $e) {
    echo 'Erreur : '.$e->getMessage().'
';
    echo 'N° : '.$e->getCode();
}

?>