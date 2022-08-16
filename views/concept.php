<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/navbar.css">
    <link rel="stylesheet" href="./public/css/footer.css">
    <link rel="stylesheet" href="./public/css/concept.css">
    <link rel="shortcut icon" type="image/png" href="./public/svg/pointer.svg" />
    <title>Culin'Air - Le concept</title>
</head>

<body>

    <?php
    include("./include/navbar.php");
    ?>

    <section class="banner">
        <img src="./public/svg/img-concept.svg" alt="">
    </section>


    <section class="w-100 d-flex justify-content-center">
        <div class="column w-50">
            <div class="title mt-5 mb-3">
                <h3><img src="./public/svg/Logo-text.svg" alt="">, qu'est ce que c'est au juste?</h3>
            </div>
            <div class="contents mb-5">
                <p class="text-dark text-justify">
                    Cette aventure commence par l’idée de 4 amis qui voulaient partir en vacance, 2 voulaientgoûter à des spécialités qu’ils ne connaissaient pas et les 2 autres rêvaient de découvrir le monde et toutes ses merveilles.
                    2 points différents mais les 4 s’accordaient sur 1 point, ils n’avaient pas beaucoup d’argent et ne parlaient pas (ou presque) un mot d’une autre langue que le français.
                </p>

                <p class="text-dark">
                    C’est là que le concept Culin’Air est né. Ils ont rasemblé leurs idées pour proposer aux gens des voyages tout conçus sur 3 axes principaux :
                </p>

                <p class="text-dark">
                    <span class="gastronomique">Des voyages gastronomiques. </span>À savoir des voyages proposant des excurtions découverte du pays mais une grosse partie dédiée à la découvertes des spécialités locales. Par exemple, vous souhaitez vous rendre en Corse, il y aura bien entendu une visite de l’Île mais les repas, vous aurez des réservations dans des restaurants partenaires qui proposent des spécialités culinaires et étant les mieux notés dans le Guide du Routard
                </p>

                <p class="text-dark">
                    <span class="touristique">Des voyages tourstiques. </span>Pour les personnes étant plus intéressés par la découvertes des pays, des lieux touristiques seront disponibles dans votre périple, vous aurez également des visites pévues qui seront comprises dans le prix du voyage. Quant aux repas, ils seront gérés par vous-même.
                </p>

                <p class="text-dark">
                    <span class="petits_budgets">Des voyages petits budgets. </span>Nous avons également pensé aux personnes ayant des petits budgets mais qui souhaitent voyager. Nous proposons alors des voyages où seul le déplacement et l’hébergement sont compris. Il s’agira bien entendu de logements plus rudimentaires mais sélectionnés tout de même avec soin pour que votre voyage se passe pour le mieux.
                </p>
            </div>
        </div>
    </section>

    <?php
    include("./include/footer.php");
    ?>

</body>

</html>