<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require ("../form/form_registration.php");

    registration();

    header("Location: test_connection.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section class="product">
        <h2>inscription</h2>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="radio" name="inscription_sexe" id="H" value="H" >
            <label for="H">Homme</label>
            <input type="radio" name="inscription_sexe" id="F" value="F" >
            <label for="F">Femme</label>
            <input type="radio" name="inscription_sexe" id="N" value="N" checked >
            <label for="A">Non Renseigné</label><br>
            <input type="text" name="inscription_name" id="inscription_name" placeholder="Nom">
            <input type="text" name="inscription_prenom" id="inscription_prenom" placeholder="Prénom"><br>
            <input type="number" name="inscription_age" id="inscription_age" placeholder="Age"><br>
            <input type="text" name="inscription_adresse" id="inscription_adresse" placeholder="Adresse"><br>
            <input type="text" name="inscription_pays" id="inscription_pays" placeholder="Pays"><br>
            <input type="email" name="inscription_email" id="inscription_email" placeholder="Email"><br>
            <input type="text" name="inscription_telephone" id="inscription_telephone" placeholder="Téléphone"><br>
            <input type="text" name="inscription_pseudo" id="inscription_pseudo" placeholder="Pseudo"><br>
            <input type="password" name="inscription_mot_de_passe" id="inscription_mot_de_passe" placeholder="Mot de passe">
            <input type="password" name="inscription_mot_de_passe_verification" id="inscription_mot_de_passe_verification" placeholder="Confirmation"><br>
            <button type="submit">Envoyer</button><br>
        </form>
    </section>

</body>

</html>