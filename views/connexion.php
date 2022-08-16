<<<<<<< HEAD:projet/front/html/connexion.php
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
    <link rel="stylesheet" href="./projet/front/css/connexion.css">
</head>

<body>

    <section class="product">
        <div class="container_connection">
            <div class="connexion">
                <h2>Connexion</h2>
                <img src="./projet/front/source/svg/Logo.svg" alt="">
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                    <input type="text" name="connexion_pseudo" id="connexion_pseudo" placeholder="Pseudo"><br>
                    <input type="password" name="connexion_mot_de_passe" id="connexion_mot_de_passe" placeholder="Mot de passe">
                    <div class="bouton">
                        <button type="submit">Valider</button><br>
                    </div>
                </form>
            </div>
        </div>
    </section>

</body>

=======
<?php
include("test_connection_check.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require("./projet/back/form/form_connection.php");

    connection();
    echo "connected with pseudo: [" . $_SESSION['pseudo'] . "] <br>";
    echo "connected with mot_do_passe: [" . $_SESSION['mot_de_passe'] . "] <br>";
    header("Location: ../");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="./public/css/connexion.css">
    <link rel="shortcut icon" type="image/png" href="./public/svg/pointer.svg" />
</head>

<body>

    <section class="product">
        <div class="container_connection">
            <div class="connexion">
                <h2>Connexion</h2>
                <img src="./public/svg/Logo.svg" alt="">
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                    <input type="text" name="connexion_pseudo" id="connexion_pseudo" placeholder="Pseudo"><br>
                    <input type="password" name="connexion_mot_de_passe" id="connexion_mot_de_passe" placeholder="Mot de passe">
                    <div class="bouton">
                        <button type="submit">Valider</button><br>
                    </div>
                </form>
                <a class="register-link" href="inscription">
                    <p>Pas de compte? Inscrivez-vous ici</p>
                </a>
            </div>
        </div>
    </section>

</body>

>>>>>>> main:views/connexion.php
</html>