<?php
$etoile = '<img src="/Project-trip/View/png/etoiles.png" alt="">';
?>

<section>
    <div class="rates my-5">
        <div class="content">
            <div class="global_rate my-4">
                <h1 class="my-2">Note globale</h1>
                <?php
                for ($i = 0; $i < 4; $i++) {
                    echo $etoile;
                }
                ?>
                <h4 class="my-2">4 / 5</h4>
            </div>
            <div class="user_rates">
                <div class="rate">
                    <h3>Bernard C. <?php for ($j = 0; $j < 4; $j++) {
                                        echo $etoile;
                                    } ?></h3>
                    <p>Nous avons passé un très bon séjour grâce au voyage entièrement préparé par Culin'Air. Vraiment nous recommandons !</p>
                </div>
                <div class="rate">
                    <h3>Sylvie G. <?php for ($j = 0; $j < 5; $j++) {
                                        echo $etoile;
                                    } ?></h3>
                    <p>Quel régal ! Nous repasserons par vous c'est sûr !</p>
                </div>
                <div class="rate">
                    <h3>Guillaume P. <?php for ($j = 0; $j < 3; $j++) {
                                            echo $etoile;
                                        } ?></h3>
                    <p>Pas mal.</p>
                </div>
                <div class="rate">
                    <h3>Maurice M. <?php for ($j = 0; $j < 4; $j++) {
                                            echo $etoile;
                                        } ?></h3>
                    <p>Nous avons réservé sur ce nouveau site suite à la recommandation de nos amis sans grande conviction. On pensait que si tout était déjà conçu, ça ne pourrait pas resembler à des vacances comme on les aime. Et bien nous avons été agréablement surpris car nous pouvons tout de même choisir ce que nous voulons faire et nous avons juste à nous présenter sur le lieu et nous n'avons rien de plus a faire à part profiter. Vraiment bien.</p>
                </div>
            </div>
        </div>
    </div>
</section>