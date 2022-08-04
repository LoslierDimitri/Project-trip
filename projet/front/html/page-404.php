<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="./projet/front/css/navbar.css">
    <link rel="stylesheet" href="/Project-trip/projet/front/css/footer.css">
    <link rel="stylesheet" href="/Project-trip/projet/front/css/page-404.css">
    <title>erreur 404</title>
</head>

<body>

    <?php
    include("./projet/front/include/navbar.php");
    ?>
    <section>
        <!-- <div class="container text-center my-5">    
    <h1 class="text-primary"><div><img src="./projet/front/source/png/fast-food.png"/> </div>404</h1>
    <h1 class="text-primary">Page not found</h1>
    <h5>Nous somme désolé, mais la page que vous avez demandé n'est pas disponible</h5></div> -->
        <div class="d-flex justify-content-center container  text-center my-5">
            <div class="card-header" style="width: 18rem;">
                <img src="./projet/front/source/png/fast-food.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h2 class="card-title">404</h2>
                    <p class="card-text">Désolé, mais la page que vous avez demandé n'est pas disponible</p>
                    <a class="btnAccueil" href="./"><span class="colorBtn">Accueil</span></a>
                </div>
            </div>
        </div>
    </section>





    <?php
    include("./projet/front/include/footer.php");
    ?>



    <script src="../js/script.js"></script>
</body>

</html>