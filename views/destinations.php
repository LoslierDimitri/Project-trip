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
    <link rel="stylesheet" href="./public/css/destinations.css">
    <link rel="shortcut icon" type="image/png" href="./public/svg/pointer.svg"/>
    <title>destinations</title>
</head>

<body>

     <?php
    include("./include/navbar.php");
    ?>
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./public/jpeg/Bretagne.jpg" class="d-block w-100" alt="paysage">
    </div>
    <div class="carousel-item">
      <img src="./public/jpeg/Alsace.jpg" class="d-block w-100" alt="paysage">
    </div>
    <div class="carousel-item">
      <img src="./public/jpeg/Corse.jpg" class="d-block w-100" alt="paysage">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
 


<?php
    include("./include/footer.php");
    ?>   
</body>
</html>
