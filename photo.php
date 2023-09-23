<?php
include "elements/connexion.php";

    // Requête pour récupérer les 20 dernières photos
    $sql = "SELECT * FROM image ORDER BY id DESC LIMIT 20";
    $r = $connexion->query($sql);
    $resultat = $r->fetchAll();
    if(empty($resultat)){
        $error = "Aucune photo pour le moment ! ";
    }
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Photos - Team Lynx Savinois</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/photo.css">
    <link rel="icon" type="image/png" href="public/images/logo-modif.png" />
</head>
<body>
    <div class="overlay">
    <?php  include "elements/header.php"; ?>
                <div class="texteDescriptif">
                    <h2>Quelques photos des dernières parties</h2>
                </div>

                <div class="containPhoto">
                    <?php foreach ($resultat as $value) : ?>
                            <img src="public<?=$value->img_src?>" alt="Team Lynx Savinois Airsoft Saint Savinien Airsoft Charente Maritime">

                    <?php endforeach; ?>
                    <?php if(isset($error)) : ?>
                        <p><?=$error?></p>
                    <?php endif;?>
                </div>
        </div>
</body>
</html>
