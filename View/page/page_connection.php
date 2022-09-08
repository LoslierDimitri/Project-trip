<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="/Project-trip/View/css/navbar.css">
    <link rel="stylesheet" href="/Project-trip/View/css/footer.css">
    <link rel="stylesheet" href="/Project-trip/View/css/page_connection.css">
    <link rel="stylesheet" href="/Project-trip/View/css/page_registration.css">
    <link rel="shortcut icon" type="image/x-icon" href="../View/ico/favicon.ico" />
    <title>Page connection</title>
</head>

<body>

    <?php
    $path = $_SERVER["DOCUMENT_ROOT"];
    $path_new = $path . "/Project-trip/View/component/navbar.php";
    include($path_new);
    ?>

    <?php
    // $path = $_SERVER["DOCUMENT_ROOT"];
    // $path_new = $path . "/Project-trip/View/component/all_controller.php";
    // include($path_new);
    ?>

    <?php
    $path = $_SERVER["DOCUMENT_ROOT"];
    $path_new = $path . "/Project-trip/View/component/form_connection.php";
    include($path_new);
    ?>

    <?php
    $path = $_SERVER["DOCUMENT_ROOT"];
    $path_new = $path . "/Project-trip/View/component/footer.php";
    include($path_new);
    ?>

</body>

</html>