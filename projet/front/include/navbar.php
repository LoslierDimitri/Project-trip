<?php
echo "<style>";
        include ("./projet/front/css/navbar.css");
        echo "</style>";
    ?>


<nav class="navbar navbar-expand-lg navbar-light position-fixed">
        <div class="container-fluid">
          <a class="navbar-brand" href=""><img src="./projet/front/source/svg/Logo.svg" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse mt-2" id="navbarTogglerDemo01">

                <ul class="navbar-nav me-auto mb-2 ml-1 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Le concept</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Destinations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Témoignages</a>
                    </li>
                </ul>
                <div class="login-logout">
                    <a href="/Project-trip/connexion" class="container-login-logout"><img class="logo-login-logout" src="./projet/front/source/svg/Picto-connexion-inscription.svg" alt="">
                    <p class="text-login-logout">Se connecter/S'inscrire</p></a>
                </div>
          </div>
        </div>
      </nav>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <?php
        if (isset($_SESSION['pseudo']) && isset($_SESSION["mot_de_passe"])){
            echo "<br><br><br>";
            echo "connected <br>";
            echo "connected with pseudo: [" . $_SESSION['pseudo'] . "] <br>";
        echo "connected with mot_do_passe: [" . $_SESSION['mot_de_passe'] . "] <br>";
        }else{
            echo("Disconnected<br>");
        }
    ?>

    