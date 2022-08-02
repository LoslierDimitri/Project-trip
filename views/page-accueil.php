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


            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
                    <div class="column">
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
                                <input type="date" name="voyage_date_aller" id="voyage_date_aller" placeholder="date aller">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                <input type="date" name="voyage_date_retour" id="voyage_date_retour" placeholder="date retour">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
                    <div class="column">
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
                                <input type="number" name="voyage_nombre_chambre" id="voyage_nombre_chambre" placeholder="Nombre de chambre">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
            </div>

            <div class="col-lg-12 pb-3 d-flex justify-content-center">
                <button type="submit"> <img src="./projet/front/source/svg/Picto rechercher2.svg" alt=""> Trouvez</button><br>
            </div>
            </div>

        </form>

    </section>

    <section>
        <div class="map">
            <h2>Recherche par région</h2>
            <h3>Nouvelle Aquitaine</h3>
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

    </section>




    <?php
    include("./include/footer.php");
    ?>


    <script src="./public/js/script.js"></script>
</body>

</html>