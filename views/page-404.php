<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/navbar.css">
    <link rel="stylesheet" href="./public/css/footer.css">
    <link rel="stylesheet" href="./public/css/page-404.css">
    <link rel="shortcut icon" type="image/png" href="./public/svg/pointer.svg"/>
    <title>erreur 404</title>
</head>

<body>

    <?php
    include("./include/navbar.php");
    ?>
    <section>
        <!-- <div class="container text-center my-5">    
    <h1 class="text-primary"><div><img src="./projet/front/source/png/fast-food.png"/> </div>404</h1>
    <h1 class="text-primary">Page not found</h1>
    <h5>Nous somme désolé, mais la page que vous avez demandé n'est pas disponible</h5></div> -->
        <div class="d-flex justify-content-center container  text-center my-5">
            <div class="card-header" style="width: 18rem;">
                <img src="./public/png/fast-food.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h2 class="card-title">404</h2>
                    <p class="card-text">Désolé, mais la page que vous avez demandé n'est pas disponible</p>
                    <div class="bouton">
                        <a href="/Project-trip"><button type="button">Accueil</button></a>
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