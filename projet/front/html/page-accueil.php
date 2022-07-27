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
    <link rel="stylesheet" href="./projet/front/css/navbar.css">
    <link rel="stylesheet" href="./projet/front/css/footer.css">
    <link rel="stylesheet" href="./projet/front/css/page-accueil.css">
    <title>Culin'Air</title>
</head>

<body>

    <?php
        include("./projet/front/include/navbar.php");
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

            <img class="carte_france" src="./projet/front/source/svg/Sans titre - 1.svg" alt="">
        </div>
    </section>




    <?php
        include("./projet/front/include/footer.php");  
    ?>


    <script src="./projet/front/js/script.js"></script>
</body>

</html>