<?php
echo "<style>";
        include ("./projet/front/css/navbar.css");
        echo "</style>";
    ?>


<nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="./projet/front/source/svg/Logo.svg" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                    <a href="" class="container-login-logout"><img class="logo-login-logout" src="./projet/front/source/svg/Picto-connexion-inscription.svg" alt="">
                    <p class="text-login-logout">Se connecter/S'inscrire</p></a>
                </div>
            </div>
        </div>
    </nav>

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