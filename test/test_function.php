<?php
include ("test_include.php");
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo $_POST["type_search"];
    // echo "<br>";
    // echo $_POST["voyage_region"];

    // header("Location: test_function_result.php");
    require ("../../back/function/result_search.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        search($_POST["type_search"], $_POST["voyage_region"], $_POST["voyage_lieu_depart"], $_POST["voyage_lieu_arrive"], $_POST["voyage_date_aller"], $_POST["voyage_date_retour"], $_POST["voyage_nombre_personne_adulte"], $_POST["voyage_nombre_personne_enfant"], $_POST["voyage_formule"], $_POST["voyage_nombre_chambre"]);
    }
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
        <h2>recherche france</h2>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">

            <input type="text" name="type_search" value="france" hidden>

            <label for="voyage_region">region</label>
            <select id="voyage_region" name="voyage_region">
                <option value="bretagne">bretagne</option>
                <option value="corse">corse</option>
                <option value="normandie">normandie</option>
                <option value="aquitaine">aquitaine</option>
            <select><br>

            <input type="text" name="voyage_lieu_depart" id="voyage_lieu_depart" placeholder="depart">
            <input type="text" name="voyage_lieu_arrive" id="voyage_lieu_arrive" placeholder="arrive"><br>
            <input type="date" name="voyage_date_aller" id="voyage_date_aller" placeholder="date aller">
            <input type="date" name="voyage_date_retour" id="voyage_date_retour" placeholder="date retour"><br>
            <input type="number" name="voyage_nombre_personne_adulte" id="voyage_nombre_personne_adulte" placeholder="personne adulte">
            <input type="number" name="voyage_nombre_personne_enfant" id="voyage_nombre_personne_enfant" placeholder="personne enfant"><br>
            <input type="number" name="voyage_nombre_chambre" id="voyage_nombre_chambre" placeholder="nombre chambre"><br>

            <label for="voyage_formule">formule</label>
            <select id="voyage_formule" name="voyage_formule">
                <option value="voyage_formule_gastronomique">gastronomique</option>
                <option value="voyage_formule_touristique">touristique</option>
            <select><br>

            <button type="submit">Envoyer</button><br>
        </form>
<!-- /////////////////////////////////////////////////////////////////////////////// -->
        <h2>recherche dom tom</h2>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">

            <input type="text" name="type_search" value="dom_tom" hidden>

            <label for="voyage_region">dom tom</label>
            <select id="voyage_region" name="voyage_region">
                <option value="guadeloupe">guadeloupe</option>
                <option value="martinique">martinique</option>
                <option value="reunion">reunion</option>
            <select><br>

            <input type="text" name="voyage_lieu_depart" id="voyage_lieu_depart" placeholder="depart">
            <input type="text" name="voyage_lieu_arrive" id="voyage_lieu_arrive" placeholder="arrive"><br>
            <input type="date" name="voyage_date_aller" id="voyage_date_aller" placeholder="date aller">
            <input type="date" name="voyage_date_retour" id="voyage_date_retour" placeholder="date retour"><br>
            <input type="number" name="voyage_nombre_personne_adulte" id="voyage_nombre_personne_adulte" placeholder="personne adulte">
            <input type="number" name="voyage_nombre_personne_enfant" id="voyage_nombre_personne_enfant" placeholder="personne enfant"><br>
            <input type="number" name="voyage_nombre_chambre" id="voyage_nombre_chambre" placeholder="nombre chambre"><br>
            
            <label for="voyage_formule">formule</label>
            <select id="voyage_formule" name="voyage_formule">
                <option value="voyage_formule_gastronomique">gastronomique</option>
                <option value="voyage_formule_touristique">touristique</option>
            <select><br>

            <button type="submit">Envoyer</button><br>
        </form>
    </section>

</body>

</html>

