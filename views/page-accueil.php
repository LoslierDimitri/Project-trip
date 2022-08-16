<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo $_POST["type_search"];
    echo "<br>";
    echo $_POST["voyage_region"];

    header("Location: /Project-trip");
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
    <link rel="shortcut icon" type="image/png" href="./public/svg/pointer.svg" />
    <title>Culin'Air</title>
</head>

<body>

    <?php
    // include ("test_include.php");
    ?>

    <?php
    include("./include/navbar.php");
    ?>


    <section class="recherche_avancee">
        <h1>Et si le voyage de votre vie était aussi délicieux <br> qu'un plat régional?</h1>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="formule">
                <label for="voyage_formule">Formules</label>
                <select id="voyage_formule" name="voyage_formule">
                    <option value="voyage_formule_gastronomique">Gastronomique</option>
                    <option value="voyage_formule_touristique">Touristique</option>
                    <select><br>
            </div>

            <input type="text" name="type_search" value="france" hidden>

            <!-- <label for="voyage_region">region</label>
                <select id="voyage_region" name="voyage_region">
                    <option value="bretagne">bretagne</option>
                    <option value="corse">corse</option>
                    <option value="normandie">normandie</option>
                    <option value="aquitaine">aquitaine</option>
                 <select><br> -->


            <div class="icons-form">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
                        <div class="column">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <img class="w-25" src="./public/svg/Picto-map.svg" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <input type="text" name="voyage_lieu_depart" id="voyage_lieu_depart" placeholder="Depart">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <input type="text" name="voyage_lieu_arrive" id="voyage_lieu_arrive" placeholder="Arrivée">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
                        <div class="column">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <img class="w-25" src="./public/svg/Picto-dates.svg" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <input type="date" name="voyage_date_aller" id="voyage_date_aller" placeholder="Date aller">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <input type="date" name="voyage_date_retour" id="voyage_date_retour" placeholder="Date retour">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
                        <div class="column">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <img class="w-25" src="./public/svg/Picto-add-people.svg" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <input type="number" name="voyage_nombre_personne_adulte" id="voyage_nombre_personne_adulte" placeholder="Nombre d'adulte">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <input type="number" name="voyage_nombre_personne_enfant" id="voyage_nombre_personne_enfant" placeholder="Nombre d'enfant">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
                        <div class="column">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <img class="w-25" src="./public/svg/Picto-lit.svg" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <input type="number" name="voyage_nombre_chambre" id="voyage_nombre_chambre" placeholder="Nombre de chambre">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
            </div>

            <div class="col-lg-12 pb-3 d-flex justify-content-center">
                <button type="submit"> <img src="./public/svg/Picto-rechercher.svg" alt=""> Trouvez</button><br>
            </div>
            </div>

        </form>

    </section>

    <section>
        <div class="map mt-5 mb-5">
            <div class="column">
                <h2 class="text-center">Recherche par région</h2>
                <h3 class="text-center">Nouvelle Aquitaine</h3>
                <div class="row w-100">
                    <div class="col-sm-12 col-md-12 col-lg-6 d-flex justify-content-center mt-5">
                        <img class="carte_france" src="./public/svg/Sans titre - 1.svg" alt="">
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 mt-5">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                <h5>Vous pourrez déguster :</h5>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-3 d-flex justify-content-center">
                                    <img class="region_img" src="./public/png/chevre_image.png" alt="">
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-3">
                                    <h6>Le fromage de chèvre</h6>
                                    <p>Fromage emblématique de la région Poitou Charentes</p>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-3 d-flex justify-content-center">
                                    <img class="region_img" src="./public/png/Canneles.png" alt="">
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-3">
                                    <h6>Les cannelés</h6>
                                    <p>Petite patisserie Bordelaise à la vanille</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-3 d-flex justify-content-center">
                                    <img class="region_img" src="./public/jpeg/broye.jpg" alt="">
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-3">
                                    <h6>Le Broyé du Poitou</h6>
                                    <p>Gâteau Poitevin resemblant à un gros biscuit (dur mais pas sec)</p>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-3 d-flex justify-content-center">
                                    <img class="region_img" src="./public/jpeg/vin.jpg" alt="">
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-3">
                                    <h6>Le vin de Bordeaux</h6>
                                    <p>Le mythic vin de Bordeaux célèbre dans le monde entier</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-3 d-flex justify-content-center">
                                    <img class="region_img" src="./public/jpeg/charcuterie.jpg" alt="">
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-3">
                                    <h6>La charcuterie du Sud Ouest</h6>
                                    <p>Jambon de Bayonne, pâté au piment d'Espelette, foie gras... hmmmm !</p>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-3 d-flex justify-content-center">
                                    <img class="region_img" src="./public/jpeg/axoa.jpg" alt="">
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-3">
                                    <h6>L'Axoa de veau (prononcé achoa)</h6>
                                    <p>Ragoût de veau au poivron et piment d'Espelette</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-3 d-flex justify-content-center">
                                    <img class="region_img" src="./public/jpeg/magret.jpg" alt="">
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-3">
                                    <h6>Le Magret de canard</h6>
                                    <p>Bien que Gersois, le magret reste très consommé dans les Landes et Pays Basque</p>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-3 d-flex justify-content-center">
                                    <img class="region_img" src="./public/jpeg/salade-landaise.jpg" alt="">
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-3">
                                    <h6>La salade Landaise</h6>
                                    <p>Un peu de fraicheur avec cette succulente salade aux gésiers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- 3D Slideshow Section -->
    <section class="slideshow">
        <div class="container">
            <div class="entire-content">
                <div class="content-carrousel">
                    <figure class="d-flex align-items-center">
                        <img src="./projet/front/source/svg/Logo-simple.svg" alt="">
                    </figure>
                    <figure class="title d-flex align-items-center text-center w-100">
                        <h2>Vous propose</h2>
                    </figure>
                    <figure class="shadow"><img src="./projet/front/source/jpeg/Bretagne.jpg" />
                        <p>Dégustez la Bretagne</p>
                    </figure>
                    <figure class="shadow"><img src="./projet/front/source/svg/Provence.svg" />
                        <p>Goûtez la Provence</p>
                    </figure>
                    <figure class="shadow"><img src="./projet/front/source/svg/Reunion.svg" />
                        <p>Savourez la Réunion</p>
                    </figure>
                    <figure class="shadow"><img src="./projet/front/source/svg/Pays_basque.svg" />
                        <p>Croquez le Pays-Basque</p>
                    </figure>
                    <figure class="shadow"><img src="./projet/front/source/jpeg/Corse.jpg" />
                        <p>Dévorez la Corse</p>
                    </figure>
                    <figure class="shadow"><img src="./projet/front/source/jpeg/Alsace.jpg" />
                        <p>Régalez-vous de l'Alsace</p>
                    </figure>
                    <figure class="shadow guadeloupe"><img src="./projet/front/source/jpeg/Guadeloupe.jpg" />
                        <p>Mordez la Guadeloupe<br> à pleines dents</p>
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <!-- <section>


            <div class="contenu mt-5">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4 mt-5 mb-3 d-flex justify-content-around">
                        <div class="column">
                            <img src="./projet/front/source/svg/Bretagne.svg" alt="">
                            <p>Dégustez la Bretagne</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 mt-5 mb-3 d-flex justify-content-around">
                        <div class="column">
                            <img src="./projet/front/source/svg/Reunion.svg" alt="">
                            <p>Savourez la Réunion</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 mt-5 mb-3 d-flex justify-content-around">
                        <div class="column">
                            <img src="./projet/front/source/svg/Provence.svg" alt="">
                            <p>Goûtez la Provence</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section>
        <div class="advantages">
            <div class="title mt-5">
                <h2>Pourquoi partir avec</h2>
                <img src="./projet/front/source/svg/Logo-simple.svg" alt="">
                <h2>?</h2>
            </div>
            <div class="contenu mt-5">
                <div class="row w-100">
                    <div class="col-md-12 col-lg-3 mt-5 mb-3 mx-auto">
                        <div class="card mx-auto" style="width: 18rem; background-color: transparent; border: none;">
                            <img class="card-img-top" src="./projet/front/source/svg/Sur-mesure.svg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text text-center">Des voyages culinaires
                                    sur mesures rien que
                                    pour vous</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-3 mt-5 mb-3 d-flex justify-content-center">
                        <div class="card" style="width: 18rem; background-color: transparent; border: none;">
                            <img class="card-img-top d-flex justify-content-center" src="..." alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Des voyages culinaires
                                    sur mesures rien que
                                    pour vous</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-3 mt-5 mb-3 d-flex justify-content-center">
                        <div class="card" style="width: 18rem; background-color: transparent; border: none;">
                            <img class="card-img-top" src="..." alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Des voyages culinaires
                                    sur mesures rien que
                                    pour vous</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-3 mt-5 mb-3 d-flex justify-content-center">
                        <div class="card" style="width: 18rem; background-color: transparent; border: none;">
                            <img class="card-img-top" src="..." alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Des voyages culinaires
                                    sur mesures rien que
                                    pour vous</p>
                            </div>
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