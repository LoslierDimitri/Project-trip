<section class="product">
        <div class="container_inscription">
            <div class="inscription">
                <h2>Inscription</h2>

                <img src="./public/svg/Logo.svg" alt="">

                <form action="inscription" method="POST">
                    <div class="sex">
                        <input type="radio" name="inscription_sexe" id="H" value="H">
                        <label for="H">Homme</label>
                        <input type="radio" name="inscription_sexe" id="F" value="F">
                        <label for="F">Femme</label>
                        <input type="radio" name="inscription_sexe" id="N" value="N" checked>
                        <label for="A">Non Renseigné</label><br>
                    </div>
                    <input type="text" name="inscription_name" id="inscription_name" placeholder="Nom"><br>
                    <input type="text" name="inscription_prenom" id="inscription_prenom" placeholder="Prénom"><br>
                    <input type="number" name="inscription_age" id="inscription_age" placeholder="Age"><br>
                    <input type="text" name="inscription_adresse" id="inscription_adresse" placeholder="Adresse"><br>
                    <input type="text" name="inscription_pays" id="inscription_pays" placeholder="Pays"><br>
                    <input type="email" name="inscription_email" id="inscription_email" placeholder="Email"><br>
                    <input type="text" name="inscription_telephone" id="inscription_telephone" placeholder="Téléphone"><br>
                    <input type="text" name="inscription_pseudo" id="inscription_pseudo" placeholder="Pseudo"><br>
                    <input type="password" name="inscription_mot_de_passe" id="inscription_mot_de_passe" placeholder="Mot de passe"><br>
                    <input type="password" name="inscription_mot_de_passe_verification" id="inscription_mot_de_passe_verification" placeholder="Confirmation"><br>
                    <div class="bouton">
                        <button type="submit">Envoyer</button><br>
                    </div>
                </form>
                <a class="login-link" href="/project_trip_redone/Controller/controller_connection.php">Déjà un compte? Connectez-vous ici</a>
            </div>
        </div>
    </section>

    <a href="accueil">menu</a>