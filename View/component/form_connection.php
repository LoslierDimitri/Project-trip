<section class="product">
        <div class="container_connection">
            <div class="connexion">
                <h2>Connexion</h2>
                <img src="Project-trip/View/svg/Logo.svg" alt="">
                <?php
                /*
                    <form action="<?//= $_SERVER['PHP_SELF'] ?>" method="POST">
                    */
                ?>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                    <input type="text" name="connexion_pseudo" id="connexion_pseudo" placeholder="Pseudo"><br>
                    <input type="password" name="connexion_mot_de_passe" id="connexion_mot_de_passe" placeholder="Mot de passe">
                    <div class="bouton">
                        <button type="submit">Valider</button><br>
                    </div>
                </form>
                <a class="register-link" href="/Project-trip/Controller/controller_registration.php">
                    <p>Pas de compte? Inscrivez-vous ici</p>
                </a>
            </div>
        </div>
    </section>