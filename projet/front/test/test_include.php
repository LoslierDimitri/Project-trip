<?php
session_start();

if (isset($_SESSION['pseudo']) && isset($_SESSION["mot_de_passe"])){
    echo "<br><br><br>";
    echo "connected <br>";
    echo "connected with pseudo: [" . $_SESSION['pseudo'] . "] <br>";
echo "connected with mot_do_passe: [" . $_SESSION['mot_de_passe'] . "] <br>";
}
else {
    echo "<br><br><br>";
    echo "disconnected <br>";
}
// echo "connected with pseudo: [" . $_SESSION['pseudo'] . "] <br>";
// echo "connected with mot_do_passe: [" . $_SESSION['mot_de_passe'] . "] <br>";

    echo('<a href="test_api.php">test_api</a> <br>');
    echo('<a href="test_connection.php">test_connection</a> <br>');
    echo('<a href="test_connection_connected.php">test_connection_connected</a> <br>');
    echo('<a href="test_connection_deconnection.php">test_connection_deconnection</a> <br>');
    echo('<a href="test_database.php">test_database</a> <br>');
    echo('<a href="test_function.php">test_function</a> <br>');
    echo('<a href="test_modification.php">test_modification</a> <br>');
    echo('<a href="test_registration.php">test_registration</a> <br>');

?>

