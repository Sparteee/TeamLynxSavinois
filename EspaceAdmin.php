<?php
include "connexion.php";
session_start();

if(isset($_POST['send'])){
    if(isset($_POST['user']) && isset($_POST['pwd'])){
        if(!empty($_POST['user']) && !empty($_POST['pwd'])){
            $login = htmlspecialchars($_POST['user']);
            $pwd = htmlspecialchars($_POST['pwd']);
            $pwd = md5($pwd);

            $sqllogin = "SELECT login FROM membres WHERE login = '{$login}'";
            $sqlpwd = "SELECT password FROM membres WHERE password = '{$pwd}'";

            $resultatlogin = $connexion->query($sqllogin);
            $resultatpwd = $connexion->query($sqlpwd);

            if(!$resultatlogin->rowCount() == 0 AND !$resultatpwd->rowCount() == 0){
                $sqlrole = "SELECT role FROM membres WHERE login = '{$login}'";
                $resultatrole = $connexion->query($sqlrole);
                $res = $resultatrole->fetch();
                $sqlverif = "SELECT * FROM membres WHERE login = '{$login}'";
                $verif = $connexion->query($sqlverif);
                $resultverif = $verif->fetch();
                $_SESSION["user"] = $resultverif;
                if($res->role === '3'){
                    header('Location: admin');
                } else{
                    $error = "Impossible d'accès ! Tu n'es pas l'administrateur ! ";
                }
            }
            else{
                if($resultatlogin->rowCount() == 0 ){
                    $error = "Mauvais nom d'utilisateur !";
                }
                if($resultatpwd->rowCount() == 0 ){
                    $error = "Mauvais mot de passe !";
                }
                if($resultatpwd->rowCount()==0 AND $resultatlogin->rowCount() == 0 ){
                    $error = "Mauvais nom d'utilisateur et mauvais mot de passe !";
                }
            }

        }
    }
}

?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Espace Administration</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/admin/loginAdmin.css">
    <link rel="icon" type="image/png" href="public/images/test.png" />
</head>
<body>
<div class="container">
    <h1>Administration Team Lynx Savinois</h1>
    <form action="" method="post">
        <div>
            <label for="user">Nom d'utilisateur</label>
            <input type="text" id="user" name="user" placeholder="Nom d'utilisateur">
        </div>

        <div>
            <label for="pwd">Mot de passe</label>
            <input type="password" id="pwd" name="pwd" minlength="8" required placeholder="Password">
        </div>
        <?php if(isset($error)): ?>
            <p><?=$error?></p>
        <?php endif;?>
        <input type="submit" name="send" value="Connexion">

    </form>
</div>
</body>
</html>
