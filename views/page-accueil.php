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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/navbar.css">
    <link rel="stylesheet" href="./public/css/footer.css">
    <link rel="stylesheet" href="./public/css/page-accueil.css">
    <link rel="shortcut icon" type="image/x-icon" href="./public/png/favicon.ico" />
    <title>Culin'Air</title>
</head>

<body>

    <?php
    // include ("test_include.php");
    ?>

    <?php
    include("./include/navbar.php");
    ?>


    <section class="advanced_search py-4">
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
                    <div class="col-md-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
                    </div>
                    <div class="col-md-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
                        <div class="column">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <img class="w-25" src="./public/svg/Picto-map.svg" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <input type="text" name="voyage_lieu_depart" id="voyage_lieu_depart"
                                        placeholder="Depart">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <input type="text" name="voyage_lieu_arrive" id="voyage_lieu_arrive"
                                        placeholder="Arrivée">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
                        <div class="column">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <img class="w-25" src="./public/svg/Picto-dates.svg" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <input type="date" name="voyage_date_aller" id="voyage_date_aller"
                                        placeholder="Date aller">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <input type="date" name="voyage_date_retour" id="voyage_date_retour"
                                        placeholder="Date retour">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
                        <div class="column">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <img class="w-25" src="./public/svg/Picto-add-people.svg" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <input type="number" name="voyage_nombre_personne_adulte"
                                        id="voyage_nombre_personne_adulte" placeholder="Nombre d'adulte">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <input type="number" name="voyage_nombre_personne_enfant"
                                        id="voyage_nombre_personne_enfant" placeholder="Nombre d'enfant">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
                        <div class="column">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <img class="w-25" src="./public/svg/Picto-lit.svg" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <input type="number" name="voyage_nombre_chambre" id="voyage_nombre_chambre"
                                        placeholder="Nombre de chambre">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
            </div>

            <div class="col-lg-12 pb-3 d-flex justify-content-center">
                <button type="submit"> <img src="./public/svg/Picto-rechercher.svg" alt=""> Trouvez</button>
            </div>
            </div>

        </form>

    </section>

    <!-- Recherche par région -->

    <section class="region_search">
        <div class="title mt-5 mb-5">
            <div class="column w-100">
                <h2 class="text-center mb-4">Recherche par région</h2>
            </div>
            <div id="panel">

            </div>
            <div class="map">
                <div class="row">

                    <?php
                    include("./include/map.php");
                    ?>

                    <div class="col-lg-6">
                        <div id="details_map" class="">
                            <div class="row h-100">
                                <div class="d-flex align-items-center">
                                    <h6>Cliquez sur une région pour avoir le détail</h6>
                                </div>
                            </div>
                        </div>
                        <div id="region_panel_1" class="hidden_item">
                            <div class="row w-100">
                                <div class="row">
                                    <h3 class="text-center mb-4">Grand-Est</h3>
                                    <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                        <h5>Vous pourrez déguster par exemple:</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpg/choucroute.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>La choucroute</h6>
                                            <p>Plat à base de charcuterie, servie avec du chou fermenté et des pommes de
                                                terre. Accompagnée généralement d'une bonne bière.</p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpg/flammekueche.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>La flammekueche</h6>
                                            <p>Tarte fine flambée, garnit de crème fraîche, de lardons et d'oignons pour
                                                la recette classique.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpg/andouillette.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>L'andouillette de Troyes</h6>
                                            <p>Une charcuterie artisanale en forme de saucisse faite à partir d'abats.
                                            </p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpg/kougelhopf.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le kougelhopf</h6>
                                            <p>Sans doute le plaisir sucré le plus connu du Grand-Est. Une brioche aux
                                                fruits secs(génralement des raisins) et amandes.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                            <h5 class="mt-3">Vous pourrez visiter par exemple:</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpg/Colmar.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>La vieille ville de Colmar</h6>
                                                <p>Petite ville pittoresque, très agréable avec ses maisons colorées et
                                                    sa rivière la traversant.</p>
                                            </div>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpg/Sundgau.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le Sundgau</h6>
                                                <p>Parcourez ce magnifique petit coin de nature sauvage et visitez ses
                                                    villages tous authentiques.</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpg/Verdun.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Les champs de bataille de Verdun</h6>
                                                <p>Mettez un peu d'histoire dans votre voyage et venez visiter ce lieu
                                                    qui aura marqué la France.</p>
                                            </div>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4"
                                                    src="./public/jpg/Château-du-Haut-Koenigsbourg.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le château du Haut-Koenigsbourg</h6>
                                                <p>Plongez en plein Moyen-Âge avec le seul château fort entièrement
                                                    reconstitué en France.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="region_panel_2" class="hidden_item">
                            <div class="row w-100">

                                <div class="row">
                                    <h3 class="text-center mb-4">Nouvelle Aquitaine</h3>
                                    <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                        <h5>Vous pourrez déguster par exemple:</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/fromage-chevre.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le fromage de chèvre</h6>
                                            <p>Fromage emblématique de la région Poitou Charentes.</p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/Canneles.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Les cannelés</h6>
                                            <p>Petite patisserie Bordelaise à la vanille.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/Magret.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le Magret de canard</h6>
                                            <p>Bien que Gersois, le magret reste très consommé dans les Landes et le
                                                Pays Basque.</p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/Vin.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le vin de Bordeaux</h6>
                                            <p>Le mythic vin de Bordeaux célèbre dans le monde entier.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                            <h5 class="mt-3">Vous pourrez visiter par exemple:</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/png/Marais-Poitevin.png"
                                                    alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le Marais Poitevin</h6>
                                                <p>Faites une virée en barque à travers cette jolie rivière appellée
                                                    aussi la Venise verte.</p>
                                            </div>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/png/Pilat.png" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>La Dune du Pilat</h6>
                                                <p>Magnifique Dune de sable donnant accès à une vue magnifique sur
                                                    l\'Océan. Préparez vos mollets.</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/png/Lac-Hossegor.png" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le lac d'Hossegor</h6>
                                                <p>Venez vous balader ou faire des activités sportives autour de ce
                                                    magnifique lac.</p>
                                            </div>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/png/Kakuetta.png" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Les gorges de Kakuetta</h6>
                                                <p>Une bonne dose de nature sauvages en ce lieu, randonnée légère,
                                                    cascades et grotte au programme.</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div id="region_panel_3" class="hidden_item">
                            <div class="row w-100">

                                <div class="row">
                                    <h3 class="text-center mb-4">Auvergne-Rhône-Alpes</h3>
                                    <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                        <h5>Vous pourrez déguster par exemple:</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/Tartiflette.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>La Tartiflette</h6>
                                            <p>Tout le monde connaît ce plat emblématique du pays Savoyard, mais rien ne vaut de le déguster chez lui avec vue sur les Montagnes. Parfait en hiver.</p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/Truffade.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>La Truffade</h6>
                                            <p>La concurrente Auvergnate de la Tartiflette car les recettes se resemble mais la préparation est la cuisson est différente. À "taster" !</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/Nantua.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Les quenelles sauce Nantua</h6>
                                            <p>Recette de quenelle Lyonnaise arrosée d'une sauce onctueuse à la bisque de homard.</p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/Creme-marrons.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>La crème de marrons</h6>
                                            <p>Dégustez cette délicieuse pâte de chataîgnes glacées venant d'Ardèche. En gâteau, sur des tartines ou même à la cuillère, cette friandise vous fera fondre.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                            <h5 class="mt-3">Vous pourrez visiter par exemple:</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/png/Aiguille-midi.png" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>L'Aiguille du Midi</h6>
                                                <p>Si vous aimez la randonnée en montagne ce lieu est fait pour vous. Vous y trouverez un spectacle à couper le souffle.</p>
                                            </div>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/png/Lac-leman.png" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le lac Léman</h6>
                                                <p>Visitez le plus grand lac de France (et d'Europe). Il traverse également la Suisse. Vous pourrez vous promener, vous baigner et même naviguer.</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/png/Palais-facteur-cheval.png" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le palais du Facteur Cheval</h6>
                                                <p>Un facteur, M.Cheval, ramassait durant ses tournée des pierres afin de construire de ses mains un palais à l'architecture étonnante.</p>
                                            </div>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/png/Puy-de-dome.png" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le Puy-de-Dôme et ses volcans</h6>
                                                <p>Le Puy-de-Dôme est composé de plus de 80 volcans, ils sont tous endormis donc il est très facile de venir visiter cet endroit spectaculaire.</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div id="region_panel_4" class="hidden_item">
                            <div class="row w-100">

                                <div class="row">
                                <h3 class="text-center mb-4">Bourgogne-Franche-Comté</h3>
                                    <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                        <h5>Vous pourrez déguster par exemple:</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpg/boeuf_bourgignon.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le bœuf bourguignon</h6>
                                            <p>Voilà un fameux plat traditionnel apprécié des grands comme des petits !</p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpg/escargot.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>L'escargot de Bourgogne</h6>
                                            <p>Egalement appelé "Gros blanc", est un mets consommé depuis toujours.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpg/coq-au-vin-jaune.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le coq au vin jaune</h6>
                                            <p>Le coq au vin jaune est l'une des spécialités culinaires les plus célèbres du Jura, c'est même un fleuron de la gastronomie française ! </p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpg/potee-franc-comtoise.jpeg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>la potée franc-comtoise</h6>
                                            <p>A l'origine, la potée était cuisinée dans un pot, ce qui a donné son nom aux différents plats dégustés dans toute la France. </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                            <h5 class="mt-3">Vous pourrez visiter par exemple:</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpg/abbaye.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>L'abbaye de Fontenay</h6>
                                                <p>Fondée en 1118 par saint Bernard, l’abbaye de Fontenay est l’un des plus anciens monastères cisterciens de France.</p>
                                            </div>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpg/colline.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Basilique et colline de Vézelay</h6>
                                                <p>Fondé au IXe siècle, le monastère bénédictin acquiert les reliques de sainte Marie-Madeleine et devient un haut-lieu de pèlerinage.</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpg/roche.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>La Roche de Solutré</h6>
                                                <p>Culminant à 495 mètres, la Roche de Solutré se situe au coeur du Grand Site de France, constitué de Solutré, Pouilly et Vergisson</p>
                                            </div>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpg/musee.jpg"
                                                    alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le MuséoParc Alésia</h6>
                                                <p>De loin, le MuséoParc Alésia apparaît comme un ovni posé au milieu des paysages vallonnés de l’Auxois. Sa configuration circulaire se veut un clin d’œil à l’encerclement des Gaulois par les Romains.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="region_panel_5" class="hidden_item">
                            <div class="row w-100">
                            </div>

                            <div class="row">
                                <h3 class="text-center mb-4">Centre-Val de Loire</h3>
                                <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                    <h5>Vous pourrez déguster par exemple:</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                        <img class="region_img mt-4" src="./public/jpg/Beuchelle.jpg" alt="">
                                    </div>
                                    <div class="col-md-12 col-lg-3">
                                        <h6>La Beuchelle</h6>
                                        <p>Pâte feuilletée à base de ris et de rognons de veau dans une sauce crèmeuse
                                            aux champignons</p>
                                    </div>
                                    <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                        <img class="region_img mt-4" src="./public/jpg/fouees.jpg" alt="">
                                    </div>
                                    <div class="col-md-12 col-lg-3">
                                        <h6>Les fouées</h6>
                                        <p>Ce sont de petits pains ronds farcies. La recette originale est farcie de
                                            mogettes (sortes de gros haricots blancs) et de viande de porc.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                        <img class="region_img mt-4" src="./public/jpg/Rillettes_Tours.jpg" alt="">
                                    </div>
                                    <div class="col-md-12 col-lg-3">
                                        <h6>Les rillettes de Tours</h6>
                                        <p>Vous connaissez sans doute les rillettes du Mans mais c'est bien en Touraine
                                            qu'elles sont nées. Moins grasses et moins hachées vous allez vous régaler.
                                        </p>
                                    </div>
                                    <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                        <img class="region_img mt-4" src="./public/jpg/Tarte_tatin.jpg" alt="">
                                    </div>
                                    <div class="col-md-12 col-lg-3">
                                        <h6>La tarte Tatin</h6>
                                        <p>La fameuse tarte créée à partir d'une erreur de recette, cette tarte aux
                                            pommes inversée est originaire de Sologne. Avec une boule de glace vanille,
                                            un régal.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                        <h5 class="mt-3">Vous pourrez visiter par exemple:</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpeg/charcuterie.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Visite des châteaux de Touraine</h6>
                                            <p>Faites une virée en barque à travers cette jolie rivière appellée aussi
                                                la Venise verte.</p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpeg/axoa.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>La Dune du Pilat</h6>
                                            <p>Magnifique Dune de sable donnant accès à une vue magnifique sur l\'Océan.
                                                Préparez vos mollets.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpeg/magret.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le lac d\'Hossegor</h6>
                                            <p>Venez vous balader ou faire des activités sportives autour de ce
                                                magnifique lac.</p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpeg/salade-landaise.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Les gorges de Kakuetta</h6>
                                            <p>Une bonne dose de nature sauvages en ce lieu, randonnée légère, cascades
                                                et grotte au programme.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div id="region_panel_6" class="hidden_item">
                            <div class="row w-100">

                                <div class="row">
                                    <h3 class="text-center mb-4">Corse</h3>
                                    <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                        <h5>Vous pourrez déguster par exemple:</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/chevre_image.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le fromage de chèvre</h6>
                                            <p>Fromage emblématique de la région Poitou Charentes.</p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/Canneles.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Les cannelés</h6>
                                            <p>Petite patisserie Bordelaise à la vanille.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpeg/magret.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le Magret de canard</h6>
                                            <p>Bien que Gersois, le magret reste très consommé dans les Landes et le
                                                Pays Basque.</p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpeg/vin.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le vin de Bordeaux</h6>
                                            <p>Le mythic vin de Bordeaux célèbre dans le monde entier.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                            <h5 class="mt-3">Vous pourrez visiter par exemple:</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/charcuterie.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le Marais Poitevin</h6>
                                                <p>Faites une virée en barque à travers cette jolie rivière appellée
                                                    aussi la Venise verte.</p>
                                            </div>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/axoa.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>La Dune du Pilat</h6>
                                                <p>Magnifique Dune de sable donnant accès à une vue magnifique sur
                                                    l\'Océan. Préparez vos mollets.</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/magret.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le lac d\'Hossegor</h6>
                                                <p>Venez vous balader ou faire des activités sportives autour de ce
                                                    magnifique lac.</p>
                                            </div>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/salade-landaise.jpg"
                                                    alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Les gorges de Kakuetta</h6>
                                                <p>Une bonne dose de nature sauvages en ce lieu, randonnée légère,
                                                    cascades et grotte au programme.</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div id="region_panel_7" class="hidden_item">
                            <div class="row w-100">

                                <div class="row">
                                    <h3 class="text-center mb-4">Occitanie</h3>
                                    <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                        <h5>Vous pourrez déguster par exemple:</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/chevre_image.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le fromage de chèvre</h6>
                                            <p>Fromage emblématique de la région Poitou Charentes.</p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/Canneles.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Les cannelés</h6>
                                            <p>Petite patisserie Bordelaise à la vanille.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpeg/magret.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le Magret de canard</h6>
                                            <p>Bien que Gersois, le magret reste très consommé dans les Landes et le
                                                Pays Basque.</p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpeg/vin.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le vin de Bordeaux</h6>
                                            <p>Le mythic vin de Bordeaux célèbre dans le monde entier.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                            <h5 class="mt-3">Vous pourrez visiter par exemple:</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/charcuterie.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le Marais Poitevin</h6>
                                                <p>Faites une virée en barque à travers cette jolie rivière appellée
                                                    aussi la Venise verte.</p>
                                            </div>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/axoa.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>La Dune du Pilat</h6>
                                                <p>Magnifique Dune de sable donnant accès à une vue magnifique sur
                                                    l\'Océan. Préparez vos mollets.</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/magret.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le lac d\'Hossegor</h6>
                                                <p>Venez vous balader ou faire des activités sportives autour de ce
                                                    magnifique lac.</p>
                                            </div>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/salade-landaise.jpg"
                                                    alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Les gorges de Kakuetta</h6>
                                                <p>Une bonne dose de nature sauvages en ce lieu, randonnée légère,
                                                    cascades et grotte au programme.</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div id="region_panel_8" class="hidden_item">
                            <div class="row w-100">

                                <div class="row">
                                    <h3 class="text-center mb-4">Île-de-France</h3>
                                    <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                        <h5>Vous pourrez déguster par exemple:</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/chevre_image.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le fromage de chèvre</h6>
                                            <p>Fromage emblématique de la région Poitou Charentes.</p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/Canneles.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Les cannelés</h6>
                                            <p>Petite patisserie Bordelaise à la vanille.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpeg/magret.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le Magret de canard</h6>
                                            <p>Bien que Gersois, le magret reste très consommé dans les Landes et le
                                                Pays Basque.</p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mmt-4" src="./public/jpeg/vin.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le vin de Bordeaux</h6>
                                            <p>Le mythic vin de Bordeaux célèbre dans le monde entier.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                            <h5 class="mt-3">Vous pourrez visiter par exemple:</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/charcuterie.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le Marais Poitevin</h6>
                                                <p>Faites une virée en barque à travers cette jolie rivière appellée
                                                    aussi la Venise verte.</p>
                                            </div>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/axoa.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>La Dune du Pilat</h6>
                                                <p>Magnifique Dune de sable donnant accès à une vue magnifique sur
                                                    l\'Océan. Préparez vos mollets.</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/magret.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le lac d\'Hossegor</h6>
                                                <p>Venez vous balader ou faire des activités sportives autour de ce
                                                    magnifique lac.</p>
                                            </div>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/salade-landaise.jpg"
                                                    alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Les gorges de Kakuetta</h6>
                                                <p>Une bonne dose de nature sauvages en ce lieu, randonnée légère,
                                                    cascades et grotte au programme.</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div id="region_panel_9" class="hidden_item">
                            <div class="row w-100">

                                <div class="row">
                                    <h3 class="text-center mb-4">Hauts-de-France</h3>
                                    <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                        <h5>Vous pourrez déguster par exemple:</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/chevre_image.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le fromage de chèvre</h6>
                                            <p>Fromage emblématique de la région Poitou Charentes.</p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/Canneles.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Les cannelés</h6>
                                            <p>Petite patisserie Bordelaise à la vanille.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpeg/magret.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le Magret de canard</h6>
                                            <p>Bien que Gersois, le magret reste très consommé dans les Landes et le
                                                Pays Basque.</p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpeg/vin.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le vin de Bordeaux</h6>
                                            <p>Le mythic vin de Bordeaux célèbre dans le monde entier.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                            <h5 class="mt-3">Vous pourrez visiter par exemple:</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/charcuterie.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le Marais Poitevin</h6>
                                                <p>Faites une virée en barque à travers cette jolie rivière appellée
                                                    aussi la Venise verte.</p>
                                            </div>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/axoa.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>La Dune du Pilat</h6>
                                                <p>Magnifique Dune de sable donnant accès à une vue magnifique sur
                                                    l\'Océan. Préparez vos mollets.</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/magret.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le lac d\'Hossegor</h6>
                                                <p>Venez vous balader ou faire des activités sportives autour de ce
                                                    magnifique lac.</p>
                                            </div>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/salade-landaise.jpg"
                                                    alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Les gorges de Kakuetta</h6>
                                                <p>Une bonne dose de nature sauvages en ce lieu, randonnée légère,
                                                    cascades et grotte au programme.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="region_panel_10" class="hidden_item">
                            <div class="row w-100">

                                <div class="row">
                                    <h3 class="text-center mb-4">Normandie</h3>
                                    <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                        <h5>Vous pourrez déguster par exemple:</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/chevre_image.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le fromage de chèvre</h6>
                                            <p>Fromage emblématique de la région Poitou Charentes.</p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/Canneles.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Les cannelés</h6>
                                            <p>Petite patisserie Bordelaise à la vanille.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpeg/magret.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le Magret de canard</h6>
                                            <p>Bien que Gersois, le magret reste très consommé dans les Landes et le
                                                Pays Basque.</p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpeg/vin.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le vin de Bordeaux</h6>
                                            <p>Le mythic vin de Bordeaux célèbre dans le monde entier.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                            <h5 class="mt-3">Vous pourrez visiter par exemple:</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/charcuterie.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le Marais Poitevin</h6>
                                                <p>Faites une virée en barque à travers cette jolie rivière appellée
                                                    aussi la Venise verte.</p>
                                            </div>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/axoa.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>La Dune du Pilat</h6>
                                                <p>Magnifique Dune de sable donnant accès à une vue magnifique sur
                                                    l\'Océan. Préparez vos mollets.</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/magret.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le lac d\'Hossegor</h6>
                                                <p>Venez vous balader ou faire des activités sportives autour de ce
                                                    magnifique lac.</p>
                                            </div>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/salade-landaise.jpg"
                                                    alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Les gorges de Kakuetta</h6>
                                                <p>Une bonne dose de nature sauvages en ce lieu, randonnée légère,
                                                    cascades et grotte au programme.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div id="region_panel_11" class="hidden_item">
                            <div class="row w-100">

                                <div class="row">
                                    <h3 class="text-center mb-4">Pays de la Loire</h3>
                                    <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                        <h5>Vous pourrez déguster par exemple:</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/chevre_image.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le fromage de chèvre</h6>
                                            <p>Fromage emblématique de la région Poitou Charentes.</p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/Canneles.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Les cannelés</h6>
                                            <p>Petite patisserie Bordelaise à la vanille.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpeg/magret.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le Magret de canard</h6>
                                            <p>Bien que Gersois, le magret reste très consommé dans les Landes et le
                                                Pays Basque.</p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpeg/vin.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le vin de Bordeaux</h6>
                                            <p>Le mythic vin de Bordeaux célèbre dans le monde entier.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                            <h5 class="mt-3">Vous pourrez visiter par exemple:</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/charcuterie.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le Marais Poitevin</h6>
                                                <p>Faites une virée en barque à travers cette jolie rivière appellée
                                                    aussi la Venise verte.</p>
                                            </div>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/axoa.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>La Dune du Pilat</h6>
                                                <p>Magnifique Dune de sable donnant accès à une vue magnifique sur
                                                    l\'Océan. Préparez vos mollets.</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/magret.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le lac d\'Hossegor</h6>
                                                <p>Venez vous balader ou faire des activités sportives autour de ce
                                                    magnifique lac.</p>
                                            </div>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/salade-landaise.jpg"
                                                    alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Les gorges de Kakuetta</h6>
                                                <p>Une bonne dose de nature sauvages en ce lieu, randonnée légère,
                                                    cascades et grotte au programme.</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="region_panel_12" class="hidden_item">
                            <div class="row w-100">

                                <div class="row">
                                    <h3 class="text-center mb-4">Provence-Alpes-Côte d'Azur</h3>
                                    <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                        <h5>Vous pourrez déguster par exemple:</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/chevre_image.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le fromage de chèvre</h6>
                                            <p>Fromage emblématique de la région Poitou Charentes.</p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/Canneles.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Les cannelés</h6>
                                            <p>Petite patisserie Bordelaise à la vanille.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpeg/magret.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le Magret de canard</h6>
                                            <p>Bien que Gersois, le magret reste très consommé dans les Landes et le
                                                Pays Basque.</p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpeg/vin.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le vin de Bordeaux</h6>
                                            <p>Le mythic vin de Bordeaux célèbre dans le monde entier.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                            <h5 class="mt-3">Vous pourrez visiter par exemple:</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/charcuterie.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le Marais Poitevin</h6>
                                                <p>Faites une virée en barque à travers cette jolie rivière appellée
                                                    aussi la Venise verte.</p>
                                            </div>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/axoa.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>La Dune du Pilat</h6>
                                                <p>Magnifique Dune de sable donnant accès à une vue magnifique sur
                                                    l\'Océan. Préparez vos mollets.</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/magret.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le lac d\'Hossegor</h6>
                                                <p>Venez vous balader ou faire des activités sportives autour de ce
                                                    magnifique lac.</p>
                                            </div>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/salade-landaise.jpg"
                                                    alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Les gorges de Kakuetta</h6>
                                                <p>Une bonne dose de nature sauvages en ce lieu, randonnée légère,
                                                    cascades et grotte au programme.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="region_panel_13" class="hidden_item">
                            <div class="row w-100">

                                <div class="row">
                                    <h3 class="text-center mb-4">Bretagne</h3>
                                    <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                        <h5>Vous pourrez déguster par exemple:</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/chevre_image.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le fromage de chèvre</h6>
                                            <p>Fromage emblématique de la région Poitou Charentes.</p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/Canneles.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Les cannelés</h6>
                                            <p>Petite patisserie Bordelaise à la vanille.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpeg/magret.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le Magret de canard</h6>
                                            <p>Bien que Gersois, le magret reste très consommé dans les Landes et le
                                                Pays Basque.</p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/jpeg/vin.jpg" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Le vin de Bordeaux</h6>
                                            <p>Le mythic vin de Bordeaux célèbre dans le monde entier.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                            <h5 class="mt-3">Vous pourrez visiter par exemple:</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/charcuterie.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le Marais Poitevin</h6>
                                                <p>Faites une virée en barque à travers cette jolie rivière appellée
                                                    aussi la Venise verte.</p>
                                            </div>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/png/Pil" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>La Dune du Pilat</h6>
                                                <p>Magnifique Dune de sable donnant accès à une vue magnifique sur
                                                    l\'Océan. Préparez vos mollets.</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/magret.jpg" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le lac d\'Hossegor</h6>
                                                <p>Venez vous balader ou faire des activités sportives autour de ce
                                                    magnifique lac.</p>
                                            </div>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/jpeg/salade-landaise.jpg"
                                                    alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Les gorges de Kakuetta</h6>
                                                <p>Une bonne dose de nature sauvages en ce lieu, randonnée légère,
                                                    cascades et grotte au programme.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- <div class="row w-100">
                    <div class="col-md-12 col-lg-6 d-flex justify-content-center mt-5">
                        <img class="carte_france" src="./public/svg/Sans titre - 1.svg" alt="">
                    </div>
                    <div class="col-md-12 col-lg-6 mt-5">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                <h5>Vous pourrez déguster :</h5>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                    <img class="region_img" src="./public/png/chevre_image.png" alt="">
                                </div>
                                <div class="col-md-12 col-lg-3">
                                    <h6>Le fromage de chèvre</h6>
                                    <p>Fromage emblématique de la région Poitou Charentes</p>
                                </div>
                                <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                    <img class="region_img" src="./public/png/Canneles.png" alt="">
                                </div>
                                <div class="col-md-12 col-lg-3">
                                    <h6>Les cannelés</h6>
                                    <p>Petite patisserie Bordelaise à la vanille</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                    <img class="region_img" src="./public/jpeg/broye.jpg" alt="">
                                </div>
                                <div class="col-md-12 col-lg-3">
                                    <h6>Le Broyé du Poitou</h6>
                                    <p>Gâteau Poitevin resemblant à un gros biscuit (dur mais pas sec)</p>
                                </div>
                                <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                    <img class="region_img" src="./public/jpeg/vin.jpg" alt="">
                                </div>
                                <div class="col-md-12 col-lg-3">
                                    <h6>Le vin de Bordeaux</h6>
                                    <p>Le mythic vin de Bordeaux célèbre dans le monde entier</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                    <img class="region_img" src="./public/jpeg/charcuterie.jpg" alt="">
                                </div>
                                <div class="col-md-12 col-lg-3">
                                    <h6>La charcuterie du Sud Ouest</h6>
                                    <p>Jambon de Bayonne, pâté au piment d'Espelette, foie gras... hmmmm !</p>
                                </div>
                                <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                    <img class="region_img" src="./public/jpeg/axoa.jpg" alt="">
                                </div>
                                <div class="col-md-12 col-lg-3">
                                    <h6>L'Axoa de veau (prononcé achoa)</h6>
                                    <p>Ragoût de veau au poivron et piment d'Espelette</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                    <img class="region_img" src="./public/jpeg/magret.jpg" alt="">
                                </div>
                                <div class="col-md-12 col-lg-3">
                                    <h6>Le Magret de canard</h6>
                                    <p>Bien que Gersois, le magret reste très consommé dans les Landes et Pays Basque</p>
                                </div>
                                <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                    <img class="region_img" src="./public/jpeg/salade-landaise.jpg" alt="">
                                </div>
                                <div class="col-md-12 col-lg-3">
                                    <h6>La salade Landaise</h6>
                                    <p>Un peu de fraicheur avec cette succulente salade aux gésiers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
        </div>
    </section>

    <!-- Recherche par régions fin -->

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
                    <figure class="shadow"><img src="./public/jpeg/Bretagne.jpg" />
                        <p>Dégustez la Bretagne</p>
                    </figure>
                    <figure class="shadow"><img src="./public/svg/Provence.svg" />
                        <p>Goûtez la Provence</p>
                    </figure>
                    <figure class="shadow"><img src="./public/svg/Reunion.svg" />
                        <p>Savourez la Réunion</p>
                    </figure>
                    <figure class="shadow"><img src="./public/svg/Pays_basque.svg" />
                        <p>Croquez le Pays-Basque</p>
                    </figure>
                    <figure class="shadow"><img src="./public/jpeg/Corse.jpg" />
                        <p>Dévorez la Corse</p>
                    </figure>
                    <figure class="shadow"><img src="./public/jpeg/Alsace.jpg" />
                        <p>Régalez-vous de l'Alsace</p>
                    </figure>
                    <figure class="shadow guadeloupe"><img src="./public/jpeg/Guadeloupe.jpg" />
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
                            <img class="card-img-top mx-auto" src="./public/svg/Ecoresponsable.svg"
                                alt="Card image cap">
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
                            <img class="card-img-top mx-auto" src="./public/svg/Meilleures-notes.svg"
                                alt="Card image cap">
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