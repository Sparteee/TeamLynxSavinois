<?php
include "connexion.php";

if(isset($_POST)){
    if (!empty($_POST['contact']) && !empty($_POST['message'])){
        $contact = htmlspecialchars($_POST['contact']);
        $message = htmlspecialchars($_POST['message']);
        $sqlinsert = "INSERT INTO contacts (contact , message) VALUES (:contact , :message)";
        $resu = $connexion->prepare($sqlinsert);
        $resu->bindValue(':contact' , $contact);
        $resu->bindValue(':message' , $message);
        $resu->execute();
        $message = "Formulaire bien envoyé !";
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
    <title>Contact - Team Lynx Savinois</title>
    <link rel="icon" type="image/png" href="public/images/logo-modif.png" />
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/contact.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <script src="public/js/menu.js"></script>
    <script src="public/js/count_char.js"></script>
</head>
<body>
    <div class="overlay">
        <?php include "header.php"?>
        <section class="containerContact">
            <section class="containerBureau">
                <h2>BUREAU DE L'ASSOCIATION</h2>
                    <ul>
                        <li><span class="bold">Jean-Jacques CHAUVIN</span> - Président</li>
                        <li><span class="bold">Sandrine GIRY</span> - Vice-Présidente</li>
                        <li><span class="bold">Laurence CHARLES</span> - Trésorière/Secrétaire</li>
                        <li><span class="bold">Valentin MACÉ</span> - Chargé de la communication</li>
                        <li><span class="bold">Raphaël VICTOR</span> - Chargé de la communication</li>
                    </ul>
            </section>


            <section class="texteContact">
                <h2>CONTACT</h2>
                <p>Vous souhaitez nous contacter pour participer à l'une de nos parties ? Avoir plus d'informations sur notre association ? Faire une partie avec notre association ?</p>
                <p>N'hésitez pas à nous adresser un message via nos réseaux sociaux en cliquant ici :</p>
                <section class="containerRS">
                    <a class="facebook" href="https://www.facebook.com/Team-Lynx-Savinois-728439467310383"><img src="https://img.icons8.com/FFFFFF/color/2x/facebook-new.png" alt="Team Lynx Savinois"</a>
                    <a class="insta" href="https://www.instagram.com/team_lynx_savinois/?hl=fr"><img src="https://img.icons8.com/FFFFFF/color/2x/instagram-new.png" alt="Airsoft Saint Savinien"></a>
                </section>
            </section>


        </section>
    </div>
</body>
</html>
