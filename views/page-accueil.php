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



    <!-- 3D Slideshow Section -->
    <section class="slideshow">
        <div class="container">
            <div class="entire-content">
                <div class="content-carrousel">
                    <figure class="d-flex align-items-center">
                        <img src="./public/svg/Logo-simple.svg" alt="">
                    </figure>
                    <figure class="title d-flex align-items-center text-center w-100">
                        <h2>Vous propose</h2>
                    </figure>
                    <figure class="shadow"><img src="./public/jpg/Bretagne.jpg" />
                        <p>Dégustez la Bretagne</p>
                    </figure>
                    <figure class="shadow"><img src="./public/jpg/provence.jpg" />
                        <p>Goûtez la Provence</p>
                    </figure>
                    <figure class="shadow"><img src="./public/jpg/Reunion.jpg" />
                        <p>Savourez la Réunion</p>
                    </figure>
                    <figure class="shadow"><img src="./public/jpg/pays-basque.jpg" />
                        <p>Croquez le Pays-Basque</p>
                    </figure>
                    <figure class="shadow"><img src="./public/jpg/Corse.jpg" />
                        <p>Dévorez la Corse</p>
                    </figure>
                    <figure class="shadow"><img src="./public/jpg/Alsace.jpg" />
                        <p>Régalez-vous de l'Alsace</p>
                    </figure>
                    <figure class="shadow guadeloupe"><img src="./public/jpg/Guadeloupe.jpg" />
                        <p>Mordez la Guadeloupe<br> à pleines dents</p>
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="advantages mb-4">
            <div class="title mt-5 mb-5 d-flex">
                <h2>Pourquoi partir avec</h2>
                <img src="./public/svg/Logo-simple.svg" class="mx-3 pb-2" alt="">
                <h2>?</h2>
            </div>
            <div class="contents">
                <div class="row w-100">
                    <div class="col-md-12 col-lg-3 mt-5 mb-3 mx-auto">
                        <div class="card mx-auto" style="width: 18rem; background-color: transparent; border: none;">
                            <img class="card-img-top mx-auto" src="./public/svg/Sur-mesure.svg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text text-center text-white">Des voyages culinaires
                                    sur mesure rien que
                                    pour vous</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-3 mt-5 mb-3 mx-auto">
                        <div class="card mx-auto" style="width: 18rem; background-color: transparent; border: none;">
                            <img class="card-img-top mx-auto" src="./public/svg/Ecoresponsable.svg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text text-center text-white">Nous privilégions les
                                    voyages dans l’héxagone
                                    pour une emprunte plus
                                    écoresponsable</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-3 mt-5 mb-3 mx-auto">
                        <div class="card mx-auto" style="width: 18rem; background-color: transparent; border: none;">
                            <img class="card-img-top mx-auto" src="./public/svg/Meilleures-notes.svg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text text-center text-white">Nous sélectionnons les
                                    logements et restaurants
                                    les mieux notés pour vous
                                    garantir le meilleur</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-3 mt-5 mb-3 mx-auto">
                        <div class="card mx-auto" style="width: 18rem; background-color: transparent; border: none;">
                            <img class="card-img-top mx-auto" src="./public/svg/francophonie.svg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text text-center text-white">Des trips francophones
                                    pour plus de confort</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>




    <?php
    include("./include/footer.php");
    ?>


    <script src="./public/js/script.js"></script>
</body>

</html>