<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    // echo ("pseudo: " . $_SESSION['pseudo']);
    // echo ("<br>");
    // echo ("mot de passe: " . $_SESSION['mot_de_passe']);
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

    // header("Location: /Project-trip");
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


    <section class="advanced_search py-4">
        <h1>Et si le voyage de votre vie était aussi délicieux <br> qu'un plat régional ?</h1>

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
                <button type="submit"> <img src="./public/svg/Picto-rechercher.svg" alt=""> Trouvez</button><br>
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
                    <div class="col-lg-6">
                        <!-- <svg version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 640 480"> -->
                        <svg version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" width="600" height="600" viewBox="0 0 300 300"
                            class="mx-auto">
                            <g id="paris">
                                <g id="arrondissements">
                                    <a href="javascript:display_panel('region_name_1','region_panel_1');">
                                        <path id="region_name_1" fill="#ffffff" stroke="#0FABDF"
                                            d="M275.2,70.9L270.9,69.4L263.6,69.1L259.4,65.4L256.3,67.5L252.8,66.9L251.5,67.5L250.4,65.5L248.9,64.8L247.5,65.6L247.4,67.1L246,66.7L242,62.2L241.1,59.2L239.6,58.2L234.1,56.9L231.9,58.7L230.5,58.7L227.8,57.5L226.1,56.1L222.7,56.1L222.1,57.5L219.3,57.8L217.5,54.2L216,54.4L216,52.8L213,52L209.6,49.1L206.6,49.1L207.1,45.9L205.7,43.1L205.7,41L207,38.4L205.6,37.7L203.6,39.8L202.7,43.1L198.4,45L195.7,44.1L194.3,44.4L194.7,47.3L194,49L194.7,50.6L192.2,54.2L190.8,54.3L190.9,61.4L190.5,62.9L187.8,61.9L183.8,63.9L183.2,65.3L184.8,69.3L182.1,70.4L182.9,71.6L182.4,73L183.7,73.6L179.9,78.7L179.6,79.7L178.4,80.8L180.1,85L181.4,85.8L179.9,88.3L178.4,88.7L178.6,93L180.5,93.7L182.7,96.5L183.9,100.6L184.9,99.5L186.7,101.6L189.2,107L195.5,106.2L197,106.9L198.1,105.9L201.2,105.5L203.5,103.5L205.4,103.8L207.2,104.1L207.5,105.5L208.8,106L208.6,107.4L210.1,107.6L210.9,108.7L211.5,110.2L210.1,111.4L211.2,113.8L215.8,114.8L217.3,115.6L217.3,117L219.7,116.1L220.3,114.8L223.6,112.9L224.7,113.8L226.2,113.3L226.4,109.1L227.4,107.9L228.9,108.1L230,106.5L229.9,105.8L233.9,102.9L237.4,105L240.3,104.2L242.7,106L245.3,104.9L249.5,108.2L250,107.9L253.8,110.4L254,114.9L255.4,114.8L256.4,117.4L254.5,117.6L254.5,117.7L256.3,117.4L257.7,117.8L257.3,119.2L261.1,119.3L262.4,118.8L262.7,117.2L264.2,117.2L264.3,115.6L265.4,114.6L263.9,110.7L265.3,103L264.3,97.9L267.3,90.9L268,83.1L273.3,76.2L275.2,70.9z" />
                                        <!-- <text transform="matrix(1 0 0 1 557.5 228)" >20</text> -->
                                    </a>
                                    <a href="javascript:display_panel('region_name_2','region_panel_2');">
                                        <path id="region_name_2" fill="#ffffff" stroke="#0FABDF"
                                            d="M 79.4,172.2 L 80,174.4 L 83.9,176.8 L 89.1,182.4 L 90.2,186.1 L 90.2,186.2 L 90.5,187.6 L 89.4,189.2 L 88.1,185.3 L 82.8,180.1 L 82.3,178.7 L 80.9,181.5 L 77.8,206.6 L 79.8,202.7 L 82,205.3 L 82.1,206.7 L 78.9,206.3 L 77.3,209.7 L 77.3,212.1 L 71.9,237.1 L 69.9,240.6 L 67.6,243.8 L 64.5,246.1 L 67.4,247.5 L 67.6,249 L 68.8,248 L 72,248.6 L 72.8,250.1 L 71.8,253 L 70.5,254.2 L 71.1,255.6 L 73.1,256.1 L 73.3,254.3 L 74.8,253.8 L 74.9,255.5 L 77.9,257.1 L 82.7,258.9 L 85.8,258.8 L 87.1,261.1 L 91,264.4 L 92.2,263.5 L 93.4,264.2 L 96.3,262.7 L 96.4,262.7 L 97,258.4 L 97.8,257 L 99.5,256.6 L 99.3,255.1 L 103.3,250.5 L 102.9,248.9 L 104.2,248.2 L 104,244.6 L 102.6,244.6 L 103.3,243.2 L 102.1,240.3 L 102,240.3 L 98.7,240.2 L 98,238.8 L 100.1,233.3 L 99.8,230.1 L 104.5,228.7 L 104.8,230.2 L 106.1,229.6 L 106.2,228.1 L 106.2,228.1 L 108.1,228.5 L 108.8,227.2 L 113,227.5 L 115.5,226.1 L 119.8,226.6 L 121.1,226 L 122.9,223.6 L 124.3,223.7 L 123.6,222.3 L 125.8,219.6 L 124.6,218.9 L 124.6,217.4 L 128.3,216.4 L 127.1,211.9 L 128.8,210.3 L 131.1,207.1 L 134.1,205.4 L 133.8,203.6 L 136.1,202 L 137.1,196.8 L 141.1,196.4 L 144.5,199.5 L 147.1,198.1 L 150.5,198.2 L 152.2,197.3 L 151.4,195.6 L 153,195 L 153.1,193.3 L 154.3,192.3 L 153.3,191.2 L 157.1,186.5 L 157.5,184.7 L 160.6,185.7 L 159.6,178.8 L 160.5,177.6 L 159.9,174.8 L 157.6,172 L 162.3,167.7 L 161.2,164.4 L 161.4,162.3 L 159.6,158.2 C 158.4,157.3 157.2,156.5 155.9,155.7 L 155.4,153.8 L 152.9,153.7 L 151.5,154.1 L 144.9,152.7 L 144,154 L 138.3,154.5 L 136.8,156 L 136,154.7 L 133.1,155.3 L 131.8,154.7 L 132.6,153.3 L 131.3,152.7 L 130,150 L 128.6,150 L 126.2,147.8 L 126.6,144.9 L 122,138.4 L 121.9,136.8 L 119.2,135.3 L 120,136.8 L 115,137 L 113.6,136.3 L 112.9,133.2 L 111.4,133.4 L 111.3,131.8 L 108.6,130.2 L 105.2,133.1 L 104.1,132 L 99.3,132.1 L 96.5,132.5 L 94.6,134.9 L 88.5,135.3 L 89.6,138.1 L 91.7,140.2 L 94.1,149.2 L 94,152.8 L 95.2,153.8 L 90.7,156.1 L 89.5,155.2 L 86.3,155.3 L 87,153.9 L 82.6,155.6 L 80.3,160.4 L 81.7,160.8 L 83.8,164.8 L 82.4,165.1 L 83.2,167.7 L 81.7,170.7 L 79.4,172.2 z M 101.9,249 L 102,250.4 L 100.8,249.6 L 101.9,249 z M 74.2,157.2 L 74.2,157.1 L 74.7,158.3 L 75.3,158.2 L 77.6,160.2 L 79,159.5 L 76.3,157.8 L 76.3,157.8 L 74.2,157.2 z M 79.9,165.8 L 77.3,164.2 L 76.4,165.5 L 79.7,171.1 L 80.3,169.5 L 79.9,165.8 z" />
                                        <!-- <text transform="matrix(1 0 0 1 494.5 102)" >19</text> -->
                                    </a>
                                    <a href="javascript:display_panel('region_name_3','region_panel_3');">
                                        <path id="region_name_3" fill="#ffffff" stroke="#0FABDF"
                                            d="M 166.8,144 L 162.6,145.5 L 161.5,146.4 L 162.3,149.1 L 161.5,150.3 L 157.1,150.8 L 155.3,153.7 L 155.4,153.8 L 155.9,155.7 C 157.2,156.5 158.4,157.3 159.6,158.2 L 161.4,162.3 L 161.2,164.4 L 162.3,167.7 L 157.6,172 L 159.9,174.8 L 160.5,177.6 L 159.6,178.8 L 160.6,185.7 L 157.5,184.7 L 157.1,186.5 L 153.3,191.2 L 154.3,192.3 L 153.1,193.3 L 153,195 L 151.4,195.6 L 152.2,197.3 L 150.5,198.2 L 151,200.9 L 152.9,203.9 L 152,206.8 L 153.7,209.3 L 156.3,207.7 L 159.4,208.5 L 161.3,206.1 L 162.8,201.5 L 165.2,199.4 L 167.8,201.4 L 168.4,203.5 L 169.6,204.3 L 169.4,205.8 L 170.7,208.4 L 174.1,200.4 L 175,201.6 L 178.9,198.2 L 180,199.1 L 180.8,201.9 L 184,202.5 L 184.1,201.1 L 185.5,201.2 L 190,205.1 L 191,209.6 L 194.5,216.7 L 198.4,219.2 L 201.9,217 L 202,218.6 L 203.3,217.5 L 204.6,217.5 L 207.7,219.2 L 207.6,217.4 L 210.5,217.7 L 212.3,219.8 L 216.6,217.9 L 217.8,218.6 L 219.1,217.5 L 219.3,220.4 L 224,220.8 L 224.1,222.2 L 226.7,223.4 L 228.8,221 L 230,220.9 L 230.5,220.8 L 230.6,218.5 L 225.6,215.6 L 224.8,214.3 L 226.4,211.8 L 228.5,212.5 L 229.8,211.2 L 228.3,210.1 L 229.5,206.7 L 232.4,206.5 L 232.6,204.9 L 233,203.3 L 235.8,202.7 L 236.2,201.3 L 242.5,199.4 L 244.1,199.9 L 244.3,197 L 242.1,195.5 L 241.2,193.4 L 242,191.5 L 245.9,193.2 L 246.9,192.2 L 249.9,191.6 L 249.9,191.6 L 259.6,187.5 L 260.6,185.6 L 259.9,184.3 L 261.4,181.7 L 257.7,179.2 L 256.6,176.4 L 256.9,174.9 L 254.2,173.7 L 252.7,172.4 L 252.5,170.9 L 252.5,170.8 L 252.6,170.7 L 256.7,166.7 L 257.2,165.2 L 255.5,162.9 L 251.6,159.2 L 252.8,156.1 L 250.9,153.4 L 251.1,152 L 249.5,151.7 L 245.2,151.9 L 242.7,154 L 241,153.3 L 239.6,156.2 L 240.8,157.7 L 237.3,160.4 L 233.8,160.9 L 234.1,158.3 L 236.9,156.6 L 237.5,153.1 L 235.8,152.1 L 233.4,155.4 L 230.7,157 L 228.7,157.1 L 228.5,155.7 L 226.9,154.9 L 224.9,157.1 L 223.4,157.2 L 223.4,155.7 L 221.9,155.7 L 219.8,151.8 L 217.3,150.2 L 214.6,150.8 L 211.7,150 L 208.8,160.5 L 205.9,156.7 L 205.1,157.8 L 203.9,157 L 202.7,157.8 L 201.7,157 L 200.5,157.9 L 200.3,159.4 L 197.5,161.3 L 196.4,160.3 L 192.4,161 L 189.9,159.4 L 189.9,157.9 L 191.7,155.6 L 192,152.8 L 191.1,151.7 L 187.2,150.2 L 183.9,143.4 L 180.9,146.4 L 178.7,144.6 L 177.3,145.4 L 174.1,145.3 L 171.2,142.2 L 169.2,142.2 L 166.8,144 z M 216.9,215.5 L 215.7,217.2 L 213.7,217.8 L 212.7,216.7 L 213.3,215.2 L 214.6,214.1 L 216.9,215.5 z" />
                                        <!-- <text transform="matrix(1 0 0 1 354.5 66)" >18</text> -->
                                    </a>
                                    <a href="javascript:display_panel('region_name_4','region_panel_4');">
                                        <path id="region_name_4" fill="#ffffff" stroke="#0FABDF"
                                            d="M170.9,94.5L170.8,97.4L168.9,100.1L172.2,103.8L172.4,106.7L170.1,109.2L170.7,110.6L169.9,111.8L167.2,113.5L168.7,114.9L169.9,118.3L168.4,118.7L167.7,119.9L168.7,123.1L167.8,126L169.2,127.1L170.8,130.9L170.9,133.8L172,134.8L171.2,142.2L174.1,145.3L177.3,145.4L178.7,144.6L180.9,146.4L183.9,143.4L187.2,150.2L191.1,151.7L192,152.8L191.7,155.6L189.9,157.9L189.9,159.4L192.4,161L196.4,160.3L197.5,161.3L200.3,159.4L200.5,157.9L201.7,157L202.7,157.8L203.9,157L205.1,157.8L205.9,156.7L208.8,160.5L211.7,150L214.6,150.8L217.3,150.2L219.8,151.8L221.9,155.7L223.4,155.7L223.4,157.2L224.9,157.1L226.9,154.9L228.5,155.7L228.7,157.1L230.7,157L233.4,155.4L235.8,152.1L235.7,152L237.5,146L243.3,140.6L242.9,135.8L247.2,132.8L253.1,125.6L253,124.1L254.1,123.1L252,121.3L252.4,119.8L252.5,119.7L254.3,117.7L254.5,117.7L254.5,117.6L256.4,117.4L255.4,114.8L254,114.9L253.8,110.4L250,107.9L249.5,108.2L245.3,104.9L242.7,106L240.3,104.2L237.4,105L233.9,102.9L229.9,105.8L230,106.5L228.9,108.1L227.4,107.9L226.4,109.1L226.2,113.3L224.7,113.8L223.6,112.9L220.3,114.8L219.7,116.1L217.3,117L217.3,115.6L215.8,114.8L211.2,113.8L210.1,111.4L211.5,110.2L210.9,108.7L210.1,107.6L208.6,107.4L208.8,106L207.5,105.5L207.2,104.1L205.4,103.8L203.5,103.5L201.2,105.5L198.1,105.9L197,106.9L195.5,106.2L189.2,107L186.7,101.6L184.9,99.5L183.9,100.6L182.7,96.5L180.5,93.7L178.6,93L170.9,94.5z" />
                                        <!-- <text transform="matrix(1 0 0 1 202.5 100)" >17</text> -->
                                    </a>
                                    <a href="javascript:display_panel('region_name_5','region_panel_5');">
                                        <path id="region_name_5" fill="#ffffff" stroke="#0FABDF"
                                            d="M172.4,106.7L172.2,103.8L168.9,100.1L163.3,101.4L158.7,101.1L160,100.3L160.3,98.9L158.2,96.8L157.9,95.3L156,95L154.6,95.9L153.9,94.5L152.9,95.9L149.5,96.3L149.4,96.3L148,91L146.5,91.4L145.3,90.3L144.7,87.5L141.7,84.8L141.4,79.3L139.6,76L136.6,79.5L136.7,80.9L133.7,81.5L132.3,80.7L129.6,82.3L126.7,82.9L125.5,84.2L125.5,85.8L127.9,88L127.8,90.2L128.1,92.5L124.3,95.1L124.8,98.8L124.9,98.8L125.9,100.7L125.7,101.6L125.7,101.7L124.7,102.7L125.6,103.8L125.7,106.6L122.6,111.9L121,112.4L120.7,114.2L116.9,116.4L115.5,116.3L115.7,117.9L112.7,116.6L112.3,117.8L111.4,122.5L108.6,130.1L108.6,130.2L111.3,131.8L111.4,133.4L112.9,133.2L113.6,136.3L115,137L120,136.8L119.2,135.3L121.9,136.8L122,138.4L126.6,144.9L126.2,147.8L128.6,150L130,150L131.3,152.7L132.6,153.3L131.8,154.7L133.1,155.3L136,154.7L136.8,156L138.3,154.5L144,154L144.9,152.7L151.5,154.1L152.9,153.7L155.4,153.8L155.3,153.7L157.1,150.8L161.5,150.3L162.3,149.1L161.5,146.4L162.6,145.5L166.8,144L169.2,142.2L171.2,142.2L172,134.8L170.9,133.8L170.8,130.9L169.2,127.1L167.8,126L168.7,123.1L167.7,119.9L168.4,118.7L169.9,118.3L168.7,114.9L167.2,113.5L169.9,111.8L170.7,110.6L170.1,109.2L172.4,106.7z" />
                                        <!-- <text transform="matrix(1 0 0 1 79.5 249.5)" >16</text> -->
                                    </a>
                                    <a href="javascript:display_panel('region_name_6','region_panel_6');">
                                        <path id="region_name_6" fill="#ffffff" stroke="#0FABDF"
                                            d="M280.3,246.2L279.4,241.7L277.9,241.1L276.8,242.1L277,250.8L272.7,250.2L270.9,252.6L265.6,254.7L265.2,256.2L263.8,256.3L262.7,257.7L262.8,259.4L260.9,261.9L260.6,263.4L261.9,262.9L263.8,265L261.2,266.9L261.7,269.6L265.6,271.8L264.4,272.6L262.9,276.8L266.4,275.5L266.9,278.4L265.6,281.9L270.4,282.9L267.9,284.6L267.8,286L270.2,288.2L275.8,289.9L276.4,291.3L277.9,291.9L280.9,284.6L279.2,284.4L280.5,283.4L281.6,280.7L281.2,273.3L283.9,267.4L282,254.3L279.9,251.5L280.3,246.2z" />
                                        <!-- <text transform="matrix(1 0 0 1 159.5 340)" >15</text> -->
                                    </a>
                                    <a href="javascript:display_panel('region_name_7','region_panel_7');">
                                        <path id="region_name_7" fill="#ffffff" stroke="#0FABDF"
                                            d="M141.1,196.4L137.1,196.8L136.1,202L133.8,203.6L134.1,205.4L131.1,207.1L128.8,210.3L127.1,211.9L128.3,216.4L124.6,217.4L124.6,218.9L125.8,219.6L123.6,222.3L124.3,223.7L122.9,223.6L121.1,226L119.8,226.6L115.5,226.1L113,227.5L108.8,227.2L108.1,228.5L106.2,228.1L106.2,228.1L106.1,229.6L104.8,230.2L104.5,228.7L99.8,230.1L100.1,233.3L98,238.8L98.7,240.2L102,240.3L102.1,240.3L103.3,243.2L102.6,244.6L104,244.6L104.2,248.2L102.9,248.9L103.3,250.5L99.3,255.1L99.5,256.6L97.8,257L97,258.4L96.4,262.7L102,267.7L108.1,266.9L109.3,267.9L117.4,268L118.5,266.9L118.4,263.6L119.6,263L127.9,265.4L130.3,267.6L133.5,267.4L136.3,271.2L136.9,269.7L138.6,269.6L143.8,272.2L142.9,274.6L147.3,275.9L148.5,278.7L150.1,278.8L152.3,276.8L153.9,276.8L158.6,277.8L160.9,279.6L164,279.4L164,277.9L168.1,275.8L171.2,275.2L175.5,276.4L172.6,272.8L172.7,259.1L175.5,253.7L176.8,252.4L176.8,252.4L179.5,250.4L182.9,250.4L186.2,246.7L191.7,242.7L195.9,241.6L197.4,244L198.9,244.4L199,244.4L200.9,241.4L203.8,240.5L203.3,239.2L205.4,236.8L207,237.2L208,232L212.2,227.4L209,224.2L209,221.4L207.7,219.2L204.6,217.5L203.3,217.5L202,218.6L201.9,217L198.4,219.2L194.5,216.7L191,209.6L190,205.1L185.5,201.2L184.1,201.1L184,202.5L180.8,201.9L180,199.1L178.9,198.2L175,201.6L174.1,200.4L170.7,208.4L169.4,205.8L169.6,204.3L168.4,203.5L167.8,201.4L165.2,199.4L162.8,201.5L161.3,206.1L159.4,208.5L156.3,207.7L153.7,209.3L152,206.8L152.9,203.9L151,200.9L150.5,198.2L147.1,198.1L144.5,199.5L141.1,196.4zM102,250.4l-0.1-1.4l-1.1,0.6L102,250.4z" />
                                        <!-- <text transform="matrix(1 0 0 1 280.5 395)" >14</text> -->
                                    </a>
                                    <a href="javascript:display_panel('region_name_8','region_panel_8');">
                                        <path id="region_name_8" fill="#ffffff" stroke="#0FABDF"
                                            d="M173.3,73.6L173.6,72.2L172.7,71L171.4,70.6L167.3,72.1L166.1,71.3L165.1,72.4L161.6,71.9L156.2,68.7L155.1,69.5L150.5,68.4L147.3,69.3L144.5,68.7L143.7,67.1L141.8,71.9L139.8,71.8L138.7,73.1L139.6,76L141.4,79.3L141.7,84.8L144.7,87.5L145.3,90.3L146.5,91.4L148,91L149.4,96.3L149.5,96.3L152.9,95.9L153.9,94.5L154.6,95.9L156,95L157.9,95.3L158.2,96.8L160.3,98.9L160,100.3L158.7,101.1L163.3,101.4L168.9,100.1L170.8,97.4L170.9,94.5L178.6,93L178.4,88.7L179.9,88.3L181.4,85.8L180.1,85L178.4,80.8L179.6,79.7L179.9,78.7L175.2,75.7L173.3,73.6z" />
                                        <!-- <text transform="matrix(1 0 0 1 414.5 403)" >13</text> -->
                                    </a>
                                    <a href="javascript:display_panel('region_name_9','region_panel_9');">
                                        <path id="region_name_9" fill="#ffffff" stroke="#0FABDF"
                                            d="M174.2,23.3L174.5,21.8L172.5,19.6L169.6,19.9L166.8,21.8L165.3,21.1L163.9,18.6L162.2,18.6L161.6,17.2L162.1,14.3L160.9,11.3L159.5,10.5L151.2,12.6L144.5,14.7L141.6,17.1L141.6,26.1L143,27.9L141.6,27.1L141.3,30L141.5,31.9L142.7,32.7L140.8,33.4L140.6,34.9L142.2,37.7L140.8,36.9L137.5,41.4L143.8,46.7L145.5,50.9L144,53.3L144.7,57.6L144,61.6L145.7,65.8L143.7,67.1L144.5,68.7L147.3,69.3L150.5,68.4L155.1,69.5L156.2,68.7L161.6,71.9L165.1,72.4L166.1,71.3L167.3,72.1L171.4,70.6L172.7,71L173.6,72.2L173.3,73.6L175.2,75.7L179.9,78.7L183.7,73.6L182.4,73L182.9,71.6L182.1,70.4L184.8,69.3L183.2,65.3L183.8,63.9L187.8,61.9L190.5,62.9L190.9,61.4L190.8,54.3L192.2,54.2L194.7,50.6L194,49L194.7,47.3L194.3,44.4L194.1,44.4L192.3,43.8L193.9,40.7L192.4,38.1L193.4,34.8L192,35.1L190,32.7L187,33.2L184.2,32.6L183.1,33.6L182.1,29.1L179.3,28.4L178.8,27.1L177.3,28.1L175.8,27.6L174.2,23.3z" />
                                        <!-- <text transform="matrix(1 0 0 1 519.5 340)" >12</text> -->
                                    </a>
                                    <a href="javascript:display_panel('region_name_10','region_panel_10');">
                                        <path id="region_name_10" fill="#ffffff" stroke="#0FABDF"
                                            d="M137.5,41.4L137.4,41.5L132,45.3L120.9,48L113.8,51.9L110.9,58.2L111.8,59.3L116.2,60.3L116.3,60.3L115.5,60.6L115.4,60.6L112,61.4L109.6,63.5L104.8,64.9L100.5,63.1L94.3,62.4L89.5,60.8L86.9,61.9L83.7,56.7L84.9,52.7L84.4,51.4L81.1,51L79.9,51.9L76.6,52.1L70.9,49.8L70.8,51.2L72.5,52.1L72.7,54.6L71.8,55.6L73,60.7L77.3,65.3L76.6,70.3L77.6,71.7L77.4,74.7L76.2,77.5L78.3,82.2L79.6,82.9L80.9,82.1L80.4,83.6L76.8,83.9L79.2,88.7L80.5,89.2L84.1,86.8L86.8,88L91.1,88.4L92.8,90.2L94,89.4L95.2,90.3L98.6,88.6L103.2,88.6L103.5,87.3L104.9,87.4L105.8,90.4L107.5,91.2L107.5,92.7L109,92.7L114.5,89.8L115.8,90.5L116.6,94.7L120.3,97.2L121.7,96.7L123.3,98.5L124.9,98.8L124.8,98.8L124.3,95.1L128.1,92.5L127.8,90.2L127.9,88L125.5,85.8L125.5,84.2L126.7,82.9L129.6,82.3L132.3,80.7L133.7,81.5L136.7,80.9L136.6,79.5L139.6,76L138.7,73.1L139.8,71.8L141.8,71.9L143.7,67.1L145.7,65.8L144,61.6L144.7,57.6L144,53.3L145.5,50.9L143.8,46.7L137.5,41.4z" />
                                        <!-- <text transform="matrix(1 0 0 1 466.5 241)" >11</text> -->
                                    </a>
                                    <a href="javascript:display_panel('region_name_11','region_panel_11');">
                                        <path id="region_name_11" fill="#ffffff" stroke="#0FABDF"
                                            d="M86.8,94L86,95.2L86.9,103.9L84.2,105L82.4,109.3L82.2,110.4L78.8,108.6L74.3,110.5L73.5,112L66.9,112.2L64.3,113.9L64.1,116.9L56.4,119.1L54.2,121.3L55.4,124.4L58.4,124.9L59.4,125.9L61.9,124.1L65.5,123.8L62.1,125L61.8,128.4L60.3,129L63.3,130.1L65.7,132.6L61.8,136.7L62,138.9L67.2,145L68.2,148.6L72.3,151.9L74.7,152.5L75.5,154.2L78.4,154.8L80.8,156.7L81.1,155.3L82.6,155.6L87,153.9L86.3,155.3L89.5,155.2L90.7,156.1L95.2,153.8L94,152.8L94.1,149.2L91.7,140.2L89.6,138.1L88.5,135.3L94.6,134.9L96.5,132.5L99.3,132.1L104.1,132L105.2,133.1L108.6,130.2L108.6,130.1L111.4,122.5L112.3,117.8L112.7,116.6L115.7,117.9L115.5,116.3L116.9,116.4L120.7,114.2L121,112.4L122.6,111.9L125.7,106.6L125.6,103.8L124.7,102.7L125.7,101.7L125.7,101.6L125.9,100.7L124.9,98.8L123.3,98.5L121.7,96.7L120.3,97.2L116.6,94.7L115.8,90.5L114.5,89.8L109,92.7L107.5,92.7L107.5,91.2L105.8,90.4L104.9,87.4L103.5,87.3L103.2,88.6L98.6,88.6L95.2,90.3L94,89.4L92.8,90.2L91.1,88.4L86.8,88L86.8,94z" />
                                        <!-- <text transform="matrix(1 0 0 1 401.5 156)" >10</text> -->
                                    </a>
                                    <a href="javascript:display_panel('region_name_12','region_panel_12');">
                                        <path id="region_name_12" fill="#ffffff" stroke="#0FABDF"
                                            d="M242,191.5L241.2,193.4L242.1,195.5L244.3,197L244.1,199.9L242.5,199.4L236.2,201.3L235.8,202.7L233,203.3L232.6,204.9L232.4,206.5L229.5,206.7L228.3,210.1L229.8,211.2L228.5,212.5L226.4,211.8L224.8,214.3L225.6,215.6L230.6,218.5L230.5,220.8L230,220.9L228.8,221L226.7,223.4L224.1,222.2L224,220.8L219.3,220.4L219.1,217.5L217.8,218.6L216.6,217.9L212.3,219.8L210.5,217.7L207.6,217.4L207.7,219.2L209,221.4L209,224.2L212.2,227.4L208,232L207,237.2L205.4,236.8L203.3,239.2L203.8,240.5L200.9,241.4L199,244.4L206.1,244.6L207.1,245.8L206.9,247.2L208.7,247.6L213.6,247.1L212.5,245.9L213.1,244.7L214.5,244.8L216.8,247.5L223.4,246.8L225.3,251.2L230.2,252.4L231.6,252L234.7,253.8L234.6,255.2L239,253.9L242,254.7L242.6,256.1L243.6,253.4L247.3,254L247.3,252.6L250.1,251.9L251.5,250.7L253.4,250.9L254.5,248.2L252.7,247.3L255.8,243.3L258.5,242.9L260.7,239.1L263.5,237.7L264.1,235.7L271.3,231.7L271.5,228.1L274.6,223.8L275.7,221.6L273.7,219L267.7,221.1L263.1,218.7L259.9,218L256.8,214.3L257.8,211.8L255.8,209.1L256.9,208.2L257.6,205.2L257.6,205.2L257.7,205.1L258.6,204L260.4,204.1L258.5,199.4L255.5,199.2L252.9,197.6L252.5,194.3L251.1,194.2L249.9,191.6L246.9,192.2L245.9,193.2L242,191.5zM218.4,241.8L219.5,243.8L221.1,243.1L220,245L218.4,245.6L216.1,243.4L216.4,241.8L218.4,241.8zM215.7,217.2l1.2-1.7l-2.3-1.4l-1.3,1.1l-0.6,1.5l1,1.1L215.7,217.2z" />
                                        <!-- <text transform="matrix(1 0 0 1 328.5 149)" >9</text> -->
                                    </a>
                                    <a href="javascript:display_panel('region_name_13','region_panel_13');">
                                        <path id="region_name_13" fill="#ffffff" stroke="#0FABDF"
                                            d="M86,95.2L86.8,94L86.8,88L84.1,86.8L80.5,89.2L79.2,88.7L76.8,83.9L71,84L71.2,81.1L69.5,81.5L67.6,83.4L68.7,86.1L67.7,85.3L66.9,83.1L65.4,83.1L65.4,84L63.4,84.2L62.9,82.6L61.3,83.3L60.8,82L59,82.2L53.7,86.6L53.2,84.8L51.2,83.5L51.2,81.9L48.9,78L47.4,77.7L47.7,76.3L46.2,76.5L45.4,78L46.1,74.7L43.7,76.3L43.4,74.5L39,76.3L38.3,75.1L36,76.9L35.9,80L34.3,80.2L34.2,80.2L31.8,78.8L30.4,79.1L30.1,80.8L29,79.4L28.2,81L28.1,77.8L20.9,79.9L20.2,78.6L15.1,81.4L16.4,82L12.2,81.6L11.2,82.8L10.5,87.3L11.4,88.5L12.8,87.9L14.1,88.5L20.2,86.7L18.4,87.5L18.1,89.2L21.1,88.5L20.9,90L22.3,90.6L20.8,90.9L23.9,92.2L20.9,91.5L20.3,90.3L18.4,90.8L15.5,90.2L14.6,89L13.9,90.9L15.1,93.5L16,92.1L17.4,92.2L20.1,93.8L20.5,95.4L19.7,96.6L18.4,96L12.2,96.6L11.4,97.8L16.2,99.6L18,102.7L17.5,105.5L21.2,105.8L23,103.7L23,103.5L23,103.5L22.6,102.1L23.1,102L23.3,100.4L24,101.9L23.1,102L23,103.5L24.5,104.5L26.8,103.7L29.1,106.6L30.5,106.3L30.5,104.9L30.7,106.3L32,105.9L31.7,107.3L33.1,107.6L35,106.8L35.1,105.3L35.5,109.2L36.8,109.9L38.1,109.3L37.9,106.3L38.1,107.8L39.7,108.1L38.6,109.2L39.3,110.5L41.2,111.3L42.5,110.7L41.3,111.3L41.4,112.7L42.5,114.1L42.1,116L43.2,117.1L42.6,115.7L43.9,114.5L45.5,114.1L46.7,115L46.1,112.1L47.7,114.5L48.4,113.3L50.3,113.6L51.3,114.8L50.3,116L47.2,115.6L49.6,117.5L55.8,117L57.1,117.8L55.6,117.8L56.4,119.1L64.1,116.9L64.3,113.9L66.9,112.2L73.5,112L74.3,110.5L78.8,108.6L82.2,110.4L82.4,109.3L84.2,105L86.9,103.9L86,95.2zM41.5,122.9L43.4,122.3L40.9,120.6L39.5,120.8L39.9,122.5L41.5,122.9z" />
                                        <!-- <text transform="matrix(1 0 0 1 232.5 172)" >8</text> -->
                                    </a>
                        </svg>
                    </div>
                    <div class="col-lg-6">
                        <!-- <div id="details_map" class="show_item">
                            <div class="row">
                                <div class="d-flex justify-content-center align-items-center">
                                    <h6>Cliquez sur une région pour avoir le détail</h6>
                                </div>
                            </div>
                        </div> -->
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
                                            <p>Tout le monde connaît ce plat emblématique du pays Savoyard, mais rien ne
                                                vaut de le déguster chez lui avec vue sur les Montagnes. Parfait en
                                                hiver.</p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/Truffade.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>La Truffade</h6>
                                            <p>La concurrente Auvergnate de la Tartiflette car les recettes se resemble
                                                mais la préparation est la cuisson est différente. À "taster" !</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/Nantua.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>Les quenelles sauce Nantua</h6>
                                            <p>Recette de quenelle Lyonnaise arrosée d'une sauce onctueuse à la bisque
                                                de homard.</p>
                                        </div>
                                        <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                            <img class="region_img mt-4" src="./public/png/Creme-marrons.png" alt="">
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <h6>La crème de marrons</h6>
                                            <p>Dégustez cette délicieuse pâte de chataîgnes glacées venant d'Ardèche. En
                                                gâteau, sur des tartines ou même à la cuillère, cette friandise vous
                                                fera fondre.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                            <h5 class="mt-3">Vous pourrez visiter par exemple:</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/png/Aiguille-midi.png"
                                                    alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>L'Aiguille du Midi</h6>
                                                <p>Si vous aimez la randonnée en montagne ce lieu est fait pour vous.
                                                    Vous y trouverez un spectacle à couper le souffle.</p>
                                            </div>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/png/Lac-leman.png" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le lac Léman</h6>
                                                <p>Visitez le plus grand lac de France (et d'Europe). Il traverse
                                                    également la Suisse. Vous pourrez vous promener, vous baigner et
                                                    même naviguer.</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4"
                                                    src="./public/png/Palais-facteur-cheval.png" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le palais du Facteur Cheval</h6>
                                                <p>Un facteur, M.Cheval, ramassait durant ses tournée des pierres afin
                                                    de construire de ses mains un palais à l'architecture étonnante.</p>
                                            </div>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="./public/png/Puy-de-dome.png" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6>Le Puy-de-Dôme et ses volcans</h6>
                                                <p>Le Puy-de-Dôme est composé de plus de 80 volcans, ils sont tous
                                                    endormis donc il est très facile de venir visiter cet endroit
                                                    spectaculaire.</p>
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
                                        <p>Bien que Gersois, le magret reste très consommé dans les Landes et le Pays
                                            Basque.</p>
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