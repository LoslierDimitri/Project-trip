<<<<<<< HEAD:projet/front/test/test_connection.php
<?php
include("/Project-trip/projet/front/test/test_include.php");
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require ("/Project-trip/projet/back/form/form_connection.php");

    connection();
    echo "connected with pseudo: [" . $_SESSION['pseudo'] . "] <br>";
    echo "connected with mot_do_passe: [" . $_SESSION['mot_de_passe'] . "] <br>";
    header ("Location: test_function.php");
    
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
        <h2>connection</h2>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="text" name="connexion_pseudo" id="connexion_pseudo" placeholder="Pseudo"><br>
            <input type="password" name="connexion_mot_de_passe" id="connexion_mot_de_passe" placeholder="Mot de passe">
            <button type="submit">Envoyer</button><br>
        </form>
    </section>

</body>

</html>

=======
<?php
include("./Project-trip/projet/front/test/test_include.php");
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require ("./projet/back/form/form_connection.php");

    connection();
    echo "connected with pseudo: [" . $_SESSION['pseudo'] . "] <br>";
    echo "connected with mot_do_passe: [" . $_SESSION['mot_de_passe'] . "] <br>";
    header ("Location: test_function.php");
    
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
        <h2>connection</h2>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="text" name="connexion_pseudo" id="connexion_pseudo" placeholder="Pseudo"><br>
            <input type="password" name="connexion_mot_de_passe" id="connexion_mot_de_passe" placeholder="Mot de passe">
            <button type="submit">Envoyer</button><br>
        </form>
    </section>

</body>

</html>

>>>>>>> main:test/test_connection.php
