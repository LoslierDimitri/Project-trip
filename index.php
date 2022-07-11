<?php include_once './backend/index.php'; ?>

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
        <h3>Liste des clients :</h3>

            <?php foreach ($users as $user) : ?>
                <div><?= $user['nom'] ?> <?= $user['prenom'] ?><br>
                <?= $user['age'] ?> ans<br>
                <?= $user['adresse'] ?><br>
                <?= $user['email'] ?><br>
                <?= $user['telephone'] ?><br><br>
                <!-- <a href="edit-fruit.php?id=<?= $fruit['id'] ?>">Modifier</a>
                <a href="delete-fruit.php?id=<?= $fruit['id'] ?>">Supprimer</a> -->
            </div>
                
            <?php endforeach; ?>
        </ul>
    </section>


    <?php include_once './includes/footer.php'; ?>

</body>

</html>