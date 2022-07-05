<?php

$pdo = require_once './data/database.php';
$title = "Inscription";
$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $adresse = $_POST['adresse'];
    $mail = $_POST['mail'];
    $telephone = $_POST['telephone'];
    $password = $_POST['password'];

    if (!$name && !$prenom && !$age && !$adresse && !$mail && !$telephone && !$password) {
        $error = 'Champ à renseigner';
    }


    if (!$error) {
        $stmtCreate = $pdo->prepare('INSERT INTO users VALUES (DEFAULT, :nom, :prenom, :age, :adresse, :mail, :telephone, :password)');
        $stmtCreate->bindValue(':nom', $nom);
        $stmtCreate->bindValue(':prenom', $prenom);
        $stmtCreate->bindValue(':age', $age);
        $stmtCreate->bindValue(':adresse', $adresse);
        $stmtCreate->bindValue(':mail', $mail);
        $stmtCreate->bindValue(':telephone', $telephone);
        $stmtCreate->bindValue(':password', $password);
        $stmtCreate->execute();

        header('Location: ' . $_SERVER['PHP_SELF']);
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
            <input type="text" name="nom" id="nom" placeholder="Nom">
            <input type="text" name="prenom" id="prenom" placeholder="Prénom">
            <input type="number" name="age" id="age" placeholder="Age">
            <input type="text" name="adresse" id="adresse" placeholder="Adresse">
            <input type="text" name="mail" id="mail" placeholder="Mail">
            <input type="text" name="telephone" id="telephone" placeholder="Téléphone">
            <input type="password" name="password" id="password" placeholder="Mot de passe">
            <button type="submit">Envoyer</button>
            <?php if ($error) : ?>
                <span><?= $error ?></span>
            <?php endif; ?>
        </form>
    </section>
    <?php include_once './includes/footer.php'; ?>

</body>

</html>