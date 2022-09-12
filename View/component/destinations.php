<section>
    <h2 class="mx-4">En France</h2>
    <div class="ext-border mx-5 mb-5 py-5">
        <div id="carouselExampleControls" class="carousel slide w-50 mx-auto" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="/Project-trip/View/jpg/Bretagne.jpg" class="d-block w-100 mb-3" alt="paysage">
                        </div>
                        <div class="col-lg-6">
                            <h4>La Bretagne</h4>
                            <p class="text-dark">Pays des irréductibles Gaulois, venez découvrir cette magnifique région
                                avec ses falaises majestueuses et son excellente gastronomie telle que les crêpes
                                bretonnes, le Kig-Ha-Farz (sorte de pot-au-feu) et le Kouign-amann</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="/Project-trip/View/jpg/Bretagne.jpg" class="d-block w-100 mb-3" alt="paysage">
                        </div>
                        <div class="col-lg-6">
                            <h4>La Bretagne</h4>
                            <p class="text-dark">Pays des irréductibles Gaulois, venez découvrir cette magnifique région
                                avec ses falaises majestueuses et son excellente gastronomie telle que les crêpes
                                bretonnes, le Kig-Ha-Farz (sorte de pot-au-feu) et le Kouign-amann</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="/Project-trip/View/jpg/Bretagne.jpg" class="d-block w-100 mb-3" alt="paysage">
                        </div>
                        <div class="col-lg-6">
                            <h4>La Bretagne</h4>
                            <p class="text-dark">Pays des irréductibles Gaulois, venez découvrir cette magnifique région
                                avec ses falaises majestueuses et son excellente gastronomie telle que les crêpes
                                bretonnes, le Kig-Ha-Farz (sorte de pot-au-feu) et le Kouign-amann</p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <img src="/Project-trip/View/svg/button_prev.svg" alt="">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <img src="/Project-trip/View/svg/button_next.svg" alt="">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <h2 class="mx-4">Dans les DOM-TOM</h2>
    <div class="ext-border mx-5 mb-5 py-5">
        <div id="carouselExampleControls2" class="carousel slide w-50 mx-auto" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php

                            $path = $_SERVER["DOCUMENT_ROOT"];
                            $path_new = $path . "/Project-trip/View/script/result_map.php";
                            include($path_new);

                            $result_region_name = get_regions("noms", "images", "descriptions", "prix");

                            for ($i = 1; $i < count($result_region_name); $i++) {
                                $result_region_images = get_regions("images", "noms", $i);
                            }

                            print_r($result_region_images)
                            ?>

                            <img src="/Project-trip/View/jpg<?php if($result_region_name != []){
                                echo $result_region_name[$i]["images"];
                            }?>"alt="">
                        </div>
                        <!-- <div class="col-lg-6">
                            <h4>La Bretagne</h4>
                            <p class="text-dark">Pays des irréductibles Gaulois, venez découvrir cette magnifique région
                                avec ses falaises majestueuses et son excellente gastronomie telle que les crêpes
                                bretonnes, le Kig-Ha-Farz (sorte de pot-au-feu) et le Kouign-amann</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="/Project-trip/View/jpg/Bretagne.jpg" class="d-block w-100 mb-3" alt="paysage">
                        </div>
                        <div class="col-lg-6">
                            <h4>La Bretagne</h4>
                            <p class="text-dark">Pays des irréductibles Gaulois, venez découvrir cette magnifique région
                                avec ses falaises majestueuses et son excellente gastronomie telle que les crêpes
                                bretonnes, le Kig-Ha-Farz (sorte de pot-au-feu) et le Kouign-amann</p>
                        </div>
                    </div>
                </div> -->
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="/Project-trip/View/jpg/Bretagne.jpg" class="d-block w-100 mb-3" alt="paysage">
                                </div>
                                <div class="col-lg-6">
                                    <h4>La Bretagne</h4>
                                    <p class="text-dark">Pays des irréductibles Gaulois, venez découvrir cette magnifique région
                                        avec ses falaises majestueuses et son excellente gastronomie telle que les crêpes
                                        bretonnes, le Kig-Ha-Farz (sorte de pot-au-feu) et le Kouign-amann</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="prev">
                        <img src="/Project-trip/View/svg/button_prev.svg" alt="">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="next">
                        <img src="/Project-trip/View/svg/button_next.svg" alt="">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
</section>