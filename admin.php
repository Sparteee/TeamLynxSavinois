<?php

include "connexion.php";
session_start();

// Vérification si l'utilisateur est connecté
if(!isset($_SESSION["user"])){
    header('location: index');
}

 // Supression des photos de la BDD
if(isset($_POST["delete"])){
    $delete = "DELETE FROM image";
    $d = $connexion->exec($delete);
    header('Location: admin');
}

// Upload des photos dans la BDD et dans le dossier public/imagesPhotos
if(isset($_POST["upload"])) {
            $name = $_FILES['img']['name'];
            $taille = sizeof($name);
            for ($i = 0; $i < $taille; $i++) {
                $photo = $name["$i"];
                $dir = "/imagesPhotos/$photo";
                $files = $_FILES["img"]["tmp_name"];
                $files = $files["$i"];
                move_uploaded_file($files, "public".$dir);
                $sql = "INSERT INTO image (img_src) VALUES(:dir) ";
                $resu = $connexion->prepare($sql);
                $resu->bindParam(':dir', $dir);
                $resu->execute();

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
    <title>Gérer les photos</title>
    <link rel="icon" type="image/png" href="public/images/test.png" />
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/admin/admin.css">
</head>
<body>
<header>
    <h1>Administration Team Lynx Savinois</h1>
</header>

<main>
    <div class="form1">
        <form action="" method="post" enctype="multipart/form-data">
            <label for="img">Sélectionne toutes les photos (20 max)</label>
            <input type="file" name="img[]" multiple max="150" accept="image/jpeg" class="upload-box">
            <button type="submit" id="upload" name="upload"><img src="https://img.icons8.com/FFFFFF/ios11/2x/upload-to-cloud.png" alt="" width="16px" height="16px">Envoyer les photos</button>
        </form>
    </div>

    <div class="form2">
        <form action="" method="post">
            <label for="delete">Supprime toutes les photos</label>
            <button name="delete"><img src="https://img.icons8.com/FFFFFF/ios11/2x/filled-trash.png" width="16px" height="16px"> Supprimer</button>
        </form>
    </div>
</main>
    <?php include "elements/footer.php"; ?>
</body>
</html>