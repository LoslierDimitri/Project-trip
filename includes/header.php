<header>
<nav>
    <h2>HEADER</h2>
    <?php if (isset($_SESSION['user'])) : ?>
        <p>Bonjour <?=$_SESSION['user']?></p>
    <?php endif; ?>
    <a href="./index.php">Accueil</a>
    <?php if (isset($_SESSION['user'])) : ?>
        <a href="./account.php?<?=$_SESSION['user']?>">Mon compte</a>
        <a href="./logout.php">Déconnexion</a>
    <?php else : ?>
    <a href="./formulaire.php">Inscription</a>
    <a href="./connexion.php">Se connecter</a>
    <?php endif; ?>
</nav>
</header>