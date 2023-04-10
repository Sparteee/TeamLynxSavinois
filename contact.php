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
    <title>Contact</title>
    <link rel="icon" type="image/png" href="public/images/test.png" />
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/contact.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <script src="public/js/menu.js"></script>
    <script src="public/js/count_char.js"></script>
</head>
<body>
    <?php include "header.php"?>
    <main>
        <h2>Vous souhaitez nous contacter pour participer à l'une de nos parties ? Avoir plus d'informations sur notre association ? Faire une partie avec notre association ?</h2>
        <h3>N'hésitez pas à nous adresser un message via le formulaire ci-dessous ou sur nos réseaux en cliquant ici :</h3>
        
        <div class="reso">
            <a class="facebook" href="https://www.facebook.com/Team-Lynx-Savinois-728439467310383"><img src="https://img.icons8.com/FFFFFF/color/2x/facebook-new.png" alt="Team Lynx Savinois"</a>
            <a class="insta" href="https://www.instagram.com/team_lynx_savinois/?hl=fr"><img src="https://img.icons8.com/FFFFFF/color/2x/instagram-new.png" alt="Airsoft Saint Savinien"></a>
        </div>

        <h2 class="questionsform">UNE QUESTION ?</h2>
        <?php if(isset($message)) : ?>
            <script>
                alert("Formulaire bien envoyé !");
            </script>
        <?php endif;?>
        <div>
            <form action="" method="post">
                <div class="form1">
                    <label for="contact">Votre contact <span class="obligatoire">*</span></label>
                    <input type="text" name="contact" required maxlength="50" alt="Contact Team Lynx Savinois">
                </div>
                <div class="form2">
                    <label for="textbot">Votre message <span class="obligatoire">*</span></label>
                    <textarea name="message" id="textbox" cols="50" rows="5" required maxlength="250"></textarea>
                </div>
                <div class="submit">
                    <input type="submit" name="Envoyer" value="Envoyer">
                    <span class="cpt" id="count_char">250/250</span>
                </div>

            </form>
        </div>

    </main>

    <?php include "footer.php"?>
</body>
</html>
