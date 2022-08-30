<section class="advanced_search py-4 mt-4">
        <h1>Et si le voyage de votre vie était aussi délicieux <br> qu'un plat régional?</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="formule">
                <label for="voyage_formule">Formules</label>
                <select id="voyage_formule" name="voyage_formule">
                    <option value="voyage_formule_gastronomique">Gastronomique</option>
                    <option value="voyage_formule_touristique">Touristique</option>
                    <select><br>
            </div>
            <input type="text" name="type_search" value="france" hidden>
            <div class="icons-form">
                <div class="row">
                    <div class="col-md-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
                    </div>
                    <div class="col-md-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
                        <div class="column">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <img class="w-25" src="./public/svg/Picto-map.svg" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <input type="text" name="voyage_lieu_depart" id="voyage_lieu_depart" placeholder="Depart">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <input type="text" name="voyage_lieu_arrive" id="voyage_lieu_arrive" placeholder="Arrivée">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
                        <div class="column">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <img class="w-25" src="./public/svg/Picto-dates.svg" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <input type="date" name="voyage_date_aller" id="voyage_date_aller" placeholder="Date aller">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <input type="date" name="voyage_date_retour" id="voyage_date_retour" placeholder="Date retour">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
                        <div class="column">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <img class="w-25" src="./public/svg/Picto-add-people.svg" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <input type="number" name="voyage_nombre_personne_adulte" id="voyage_nombre_personne_adulte" placeholder="Nombre d'adulte">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <input type="number" name="voyage_nombre_personne_enfant" id="voyage_nombre_personne_enfant" placeholder="Nombre d'enfant">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
                        <div class="column">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <img class="w-25" src="./public/svg/Picto-lit.svg" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12 mt-3 mb-3 d-flex justify-content-around">
                                    <input type="number" name="voyage_nombre_chambre" id="voyage_nombre_chambre" placeholder="Nombre de chambre">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-2 mt-3 mb-3 d-flex justify-content-around">
            </div>

            <div class="col-lg-12 pb-3 d-flex justify-content-center">
                <button type="submit"> <img src="./public/svg/Picto-rechercher.svg" alt=""> Trouvez</button>
            </div>
            </div>

        </form>

    </section>