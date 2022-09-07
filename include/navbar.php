<?php
echo "<style>";
include("./public/css/navbar.css");
echo "</style>";
?>
<?php
// require "database_disconnect.php";
// require "../database/database_disconnect.php";
?>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand mx-4 my-auto" href="/Project-trip"><img src="./public/svg/Logo.svg" alt=""></a>
        <button class="navbar-toggler mx-4 py-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="bg-none"><img src="./public/svg/Picto-menu-burger.svg" alt=""></span>
        </button>
        <div class="collapse navbar-collapse mt-2" id="navbarTogglerDemo01">

            <ul class="navbar-nav me-auto mb-2 ml-1 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="concept">Le concept</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="destinations">Destinations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="temoignages">Témoignages</a>
                </li>
            </ul>
            <!-- Si la personne est connecté -->
            <?php if (isset($_SESSION['pseudo']) && isset($_SESSION["mot_de_passe"])) : ?>
                <p>

                <div class="login-logout mx-5 collapsed" style="width: 50px;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                    <div class="container-login-logout">
                        <img class="logo-login-logout" style="width: 70px" src="./public/svg/Picto-compte.svg" alt="">
                        <p class="text-login-logout"><?= $_SESSION['pseudo'] ?></p>
                    </div>
                </div>

                </p>
                <div style="min-height: 120px;">
                    <div class="collapse collapse-horizontal" id="collapseWidthExample">
                        <div class="card card-body" style="width: 200px;">
                            <ul>
                                <a class="list-collapse" href="my_account">
                                    <li>Mon compte</li>
                                </a>
                                <a class="list-collapse" href="my_trips">
                                    <li>Mes voyages</li>
                                </a>
                            </ul>
                            <div class="d-flex justify-content-center">
                                <a href="logout">
                                <button class="disconnect">
                                    <p class="mb-0 text-white">Deconnexion</p>
                                </button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Si la personne n'est pas connecté -->
            <?php else : ?>
                <div class="login-logout">
                    <a href="connexion" class="container-login-logout"><img class="logo-login-logout" src="./public/svg/Picto-connexion-inscription.svg" alt="">
                        <p class="text-login-logout">Se connecter/S'inscrire</p>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>

<?php
if (isset($_SESSION['pseudo']) && isset($_SESSION["mot_de_passe"])) {
    echo "Bienvenue " . $_SESSION['pseudo'] . " <br>";
}
// } else {
//     echo ("Disconnected<br>");
// }
?>