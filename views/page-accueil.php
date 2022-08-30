<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo $_POST["type_search"];
    // echo "<br>";
    // echo $_POST["voyage_region"];

    require "./projet/back/function/result_search.php";
    // require "./projet/back/function/result_format.php";
    // require "./projet/back/function/result_send.php";

    search($_POST["voyage_formule"], $_POST["type_search"], $_POST["voyage_lieu_depart"], $_POST["voyage_lieu_arrive"], $_POST["voyage_date_aller"], $_POST["voyage_date_retour"], $_POST["voyage_nombre_personne_adulte"], $_POST["voyage_nombre_personne_enfant"], $_POST["voyage_formule"], $_POST["voyage_nombre_chambre"]);

    header("Location: search_result");
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/navbar.css">
    <link rel="stylesheet" href="./public/css/footer.css">
    <link rel="stylesheet" href="./public/css/page-accueil.css">
    <link rel="stylesheet" href="./public/css/map.css">
    <link rel="shortcut icon" type="image/x-icon" href="./public/png/favicon.ico" />
    <title>Culin'Air</title>
</head>

<body>

    <?php
    include("./include/navbar.php");
    ?>


    <?php
    include("./include/advanced_search.php")
    ?>


    <?php
    include("./include/regions_search.php")
    ?>

    <?php
    include("./include/slideshow.php")
    ?>

    <?php
    include("./include/footer.php");
    ?>


    <script src="./public/js/script.js"></script>
</body>

</html>