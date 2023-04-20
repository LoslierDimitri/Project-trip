<section>
    <div class="panel my-5">
        <div class="collapse_title">
            <a data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                <div class="title">
                    <h2>Identification</h2>
                    <div class=""><img src="/Project-trip/View/png/fleche.png" alt=""></div>
                </div>
            </a>
        </div>
        <div class="collapse multi-collapse" id="multiCollapseExample1">
            <ul>
                <li>Culin'Air - SARL<br>50 rue Ferdinand Buisson<br>33130 Bègles</li>
                <li>Numéro d’immatriculation RCS : RCS Bordeaux B 496323678</li>
                <li>Numéro identification TVA : FR 14 496323678</li>
                <li>Mail : contact.culinair@gmail.com</li>
                <li>Tel : 05 57 01 02 03</li>
                <li>Capital social : 150 000€</li>
                <li>Hébergeur du site : www.ovh.com</li>
                <li>Stockage des données : www.ovh.com</li>
            </ul>
        </div>
    </div>
    <div class="panel my-5">
        <div class="collapse_title">
            <a data-bs-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false" aria-controls="multiCollapseExample2">
                <div class="title">
                    <h2>Conditions Générales de Ventes</h2>
                    <img class="fleche" src="/Project-trip/View/png/fleche.png" alt="">
                </div>
            </a>
        </div>
        <div class="collapse multi-collapse" id="multiCollapseExample2">
            <?php
            $path = $_SERVER["DOCUMENT_ROOT"];
            $path_new = $path . "/Project-trip/View/component/CGV.php";
            include($path_new);
            ?>
        </div>
    </div>
    <div class="panel my-5">
        <div class="collapse_title">
            <a data-bs-toggle="collapse" href="#multiCollapseExample3" role="button" aria-expanded="false" aria-controls="multiCollapseExample3">
                <div class="title">
                    <h2>RGPD & Cookies</h2>
                    <img class="fleche" src="/Project-trip/View/png/fleche.png" alt="">
                </div>
            </a>
        </div>
        <div class="collapse multi-collapse" id="multiCollapseExample3">
            <?php
            $path = $_SERVER["DOCUMENT_ROOT"];
            $path_new = $path . "/Project-trip/View/component/RGPD.php";
            include($path_new);
            ?>
        </div>
    </div>
</section>