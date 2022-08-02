

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require ("./projet/back/form/form_connection.php");

    connection();
    echo "connected with pseudo: [" . $_SESSION['pseudo'] . "] <br>";
    echo "connected with mot_do_passe: [" . $_SESSION['mot_de_passe'] . "] <br>";
    header ("Location: /Project-trip");
    
}
?>