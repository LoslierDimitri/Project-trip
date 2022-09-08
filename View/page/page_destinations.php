<?php
// include("test_connection_check.php");

// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="/Project-trip/View/css/navbar.css">
    <link rel="stylesheet" href="/Project-trip/View/css/footer.css">
    <!-- <link rel="stylesheet" href="./public/css/page-404.css"> -->
    <link rel="stylesheet" href="/Project-trip/View/css/destinations.css">
    <link rel="shortcut icon" type="image/png" href="/Project-trip/View/public/svg/pointer.svg" />
    <title>Culin'Air - Destinations</title>
</head>

<body>

    <?php
  $path = $_SERVER["DOCUMENT_ROOT"];
  $path_new = $path . "/Project-trip/View/component/navbar.php";
  include($path_new);
  ?>

    <?php
  // $path = $_SERVER["DOCUMENT_ROOT"];
  // $path_new = $path . "/Project-trip/View/component/all_controller.php";
  // include($path_new);
  ?>

    <img class="banner my-4" src="/Project-trip/View/svg/banner_destinations.svg" alt="">


    <h2 class="mx-4">En France</h2>
    <div class="ext-border mx-5 mb-5 py-5">
        <div id="carouselExampleControls" class="carousel slide w-50 mx-auto" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="/Project-trip/View/jpg/Bretagne.jpg" class="d-block w-100 mb-3" alt="paysage">
                        </div>
                        <div class="col-lg-6">
                            <h4>La Bretagne</h4>
                            <p class="text-dark">Pays des irréductibles Gaulois, venez découvrir cette magnifique région
                                avec ses falaises majestueuses et son excellente gastronomie telle que les crêpes
                                bretonnes, le Kig-Ha-Farz (sorte de pot-au-feu) et le Kouign-amann</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="/Project-trip/View/jpg/Bretagne.jpg" class="d-block w-100 mb-3" alt="paysage">
                        </div>
                        <div class="col-lg-6">
                            <h4>La Bretagne</h4>
                            <p class="text-dark">Pays des irréductibles Gaulois, venez découvrir cette magnifique région
                                avec ses falaises majestueuses et son excellente gastronomie telle que les crêpes
                                bretonnes, le Kig-Ha-Farz (sorte de pot-au-feu) et le Kouign-amann</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="/Project-trip/View/jpg/Bretagne.jpg" class="d-block w-100 mb-3" alt="paysage">
                        </div>
                        <div class="col-lg-6">
                            <h4>La Bretagne</h4>
                            <p class="text-dark">Pays des irréductibles Gaulois, venez découvrir cette magnifique région
                                avec ses falaises majestueuses et son excellente gastronomie telle que les crêpes
                                bretonnes, le Kig-Ha-Farz (sorte de pot-au-feu) et le Kouign-amann</p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <img src="/Project-trip/View/svg/button_prev.svg" alt="">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <img src="/Project-trip/View/svg/button_next.svg" alt="">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <h2 class="mx-4">Dans les DOM-TOM</h2>
    <div class="ext-border mx-5 mb-5 py-5">
        <div id="carouselExampleControls2" class="carousel slide w-50 mx-auto" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="/Project-trip/View/jpg/Bretagne.jpg" class="d-block w-100 mb-3" alt="paysage">
                        </div>
                        <div class="col-lg-6">
                            <h4>La Bretagne</h4>
                            <p class="text-dark">Pays des irréductibles Gaulois, venez découvrir cette magnifique région
                                avec ses falaises majestueuses et son excellente gastronomie telle que les crêpes
                                bretonnes, le Kig-Ha-Farz (sorte de pot-au-feu) et le Kouign-amann</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="/Project-trip/View/jpg/Bretagne.jpg" class="d-block w-100 mb-3" alt="paysage">
                        </div>
                        <div class="col-lg-6">
                            <h4>La Bretagne</h4>
                            <p class="text-dark">Pays des irréductibles Gaulois, venez découvrir cette magnifique région
                                avec ses falaises majestueuses et son excellente gastronomie telle que les crêpes
                                bretonnes, le Kig-Ha-Farz (sorte de pot-au-feu) et le Kouign-amann</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="/Project-trip/View/jpg/Bretagne.jpg" class="d-block w-100 mb-3" alt="paysage">
                        </div>
                        <div class="col-lg-6">
                            <h4>La Bretagne</h4>
                            <p class="text-dark">Pays des irréductibles Gaulois, venez découvrir cette magnifique région
                                avec ses falaises majestueuses et son excellente gastronomie telle que les crêpes
                                bretonnes, le Kig-Ha-Farz (sorte de pot-au-feu) et le Kouign-amann</p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls2"
                data-bs-slide="prev">
                <img src="/Project-trip/View/svg/button_prev.svg" alt="">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls2"
                data-bs-slide="next">
                <img src="/Project-trip/View/svg/button_next.svg" alt="">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    <?php
  $path = $_SERVER["DOCUMENT_ROOT"];
  $path_new = $path . "/Project-trip/View/component/footer.php";
  include($path_new);
  ?>
</body>

</html>