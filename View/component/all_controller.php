<p>------------------------------------------------------------------------------------------------</p>
<a href="/Project-trip/Controller/controller_main.php">controller_main</a><br>
<a href="/Project-trip/Controller/controller_account.php">controller_account</a><br>
<a href="/Project-trip/Controller/controller_connection.php">controller_connection</a><br>
<a href="/Project-trip/Controller/controller_registration.php">controller_registration</a><br>
<a href="/Project-trip/Controller/controller_deconnection.php">controller_deconnection</a><br>
<a href="/Project-trip/Controller/controller_concept.php">controller_concept</a><br>
<a href="/Project-trip/Controller/controller_result.php">controller_result</a><br>
<a href="/Project-trip/Controller/controller_buy.php">controller_buy</a><br>
<a href="/Project-trip/Controller/controller_404.php">controller_404</a><br>
<a href="/Project-trip/TEST.php">TEST</a><br>

<?php
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
?>
    <p>id: <?= $_SESSION["id"] ?></p>
    <p>type: <?= $_SESSION["type"] ?></p>
<?php
}
?>

<p>------------------------------------------------------------------------------------------------</p>