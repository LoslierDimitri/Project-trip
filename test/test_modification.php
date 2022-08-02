<?php
include ("test_include.php");
?>

<?php
// session_start();
// echo "connected with pseudo: [" . $_SESSION['pseudo'] . "] <br>";
// echo "connected with mot_do_passe: [" . $_SESSION['mot_de_passe'] . "] <br>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require ("../../back/form/form_modification.php");

    modification();
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
        <h2>modification</h2>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="text" name="modification_name" id="modification_name" placeholder="name">
            <input type="text" name="modification_value" id="modification_value" placeholder="value"><br>
            <button type="submit">Envoyer</button><br>
        </form>
    </section>

</body>

</html>

