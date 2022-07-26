<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo $_POST["type_search"];
    echo "<br>";
    echo $_POST["voyage_region"];

    header("Location: test_function_result.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/page-accueil.css">
    <title>Culin'Air</title>
</head>

<body>

    <?php
        include("../include/navbar.php");
    ?>


        <section class="recherche_avancee">
            <h1>Et si le voyage de votre vie était aussi délicieux <br> qu'un plat régional?</h1>
            
            <label for="voyage_formule">formule</label>
               <select id="voyage_formule" name="voyage_formule">
                   <option value="voyage_formule_gastronomique">gastronomique</option>
                   <option value="voyage_formule_touristique">touristique</option>
               <select><br>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">

                <input type="text" name="type_search" value="france" hidden>

                <!-- <label for="voyage_region">region</label>
                <select id="voyage_region" name="voyage_region">
                    <option value="bretagne">bretagne</option>
                    <option value="corse">corse</option>
                    <option value="normandie">normandie</option>
                    <option value="aquitaine">aquitaine</option>
                 <select><br> -->


            <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
                <input type="text" name="voyage_lieu_depart" id="voyage_lieu_depart" placeholder="depart">
            </div>
            <div class="col-sm-12 col-md-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
                <input type="text" name="voyage_lieu_arrive" id="voyage_lieu_arrive" placeholder="arrive">
            </div>
            <div class="col-sm-12 col-md-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
                <input type="date" name="voyage_date_aller" id="voyage_date_aller" placeholder="date aller">
            </div>
            <div class="col-sm-12 col-md-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
                <input type="date" name="voyage_date_retour" id="voyage_date_retour" placeholder="date retour">
            </div>
            <div class="col-sm-12 col-md-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
                <input type="number" name="voyage_nombre_personne_adulte" id="voyage_nombre_personne_adulte" placeholder="personne adulte">
            </div>
            <div class="col-sm-12 col-md-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
                <input type="number" name="voyage_nombre_personne_enfant" id="voyage_nombre_personne_enfant" placeholder="personne enfant">
            </div>

                <div class="col-lg-12 d-flex justify-content-center">
                    <button type="submit">Envoyer</button><br>
                </div>
        </div>

            </form>

        </section>



    
    <?php
        include("../include/footer.php");  
    ?>
    


    <script src="../js/script.js"></script>
</body>

</html>