<?php

$pdo = require_once './data/database.php';
$title = "Connexion";
$error = "";
// $formValue = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $connexion_pseudo = $_POST['connexion_pseudo'];
    $connexion_mot_de_passe = $_POST['connexion_mot_de_passe'];

    if (!$connexion_pseudo || !$passwordNotHashed) {
        $error = 'Champ à renseigner';
        }
    if ($connexion_pseudo) {
        $stmt = $pdo->prepare('SELECT mot_de_passe FROM users WHERE pseudo = :pseudo'); 
        $stmt->bindValue(':pseudo', $connexion_pseudo);
        $stmt->execute();
        $passwordcheck = $stmt->fetch();
        $connexion_mot_de_passe = password_hash($passwordNotHashed, PASSWORD_DEFAULT);
        if (password_verify($connexion_mot_de_passe, $passwordcheck['mot_de_passe'])) {
            header('Location: /project-trip');
        } else {
            $error = 'Pseudo ou mot de passe incorrect';
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title; ?>
    </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php include_once './includes/header.php'; ?>

    <section class="product">
        <h2>Listes de produit</h2>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="text" name="connexion_pseudo" id="connexion_pseudo" placeholder="Pseudo"><br>
            <input type="password" name="connexion_mot_de_passe" id="connexion_mot_de_passe" placeholder="Mot de passe"><br>
            <button type="submit">Envoyer</button><br>
            <?php if ($error) : ?>
                <span><?= $error ?></span>
            <?php endif; ?>
        </form>
    </section>
    <?php include_once './includes/footer.php'; ?>

</body>

</html>