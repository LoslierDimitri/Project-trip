<section class="region_search">
    <div class="title mt-5 mb-5">
        <div class="column w-100">
            <h2 class="text-center mb-4">Recherche par région</h2>
            <h3 class="text-center mb-4">France</h3>
        </div>
        <div id="panel">

        </div>
        <div class="map">
            <div class="row">
                <?php
                $path = $_SERVER["DOCUMENT_ROOT"];
                $path_new = $path . "/project_trip_redone/View/component/map_france.php";
                include($path_new);


                ?>
                <div class="col-lg-6">
                    <div id="details_map" class="h-100">
                        <div class="row h-100">
                            <div class="d-flex align-items-center">
                                <h6>Cliquez sur une région pour avoir le détail</h6>
                            </div>
                        </div>
                    </div>

                    <?php
                    $path = $_SERVER["DOCUMENT_ROOT"];
                    $path_new = $path . "/project_trip_redone/View/script/result_map.php";
                    include($path_new);


                    $result_region_name = get_regions("noms", "images", "descriptions", "prix");

                    for ($i = 1; $i < count($result_region_name) + 1; $i++) {
                        $result_specialities_name = get_informations("specialities", "noms", $i);
                        $result_specialities_images = get_informations("specialities", "images", $i);
                        $result_specialities_descriptions = get_informations("specialities", "descriptions", $i);
                        $result_visits_name = get_informations("visits", "noms", $i);
                        $result_visits_images = get_informations("visits", "images", $i);
                        $result_visits_descriptions = get_informations("visits", "descriptions", $i);

                        // echo "<pre>";
                        // print_r($result_region_name);

                        // print_r($result_specialities_name);
                        // print_r($result_specialities_images);
                        // print_r($result_specialities_descriptions);
                        // print_r($result_visits_name);
                        // print_r($result_visits_images);
                        // print_r($result_visits_descriptions);
                        // echo "</pre>";

                        // die();
                    ?>

                        <div id="region_panel_<?= $i ?>" class="hidden_item">
                            <div class="row w-100">
                                <div class="row">
                                    <h4 class="text-center mb-4"><?php if ($result_region_name != []) {
                                                                        echo $result_region_name[$i - 1]["noms"];
                                                                    } ?></h4>
                                    <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                        <h5>Vous pourrez déguster par exemple:</h5>
                                    </div>
                                    <div class="row">

                                        <?php
                                        for ($j = 0; $j < 4; $j++) {
                                        ?>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="/project_trip_redone/View/jpg/<?php if ($result_specialities_images != []) {
                                                                                                                    echo $result_specialities_images[$j]["images"];
                                                                                                                } ?>" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6><?php if ($result_specialities_name != []) {
                                                        echo $result_specialities_name[$j]["noms"];
                                                    } ?></h6>
                                                <p><?php if ($result_specialities_descriptions != []) {
                                                        echo $result_specialities_descriptions[$j]["descriptions"];
                                                    } ?></p>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                            <h5 class="mt-3">Vous pourrez visiter par exemple:</h5>
                                        </div>
                                        <div class="row">
                                            <?php
                                            for ($j = 0; $j < 4; $j++) {
                                            ?>
                                                <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                    <img class="region_img mt-4" src="/project_trip_redone/View/jpg/<?php if ($result_visits_images != []) {
                                                                                                                        echo $result_visits_images[$j]["images"];
                                                                                                                    } ?>" alt="">
                                                </div>
                                                <div class="col-md-12 col-lg-3">
                                                    <h6><?php if ($result_visits_name != []) {
                                                            echo $result_visits_name[$j]["noms"];
                                                        } ?></h6>
                                                    <p><?php if ($result_visits_descriptions != []) {
                                                            echo $result_visits_descriptions[$j]["descriptions"];
                                                        } ?></p>
                                                </div>

                                                <?php

                                                ?>

                                            <?php
                                            }
                                            ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="region_search">
    <div class="title mt-5 mb-5">
        <div class="column w-100">
            <h3 class="text-center mb-4">DOM-TOM</h3>
        </div>
        <div id="panel">

        </div>
        <div class="map">
            <div class="row">
                <?php
                $path = $_SERVER["DOCUMENT_ROOT"];
                $path_new = $path . "/project_trip_redone/View/component/map_dom-tom.php";
                include($path_new);


                ?>
                <div class="col-lg-6">
                    <!-- <div id="details_map" class="h-100">
                        <div class="row h-100">
                            <div class="d-flex align-items-center">
                                <h6>Cliquez sur une région pour avoir le détail</h6>
                            </div>
                        </div>
                    </div> -->

                    <?php
                    // $path = $_SERVER["DOCUMENT_ROOT"];
                    // $path_new = $path . "/project_trip_redone/View/script/result_map.php";
                    // include($path_new);


                    // $result_region_name = get_regions("noms", "images", "descriptions", "prix");

                    for ($i = 1; $i < count($result_region_name) + 1; $i++) {
                        // $result_specialities_name = get_informations("specialities", "noms", $i);
                        // $result_specialities_images = get_informations("specialities", "images", $i);
                        // $result_specialities_descriptions = get_informations("specialities", "descriptions", $i);
                        // $result_visits_name = get_informations("visits", "noms", $i);
                        // $result_visits_images = get_informations("visits", "images", $i);
                        // $result_visits_descriptions = get_informations("visits", "descriptions", $i);

                        // echo "<pre>";
                        // print_r($result_region_name);

                        // print_r($result_specialities_name);
                        // print_r($result_specialities_images);
                        // print_r($result_specialities_descriptions);
                        // print_r($result_visits_name);
                        // print_r($result_visits_images);
                        // print_r($result_visits_descriptions);
                        // echo "</pre>";

                        // die();
                    ?>

                        <div id="region_panel_<?= $i ?>" class="hidden_item">
                            <div class="row w-100">
                                <div class="row">
                                    <h4 class="text-center mb-4"><?php if ($result_region_name != []) {
                                                                        echo $result_region_name[$i - 1]["noms"];
                                                                    } ?></h4>
                                    <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                        <h5>Vous pourrez déguster par exemple:</h5>
                                    </div>
                                    <div class="row">

                                        <?php
                                        for ($j = 0; $j < 4; $j++) {
                                        ?>
                                            <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                <img class="region_img mt-4" src="/project_trip_redone/View/jpg/<?php if ($result_specialities_images != []) {
                                                                                                                    echo $result_specialities_images[$j]["images"];
                                                                                                                } ?>" alt="">
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <h6><?php if ($result_specialities_name != []) {
                                                        echo $result_specialities_name[$j]["noms"];
                                                    } ?></h6>
                                                <p><?php if ($result_specialities_descriptions != []) {
                                                        echo $result_specialities_descriptions[$j]["descriptions"];
                                                    } ?></p>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-12 col-lg-12 mb-3 d-flex justify-content-center">
                                            <h5 class="mt-3">Vous pourrez visiter par exemple:</h5>
                                        </div>
                                        <div class="row">
                                            <?php
                                            for ($j = 0; $j < 4; $j++) {
                                            ?>
                                                <div class="col-md-12 col-lg-3 d-flex justify-content-center">
                                                    <img class="region_img mt-4" src="/project_trip_redone/View/jpg/<?php if ($result_visits_images != []) {
                                                                                                                        echo $result_visits_images[$j]["images"];
                                                                                                                    } ?>" alt="">
                                                </div>
                                                <div class="col-md-12 col-lg-3">
                                                    <h6><?php if ($result_visits_name != []) {
                                                            echo $result_visits_name[$j]["noms"];
                                                        } ?></h6>
                                                    <p><?php if ($result_visits_descriptions != []) {
                                                            echo $result_visits_descriptions[$j]["descriptions"];
                                                        } ?></p>
                                                </div>

                                                <?php

                                                ?>

                                            <?php
                                            }
                                            ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>