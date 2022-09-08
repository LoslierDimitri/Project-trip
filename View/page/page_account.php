<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="/Project-trip/View/css/navbar.css">
    <link rel="stylesheet" href="/Project-trip/View/css/footer.css">
    <link rel="stylesheet" href="/Project-trip/View/css/page_account.css">
    <title>Page account</title>
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

    <div class="content">
        <h2>Mes informations personnelles</h2>
        <div class="content_info">
            <p>Civilité : <?php echo $result_user["sexe"]; ?></p>
            <p>Nom : <?php echo $result_user["nom"]; ?></p>
            <p>Prénom : <?php echo $result_user["prenom"]; ?></p>
            <p>Pseudo : <?php echo $result_user["pseudo"]; ?></p>
            <p>Téléphone : <?php echo $result_user["telephone"]; ?></p>
            <p>Email : <?php echo $result_user["email"]; ?></p>
        </div>
    </div>

    <?php
    $path = $_SERVER["DOCUMENT_ROOT"];
    $path_new = $path . "/Project-trip/View/component/footer.php";
    include($path_new);
    ?>

</body>

</html>