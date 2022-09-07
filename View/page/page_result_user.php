<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="/project_trip_redone/View/css/navbar.css">
    <link rel="stylesheet" href="/project_trip_redone/View/css/footer.css">
    <title>Page result user</title>
</head>

<body>

    <?php
    $path = $_SERVER["DOCUMENT_ROOT"];
    $path_new = $path . "/project_trip_redone/View/component/navbar.php";
    include($path_new);
    ?>

    <?php
    $path = $_SERVER["DOCUMENT_ROOT"];
    $path_new = $path . "/project_trip_redone/View/component/all_controller.php";
    include($path_new);
    ?>

    <?php
    $path = $_SERVER["DOCUMENT_ROOT"];
    $path_new = $path . "/project_trip_redone/View/component/footer.php";
    include($path_new);
    ?>
</body>

</html>